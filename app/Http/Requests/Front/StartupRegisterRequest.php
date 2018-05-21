<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class StartupRegisterRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
            'name' => 'required|max:255',
            //'mobile' => 'required|numeric|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|regex:"^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,15}$"',
            'password_confirmation' => 'required|same:password',
            'citizenship' => 'required',
            'captcha' => 'required|captcha',
        ]; 
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Full Name is required.',
            //'name.alpha' => 'Full Name should be alphabets only.',
            'email.required' => 'Email is required.',
            'email.unique' => 'Email already taken.',
            'email.email' => 'Email should be a valid email.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).',
            'password.max' => 'Password should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).',
            'password.regex' => 'Password should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).',
            'confirm_password.same' => 'Confirm password & password not matched.',
            'confirm_password.required' => 'Confirm Password is required.',
//            'mobile.required' => 'Mobile is required.',
//            'mobile.unique' => 'Mobile already taken.',
//            'mobile.numeric' => 'Mobile should be numeric.',            
            'citizenship.required' => 'Country is required.',
            'captcha.required' => 'Captcha code is required.',
            'captcha.captcha' => 'Captcha value does not match. Please try again.'
        ];
    }
    
}