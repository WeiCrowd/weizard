<?php

namespace App\Http\Controllers\Front\Icolisting;

use Mail;
use App\User;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use App\Models\Front\User\Startup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use ReCaptcha\RequestMethod\CurlPost;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Front\StartupRegisterRequest;


class IcolistingRegisterController extends Controller
{
    use RegistersUsers;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
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
        return view('front.icolisting.icolistingRegister');
    }
   
    
    
    protected function icolistingRegister(StartupRegisterRequest $request)
    {
        $startup = Startup::Create([
            'citizenship' => $request['citizenship'],
        ]);
        
        
        $totalUserData = User::getCustomerCount();
        $cusID = ($totalUserData + 1);
        $customer_id = 'WEISID' . $cusID.rand(100,999);
        
        
        $user = User::create([
            'customer_id' => $customer_id,
            'name' => $request['name'],
            //'mobile' => $request['mobile'],
            'type_id' => $startup->id,
            'user_type' => 'S',
            'register_type' => 'L',
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        $arrData = $request->all();
        
        $mailData = [];
        $mailData['email'] = $request['email'];
        $mailData['name'] = $request['name'];
        //$mailData['mobile'] = $request['mobile'];
        $arrData = $mailData;
        $arrData['id'] = Crypt::encrypt($user->id);
        
        //Mail to User 
        Mail::send('email/icolisting/register', $arrData, function($message) use ($mailData) {
                $message->to($mailData['email'], $mailData['name'])
                 ->subject('WeiZard ICO Listing Registration');
        });
        
        
        //Mail to AdminUser
        Mail::send('email/admin/register', $arrData, function($message) use ($request) {
                $message->to(['tapash@weicrowd.com','marketing@weicrowd.com'])
                 ->subject('WeiZard ICO Listing Registration');
        });    
        return redirect('icolisting-thank-you'); 
        
    }
    
    
    
    
    public function icoListingverifyEmail(Request $request, $id){

        $id = Crypt::decrypt($id);
        $userData = ['status' => '1'];
        $existUser = User::getUserDetailsByID($id);
     //   $InvestorData = Investor::getInvestorDataById($existUser->type_id);
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
        Mail::send('email/icolisting/verify', $arrData, function($message) use ($existUser) {
                $message->to($existUser->email)
                 ->subject('WeiZard ICO Listing - Email Verified Successfully');
        });
        
        
        $request->session()->flash('alert-success',
                'Your email has been verified. Please login.');
        return redirect('/login');
    }
}
