<?php

namespace App\Http\Requests\Admin\AccessManagement;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->request->get('id');
        
        if($id != ''){
             return [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'mobile' => 'required||numeric|unique:users,mobile,'.$id,
            
        ];
        } else {
            return [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'mobile' => 'required||numeric|unique:users,mobile,'.$id,
            'password' => 'required|min:8|regex:"^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,15}$"'
        ];
        }
       
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'mobile.required' => 'Mobile is required',
            'email.unique' => 'Email has already been taken',
            'mobile.unique' => 'Mobile has already been taken',
            'password.required' => 'This field is required.',
            'password.min' => 'This field should contain min 8.',
            'password.regex' => 'This field should contain min 4 and max 15 with atleast 1 number, 1 alphabet, and 1 special character.',
            'confirm_password.required' => 'This field is required.',
            'confirm_password.same' => 'Password and confirm password should be same.',
            
        ];
    }
}