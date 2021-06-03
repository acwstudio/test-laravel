<?php

namespace App\Http\AppAPI\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class APIAdminUserLoginRequest extends FormRequest
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
            'client' => 'required|string|in:mobile,postman,spa,server',
            'email' => 'required|string|email|max:255|exists:admins,email',
            'password' => 'required|string|min:8',
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
            'client.in' => 'The :attribute must be one of these items: mobile, postman, spa, server',
        ];
    }
}
