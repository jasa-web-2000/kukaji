@extends('layouts.dashboard')

@section('content-dashboard')
    <div class="col-span-full!">
        <x-form action="{{ route('dashboard.event.store') }}">

            <!-- Nama Lengkap -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" class="required" for="fullname">Nama Lengkap
                </label>
                <input id="fullname" value="{{ old('fullname') ?? '' }}" type="text" name="fullname" required />
            </div>

            <!-- Username -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="username">Username
                </label>
                <input id="username" value="{{ old('username') ?? '@' }}" type="text" name="username" required />
            </div>

            <!-- Email -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="email">Email
                </label>
                <input id="email" value="{{ old('email') ?? '' }}" type="email" name="email" required />
            </div>

            <!-- Password -->
            <div class="col-span-full sm:col-span-1">
                <x-input-password label="Password" name="password" />
            </div>

            <!-- Phone -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="phone">Telephone (+ kode negara)
                </label>
                <input id="phone" value="{{ old('phone') ?? '62' }}" type="number" name="phone" required />
            </div>

            <!-- birthdate -->
            <div class="col-span-full sm:col-span-1">
                <label class="required" for="birthdate">Tanggal Lahir
                </label>
                <input id="birthdate" value="{{ dateFormat(old('birthdate')) ?? '' }}" type="date" name="birthdate"
                    required />
            </div>

            <!-- Status -->
            <div class="col-span-full">
                <label class="required">Status
                </label>

                <div class="">
                    <select name="status" id="status">
                        <option>Pilih Status</option>
                        <option @selected(old('status') == 'pending') value="pending">Menunggu</option>
                        <option @selected(old('status') == 'reject') value="reject">Ditolak</option>
                        <option @selected(old('status') == 'accept') value="accept">Diterima</option>
                    </select>
                </div>

            </div>

            <!-- Role -->
            <div class="col-span-full sm:col-span-1">
                <label class="required">Role
                </label>

                <div class="">
                    <x-radio-buttom name="role" id="admin" label="Admin" value="{{ old('role') ?? '' }}" />
                    <x-radio-buttom name="role" id="eo" label="EO" value="{{ old('role') ?? '' }}" />
                    <x-radio-buttom name="role" id="user" label="User" value="{{ old('role') ?? '' }}" />
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

            <x-dashboard.preview-image name="photo" />

            <x-dashboard.submit />
        </x-form>
    </div>
@endsection
