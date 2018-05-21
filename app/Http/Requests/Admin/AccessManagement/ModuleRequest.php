<?php

namespace App\Http\Requests\Admin\AccessManagement;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
            'name' => 'required|unique:mst_module,name,'.$id,
            'status' => 'required'
            
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
            'name.required' => 'Module name is required',
            'name.unique' => 'Module name has already been taken',
            'status.required' => 'Status is required',
        ];
    }
}