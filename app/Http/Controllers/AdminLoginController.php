<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller {

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getAdminLogin() {
        if (auth()->guard('admin')->user())
            return redirect()->route('admin.dashboard');
        return view('adminLogin');
    }

    public function adminAuth(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if ($this->captchaCheck($request) == false) {
           return redirect()->back()->withErrors(['captcha'=>'Captcha value does not match. please try again'])->withInput();
        }
        
           
        $user = User::getUserByemail($request->email);
        if((count($user)>0) && ($user->user_type != 'I')){
        if ($user->google2fa_secret) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (!Auth::attempt($credentials)) {
                return redirect()->back()->withInput()->withErrors(['error_msg' =>'Email or password do not match.']);
            }
            Auth::logout();
            $request->session()->put('2fa:user:id', $user->id);
            return redirect('2fa/validate');
        } else {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (!Auth::attempt($credentials)) {
                return redirect()->back()->withInput()->withErrors(['error_msg' =>'Email or password do not match.']);
            }
            if (Auth::user()['user_type'] == 'A') {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()['user_type'] == 'O') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return redirect('tm-portal')->withErrors(['Please fill correct credentials'])->withInput();
            }
        }
        } else {
            Auth::logout();
            return redirect()->back()->withErrors(['error_msg' =>'Email or password do not match.'])->withInput();
        }
    }
    
    protected function captchaCheck(Request $request) {
         
        $response = $request->get('g-recaptcha-response');
        $remoteip = $request->server('REMOTE_ADDR');
        $secret = env('CAPTCHA_SECRET');

        $recaptcha = new ReCaptcha($secret, new CurlPost());
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }
    }

}
