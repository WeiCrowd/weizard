<?php

namespace App\Http\Requests\Admin\AccessManagement;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        
        return [
            'permission_name' => 'required',
            'module_id' => 'required',
            'status' => 'required'
            //
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'module_id.required' => 'Module name is required',
            'permission_name.required' => 'Permission name is required',
            'status.required' => 'Status is required',
        ];
    }
}