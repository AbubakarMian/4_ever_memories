<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class PaymentController extends Controller
{
    private $planConfigs = [
        1 => ['memorials' => 15, 'name' => 'Standard', 'amount' => 49.99],
        2 => ['memorials' => 30, 'name' => 'Premium', 'amount' => 99.99],
        3 => ['memorials' => 50, 'name' => 'Premium Plus', 'amount' => 149.99],
        4 => ['memorials' => 80, 'name' => 'VIP Premium Plus', 'amount' => 199.99]
    ];

    public function createPayment_del(Request $request)
    {
        try {
            $planId = $request->plan_id;
            $memorialId = $request->get('memorial_id');
            if (!isset($this->planConfigs[$planId])) {
                return back()->with('error', 'Invalid plan selected');
            }

            $planConfig = $this->planConfigs[$planId];
            
            // Get access token
            $accessToken = $this->getPayPalAccessToken();
            if (!$accessToken) {
                return back()->with('error', 'Could not connect to PayPal');
            }
            
            // Create payment
            $payment = $this->createPayPalPaymentDirect($planConfig, $planId, $accessToken);
            
            if ($payment && isset($payment['id'])) {
                // Store temporary payment data in session
                session([
                    'pending_payment' => [
                        'payment_id' => $payment['id'],
                        'plan_id' => $planId,
                        'amount' => $planConfig['amount'],
                        'memorial_id' => $memorialId,
                    ]
                ]);
                
                // Find approval URL
                foreach ($payment['links'] as $link) {
                    if ($link['rel'] === 'approval_url') {
                        return redirect($link['href']);
                    }
                }
            }
            
            return back()->with('error', 'Failed to create PayPal payment');
            
        } catch (\Exception $ex) {
            \Log::error('Payment Error: ' . $ex->getMessage());
            return back()->with('error', 'Error creating payment: ' . $ex->getMessage());
        }
    }

    public function createPayment(Request $request)
    {
        try {
            $planId = $request->plan_id;
            $memorialId = $request->get('memorial_id');
            
            if (!isset($this->planConfigs[$planId])) {
                return response()->json(['error' => 'Invalid plan selected'], 400);
            }

            $planConfig = $this->planConfigs[$planId];
            
            // Get access token
            $accessToken = $this->getPayPalAccessToken();
            if (!$accessToken) {
                return response()->json(['error' => 'Could not connect to PayPal'], 500);
            }
            
            // Create payment
            $payment = $this->createPayPalPaymentDirect($planConfig, $planId, $accessToken);
            
            if ($payment && isset($payment['id'])) {
                // Store temporary payment data in session
                session([
                    'pending_payment' => [
                        'payment_id' => $payment['id'],
                        'plan_id' => $planId,
                        'amount' => $planConfig['amount'],
                        'memorial_id' => $memorialId,
                    ]
                ]);
                
                // Find approval URL
                foreach ($payment['links'] as $link) {
                    if ($link['rel'] === 'approval_url') {
                        return redirect($link['href']);
                        // return response()->json(['redirect_url' => $link['href']]);
                    }
                }
            }
            
            return response()->json(['error' => 'Failed to create PayPal payment'], 500);
            
        } catch (\Exception $ex) {
            \Log::error('Payment Error: ' . $ex->getMessage());
            return response()->json(['error' => 'Error creating payment: ' . $ex->getMessage()], 500);
        }
    }
    private function getPayPalAccessToken()
    {
        $clientId = config('services.paypal.client_id');
        $secret = config('services.paypal.secret');
        $isSandbox = config('services.paypal.mode', 'sandbox') === 'sandbox';
        
        $url = $isSandbox 
            ? 'https://api.sandbox.paypal.com/v1/oauth2/token'
            : 'https://api.paypal.com/v1/oauth2/token';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $clientId . ":" . $secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        
        $headers = [
            'Accept: application/json',
            'Accept-Language: en_US'
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            $json = json_decode($result, true);
            return $json['access_token'] ?? null;
        }
        
        \Log::error('PayPal Access Token Error: ' . $result);
        return null;
    }

    private function createPayPalPaymentDirect($planConfig, $planId, $accessToken)
    {
        $isSandbox = config('services.paypal.mode', 'sandbox') === 'sandbox';
        $baseUrl = $isSandbox 
            ? 'https://api.sandbox.paypal.com'
            : 'https://api.paypal.com';
        
        $paymentData = [
            'intent' => 'sale',
            'payer' => [
                'payment_method' => 'paypal'
            ],
            'transactions' => [
                [
                    'amount' => [
                        'total' => number_format($planConfig['amount'], 2, '.', ''),
                        'currency' => 'USD'
                    ],
                    'description' => "One-time payment for {$planConfig['memorials']} memorial pages - {$planConfig['name']} Plan",
                    'invoice_number' => uniqid(),
                    'item_list' => [
                        'items' => [
                            [
                                'name' => "4Ever Memories - {$planConfig['name']} Plan",
                                'description' => "Access to {$planConfig['memorials']} memorial pages",
                                'quantity' => 1,
                                'price' => number_format($planConfig['amount'], 2, '.', ''),
                                'currency' => 'USD'
                            ]
                        ]
                    ]
                ]
            ],
            'redirect_urls' => [
                'return_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel')
            ]
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . '/v1/payments/payment');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($paymentData));
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 201) {
            return json_decode($result, true);
        }
        
        \Log::error('PayPal Payment Creation Error: ' . $result);
        return null;
    }

    public function paymentSuccess_del(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');
        $pendingPayment = session('pending_payment');
        
        if (!$paymentId || !$payerId || !$pendingPayment) {
            return redirect()->route('payment.cancel');
        }

        try {
            // Execute the payment
            $executionResult = $this->executePayPalPayment($paymentId, $payerId);
            
            if ($executionResult && $executionResult['state'] === 'approved') {
                // Store subscription in database
                $this->storeSubscription($executionResult, $pendingPayment);
                
                // Clear session
                session()->forget('pending_payment');
                
                $memorialId = $pendingPayment['memorial_id'] ?? null;
                return json_encode(['success' => true, 'memorial_id' => $memorialId,'message'=>'Payment Success']);
                // return redirect()->to(route('user.memorialform') . '?open_privacy=1' . ($memorialId ? '&memorial_id=' . $memorialId : ''));
            }
            
        } catch (\Exception $ex) {
            \Log::error('Payment Execution Error: ' . $ex->getMessage());
            return json_encode(['success' => false, 'message' => 'Payment Execution Error: ' . $ex->getMessage()]);
        }
        
        return json_encode(['success' => false, 'message' => 'Payment Execution Error: ' . $ex->getMessage()]);
    }
    public function paymentSuccess(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');
        $pendingPayment = session('pending_payment');
        
        if (!$paymentId || !$payerId || !$pendingPayment) {
            return $this->showPaymentResult('cancel');
        }

        try {
            // Execute the payment
            $executionResult = $this->executePayPalPayment($paymentId, $payerId);
            
            if ($executionResult && $executionResult['state'] === 'approved') {
                // Store subscription in database
                $this->storeSubscription($executionResult, $pendingPayment);
                
                // Clear session
                session()->forget('pending_payment');
                
                $memorialId = $pendingPayment['memorial_id'] ?? null;
                return $this->showPaymentResult('success', $memorialId);
            }
            
        } catch (\Exception $ex) {
            \Log::error('Payment Execution Error: ' . $ex->getMessage());
            return $this->showPaymentResult('error', null, $ex->getMessage());
        }
        
        return $this->showPaymentResult('error');
    }

    private function showPaymentResult($type, $memorialId = null, $errorMessage = null)
    {
        $html = '';
        
        switch ($type) {
            case 'success':
                $html = "
                <!DOCTYPE html>
                <html>
                <head>
                    <script>
                        // Notify parent window of payment success
                        window.parent.postMessage({
                            type: 'payment_success',
                            memorial_id: '" . ($memorialId ?? '') . "'
                        }, '" . url('/') . "');
                    </script>
                    <style>
                        body { 
                            font-family: Arial, sans-serif; 
                            text-align: center; 
                            padding: 50px; 
                            background: #f8f9fa;
                        }
                        .success-icon { 
                            color: #28a745; 
                            font-size: 48px; 
                            margin-bottom: 20px;
                        }
                        .success-message { 
                            color: #155724; 
                            margin-bottom: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class=\"success-icon\">✓</div>
                    <h2 class=\"success-message\">Payment Successful!</h2>
                    <p>Your plan has been activated successfully.</p>
                    <p>Redirecting to privacy settings...</p>
                </body>
                </html>
                ";
                break;
                
            case 'cancel':
                $html = "
                <!DOCTYPE html>
                <html>
                <head>
                    <script>
                        window.parent.postMessage({
                            type: 'payment_cancel'
                        }, '" . url('/') . "');
                    </script>
                </head>
                <body>
                    <p>Payment was cancelled.</p>
                </body>
                </html>
                ";
                break;
                
            case 'error':
                $html = "
                <!DOCTYPE html>
                <html>
                <head>
                    <script>
                        window.parent.postMessage({
                            type: 'payment_cancel',
                            message: '" . ($errorMessage ?? 'Payment failed') . "'
                        }, '" . url('/') . "');
                    </script>
                </head>
                <body>
                    <p>Payment failed: " . ($errorMessage ?? 'Unknown error') . "</p>
                </body>
                </html>
                ";
                break;
        }
        
        return response($html);
    }
    private function executePayPalPayment($paymentId, $payerId)
    {
        $accessToken = $this->getPayPalAccessToken();
        if (!$accessToken) {
            return null;
        }
        
        $isSandbox = config('services.paypal.mode', 'sandbox') === 'sandbox';
        $baseUrl = $isSandbox 
            ? 'https://api.sandbox.paypal.com'
            : 'https://api.paypal.com';
        
        $executionData = [
            'payer_id' => $payerId
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . '/v1/payments/payment/' . $paymentId . '/execute');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($executionData));
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            return json_decode($result, true);
        }
        
        \Log::error('PayPal Payment Execution Error: ' . $result);
        return null;
    }
    public function checkPaymentStatus(Request $request)
    {
        $memorialId = $request->memorial_id;
        $userId = auth()->id();
        
        // Check if user has an active subscription
        $activeSubscription = Subscription::where('user_id', $userId)
            ->where('status', 'active')
            ->first();
        
        if ($activeSubscription) {
            return response()->json([
                'payment_completed' => true,
                'memorial_id' => $memorialId,
                'subscription' => $activeSubscription
            ]);
        }
        
        return response()->json([
            'payment_completed' => false
        ]);
    }
    public function paymentCancel()
    {
        session()->forget('pending_payment');
        return $this->showPaymentResult('cancel');
        // return json_encode(['success' => false, 'message' => 'Payment Cancled: ']);

        // return view('admin.payment.cancel');
    }

    private function storeSubscription($payment, $pendingPayment)
    {
        // Store in subscriptions table as one-time payment
        Subscription::create([
            'user_id' => auth()->id(),
            'package_id' => $pendingPayment['plan_id'],
            'paypal_agreement_id' => $payment['id'],
            'paypal_plan_id' => 'one-time',
            'status' => 'active',
            'amount' => $pendingPayment['amount'],
            'currency' => 'USD',
            'frequency' => 'one-time',
            'memorials_count' => $this->planConfigs[$pendingPayment['plan_id']]['memorials'],
            'memorials_used' => 0,
            'start_date' => now(),
            'next_billing_date' => null,
            'agreement_details' => json_encode($payment),
            'payment_response' => json_encode([
                'payment_id' => $payment['id'],
                'payment_method' => 'paypal',
                'timestamp' => now()->toISOString(),
                'type' => 'one-time'
            ]),
            'card_type' => 'paypal',
        ]);
    }

    // Helper method to check user's available memorials
    public function checkMemorialLimit($userId)
    {
        $subscription = Subscription::where('user_id', $userId)
            ->where('status', 'active')
            ->first();
            
        if (!$subscription) {
            return 0;
        }
        
        return $subscription->memorials_count - $subscription->memorials_used;
    }

    // Method to increment memorial usage
    public function incrementMemorialUsage($userId)
    {
        $subscription = Subscription::where('user_id', $userId)
            ->where('status', 'active')
            ->first();
            
        if ($subscription && $subscription->memorials_used < $subscription->memorials_count) {
            $subscription->increment('memorials_used');
            return true;
        }
        
        return false;
    }
}