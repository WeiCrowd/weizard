<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Models\Auction\Auction;
use App\Http\Controllers\Controller;
use App\Models\Front\Ico\Icosubmission;
use App\Models\Front\Ico\IcoCategory;


class AdminController extends Controller
{

    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['inactiveICO'] = Icosubmission::getAdminIcoDataByStatus('0');
        $data['activeICO']   = Icosubmission::getAdminIcoDataByStatus('1');
        $data['category'] = IcoCategory::getAllData();
        return view('admin.dashboard', $data);
    }

     

    public function showProfile() {
        
        $arrAdmindata = User::getAllUsers(Auth::user()->id);
        
        $name = explode(" ", $arrAdmindata[0]->name);
        if (count($name) > 1) {
            $first_name = implode(" ", array_slice($name, 0, -1));
            $last_name = end($name);
        } else {
            $first_name = $arrAdmindata[0]->name;
            $last_name = '';
        }
        
        $arrAdmindata[0]['first_name'] = $first_name;
        $arrAdmindata[0]['last_name'] = ($last_name != "") ? $last_name : '';
        return view('admin.adminProfile')->with('arrAdmindata', $arrAdmindata[0]);
    }
    
    /**
     * saveProfile
     * @param 
     * @return array $arr
     * @since 0.1
     * @author Minee Soni
     */
    public function saveProfile(Request $request) {
        
        $varAID = Auth::user()->id;
        
        $arrAdminUserData = [];
        $arrAdminUserData["name"] = $request['first_name'] . " " . $request['last_name'];
        $arrAdminUserData["mobile"] = $request['mobile_number'];
        User::updateUser($varAID, $arrAdminUserData);
        
        
        /* Upload image media for advertisement */
        if ($request['image']) {
            $arrAdminUserData = [];
            $varFile = $request['image'];
            $varFileName = $varFile->getClientOriginalName();
            $varFileEncName = $varAID . "_" . str_replace(' ', '_', $varFileName);
            $destinationPath = "admin_image";
            $request['image']->move($destinationPath, $varFileEncName);
            $arrAdminUserData["user_photo"] = $varFileEncName;
            User::updateUser($varAID, $arrAdminUserData);
        }

        return redirect(route('admin_profile'))->with('message', 'Profile updated successfully.');
    }
    
    /**
     * saveProfile
     * @param 
     * @return array $arr
     * @since 0.1
     * @author Minee Soni
     */
    public function changePassword(Request $request) {
        $arrUserData = [];
        $old_password = $request['old_password'];
        $password = $request['password'];
        $arrUserData['password'] = bcrypt($password);
        $id = Auth::user()->id;

        $arrDataCheck = User::checkOldPassword($old_password, $id);
        if ($arrDataCheck == 1) {
            $rowUpdate = User::updateUser($id, $arrUserData);
            return redirect(('/admin/my-profile'))->with('message', 'Password has been changed successfully.');
        } else {
            return redirect(('/admin/my-profile'))->with('message', 'Old password does not match.');
        }
    }
}