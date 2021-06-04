<?php

namespace App\Http\AppAPI\Requests\Employer;

use Illuminate\Foundation\Http\FormRequest;
use function request;

class APIEmployerUserUpdateRequest extends FormRequest
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
            'data.type' => 'required|in:employers',
            'data.attributes' => 'required|array',
            'data.attributes.name' => 'string',
            'data.attributes.email' => 'string|email|max:255|unique:employers,email',
            'data.attributes.password' => 'string|min:8',
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
