<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Front\ProfileRequest;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    /**
     * Edit Profile
     */
    public function editProfile() {
        return view('edit-profile');
    }

    /**
     * Save Profile
     */
    public function saveProfile(ProfileRequest $request) {
        $id = Auth::id();
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['mobile'] = $request['mobile'];
        User::updateProfile($data, (int) $id);
        
        $request->session()->flash('alert-success', 'Record Updated Successfully');
        if(Auth::user()->user_type == 'S'){
            return Redirect::to('startup/dashboard');
        }else{
            return Redirect::to('home');
        }
    }
    
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function account() {
        return view('front/pages/account');
    }
    
    public function enable2fa() {
        return view('front/pages/two-fa-verification');
    }
    
    /**Order History 
     * return param
    **/
     public function orderHistory(Request $request) {
        return view('front/pages/order-history');
    }
    
    /**Offers
     * return param
    **/
     public function offers(Request $request) {
        return view('front/pages/offers');
    }

}
