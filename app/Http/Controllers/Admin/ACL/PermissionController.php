<?php

namespace App\Http\Controllers\Admin\ACL;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Models\Admin\AccessManagement\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class PermissionController extends Controller {

    protected $permission;

    public function __construct() {
        $this->middleware('auth');
        $this->permission = new Permission();
    }

    /**
     * Get All Permissions
     * @param 
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function index() {
        $arrPermissionList = $this->permission->getAllPermission();
        return view('admin.accessmanagement.permission.permissions')
                        ->with('arrPermissionList', $arrPermissionList);
    }

    /**
     * savePermission
     * @param Request $request
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function savePermission(Request $request) {

        $data = Request::all();

        try {

            $validation = Validator::make($request::all(), [
                        'type' => 'required',
                        'name' => 'required',
                        'display_name' => 'required',
                        'is_display' => 'required',
            ]);

            if ($validation->fails()) {
                $response = [];
                $response['error_msg'] = $validation->errors()->toArray();
                return redirect()->back()->with(['err_emp_permission' => [$response], 'all_data' => [$data][0]]);
            } else {

                $permission_id = Request::get("permission_id");

                $arrSaveData = [];
                $arrSaveData["type"] = Request::get("type");
                $arrSaveData["name"] = Request::get("name");
                $arrSaveData["display_name"] = Request::get("display_name");
                $arrSaveData["description"] = Request::get("description");
                $arrSaveData['is_display'] = Request::get("is_display");

                if ($permission_id > 0) {
                    $updateStatus = $this->permission->updatePermission($permission_id, $arrSaveData);

                    $message = '';
                    if ($updateStatus == 0) {
                        $message = 'Permission already exist';
                    } else {
                        $message = 'You have successfully updated Permission.';
                    }

                    return redirect(route('admin_permissions'))->with('message', $message);
                } else {

                    $saveStatus = $this->permission->savePermission($arrSaveData);

                    $message = '';
                    if ($saveStatus == 0) {
                        $message = 'Permission already exist';
                    } else {
                        $message = 'You have successfully added permission.';
                    }

                    return redirect(route('admin_permissions'))->with('message', $message);
                }
            }
        } catch (Exception $e) {
            // something went wrong
            $response = [];
            $response['error_msg'] = array($e->getMessage() . " In " . $e->getFile() . " At Line " . $e->getLine());
            return redirect()->back()->with(['erremp_response_catch' => [$response], 'all_data' => [$data]]);
        }
    }

    /**
     * deletePermission
     * @param var $id
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function deletePermission($id) {
        $this->permission->deletePermission($id);
        return redirect()->back()->with('message', 'Permission Deleted Successfully.');
    }

    /**
     * Assign Permissions to role
     * @param var $roleID
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function RolesPermission($roleID) {
        $arrPermissionList = $this->permission->getAllPermission();
        $arrRolePermissionList = $this->permission->getAllPermissionByRoleID($roleID);

        $arrPermission = [];
        foreach ($arrRolePermissionList as $permission) {
            $arrPermission[] = $permission->permission_id;
        }
        return view('admin.accessmanagement.permission.roles-permission')
                        ->with('arrPermissionList', $arrPermissionList)
                        ->with('arrPermission', $arrPermission)
                        ->with('roleID', $roleID);
    }

    /**
     * Save Roles Permission
     * @param Request $request
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function SaveRolesPermission() {

        $varRoleID = Request::get("roleID");

        $this->permission->deleteRolePermission($varRoleID);

        $arrRolePermission = [];
        $arrPermissionID = Request::get("permission");

        if (count($arrPermissionID) > 0) {
            foreach ($arrPermissionID as $permissionid) {
                $arrRolePermission["role_id"] = Request::get("roleID");
                $arrRolePermission["permission_id"] = $permissionid;
                $this->permission->saveRolePermission($arrRolePermission);
            }
        }

        $message = "Role Permissions Assign Successfully.";
        return redirect(route('admin_role_permission', $varRoleID))->with('message', $message);
    }

    /**
     * addPermission
     * @param 
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function addPermission() {
        return view('admin.accessmanagement.permission.add-permission');
    }

    /**
     * editPermission
     * @param 
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function editPermission($id) {
        $arrEditData = $this->permission->getPermissionByID($id);
        return view('admin.accessmanagement.permission.add-permission')
                        ->with('arrEditData', $arrEditData)
                        ->with('id', $id);
    }

    /**
     * filterPermission
     * @param 
     * @return array
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function filterPermission() {

        $arrSearch = [];
        $arrSearch['pemission_type'] = Request::get('pemission_type');
        $arrSearch['pemission_name'] = Request::get('pemission_name');
        $arrSearch['display_name'] = Request::get('display_name');
        $arrSearch['status'] = Request::get('status');

        $arrPermissionList = $this->permission->filterAllPermission(10, $arrSearch);
        $total = $arrPermissionList->toArray()['total'];

        /* for download */
        if (Request::get("download") != '') {
            $arrData = $this->permission->filterAllPermission(10, $arrSearch, 1);
            if (count($arrData) > 0) {
                $id = Auth::user()->id;
                File::deleteDirectory(storage_path('exports') . "/" . $id);
                File::makeDirectory(storage_path('exports') . "/" . $id, 0777, true);
                File::makeDirectory(storage_path('exports') . "/" . $id . '/allorders', 0777, true);
                $i = 1;
                Excel::create('Permission_ ' . date('Y-m-d'), function($excel) use($arrData, $id, $i) {
                    $excel->sheet('Permission_', function($sheet) use($arrData, $id, $i) {
                        $sheet->row($i, array(
                            "Permission Type",
                            "Permission Name",
                            "Display Name",
                            "Status",
                                )
                        );
                        $i = 2;
                        if (count($arrData) > 0) {
                            foreach ($arrData as $varData) {

                                $status = "";
                                if ($varData->is_display == 0) {
                                    $status = "Inactive";
                                } else {
                                    $status = "Active";
                                }

                                $sheet->row($i, array(
                                    $varData->type,
                                    $varData->name,
                                    $varData->display_name,
                                    $status
                                        )
                                );
                                $i = $i + 1;
                            }
                        }
                    });
                })->download('xlsx');
            }
        } else {
            return view('admin.accessmanagement.permission.permissions')
                            ->with('arrPermissionList', $arrPermissionList)
                            ->with('total', $total)
                            ->with('arrSearch', $arrSearch);
        }
    }

}
