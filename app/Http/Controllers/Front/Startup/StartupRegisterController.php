<?php

namespace App\Http\Controllers\Front\Startup;

use Mail;
use App\User;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use App\Models\Front\User\Startup;
use App\Http\Controllers\Controller;
use ReCaptcha\RequestMethod\CurlPost;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Front\StartupRegisterRequest;


class StartupRegisterController extends Controller
{
    use RegistersUsers;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
    
    protected function StartupcaptchaCheck(Request $request) {
         
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
    
    protected function Index(Request $request)
    {
        return view('front.startup.StartupRegister');
    }
    
    protected function StartupRegister(StartupRegisterRequest $request)
    {
//        if ($this->StartupcaptchaCheck($request) == false) {
//            return redirect()->back()->withErrors(['Captcha value does not match. please try again'])->withInput();
//        }
        
        $startup = Startup::Create([
            'citizenship' => $request['citizenship'],
        ]);
        
        $totalUserData = User::getCustomerCount();
        $cusID = ($totalUserData + 1);
        $customer_id = 'WEISID000' . $cusID;
        
        $user = User::create([
            'name' => $request['name'],
            'customer_id' => $customer_id,
            'mobile' => $request['mobile'],
            'type_id' => $startup->id,
            'user_type' => 'S',
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        $arrData = $request->all();
        //Mail to User
//        Mail::send('email/register', $arrData, function($message) use ($request) {
//                $message->to($request['email'], $request['name'])
//                 ->subject('WeiCrowd Startup Registration');
//        });
//        
//        //Mail to AdminUser
//        Mail::send('email/admin/register', $arrData, function($message) use ($request) {
//                $message->to('minee.soni@prolitus.com', $request['name'])
//                 ->subject('WeiCrowd Startup Registration');
//        });
//        
//        //$this->guard()->login($user);
//        
//        $request->session()->flash('alert-success',
//                'Startup Registration successfully');
//        return redirect('login');
        
        //Mail to User
        $arrData['id'] = Crypt::encrypt($user->id);
        Mail::send('email/verifymail', $arrData, function($message) use ($request) {
                $message->to($request['email'], $request['name'])
                 ->subject('Weicrowd Startup Registration verify link');
        });
        
        
        
         $request->session()->flash('alert-success',
                'Thank you! We have sent you activation link on your registered email. Please verify that link and login.');
        return redirect('/login');
        
    }
    
    
    public function verifyEmail(Request $request, $id){

        $id = Crypt::decrypt($id);
        $userData = ['status' => '1'];
        $existUser = User::getUserDetailsByID($id);
        if(!$existUser){
             $request->session()->flash('alert-danger',
                'Something wrong . Please verify link again.');
        }
        $result = User::updateUser($id, $userData);
        if(!$result){
             $request->session()->flash('alert-danger',
                'Something wrong . Please verify link again.');
        }
        
        //Mail to User
        $arrData = ['name'=> $existUser->name, 'email'=> $existUser->email, 'mobile'=> $existUser->mobile];
        Mail::send('email/register', $arrData, function($message) use ($existUser) {
                $message->to($existUser->email)
                 ->subject('Weicrowd Startup Registration Successful');
        });
        
        //Mail to AdminUser
        Mail::send('email/admin/register', $arrData, function($message) use ($request) {
                $message->to('minee.soni@prolitus.com')
                 ->subject('Weicrowd Registration');
        });
        
        $request->session()->flash('alert-success',
                'Your email has been verified. Please login.');
        return redirect('/login');
    }
}
