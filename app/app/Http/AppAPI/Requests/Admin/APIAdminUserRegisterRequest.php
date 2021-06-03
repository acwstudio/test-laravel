<?php

namespace App\Http\AppAPI\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class APIAdminUserRegisterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'meta' => 'present|array',
            'meta.client' => 'required|string|in:mobile,spa,service',
            'data' => 'required|array',
            'data.type' => 'required|in:articles',
            'data.attributes' => 'required|array',
            'data.attributes.name' => 'required|string',
            'data.attributes.email' => 'required|string|email|max:255|unique:admins',
            'data.attributes.password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'client.in' => 'The :attribute must be one of these items: mobile, postman, spa, server',
        ];
    }
}
