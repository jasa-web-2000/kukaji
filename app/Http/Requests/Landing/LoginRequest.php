<?php

namespace App\Http\Requests\Landing;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email',
            'password' => 'required|string',
            'g-recaptcha-response' => [new RequiredIf(ENV('APP_ENV') == 'production'), new Recaptcha],
        ];
    }


    public function attributes(): array
    {
        return [
            'g-recaptcha-response' => 'google recaptcha',
        ];
    }
}
