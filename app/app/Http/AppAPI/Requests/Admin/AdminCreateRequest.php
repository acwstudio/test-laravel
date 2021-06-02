<?php

namespace App\Http\AppAPI\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
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
            'data.type' => 'required|in:articles',
            'data.attributes' => 'required|array',
            'data.attributes.name' => 'required|string',
            'data.attributes.email' => 'required|string|email|max:255|unique:admins',
            'data.attributes.password' => 'required|string|min:8|confirmed',
        ];
    }
}
