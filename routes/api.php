<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\SliderController;
use App\Http\Controllers\api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('registration', [UserAuthController::class, 'register']);
Route::post('verify-otp', [UserAuthController::class, 'verify']);
Route::post('resend-otp', [UserAuthController::class, 'resendVerificationCode']);
Route::post('login', [UserAuthController::class, 'login']);



//auth routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //category
    Route::get('category', [CategoryController::class, 'index']);
    //service
    Route::get('service', [ServiceController::class, 'index']);

    //order
    Route::post('order', [OrderController::class, 'store']);
    Route::get('my-order', [OrderController::class, 'myOrder']);

    //slider
    Route::get('slider', [SliderController::class, 'index']);
});


