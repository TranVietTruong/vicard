<?php



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


Route::group(['middleware' => 'api', 'prefix' => 'v1.0/auth', 'namespace' => 'api'], function (){
    Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
    Route::post('register', [\App\Http\Controllers\AuthController::class,'register']);
});

Route::group(['middleware' => ['api','auth:api'], 'prefix' => 'v1.0/auth', 'namespace' => 'api'], function (){
    Route::get('me', [\App\Http\Controllers\AuthController::class,'me']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout']);
});

Route::group(['middleware' => ['api','auth:api'], 'prefix' => 'v1.0', 'namespace' => 'api'], function (){
    Route::get('product', [\App\Http\Controllers\ProductController::class,'listProduct']);

    Route::get('type-info', [\App\Http\Controllers\TypeInfoController::class, 'getTypeInfo']);

    Route::get('user-info', [\App\Http\Controllers\UserInfoController::class, 'getUserInfo']);
    Route::post('create-user-info', [\App\Http\Controllers\UserInfoController::class, 'createUserInfo']);
    Route::post('update-user-info', [\App\Http\Controllers\UserInfoController::class, 'updateUserInfo']);
    Route::post('delete-user-info', [\App\Http\Controllers\UserInfoController::class, 'deleteUserInfo']);
    Route::post('order-user-info', [\App\Http\Controllers\UserInfoController::class, 'updateOrderUserInfo']);

    Route::post('update-step', [\App\Http\Controllers\UserController::class, 'updateStep']);

    Route::post('change-password', [\App\Http\Controllers\UserController::class, 'changePassword']);

    Route::post('send-notification', [\App\Http\Controllers\UserController::class, 'sendNotification']);
});

Route::post('v1.0/subscriber', [\App\Http\Controllers\UserSubscriberController::class, 'updateUserSubscriber']);
Route::post('v1.0/forget-password', [\App\Http\Controllers\UserController::class, 'forgetPassword']);
Route::post('v1.0/check-token', [\App\Http\Controllers\UserController::class, 'checkToken']);
Route::post('v1.0/reset-password', [\App\Http\Controllers\UserController::class, 'resetPassword']);
