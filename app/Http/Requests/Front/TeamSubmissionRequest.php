<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class TeamSubmissionRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'member_name' => 'required',
            'member_designation' => 'required',
            //'linkedin_url' => 'url',
        ];
        
    }
    
//    public function messages()
//    {
//        return [
//            'member_name.required' => 'This field is required.',
//            'member_designation.required' => 'This field is required.',
//           
//
//        ];
//    }

}
