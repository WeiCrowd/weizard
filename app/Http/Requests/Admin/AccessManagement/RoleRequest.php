<?php

namespace App\Http\Requests\Admin\AccessManagement;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|unique:mst_role,name,'.$id,
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
            'name.required' => 'Role name is required',
            'name.unique' => 'Role name has already been taken',
            'status.required' => 'Status is required',
        ];
    }
}