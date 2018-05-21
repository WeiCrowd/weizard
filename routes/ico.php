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
Route::group(['middleware' => ['ico']], function () {
    Route::get('dashboard',
        [
        'as' => 'dashboard',
        'uses' => 'Front\Startup\StartupDashboardController@index'
        ]
    );
    
// Ico registration
    Route::get('manage-ico',
        [
        'as' => 'manage_ico',
        'uses' => 'Front\Startup\IcoController@index'
        ]
    );

Route::get('add-ico',
        [
        'as' => 'add_ico',
        'uses' => 'Front\Startup\IcoController@CreateIco'
        ]
    );

Route::get('edit-ico/{ico_id}',
        [
        'as' => 'edit_ico',
        'uses' => 'Front\Startup\IcoController@CreateIco'
        ]
    );

//Route::post('save-ico',
//        [
//        'as' => 'save_ico',
//        'uses' => 'Front\Startup\IcoController@SaveIco'
//        ]
//    );


Route::post('update-ico',
        [
        'as' => 'update_ico',
        'uses' => 'Front\Startup\IcoController@UpdateIco'
        ]
    );

Route::post('social-information',
        [
        'as' => 'social_information',
        'uses' => 'Front\Startup\IcoController@SaveIco'
        ]
    );

Route::post('team-information',
        [
        'as' => 'team_information',
        'uses' => 'Front\Startup\IcoController@updateSocialInformation'
        ]
    );

Route::post('save-ico',
        [
        'as' => 'save_ico',
        'uses' => 'Front\Startup\IcoController@updateTeamInformation'
        ]
    );

Route::post('save-information',
        [
        'as' => 'save_information',
        'uses' => 'Front\Startup\IcoController@updateInformation'
        ]
    );


Route::get('social-inform/{id}',
        [
        'as' => 'social_inform',
        'uses' => 'Front\Startup\IcoController@viewSocialData'
        ]
    );

Route::get('team-inform/{id}',
        [
        'as' => 'team_inform',
        'uses' => 'Front\Startup\IcoController@viewTeamData'
        ]
    );

Route::get('information/{id}',
        [
        'as' => 'information',
        'uses' => 'Front\Startup\IcoController@getInformation'
        ]
    );

Route::get('check-symbol', [
    'as' => 'check_symbol',
    'uses' => 'Front\Startup\IcoController@checkSymbol'
    ]
);  


});

