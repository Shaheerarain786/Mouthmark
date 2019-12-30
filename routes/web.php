<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', 'LoginController@login_view');
Route::post('login', 'LoginController@login')->name('login');
Route::post('influencer','Influencer\RegisterController@register');
Route::post('advertiser','Advertiser\RegisterController@register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('', 'Admin\DashboardController@index');
    Route::post('logout','LoginController@logout')->name('logout');
    Route::resource('admins','Admin\AdminController');
    Route::resource('roles','Admin\RolesController');
    Route::prefix('users')->group(function () {
        Route::resource('influencer','Admin\Influencer\Influencer');
        Route::put('influencer/status/{id}','Admin\Influencer\Influencer@status');
        Route::put('influencer/status-change/{id}','Admin\Influencer\Influencer@status_chnage');
        Route::get('infuencer/detail/{id}','Admin\Influencer\Influencer@detail');
        Route::put('infuencer/discard/{id}','Admin\Influencer\Influencer@discard');
        Route::get('influencer/payment-detail-view/{id}','Admin\Influencer\Influencer@payment_detail_view');

        Route::resource('advertiser','Admin\Advertiser\Advertiser');
        Route::put('advertiser/status/{id}','Admin\Advertiser\Advertiser@status');
        Route::put('advertiser/status-change/{id}','Admin\Advertiser\Advertiser@status_chnage');
        Route::put('advertiser/discard/{id}','Admin\Advertiser\Advertiser@discard');
        Route::get('advertiser/payment-detail-view/{id}','Admin\Advertiser\Advertiser@payment_detail_view');
    });
    Route::prefix('tasks')->group(function () {
        Route::put('pending/{id}','Admin\Task\TaskController@status_pending');
        Route::put('completed/{id}','Admin\Task\TaskController@status_completed');
        Route::put('approved/{id}','Admin\Task\TaskController@status_approved');
        Route::put('discard/{id}','Admin\Task\TaskController@status_discard');
        Route::resource('','Admin\Task\TaskController');
    });

    Route::prefix('trash')->group(function (){
        Route::get('users','Admin\Trash\UserController@index');
        Route::get('inf','Admin\Trash\InfluencerController@index');
        Route::put('inf/recycle/{id}','Admin\Trash\InfluencerController@recycle_inf');
        Route::put('users/recycle/{id}','Admin\Trash\UserController@recycle');
        Route::get('tasks','Admin\Trash\TaskController@index');
        Route::put('recycle/{id}','Admin\Trash\TaskController@recycle');

        Route::delete('task/delete/{id}','Admin\Trash\TaskController@delete');
        Route::delete('users/delete/{id}','Admin\Trash\UserController@delete');
        Route::delete('inf/delete/{id}','Admin\Trash\InfluencerController@delete');

    });

    Route::prefix('reporting')->group(function (){
        Route::get('','Admin\Reporting\ReportingController@index');
        Route::get('get-tasks','Admin\Reporting\ReportingController@ajax_get_tasks')->name('get_tasks');
        Route::get('reporting_table','Admin\Reporting\ReportingController@show_reporting_table');
    });

});
