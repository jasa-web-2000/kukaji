@extends('layouts.dashboard')
@php
    $id = Auth::user()->id;
    $role = Auth::user()->role;
    $disabled = isset($data->role) && ($data->id == $id || $role != 'admin');
@endphp


@section('content-dashboard')
    <div class="col-span-full!">
        {{-- <x-form action="{{ route('dashboard.user.update', ['user' => $data]) }}" method="PUT"> --}}
        <x-form action="{{ route('dashboard.user.update', ['user' => $data]) }}" methodTop="POST" methodBottom="PUT">


            <!-- Nama Lengkap -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" class="required" for="fullname">Nama Lengkap
                </label>
                <input id="fullname" value="{{ old('fullname') ?? ($data->fullname ?? '') }}" type="text" name="fullname"
                    required autocomplete="off" />
            </div>

            <!-- Username -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="username">Username
                </label>
                <input id="username" value="{{ old('username') ?? ($data->username ?? '') }}" type="text"
                    name="username" required autocomplete="off" />
            </div>

            <!-- Email -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="email">Email
                </label>
                <input id="email" value="{{ old('email') ?? ($data->email ?? '') }}" type="email" name="email"
                    required autocomplete="off" />
            </div>

            <!-- Password -->
            <div class="col-span-full sm:col-span-1">
                <x-input-password label="Password" name="password" disabled="{{ $disabled }}"
                    required="{{ false }}" />
            </div>

            <!-- Phone -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="phone">Telephone (+ kode negara)
                </label>
                <input id="phone" value="{{ old('phone') ?? (isset($data->phone) ? $data->phone : '62') }}"
                    type="number" name="phone" required autocomplete="off" />
            </div>

            <!-- birthdate -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="birthdate">Tanggal Lahir
                </label>
                <input id="birthdate" value="{{ dateFormat(old('birthdate')) ?? (dateFormat($data->birthdate) ?? '') }}"
                    type="date" name="birthdate" required autocomplete="off" />
                {{-- <input id="birthdate" value="1999-10-1"
                    type="date" name="birthdate" required autocomplete="off" /> --}}
            </div>

            <!-- Status -->
            <div class="col-span-full">
                <label class="required">Status
                </label>

                <div class="">
                    <select @disabled($disabled) name="status" id="status">
                        <option>Pilih Status</option>
                        <option
                            {{ old('status') == 'pending' || (isset($data->status) && $data->status == 'pending') ? 'selected' : '' }}
                            value="pending">Menunggu</option>
                        <option
                            {{ old('status') == 'reject' || (isset($data->status) && $data->status == 'reject') ? 'selected' : '' }}
                            value="reject">Ditolak</option>
                        <option
                            {{ old('status') == 'accept' || (isset($data->status) && $data->status == 'accept') ? 'selected' : '' }}
                            value="accept">Diterima</option>
                    </select>
                </div>

            </div>

            <!-- Role -->
            <div class="col-span-full sm:col-span-1">
                <label class="required">Role
                </label>

                <div class="">
                    @if ((isset($data->role) && $data->role == 'admin') || $role == 'admin')
                        <x-radio-buttom name="role" id="admin" label="Admin"
                            value="{{ old('role') ?? ($data?->role ?? '') }}" disabled="{{ $disabled }}" />
                    @endif
                    <x-radio-buttom name="role" id="eo" label="EO"
                        value="{{ old('role') ?? ($data?->role ?? '') }}" disabled="{{ $disabled }}" />
                    <x-radio-buttom name="role" id="user" label="User"
                        value="{{ old('role') ?? ($data?->role ?? '') }}" disabled="{{ $disabled }}" />
                </div>

            </div>


            <!-- Gender -->
            <div class="col-span-full sm:col-span-1">
                <label class="required">Jenis Kelamin
                </label>

                <div class="">
                    <x-radio-buttom name="gender" id="male" label="Laki=laki"
                        value="{{ old('gender') ?? ($data?->gender ?? '') }}" />
                    <x-radio-buttom name="gender" id="female" label="Perempuan"
                        value="{{ old('gender') ?? ($data?->gender ?? '') }}" />
                </div>

            </div>






            <!-- address -->
            <div class="col-span-full ">
                <label class="required" for="address">Alamat
                </label>
                <textarea name="address" id="address" rows="3" required>{{ old('address') ?? ($data?->address ?? '') }}</textarea>
            </div>

            <!-- bio -->
            <div class="col-span-full ">
                <label class="required" for="bio">Bio
                </label>
                <textarea name="bio" id="bio" rows="6" required>{{ old('bio') ?? ($data?->bio ?? '') }}</textarea>
            </div>


            <x-dashboard.preview-image src="{{ $data->photo['url'] }}" required="{{ !$data->photo['exists'] }}"
                name="photo" />



            <x-dashboard.submit />
        </x-form>
    </div>
@endsection
