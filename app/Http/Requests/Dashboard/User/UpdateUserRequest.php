<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $user = $this->route('user');

        $rules = [
            'username' => 'required|unique:users,username,' . $user->id . '|string|regex:/^@[\w.]+$/|min:5|max:40',
            'fullname' => 'required|string',
            'email'    => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:10',
            'phone'    => 'required|string|max:20',
            'bio'      => 'required|string|max:500',
            'address'  => 'required|string|max:255',
            'gender'   => 'required|in:male,female',
            'birthdate' => 'required|date',
            'photo'    => (!file_exists($user->photo['path']) ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png,gif,jfif,webp|max:10240',
        ];

        $auth = Auth::user();
        if ($auth->role === 'admin' && $auth->status === 'accept' && $auth->id !== $user->id) {
            $rules['role'] = 'required|in:admin,eo,user';
            $rules['status'] = 'required|in:pending,reject,accept';
        }

        return $rules;
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
