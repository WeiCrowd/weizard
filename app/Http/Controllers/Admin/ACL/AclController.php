<?php

namespace App\Http\Controllers\Admin\ACL;

use Auth;
use View;
use Session;
use Helpers;
use Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Admin\AccessManagement\Role;
use App\Models\Admin\AccessManagement\Permission;

class AclController extends Controller
{
    /**
     * User repository
     *
     * @var object
     */
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('checkBackendLeadAccess');
        $this->middleware('auth');
        $this->role = new Role();

        $this->roles = Role::getRoleLists();
        View::share('acl_tab', 'active');
    }

    /**
     * Display ACL dashboard
     *
     * @return response
     */
    public function roleList()
    {
        $arrRoleList          = $this->role->getAllRoles($parent_permission_id = 0);
        return view('admin.acl.acl.role')
                ->with('arrRoleList', $arrRoleList);
    }

    public function companyUserList()
    {
        $arrRoleList = $this->role->getAllRole();
        return view('admin.acl.acl.role')
                ->with('arrRoleList', $arrRoleList);
    }

    public function memberList()
    {
        $arrRoleList = $this->role->getAllRole();
        return view('admin.acl.acl.role')
                ->with('arrRoleList', $arrRoleList);
    }

    /**
     * Display User Lists
     *
     * @return response
     */
    public function showUser()
    {
        $roles = array("" => trans('admin_messages.form.label.role_type')) + $this->roles->toArray();

        

        return view('admin.acl.acl.user')->with('roles', $roles);
    }

    /**
     * Display add userform
     *
     * @return type
     */
    public function addUserForm()
    {

        $roles = array("" => 'Please Select') + $this->roles->toArray();
        return view('admin.acl.acl.user_create')->with('roles', $roles)->with('title',
                'Create User');
    }

    /**
     * Add / update user with role
     *
     * @param \App\Http\Controllers\Application\BackendUserFormRequest $request
     * @return response
     */
    public function addUser(BackendUserFormRequest $request)
    {
        $requestVar = Request::all();

        $arrUser          = [];
        $arrUser["name"]  = $requestVar['name'];
        $user_id          = !empty($requestVar['user_id']) ? $requestVar['user_id']
                : 0;
        $arrUser["email"] = $requestVar['email'];
        // do not update password in case of edit
        if ($user_id <= 0) {
            $varPassword         = $requestVar['password'];
            $arrUser["password"] = bcrypt($varPassword);
        }
        $arrUser["block_status"] = config('aiims.no');
        $arrUser["user_type"]    = config('aiims.yes');



        // Get the allowed role object while a user is registering

        $arrUser['role_id'] = (int) $requestVar['role_id'];


        if ($arrUser['role_id']) {
            if (User::storeData($arrUser, $user_id)) {
                session()->flash('operation_status', config('aiims.yes'));
                return redirect()->back();
            }
        } else {
            // Handle the situation where there is no "Customer" role in the database
            // Registration is temprarily off
            session()->flash('alert-danger', 'User could not be added.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display edit user form
     *
     * @return type
     */
    public function editUserForm()
    {
        try {
            $user_id = (int) request()->user_id;
            if ($user_id < 1 || empty($user_id)) {
                abort(400);
            }

            $arrUserData = User::getUserDetail((int) request()->user_id);
            $roles       = array("" => 'Please Select') + $this->roles->toArray();

            return view('admin.acl.acl.user_create')
                    ->with('roles', $roles)
                    ->with('userDetailData', $arrUserData)
                    ->with('title', 'Edit User');
        } catch (Exception $e) {
            session()->flash('alert-danger', 'User could not be updated.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Delete user and role
     *
     * @return boolean
     */
    public function deleteUser()
    {
        try {
            $user_id      = (int) Input::get('user_id');
            $block_status = (int) Input::get('block_status');
            if ($user_id > 0) {
                $this->userRepo->updateUser($user_id,
                    ['block_status' => $block_status]);
            }
        } catch (Exception $ex) {
            return response(Helpers::getExceptionMessage($ex), 500);
        }
    }

    /**
     * Display Role Lists
     *
     * @return response
     */
    public function showRole()
    {
        return view('admin.acl.acl.role');
    }

    /**
     * Add role
     *
     * @return response
     */
    public function addRole()
    {
        $arrRole    = [];
        $requestVar = Request::all();

        $arrRole["name"]          = ucFirst($requestVar['name']);
        $arrRole["role_old_name"] = ucFirst($requestVar['role_old_name']);
        $arrRole["display_name"]  = ucFirst($requestVar['name']);
        $arrRole["description"]   = $requestVar['description'];
        $arrRole["user_type"]     = 0;

        $role_id = ($requestVar['role_id']) ? (int) $requestVar['role_id'] : null;
        if ((!$role_id) || ($arrRole["role_old_name"] != $arrRole["name"])) {

            $rules      = array('name' => 'required|unique:roles');
            $input      = array('name' => ucFirst($requestVar['name']));
            $validation = Validator::make($input, $rules);
            if ($validation->fails()) {
                session()->flash('alert-danger',
                    'Invalid Role or Already added ');
                return redirect(route('get_role'))->withErrors($validation)->withInput();
            }
        }

        $role = Role::addRole($arrRole, ['id' => $role_id]);
        if ($role) {

            if (empty($role_id)) {
                $Permission = [20, 21, 22];
                //$this->userRepo->givePermissionTo($role->id, $Permission);
            }
            session()->flash('alert-success',
                ($role_id) ? "Role Updated" : "Role Added");
            return redirect(route('get_role'));
        } else {
            session()->flash('alert-danger', "Role could not added");
            return redirect(route('get_role'))->withInput();
        }
    }

    /**
     * Delete  role
     *
     * @return boolean
     */
    public function deleteRole(Request $request)
    {

        $requestVar = Request::all();
        $role_id    = (int) $requestVar['role_id'];
        //Check role assign to user or not
        // enable when create role_user table
        //$attachRole = $result = Role::checkRoleAssigntoUser($role_id);
        $attachRole = 0;
        if ($attachRole == 0) {
            Role::where('id', $role_id)->delete();
            echo "1";
            exit;
        } else {
            echo "0";
            exit;
        }
    }

    /**
     * Display Role with Permission
     *
     * @return response
     */
    public function showPermission()
    {
        $roles = array("" => trans('admin_messages.form.label.select_role_type'))
            + $this->roles->toArray();
        return view('admin.acl.acl.permission')->with('roles', $roles);
    }

    /**
     * Add permission with role
     *
     * @return response
     */
    public function addPermission(Request $request)
    {
        $requestVar = Request::all();

        try {
            $role_id = (int) isset($requestVar['role_id']) ? $requestVar['role_id']
                    : 0;
            if ($role_id == 0) {
                $role_id = (int) Request::segment(3);
            }

            $parentPermission = $requestVar['permissions_parent'];
            $Permission       = $requestVar['permissions'];
            $permissionData   = [];
            if (count($Permission) > 0 || count($parentPermission) > 0) {
                if (count($Permission) > 0) {
                    foreach ($Permission as $permission_id) {
                        $permissionRows = Permission::getChildByPermissionId((int) $permission_id);
                        foreach ($permissionRows as $perRow) {
                            if ($perRow->count() > 0) {
                                if ($perRow->is_display == 0) {
                                    $permissionData[] = $perRow->id;
                                }
                            }
                        }
                    }
                } else {
                    $Permission = [];
                }
                $Permission_manul = [];
                $permissionData   = array_merge($parentPermission,
                    $permissionData, $Permission, $Permission_manul);
                $result           = $this->givePermissionTo($role_id,
                    $permissionData);
                if ($result) {
                    Session::flash('alert-success',
                        'Permission added successfully');
                    return redirect(route('admin_role_permission'));
                }
            } else {
                Session::flash('alert-danger', 'No Permission found to add');
                return redirect()->back()->withErrors('No permission to add')->withInput();
            }
        } catch (Exception $ex) {
            Session::flash('alert-danger', 'Something went wrong, try again.');
            return redirect(route('admin_role_permission'))->withErrors($ex->getMessage())->withInput();
        }
    }

    /**
     * Display permission assignment form
     *
     * @return response
     */
    public function editRolePermission($edit_role_id)
    {
        $role            = Role::getRoleByID((int) $edit_role_id);
        $rolePermissions = $role->permissions->toArray();

        if (!$role) {
            abort(400);
        }
        try {
            $permissions = $this->getPermissions($edit_role_id)->toArray();
            $rolePermissions = $role->permissions->toArray();
            $rolePerArray    = [];
            foreach ($rolePermissions as $value) {
                $rolePerArray[] = $value['id'];
            }

            return view('admin.acl.acl.edit_permission')
                    ->with('role', $role)
                    ->with('role_id', $edit_role_id)
                    ->with('rolePermissions', $rolePerArray)
                    ->with('permissions', $permissions);
        } catch (Exception $ex) {
            return response(Helpers::getExceptionMessage($ex), 500);
        }
    }

    /**
     * Delete permission assign to role
     *
     * @return boolean
     */
    public function deletePermission()
    {
        $role_id               = (int) Input::get('role_id');
        $role                  = $this->userRepo->getRoleByID($role_id);
        //Detch all permission before update
        $arrPreviousPermission = $this->userRepo->getPreviousPermissionByRoleID($role_id)->toArray();
        $this->userRepo->detachPermission($role, $arrPreviousPermission);
    }

    /**
     * Display Route List
     *
     * @return response
     */
    public function showRoute()
    {
        return view('admin.acl.acl.route');
    }

    /**
     * Add route
     *
     * @return response
     */
    public function addRoute()
    {
        $arrRoute                 = [];
        $arrRoute["name"]         = Input::get('name');
        $arrRoute["display_name"] = Input::get('display_name');
        $arrRoute["description"]  = Input::get('description');
        $arrRoute["route_type"]   = 0;

        $route_id = (Input::get('route_id')) ? (int) Input::get('route_id') : null;
        try {
            $this->userRepo->addRoute($arrRoute, ['id' => $route_id]);
            Session::flash('message',
                ($route_id) ? trans('admin_messages.route.updated.msg') : trans('admin_messages.route.added.msg'));
            return redirect(route('get_route'));
        } catch (\Exception $e) {
            $messages = new MessageBag;
            $messages->add('error', $e->getMessage());
            return redirect(route('get_route'))->withErrors($messages)->withInput();
        }
    }

    /**
     * Delete Route
     *
     * @return boolean
     */
    public function deleteRoute()
    {
        $route_id = (int) Input::get('route_id');
        try {
            $this->userRepo->deleteRouteFromPermissionRole($route_id);
            $this->userRepo->deleteRoute($route_id);
        } catch (\Exception $e) {
            $messages = new MessageBag;
            $messages->add('error', $e->getMessage());
            return redirect(route('get_route'))->withErrors($messages)->withInput();
        }
    }
    /* Get All Permissions
     *
     * @param void()
     *
     * @return object permissions
     *
     * @since 0.1
     */

    public function getPermissions($role_id)
    {
        $arrPermissions = Permission::getAllPermissions($role_id);
        $i              = 0;
        $old_permission = [];
        foreach ($arrPermissions as $permission) {
            if ($arrPermissions[$i]['permission_check']) {
                $old_permission[$i] = $permission->id;
            }

            $i++;
        }
        if ($role_id == config('b2c_common.BIZ_ADMIN')) {
            Session::put('old_permission', $old_permission);
        }
        return $arrPermissions;
    }

    /**
     * Give permission to role
     *
     * @param array $attributes
     *
     * @return object
     */
    public function givePermissionTo($roleid, $permission)
    {

        $role   = Role::where('id', $roleid)->first();
        $result = $role->assignRolePermission($permission);

        return $result ?: false;
    }
}