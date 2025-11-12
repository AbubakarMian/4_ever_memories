<?php

use App\Http\Controllers\Api\MemorialController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\User\CommonServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth.client_token'], function () {

    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
    Route::post('forget_password', [UserController::class, 'sendForgetEmail']);
});
Route::group(['middleware' => 'auth.user_loggedin'], function () {

    Route::post('memorials', [MemorialController::class, 'my_memorials']);
    Route::post('create_memorial', [MemorialController::class, 'create_memorial']);
    Route::get('get_templates', [MemorialController::class, 'get_templates']);
    Route::post('upload_image', [CommonServicesController::class, 'upload_image']);

    // Route::get('get_templates', [MemorialController::class, 'get_templates']);


});

Route::post('all_memorials', [MemorialController::class, 'all_memorials']);
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
