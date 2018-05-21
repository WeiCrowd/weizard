<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class IcoSubmissionRequest extends FormRequest {

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
        if ($this->request->get('id') != "") {
            if ($this->request->get('symbol') != "") {
                return [
                    'category_id' => 'required',
                    'name' => 'required|string|max:255|unique:ico_submission,name,'.$this->request->get('id'),
                    'symbol' => 'required|string|max:255|unique:ico_submission,symbol,'.$this->request->get('id'),
                    //'short_description' => 'required|string|max:350',
                    //'concept' => 'required|string',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'soft_cap' => 'required|numeric',
                    'hardcap' => 'required|numeric',
                    'restriction' => 'required',
                    'accepts' => 'required',
                    'token_price' => 'required|numeric',
                    'whitelist' => 'required',
                    'kyc' => 'required',
                    'technology' => 'required',
                    'origin_country' => 'required|string',
                ];
            } else {
                return [
                    'category_id' => 'required',
                    'name' => 'required|string|max:255|unique:ico_submission',
                    'symbol' => 'required|string|max:255',
                    //'short_description' => 'required|string|max:350',
                    //'concept' => 'required|string',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'soft_cap' => 'required|numeric',
                    'hardcap' => 'required|numeric',
                    'restriction' => 'required',
                    'accepts' => 'required',
                    'token_price' => 'required|numeric',
                    'whitelist' => 'required',
                    'kyc' => 'required',
                    'technology' => 'required',
                    'origin_country' => 'required|string',
                ];
            }
        } else {
            if ($this->request->get('symbol') != "") {
                return [
                    'category_id' => 'required',
                    'name' => 'required|string|max:255|unique:ico_submission',
                    'symbol' => 'required|string|max:255',
                    //'short_description' => 'required|string|max:350',
                    //'concept' => 'required|string',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'soft_cap' => 'required|numeric',
                    'hardcap' => 'required|numeric',
                    'restriction' => 'required',
                    'accepts' => 'required',
                    'token_price' => 'required|numeric',
                    'whitelist' => 'required',
                    'kyc' => 'required',
                    'technology' => 'required',
                    'origin_country' => 'required|string',
//                    'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif',
//                    'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif',
                    
                ];
            } else {
                return [
                    'category_id' => 'required',
                    'name' => 'required|string|max:255|unique:ico_submission',
                    'symbol_image' => 'required|image|mimes:jpeg,png,jpg,gif',
                    //'short_description' => 'required|string|max:350',
                    //'concept' => 'required|string',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'soft_cap' => 'required|numeric',
                    'hardcap' => 'required|numeric',
                    'restriction' => 'required',
                    'accepts' => 'required',
                    'token_price' => 'required|numeric',
                    'whitelist' => 'required',
                    'kyc' => 'required',
                    'technology' => 'required',
                    'origin_country' => 'required|string',
//                    'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif',
//                    'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif',
                    
                ];
            }
        }
    }
    
    public function checkImageType(){
        if($this->file('symbol_image') != ""){
            $image = $this->file('symbol_image')->getClientOriginalExtension();
            $originalImg = array('jpeg','jpg','png','gif');

            if(in_array($image, $originalImg)){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
        
    }
    
    
     public function checkBannerPhoto(){
        if($this->file('banner_image') != ""){
            $image = $this->file('banner_image')->getClientOriginalExtension();
            $originalImg = array('jpeg','jpg','png','gif');

            if(in_array($image, $originalImg)){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
        
    }
    
    
//    public function checkKycDoc(){
//        if($this->file('kyc_doc') != ""){
//            $image = $this->file('kyc_doc')->getClientOriginalExtension();
//            $originalImg = array('jpeg','jpg','png','gif');
//
//            if(in_array($image, $originalImg)){
//                return true;
//            }else{
//                return false;
//            }
//        }else{
//            return true;
//        }
//        
//    }
    
    public function checkLogoPhoto(){
        if($this->file('logo_image') != ""){
            $image = $this->file('logo_image')->getClientOriginalExtension();
            $originalImg = array('jpeg','jpg','png','gif');

            if(in_array($image, $originalImg)){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
        
    }
    
     public function withValidator($validator)
    {
        $validator->after(function ($validator) {        
            if ($this->checkImageType() == false) {
                $validator->errors()->add('symbol_image', 'Sorry! This field should contain jpeg,jpg,png, and gif images only');
            }
            if ($this->checkBannerPhoto() == false) {
                $validator->errors()->add('banner_image', 'Sorry! This field should contain jpeg,jpg,png, and gif images only');
            }
            if ($this->checkLogoPhoto() == false) {
                $validator->errors()->add('logo_image', 'Sorry! This field should contain jpeg,jpg,png, and gif images only');
            }
//            if ($this->checkKycDoc() == false) {
//                $validator->errors()->add('kyc_doc', 'Sorry! This field should contain jpeg,jpg,png, and gif images only');
//            }
        });
    }
   

}
