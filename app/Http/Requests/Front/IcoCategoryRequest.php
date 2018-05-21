<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class IcoCategoryRequest extends FormRequest {

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
        $id = $this->request->get('id');
                return [
                    'name' => 'required|unique:ico_category,name,'.$this->request->get('id'),
                ];
        
    }
    
      

}
