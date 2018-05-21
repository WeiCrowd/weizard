<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = 'passwords.token';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    protected function redirectTo()
    {
        return '/home';
    }
    
    public function showResetForm(Request $request, $token){
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    
    public function reset(Request $request){
        $this->validate($request,
                            [
                                'email' => 'required|email|exists:users,email',
                                'token' => 'required',
                                'password' => 'required|min:8|regex:"^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,15}$"',
                                'password_confirmation' => 'required|same:password',
                            ],
                            [
                                'email.required' => 'Email is required.',
                                'email.email' => 'Enter valid email.',
                                'email.exists' => 'Email does not exists.',
                                'password.required' => 'Password is required.',
                                'password.min' => 'Password should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).',
                                'password.max' => 'Password should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).',
                                'password.regex' => 'Password should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).',
                                'password_confirmation.same' => 'Confirm password & password not matched.',
                                'password_confirmation.required' => 'Confirm Password is required.',
                            ]
                        );
        
            $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
        
        $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($response)
                    : $this->sendResetFailedResponse($request, $response);
        if($response == "passwords.token"){
//            $request->session()->flash('alert-danger',
//                'Reset link has expired. Please generate password reset link again.');
            return redirect()->back()->withErrors(['resetError'=>'Password reset link has expired. Please generate reset password link again.'])->withInput();;
        }
        if($response == "passwords.reset"){
            
            //Mail to User            
            $user = User::getUserByemail($request->email);
            $arrData = ['name'=> $user->name];
            Mail::send('email/change-pwd', $arrData, function($message) use ($user) {
                    $message->to($user->email)
                     ->subject('Password Successfull Changed');
            });

            $request->session()->flash('alert-success',
                'Password reset successfully. Please login.');
            return redirect('login');
        }
         
    }
    
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
        
        //$this->guard()->login($user);
    }
    
    protected function sendResetResponse($response)
    {
        return redirect($this->redirectPath())
                            ->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }
    
}
