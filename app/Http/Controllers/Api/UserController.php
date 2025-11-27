<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Influencer_category;
use App\Models\Reels;
use App\Models\Order_Reels;
use App\Models\Influencer;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Stripe\Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPass;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function register(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), User::$rules_register);

            if ($validator->fails()) {
                return $this->sendResponse(500, null, $validator->messages()->all());
            } else {

                $user = new User();
                $user->first_name = $request->name;
                $user->role_id = 2;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->access_token = uniqid();
                $user->save();
                return $this->sendResponse(200, $user);
            }
        } catch (\Exception $e) {
            return $this->sendResponse(
                500,
                null,
                [$e->getMessage()]
            );
        }
    }

    public function login(Request $request)
    {
        try {
            //Request input Validation
            $validation = Validator::make($request->all(), User::$rules);
            if ($validation->fails()) {
                return $this->sendResponse(
                    Config::get('error.code.BAD_REQUEST'),
                    null,
                    $validation->getMessageBag()->all(),
                    Config::get('error.code.BAD_REQUEST')
                );
            } else {
                $authUser = Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ]);

                //Get record if user has authenticated
                if ($authUser) {
                    $device = $request->header('client-id');
                    $user = User::where([
                        'email' => $request->email,
                        'role_id' => 2
                    ])->get([
                        'access_token',
                        'id',
                        // 'name',
                        'email',
                        'role_id',
                    ])
                        ->first();

                    $user->access_token = uniqid();
                    // $user->device_type = $device;
                    $user->save();
                    $user->get_notification = ($user->get_notification ? true : false);

                    // unset($user->device_type);
                    $responseArray = [
                        'status' => Config::get('constants.status.OK'),
                        'response' => $user,
                        'error' => null,
                        'custom_error_code' => null
                    ];
                } else {
                    $responseArray = [
                        'status' => Config::get('error.code.NOT_FOUND'),
                        'response' => null,
                        'error' => [Config::get('error.message.USER_NOT_FOUND')],
                        'custom_error_code' => Config::get('error.code.NOT_FOUND')
                    ];
                }

                // end sad

                //Set the JSON response
                $status_code = $responseArray['status'];
                $response = $responseArray['response'];
                $error = $responseArray['error'];
                $custom_error_code = $responseArray['custom_error_code'];

                return $this->sendResponse($status_code, $response, $error, $custom_error_code);
            }
        } catch (\Exception $e) {
            return [
                'status' => Config::get('error.code.INTERNAL_SERVER_ERROR'),
                'response' => null,
                'error' => [$e->errorInfo[2]],
                'custom_error_code' => $e->errorInfo[0]
            ];
        }
    }
    public function sendForgetEmail(Request $request)
    {
        try {

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return $this->sendResponse(
                    500,
                    null,
                    ['Email not found']
                );
            }
            $new_password = rand(100000, 999999);
            $user->password = Hash::make($new_password);
            $user->save();
            $details = [
                'to' => $request->to_emails,
                // 'to' => 'ameer.maavia@gmail.com',

                'name' => $user->first_name,
                'user_email' => $request->email,
                'email' => $request->email,
                'new_password' => $new_password,
                'from' => 'info@4evermemorial.com',
                'title' => '4evermemorial',
                'subject' => 'Forgot Password ',
                'base_url' => Config::get('app.url'),
                "dated" => date('d F, Y (l)'),
            ];
            Mail::to($request->email)->send(new ForgotPass($details));
            return $this->sendResponse(200);
        } catch (\Exception $e) {
            return $this->sendResponse(
                500,
                null,
                [$e->getMessage()]
            );
        }
    }
}
