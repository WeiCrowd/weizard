<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class KycRequest extends FormRequest {

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
//                    if(@$this->occupation == null){
//                       return [
//                            'occupation' => 'required',                        
//                        ];  
//                    }
//                    dd($this->occupation);
        
                        return [
                        'first_name' => 'required|string|max:255',
                        'last_name' => 'required|string|max:255',
                        'gender' => 'required',
                        'address' => 'required',
                        //'apartment_floor' => 'required',
                        //'other' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'country_id' => 'required',
                        'postal_code' => 'required|numeric|digits:6',
                        'country_code' => 'required|numeric',
                        'mobile' => 'required|numeric|digits:10',
                        'dob' => 'required',
                        'id_type' => 'required',
                        'issue_date' => 'required',
                        //'valid_date' => 'required'
                    ]; 
              
    }

}
