<?php

namespace App\Http\Controllers\Admin\ACL;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\AccessManagement\Role;
use App\Models\Admin\AccessManagement\UserRole;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\AccessManagement\UserRequest;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckACL');
    }

    public function index()
    {
        $data['user'] = User::allData();
        $data['role'] = Role::getAllRoleDataforAcl();
        return view('admin/acl/user/user', $data);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $user = User::create([
                'name' => $request['name'],
                'email' => strtolower($request['email']),
                'mobile' => $request['mobile'],
                'user_type' => 'O',
                'password' => bcrypt($request['password']),
        ]);

        if (isset($request['role'])) {

            $user->assignRole($request['role']);
        }

        $request->session()->flash('alert-success', 'User successfully added!');
        return Redirect::to('admin/user');
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit_user']   = User::find($id);
        $data['user']        = User::allData();
        $data['role']        = Role::getAllRoleDataforAcl();
        $data['user_role']   = User::getUserRoleById($id);
        return view('admin/acl/user/user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        
        if (isset($request['role'])) {
            $roleArr            = [];
            $roleArr['role_id'] = $request['role'];
        }
        
        UserRole::updateUserRole($roleArr, $id);
        User::updateData($request, $id);
        
        // redirect
        $request->session()->flash('alert-success', 'User successfully updated!');
        return Redirect::to('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::deleteData($id);
        
        Session::flash('alert-danger', 'User successfully deleted');
        return redirect('admin/user');
    }
}