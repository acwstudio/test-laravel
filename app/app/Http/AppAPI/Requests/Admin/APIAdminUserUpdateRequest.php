<?php

namespace App\Http\AppAPI\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class APIAdminUserUpdateRequest extends FormRequest
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
            'data' => 'required|array',
            'data.id' => 'required|integer|in:' . request()->segment('5'),
            'data.type' => 'required|in:admins',
            'data.attributes' => 'required|array',
            'data.attributes.name' => 'required|string',
            'data.attributes.email' => 'required|string|email|max:255|unique:admins,email',
            'data.attributes.password' => 'required|string|min:8|confirmed',
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
            'data.id.in' => 'The :attribute must be equal ' . request()->segment('5'),
        ];
    }
}
