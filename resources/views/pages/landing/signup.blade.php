@extends('layouts.landing')

@section('content-landing')
    <x-landing.auth :page="$page">
        <x-form action="{{ route('landing.signup.submit') }}">

            <!-- Nama Lengkap -->
            <div class="col-span-full">
                <label class="required" class="required" for="fullname">Nama Lengkap
                </label>
                <input id="fullname" value="{{ old('fullname') ?? '' }}" type="text" name="fullname" required
                    autocomplete="off" />
            </div>

            <!-- Username -->
            <div class="col-span-full">
                <label class="required" for="username">Username
                </label>
                <input id="username" value="{{ old('username') ?? '@' }}" type="text" name="username" required
                    autocomplete="off" />
            </div>

            <!-- Role -->
            <div class="col-span-full">
                <label class="required">Role
                </label>

                <div class="">
                    <x-radio-buttom name="role" id="eo" label="EO" value="" />
                    <x-radio-buttom name="role" id="user" label="User" value="" />
                </div>

            </div>

            <!-- Email -->
            <div class="col-span-full">
                <label class="required" for="email">Email
                </label>
                <input id="email" value="{{ old('email') ?? '' }}" type="email" name="email" required
                    autocomplete="off" />
            </div>

            <!-- Password -->
            <div class="col-span-full">
                <x-input-password label="Password" name="password" />
            </div>


            <x-landing.submit />

            <div class="w-full col-span-full text-xs text-right opacity-80">
                Sudah punya akun? <a href="{{ route('landing.login') }}">Login</a>
            </div>
        </x-form>

    </x-landing.auth>
@endsection
