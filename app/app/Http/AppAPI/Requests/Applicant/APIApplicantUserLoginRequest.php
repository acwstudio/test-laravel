<?php

namespace App\Http\AppAPI\Requests\Applicant;

use Illuminate\Foundation\Http\FormRequest;

class APIApplicantUserLoginRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|exists:applicants,email',
            'password' => 'required|string|min:8',
        ];
    }
}
