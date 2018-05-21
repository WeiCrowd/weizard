<?php

namespace App\Http\Controllers\Admin\ACL;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\AccessManagement\Role;
use Gate;

class RoleController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->middleware('auth');
        $this->role = new Role();
    }

    /**
     * Get All most search keywords
     * @param Request $request
     * @return integer Merchant ID
     * @since 0.1
     * @author Minee Soni
     */
    public function index($parent_role_id = 0)
    {
        $arrRoleList = $this->role->getAllRoles($parent_role_id);
        return view('admin.acl.role.roles')
                ->with('arrRoleList', $arrRoleList);
    }

    /**
     * saveRole
     * @param Request $request
     * @return array
     * @since 0.1
     * @author Minee Soni
     */
    public function saveRole(Request $request)
    {

        $validation = Validator::make($request::all(),
                [
                'name' => 'required',
                'display_name' => 'required',
                'status' => 'required',
        ]);

        if ($validation->fails()) {
            $response              = [];
            $response['error_msg'] = $validation->errors()->toArray();
            return redirect()->back()->with('err_role', [$response]);
        } else {

            $arrRole                 = [];
            $arrRole["name"]         = Request::get("name");
            $arrRole["display_name"] = Request::get("display_name");
            $arrRole["description"]  = Request::get("description");
            $arrRole["is_active"]    = Request::get("status");
            $varRoleID = Request::get("role_id");

            if ($varRoleID > 0) {
                $saveRole = $this->role->updateRole($varRoleID, $arrRole);
                $message = "Role Updated Successfully.";
            } else {
                $saveRole = $this->role->saveRole($arrRole);
                $message = "Role Added Successfully.";
            }

            if ($saveRole == 0) {
                $message1 = "Role alreday exist";
                return redirect(route('admin_role'))->withErrors($message1)->withInput();
            } else {
                $message1 = $message;
                return redirect(route('admin_role'))->with('message', $message1);
            }
        }
    }

    /**
     * deleteRole
     * @param $id
     * @return
     * @since 0.1
     * @author Minee Soni
     */
    public function deleteRole($id)
    {
        $varDelete = $this->role->deleteRole($id);

        if ($varDelete) {
            return redirect()->back()->with('message',
                    'Role Deleted Successfully.');
        } else {
            return redirect()->back()->with('message',
                    'Role can not be deleted because assign to someone.');
        }
    }

    /**
     * addRole
     * @param 
     * @return array
     * @since 0.1
     * @author Minee Soni
     */
    public function addRole()
    {
        $roles = Role::pluckParentRoles()->toArray();
        return view('admin.acl.role.add-role')->with('roles', $roles);
    }

    /**
     * editRole
     * @param 
     * @return array
     * @since 0.1
     * @author Minee Soni
     */
    public function editRole($id)
    {
        $roles       = Role::pluckParentRoles()->toArray();
        $arrEditData = $this->role->getRoleByID($id);

        
        return view('admin.acl.role.add-role')
                ->with('arrEditData', $arrEditData)
                ->with('roles', $roles)
                ->with('id', $id);
    }
}