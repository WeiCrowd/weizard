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
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','WelcomeController@index');

Auth::routes();

//Startup Registeration
Route::get('startup-register',
        [
        'as' => 'startup_register',
        'uses' => 'Front\Startup\StartupRegisterController@index'
        ]
    );

Route::post('startup-saveregister',
        [
        'as' => 'startup_saveregister',
        'uses' => 'Front\Startup\StartupRegisterController@StartupRegister'
        ]
    );

//Admin User
Route::get('tm-portal', 'AdminLoginController@getAdminLogin');
Route::post('admin', ['as'=>'admin.auth','uses'=>'AdminLoginController@adminAuth']);
Route::get('search', 'Front\Startup\IcoController@SearchData')->name('search');
Route::get('view-detail',
        [
        'as' => 'view_detail',
        'uses' => 'Front\Startup\IcoController@viewIcoData'
        ]
    );

Route::get('edit-profile',
        [
        'as' => 'edit_profile',
        'uses' => 'HomeController@editProfile'
        ]
    );

Route::post('save-profile',
        [
        'as' => 'save_profile',
        'uses' => 'HomeController@saveProfile'
        ]
    );


Route::get('kyc',
        [
        'as' => 'kyc',
        'uses' => 'Front\Kyc\KycController@create'
        ]
    );

Route::post('save-kyc',
        [
        'as' => 'save_kyc',
        'uses' => 'Front\Kyc\KycController@save'
        ]
    );

Route::get('kyc-occupation',
        [
        'as' => 'kyc_occupation',
        'uses' => 'Front\Kyc\KycController@createOccupation'
        ]
    );


Route::post('save-kyc-occupation',
        [
        'as' => 'save_kyc_occupation',
        'uses' => 'Front\Kyc\KycController@saveOccupation'
        ]
    );


Route::get('/2fa/enable', 'Google2FAController@enableTwoFactor');
Route::get('/2fa/disable', 'Google2FAController@disableTwoFactor');
Route::get('/2fa/validate', 'Auth\AuthController@getValidateToken');
Route::post('/2fa/validate', ['middleware' => 'throttle:5', 'uses' => 'Auth\AuthController@postValidateToken']);

Route::get('cms/{page_name?}', 'Auth\AuthController@StaticPages');

Route::get('verify-email/{id}', [
    'as' => 'verify_email',
    'uses' => 'Front\Startup\StartupRegisterController@verifyEmail'
    ]
);


Route::get('campaign', [
    'as' => 'campaign',
    'uses' => 'Front\Pages\PagesController@campaign'
    ]
);

Route::get('meet-us', [
    'as' => 'meet_us',
    'uses' => 'Front\Pages\PagesController@meetUs'
    ]
);


//ICO Listing Registeration
Route::get('icolisting',
        [
        'as' => 'icolisting',
        'uses' => 'Front\Icolisting\IcolistingRegisterController@index'
        ]
    );

Route::post('saveIcolisting',
        [
        'as' => 'saveIcolisting',
        'uses' => 'Front\Icolisting\IcolistingRegisterController@icolistingRegister'
        ]
    );

Route::get('icolisting-thank-you', function () {
    return view('front/icolisting/icolisting-thank-you');
});

Route::get('icolisting-verify-email/{id}', [
    'as' => 'icolisting_verify_email',
    'uses' => 'Front\Icolisting\IcolistingRegisterController@icoListingverifyEmail'
    ]
);

Route::post('get-ico-name', [
    'as' => 'get_ico_name',
    'uses' => 'Front\Startup\IcoController@getIcoName'
    ]
);


Route::post('get-ico-list', [
    'as' => 'get_ico_list',
    'uses' => 'Front\Startup\IcoController@getIcoList'
    ]
);

Route::post('get-datewise-ico-list', [
    'as' => 'get_datewise_ico_list',
    'uses' => 'Front\Startup\IcoController@getDatewiseIcoList'
    ]
);

Route::get('ico/{id}', [
    'as' => 'ico',
    'uses' => 'Front\Startup\IcoController@getSingleList'
    ]
);  


Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});


Route::get('ico-listing-bounty',
        [
        'as' => 'ico_listing_bounty',
        'uses' => 'Front\Pages\PagesController@bounty'
        ]
    );