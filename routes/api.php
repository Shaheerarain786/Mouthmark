<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('countries','API\Influencer\RegisterController@countries');
Route::post('profile-image-uploads','API\Advertiser\RegisterController@profile_image_uploads');

Route::prefix('influencer')->group(function () {
    Route::post('register', 'API\Influencer\RegisterController@register');
    Route::post('verification','API\Influencer\RegisterController@verification');
    Route::post('check_login','API\Influencer\RegisterController@check_login_status');
    Route::post('payment-detail','API\Influencer\RegisterController@payment_detail');
});

Route::prefix('advertiser')->group(function () {
    Route::post('login','API\Advertiser\RegisterController@login');
    Route::post('register', 'API\Advertiser\RegisterController@register');
    Route::post('verification','API\Advertiser\RegisterController@verfication');
    Route::post('logout','API\Advertiser\RegisterController@logout');
    Route::post('check_login','API\Advertiser\RegisterController@check_login_status');
    Route::post('company-detail','API\Advertiser\RegisterController@company_detail');
    Route::post('profile','API\Advertiser\RegisterController@profile');
    Route::post('payment-detail','API\Advertiser\RegisterController@payment_detail');
});

Route::prefix('task')->group(function (){
   Route::post('task-create','API\Advertiser\TaskController@create_task');
   Route::get('all','API\Advertiser\TaskController@all');
});

