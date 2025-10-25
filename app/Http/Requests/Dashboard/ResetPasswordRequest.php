<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password-old' => ['required', new MatchOldPassword],
            'password' => 'required|string|min:10|different:password-old|confirmed',
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'password baru',
            'password-old' => 'password lama',
            'password-confirmation' => 'password konfirmasi'
        ];
    }
}
