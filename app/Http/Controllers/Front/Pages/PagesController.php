<?php

namespace App\Http\Controllers\Front\Pages;

use Mail;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Front\Ico\Icosubmission;
use Illuminate\Support\Facades\Redirect;
//use App\Models\Front\ContactUs\ContactUs;
use App\Http\Requests\Front\ContactUsRequest;


class PagesController extends Controller
{
    //use \App\Traits\Front\ContactUs\ContactUsTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
    
    
    
    /**
     * Campaign
     * @param
     * @return type
     */
    public function campaign()
    {   
        $data['icoData'] = Icosubmission::getIcoDataByStatus('1');
        //dd($data['icoData']);
        return view('front.pages.campaign',$data);
    }
    
    /**
     * MeetUs
     * @param
     * @return type
     */
    public function meetUs()
    {   
        return view('front.pages.meetus');
    }
    
    /**
     * 2fa
     * @param
     * @return type
     */
    public function enable2fa()
    {   
        $data['data'] = User::getUserWithPersonalDetails(Auth::id());
        return view('front.profile.2fa',$data);
    }
    
    public function bounty()
    {   
        return view('front.pages.bounty');
    }
    
}
