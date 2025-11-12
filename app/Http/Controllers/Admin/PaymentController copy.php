<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use App\Models\Subscription;
use App\Models\PaypalPlan;

class PaymentController extends Controller
{
    private $apiContext;
    
    private $planConfigs = [
        1 => [
            'memorials' => 15, 
            'name' => 'Standard', 
            'amount' => 99,
            'paypal_plan_id' => 'P-XXXXXXXXXXXXX' // Replace with actual plan ID from PayPal dashboard
        ],
        2 => [
            'memorials' => 30, 
            'name' => 'Premium', 
            'amount' => 179,
            'paypal_plan_id' => 'P-YYYYYYYYYYYYY' // Replace with actual plan ID from PayPal dashboard
        ],
        3 => [
            'memorials' => 50, 
            'name' => 'Premium Plus', 
            'amount' => 279,
            'paypal_plan_id' => 'P-ZZZZZZZZZZZZZ' // Replace with actual plan ID from PayPal dashboard
        ],
        4 => [
            'memorials' => 80, 
            'name' => 'VIP Premium Plus', 
            'amount' => 399,
            'paypal_plan_id' => 'P-AAAAAAAAAAAAA' // Replace with actual plan ID from PayPal dashboard
        ]
    ];

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
        );
        
        $this->apiContext->setConfig([
            'mode' => config('services.paypal.mode', 'sandbox'),
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'DEBUG',
        ]);
    }

    public function createYearlySubscription(Request $request)
    {
        try {
            $planId = $request->plan_id;
            if (!isset($this->planConfigs[$planId])) {
                return back()->with('error', 'Invalid plan selected');
            }

            $planConfig = $this->planConfigs[$planId];
            $paypalPlanId = $this->getPayPalPlanId($planId, $planConfig['amount']);
            
            // Create billing agreement with existing plan
            $agreement = $this->createBillingAgreement($paypalPlanId, $planConfig['amount'], $planId);
            
            // Store temporary agreement data in session
            session([
                'pending_agreement' => [
                    'agreement_id' => $agreement->getId(),
                    'plan_id' => $planId,
                    'amount' => $planConfig['amount']
                ]
            ]);
            
            // Redirect to PayPal approval URL
            return redirect($agreement->getApprovalLink());
            
        } catch (\Exception $ex) {
            \Log::error('Subscription Error: ' . $ex->getMessage());
            return back()->with('error', 'Error creating subscription: ' . $ex->getMessage());
        }
    }

    private function getPayPalPlanId($planId, $amount)
    {
        // Check if we already have this plan in our database
        $existingPlan = PaypalPlan::where('package_id', $planId)
            ->where('amount', $amount)
            ->where('active', true)
            ->first();
        
        if ($existingPlan) {
            return $existingPlan->paypal_plan_id;
        }
        
        // Use predefined plan ID from configuration
        $paypalPlanId = $this->planConfigs[$planId]['paypal_plan_id'];
        
        // Store plan in database for tracking
        PaypalPlan::create([
            'package_id' => $planId,
            'paypal_plan_id' => $paypalPlanId,
            'amount' => $amount,
            'memorials_count' => $this->planConfigs[$planId]['memorials'],
            'plan_name' => $this->planConfigs[$planId]['name'],
            'active' => true
        ]);
        
        return $paypalPlanId;
    }

    private function createBillingAgreement($paypalPlanId, $amount, $planId)
    {
        $agreement = new Agreement();
        $agreement->setName("4Ever Memories - {$this->planConfigs[$planId]['name']}")
            ->setDescription("Yearly subscription for {$this->planConfigs[$planId]['memorials']} memorial pages")
            ->setStartDate(now()->addMinutes(5)->toIso8601String());

        $plan = new Plan();
        $plan->setId($paypalPlanId);
        $agreement->setPlan($plan);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        return $agreement->create($this->apiContext);
    }

    public function paymentSuccess(Request $request)
    {
        $token = $request->get('token');
        $pendingAgreement = session('pending_agreement');
        
        if (!$pendingAgreement) {
            return redirect()->route('payment.cancel');
        }

        $agreement = new Agreement();
        try {
            // Execute the agreement
            $agreement->execute($token, $this->apiContext);
            
            // Get agreement details
            $agreement = Agreement::get($agreement->getId(), $this->apiContext);
            
            // Store subscription in database
            $this->storeSubscription($agreement, $pendingAgreement);
            
            // Clear session
            session()->forget('pending_agreement');
            
            return view('admin.payment.success', [
                'agreement' => $agreement,
                'plan' => $this->planConfigs[$pendingAgreement['plan_id']]
            ]);
            
        } catch (\Exception $ex) {
            \Log::error('Payment Execution Error: ' . $ex->getMessage());
            return redirect()->route('payment.cancel');
        }
    }

    public function paymentCancel()
    {
        session()->forget('pending_agreement');
        return view('admin.payment.cancel');
    }

    private function storeSubscription($agreement, $pendingAgreement)
    {
        $agreementDetails = $agreement->getAgreementDetails();
        
        // Store in subscriptions table
        Subscription::create([
            'user_id' => auth()->id(),
            'package_id' => $pendingAgreement['plan_id'],
            'paypal_agreement_id' => $agreement->getId(),
            'paypal_plan_id' => $agreement->getPlan()->getId(),
            'status' => 'active',
            'amount' => $pendingAgreement['amount'],
            'currency' => 'USD',
            'frequency' => 'yearly',
            'memorials_count' => $this->planConfigs[$pendingAgreement['plan_id']]['memorials'],
            'memorials_used' => 0,
            'start_date' => now(),
            'next_billing_date' => $agreementDetails->getNextBillingDate(),
            'agreement_details' => json_encode($agreement->toArray()),
            'payment_response' => json_encode([
                'payment_id' => $agreement->getId(),
                'payment_method' => 'paypal',
                'timestamp' => now()->toISOString()
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