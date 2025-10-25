@extends('layouts.landing')

@section('content-landing')
    <x-landing.auth :page="$page">
        <x-form action="{{ route('landing.login.submit') }}">

            <!-- Email -->
            <div class="col-span-full">
                <label class="required" for="email">Email
                </label>
                <input id="email" value="{{ old('email') ?? '' }}" type="email" name="email" required
                    autocomplete="email" />
            </div>

            <!-- Password -->
            <div class="col-span-full">
                <x-input-password label="Password" name="password" />
            </div>


            <x-landing.submit />

            <div class="w-full col-span-full text-xs text-right opacity-80">
                Tidak punya akun? <a href="{{ route('landing.signup') }}">Signup</a>
            </div>
        </x-form>


    </x-landing.auth>
@endsection
