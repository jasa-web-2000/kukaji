<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        if ($this->has('thumbnail')) {
            $this->merge([
                'photo' => $this->thumbnail,
            ]);
        }
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
            'phone'      => 'required|string|max:20',
            'bio'        => 'required|string|max:500',
            'address'    => 'required|string|max:255',
            'gender'     => 'required|in:male,female',
            'role'       => 'required|in:admin,eo,user',
            'birthdate'  => 'required|date',
            'status'     => 'required|in:pending,reject,accept',
            'photo'      => 'required|image|mimes:jpg,jpeg,png,gif,jfif,webp|max:10240',
        ];
    }

    public function attributes(): array
    {
        return [
            'fullname' => 'nama lengkap',
            'phone' => 'nomor telepon',
            'gender' => 'jenis kelamin',
            'birthdate' => 'tanggal lahir',
            'address' => 'alamat',
            'foto' => 'thumbnail',
        ];
    }
}
