<?php

namespace App\Http\Requests\Landing;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|unique:users|string|regex:/^@[\w.]+$/|min:5|max:40',
            'fullname' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|min:10',
            'role' => 'required|string|in:eo,user',
            'g-recaptcha-response' => [new RequiredIf(ENV('APP_ENV') == 'production'), new Recaptcha],
        ];
    }

    public function attributes(): array
    {
        return [
            'fullname' => 'Nama Lengkap',
            'g-recaptcha-response' => 'Google reCaptcha',
        ];
    }
}
