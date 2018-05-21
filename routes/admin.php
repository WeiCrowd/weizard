<?php
/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


Route::group(['middleware' => ['admin']], function () {
    Route::get('dashboard', ['as'=>'admin.dashboard','uses'=>'Admin\AdminController@index']);
});

//Route::resource('ico', 'Admin\User\IcoController');
Route::group(['middleware' => 'CheckACL'],function () {
   /*
     * User Ico
     */
    Route::resource('investor', 'Admin\User\InvestorController');
    Route::resource('startup', 'Admin\User\StartupController');
    Route::resource('ico', 'Admin\User\IcoController');
    
    Route::post('inactive-ico',
        [
        'as' => 'inactive-ico',
        'uses' => 'Admin\User\IcoController@updateMultipleIcoStatus']);
    Route::post('active-ico',
        [
        'as' => 'active-ico',
        'uses' => 'Admin\User\IcoController@updateMultipleIcoStatus']);
    
    

   /* ACL */
    Route::resource('user', 'Admin\ACL\UserController');
    
    Route::get('acl-roles', [
            'as' => 'admin_role',
            'uses' => 'Admin\ACL\RoleController@index'
                ]
        );

    Route::get('add-role', [
            'as' => 'admin_add_role',
            'uses' => 'Admin\ACL\RoleController@addRole'
                ]
        );

        Route::get('edit-role/{id}', [
            'as' => 'admin_edit_role',
            'uses' => 'Admin\ACL\RoleController@editRole'
                ]
        );

        Route::post('save-role', [
            'as' => 'admin_save_role',
            'uses' => 'Admin\ACL\RoleController@saveRole'
                ]
        );

        Route::get('delete-role/{id}', [
            'as' => 'admin_delete_role',
            'uses' => 'Admin\ACL\RoleController@DeleteRole'
                ]
        );

    /**
     ***Ajax Route
     */
         Route::post('getRoleList', [
        'as' => 'get_ajax_permission_list',
        'uses' => 'AjaxController@getRoleList'
            ]
    );

         Route::get('getRoleByID', [
        'as' => 'get_role_by_id',
        'uses' => 'AjaxController@getRoleByID'
            ]
    );

         Route::get('getPermission', [
        'as' => 'get_ajax_permission',
        'uses' => 'AjaxController@getPermission'
            ]
    );

         Route::get('getPermissionView', [
        'as' => 'get_ajax_permission_view',
        'uses' => 'AjaxController@getPermissionListForView'
            ]
    );

         

        

    
Route::get('role-permission', [
        'as' => 'admin_role_permission',
        'uses' => 'Admin\ACL\AclController@roleList'
            ]
    );
    Route::get('role-permission/{role_id}', [
        'as' => 'admin_edit_role_permission',
        'uses' => 'Admin\ACL\AclController@editRolePermission'
            ]
    )->where('role_id', '[0-9]+');
    Route::get('user-permission', [
        'as' => 'admin_company_user_permission',
        'uses' => 'Admin\ACL\AclController@companyUserList'
            ]
    );
    Route::get('user-permission/{user_id}', [
        'as' => 'user_permission',
        'uses' => 'Admin\ACL\AclController@userAcl'
            ]
    );
    Route::get('users', [
        'as' => 'get_user',
        'uses' => 'Admin\ACL\AclController@showUser'
            ]
    );
    Route::get('add-user-form', [
        'as' => 'add_user_form',
        'uses' => 'Admin\ACL\AclController@addUserForm'
            ]
    );
    Route::post('add-user', [
        'as' => 'add_user',
        'uses' => 'Admin\ACL\AclController@addUser'
            ]
    );
    Route::get('edit-user-form', [
        'as' => 'edit_user_form',
        'uses' => 'Admin\ACL\AclController@editUserForm'
            ]
    );
    Route::post('update-user', [
        'as' => 'update_user',
        'uses' => 'Admin\ACL\AclController@updateUser'
            ]
    );
    Route::post('delete-user', [
        'as' => 'delete_backend_user',
        'uses' => 'Admin\ACL\AclController@deleteUser'
            ]
    );
    Route::get('roles/', [
        'as' => 'get_role',
        'uses' => 'Admin\ACL\AclController@showRole'
            ]
    );
    Route::post('add-role', [
        'as' => 'add_role',
        'uses' => 'Admin\ACL\AclController@addRole'
            ]
    );
    Route::post('delete-role', [
        'as' => 'delete_role',
        'uses' => 'Admin\ACL\AclController@deleteRole'
            ]
    );
    Route::get('permissions', [
        'as' => 'get_permission',
        'uses' => 'Admin\ACL\AclController@showPermission'
            ]
    );
    Route::post('add-permission/{role_id?}', [
        'as' => 'add_permission',
        'uses' => 'Admin\ACL\AclController@addPermission'
            ]
    )->where('role_id', '[0-9]+');
    Route::post('update-permission', [
        'as' => 'update_permission',
        'uses' => 'Admin\ACL\AclController@updatePermission'
            ]
    );
    Route::get('delete-permission', [
        'as' => 'delete_permission',
        'uses' => 'Admin\ACL\AclController@deletePermission'
            ]
    );
 Route::get('routes', [
        'as' => 'get_route',
        'uses' => 'Admin\ACL\AclController@showRoute'
            ]
    );
    Route::post('add-route', [
        'as' => 'add_route',
        'uses' => 'Admin\ACL\AclController@addRoute'
            ]
    );
    Route::get('delete-route', [
        'as' => 'delete_route',
        'uses' => 'Admin\ACL\AclController@deleteRoute'
            ]
    );
    /* End ACL */

});


Route::get('site-settings', [
            'as' => 'admin_site_setting',
            'uses' => 'Admin\SiteSetting\SiteSettingController@index'
                ]
        );

 Route::post('save-site-settings', [
            'as' => 'save_site_setting',
            'uses' => 'Admin\SiteSetting\SiteSettingController@saveSettings'
                ]
        );

Route::get('my-profile', [
            'as' => 'admin_profile',
            'uses' => 'Admin\AdminController@showProfile'
                ]
        );


Route::post('save-profile', [
            'as' => 'admin_save_profile',
            'uses' => 'Admin\AdminController@saveProfile'
                ]
        );

Route::post('admin-change-password', [
            'as' => 'admin_change_password',
            'uses' => 'Admin\AdminController@changePassword'
                ]
        );

Route::resource('icocategory', 'Admin\IcoCategory\IcoCategoryController');

/* ICO Filter */
Route::get('ico-inactive-filters', [
    'as' => 'ico_inactive_filters',
    'uses' => 'Admin\User\IcoController@icoInactiveFilters'
        ]
);

Route::get('ico-active-filters', [
    'as' => 'ico_active_filters',
    'uses' => 'Admin\User\IcoController@icoActiveFilters'
        ]
);