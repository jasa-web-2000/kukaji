<?php

namespace App\Http\Requests\Dashboard\Event;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $event = $this->route('event');

        if ($this->has('name') && ($this->name !== $event->name)) {
            $this->merge([
                'slug' => Str::slug($this->name) . '-' . Str::random(8),
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
        $event = $this->route('event');

        $rules = [
            'thumbnail' => (!file_exists($event->thumbnail['path']) ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png,gif,jfif,webp|max:10240',
            'name' => 'required|string|max:100',
            'slug' => 'required_if:slug_required,1|string|unique:events,slug,' . $event->id,
            'address' => 'required|string|' . Rule::in(regency()->pluck('id')->toArray()),
            'date' => 'required|date',
            'theme_id' => 'required|string|exists:themes,id',
            'speaker_id' => 'required|string|exists:speakers,id',
            'description' => 'required|string|max:1000',
            'note' => 'nullable|string|max:1000',
        ];

        $auth = Auth::user();

        if ($auth->role === 'admin' && $auth->status === 'accept') {
            $rules['status'] = 'required|in:pending,reject,accept';
        }
        return $rules;
    }

    public function attributes(): array
    {
        return [
            'name' => 'judul',
            'address' => 'alamat',
            'date' => 'tanggal',
            'theme_id' => 'tema',
            'speaker_id' => 'pembicara',
            'description' => 'deskripsi',
            'note' => 'catatan',
        ];
    }
}
