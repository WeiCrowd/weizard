<?php

namespace App\Http\Controllers\Front\Startup;

use Auth;
use App\User;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ReCaptcha\RequestMethod\CurlPost;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Front\StartupRegisterRequest;


class StartupDashboardController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
    
    
    
    protected function Index(Request $request)
    {
        //For Virtual Token
        $data['varTotToken'] = Auth::user()->totToken;
        return view('front.startup.StartupDashboard',$data);
    }
    
     
}
