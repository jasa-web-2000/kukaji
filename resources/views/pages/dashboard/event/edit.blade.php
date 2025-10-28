@extends('layouts.dashboard')
@php
    $user = auth()->user();
@endphp

@section('content-dashboard')
    <div class="col-span-full!">
        <x-form action="{{ route('dashboard.event.update', ['event' => $data]) }}" methodTop="POST" methodBottom="PUT">

            <!-- Judul -->
            <div class="col-span-full">
                <label class="required" class="required" for="name">Judul
                </label>
                <input id="name" value="{{ old('name') ?? ($data->name ?? '') }}" type="text" name="name"
                    required />
            </div>

            <!-- Pengguna -->
            <div class="">
                <label class="required">Pengguna
                </label>

                <div class="">
                    <select name="user_id" disabled id="user_id">
                        <option selected value="{{ $data->user->id }}">{{ $data->user->username }}</option>
                    </select>
                </div>

            </div>

            <!-- Status -->
            <div class="">
                <label class="required">Status
                </label>

                <div class="">
                    <select name="status" id="status" @disabled($user->role != 'admin')>
                        <option>Pilih Status</option>
                        <option @selected($user->role != 'admin' ?? old('status') == 'pending') value="pending">Menunggu</option>
                        <option @selected(old('status') == 'reject') value="reject">Ditolak</option>
                        <option @selected(old('status') == 'accept') value="accept">Diterima</option>
                    </select>
                </div>
            </div>


            <!-- Tanggal -->
            <div class="">
                <label class="required" for="date">Tanggal
                </label>
                <input id="date" value="{{ dateFormat(old('date')) ?? (dateFormat($data->date) ?? '') }}"
                    type="date" name="date" required />
            </div>


            @php
                $address = regency()->where('id', $data->address)->first();
            @endphp

            <!-- Alamat -->
            <livewire:search-select :selectedName="$address['name'] ?? null" :selectedId="$address['id'] ?? null" table="regency" label="Kota/Kabupaten"
                name="address" required="false" />

            <!-- Tema -->
            <livewire:search-select :selectedName="$data->theme->name ?? null" :selectedId="$data->theme_id ?? null" table="theme" label="Tema" name="theme_id"
                required="false" />

            <!-- Pembicara -->
            <livewire:search-select :selectedName="$data->speaker->name ?? null" :selectedId="$data->speaker_id ?? null" table="speaker" label="Pembicara" name="speaker_id"
                required="false" />



            <!-- description -->
            <div class="col-span-full ">
                <label class="required" for="description">Deskripsi
                </label>
                <textarea name="description" id="description" rows="3" required>{{ old('description') ?? ($data?->description ?? '') }}</textarea>
            </div>

            <!-- note -->
            <div class="col-span-full ">
                <label for="note">Catatan Untuk Admin
                </label>
                <textarea name="note" id="note" rows="3" placeholder="Hanya admin yang bisa membaca ini!">{{ old('note') ?? ($data?->note ?? '') }}</textarea>
            </div>

            <x-dashboard.preview-image src="{{ $data->thumbnail['url'] }}" required="{{ !$data->thumbnail['exists'] }}"
                name="thumbnail" />

            <x-dashboard.submit />
        </x-form>
    </div>
@endsection
