<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class IndexRequest extends FormRequest
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
            'perPage' => 'nullable|integer|in:10,50,100',
            'search' => 'nullable|string',
            'status' => 'nullable|in:accept,pending,reject',
            'role' => 'nullable|string|in:admin,user,eo',
            'orderDirection' => 'nullable|string|in:asc,desc',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->route('dashboard.user.index') // paksa redirect ke halaman user
                ->withErrors($validator)
                ->withInput([]) // hilangkan input lama
        );
    }
}
