<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use App\Models\Front\User\Investor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use ReCaptcha\RequestMethod\CurlPost;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $investor = Investor::Create([
            'citizenship' => $data['citizenship'],
            'referral_code' => $this->generateReferralCode($data['name'])
        ]);
        
        $totalUserData = User::getCustomerCount();
        $cusID = ($totalUserData + 1);
        $customer_id = 'WEISID000' . $cusID;
        
        return User::create([
            'name' => $data['name'],
            'customer_id' => $customer_id,
            'mobile' => $data['mobile'],
            'type_id' => $investor->id,
            'user_type' => 'I',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    protected function redirectTo()
    {
        return '/home';
    }
    
     protected function generateReferralCode($name)
    {
        $code = strtolower(substr($name,0,3));
        $length = 4;
        $characters = date("YmdHis");
        $randomString = '';
        

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code.$randomString;
    }   
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        
        if ($this->captchaCheck($request) == false) {
            return redirect()->back()->withErrors(['captcha'=>'Captcha value does not match. please try again'])->withInput();
        }
        
        $this->validator($request->all())->validate();
        
        
        event(new Registered($user = $this->create($request->all())));
        
//        $apiKey = "6b85-cb0b-a623-c367";
//        $pin = "Minee12321";
//        $version = 2; // the API version to use
//
//        $block_io = new BlockIo($apiKey, $pin, $version);
//
//        $varData = $block_io->get_new_address(array('label' => date("YmdHis").$request['email']));
//        $data['bitoin_address'] = $varData->data->address;
//           
//        $Bitcoin = Bitcoin::Create([
//            'bitcoin_address' => $data['bitoin_address'],
//            'user_id' => $user->id,
//        ]);  
        
        //$this->guard()->login($user);
        
        $arrData = $request->all();
        
        //Mail to User
        $arrData['id'] = Crypt::encrypt($user->id);
        Mail::send('email/verifymail', $arrData, function($message) use ($request) {
                $message->to($request['email'], $request['name'])
                 ->subject('Weicrowd Token Buyer Registration verify link');
        });
        
        
        
         $request->session()->flash('alert-success',
                'Thank you! We have sent you activation link on your registered email. Please verify that link and login.');
        return redirect('/login');
        
//        
//        
//        //Mail to User
//        Mail::send('email/register', $arrData, function($message) use ($request) {
//                $message->to($request['email'], $request['name'])
//                 ->subject('WeiCrowd Investor Registration');
//        });
//        
//        //Mail to AdminUser
//        Mail::send('email/admin/register', $arrData, function($message) use ($request) {
//                $message->to('minee.soni@prolitus.com', $request['name'])
//                 ->subject('WeiCrowd Investor Registration');
//        });
//
//        return $this->registered($request, $user)
//                        ?: redirect($this->redirectPath());
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
                 ->subject('Weicrowd Token Buyer Registration Successful');
        });
        
        //Mail to AdminUser
        Mail::send('email/admin/register', $arrData, function($message) use ($request) {
                $message->to(['tapash@weicrowd.com','marketing@weicrowd.com'])
                 ->subject('Weicrowd Token Buyer Registration');
        });
        
        $request->session()->flash('alert-success',
                'Your email has been verified. Please login.');
        return redirect('/login');
    }
    
    
}
