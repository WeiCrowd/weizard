<?php

/*
|--------------------------------------------------------------------------
| Ico Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['investor']], function () {
    Route::get('home', 'HomeController@index')->name('home');
    
    //Investor Account
    Route::get('account',
        [
        'as' => 'account',
        'uses' => 'HomeController@account'
        ]
    );
    
    //Two-fa-verification
    Route::get('enable-2fa',
        [
        'as' => 'enable_2fa',
        'uses' => 'HomeController@enable2fa'
        ]
    );
    //Order History
    Route::get('order-history',
        [
        'as' => 'order_history',
        'uses' => 'HomeController@orderHistory'
        ]
    );
    
    //Offer
    Route::get('offers',
        [
        'as' => 'offers',
        'uses' => 'HomeController@offers'
        ]
    );
});


