@extends('layouts.dashboard')

@section('content-dashboard')
    <div class="col-span-full!">
        <x-form action="{{ route('dashboard.reset-password.submit') }}">

            <!-- Old Password -->
            <div class="col-span-full">
                <x-input-password label="Password Lama" name="password-old" />
            </div>

            <!-- New Password -->
            <div class="col-span-full sm:col-span-1">
                <x-input-password label="Password Baru" name="password" />
            </div>

            <!-- Password Confirmation -->
            <div class="col-span-full sm:col-span-1">
                <x-input-password label="Password Konfirmasi" name="password_confirmation" />
            </div>

            <x-dashboard.submit />
        </x-form>
    </div>
@endsection
