<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo() {
        return '/home';
    }

    protected function validateLogin(Request $request) {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ],
                
        [
        'email.required' => 'Email is required.',
        'password.required' => 'Password is required.',
        'captcha.required' => 'Captcha code is required.',
        'captcha.captcha' => 'Captcha value does not match. please try again.'

        ]);
    }
    
    function validateUser($validator, $request) {
        $email = $request['email'];

        $user = User::getUserByemail($email);
        if ($user) {
            if ($user->status != '1' || $user->deleted_at != '') {
                $validator->after(function($validator) {
                    $validator->errors()->add('email', 'Sorry! You are not active. Please verify your email.');
                });
            } else {
                return true;
            }
        }
    }

    public function login(Request $request) {

        $this->validateLogin($request);
//        if ($this->captchaCheck($request) == false) {
//            return redirect()->back()->withErrors(['captcha'=>'Captcha value does not match. please try again'])->withInput();
//        }
        
//        $user = User::getUserByemail($request->email);
//        
//        if ($user->google2fa_secret) {
//            Auth::logout();
//            $request->session()->put('2fa:user:id', $user->id);
//            return redirect('2fa/validate');
//        } else {
        
                $rules = [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required'
                ];
                $messages = [
                    'email.required' => 'Email is required.',
                    'email.email' => 'Enter valid email.',
                    'email.exists' => 'Email does not exists.',
                    'password.required' => 'Password is required.'
                ];
        
                $validation = Validator::make($request->all(), $rules, $messages);
                $validateUser = $this->validateUser($validation, $request->all());


                if ($validation->fails()) {
                    return redirect()->back()->withErrors($validation->errors());
                } else {
                    $credentials = ['email' => $request->email, 'password' => $request->password];
                    
                        if (!Auth::attempt($credentials)) {
                            return redirect()->back()->withInput()->withErrors(['error_msg' => 'Email or password do not match.']);
                        }
                        
                        if (Auth::user()['user_type'] == 'S') {
                            Session::forget('_token');                           
                            return redirect('startup/manage-ico')->with('message', 'Login Successfully.');
                        }else{
                            Auth::logout();
                            return redirect('login')->withErrors(['error_msg' => 'Email or password do not match.'])->withInput();
                        }
                        
                   
                }
                
                
//            $credentials = ['email' => $request->email, 'password' => $request->password];
//            if (!Auth::attempt($credentials)) {
//                return redirect()->back()->withInput()->withErrors(['password' => 'Wrong password.']);
//            }
//            
//
//            if (Auth::user()['user_type'] == 'S') {
//                return redirect('startup/dashboard')->with('message', 'Login Successfully.');
//            } else if (Auth::user()['user_type'] == 'I') {
//                return redirect('home')->with('message', 'Investor Login Successfully.');
//            } else {
//                Auth::logout();
//                return redirect('login')->withErrors(['Please fill correct credentials'])->withInput();
//            }
       // }
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
