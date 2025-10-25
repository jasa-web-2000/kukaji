@extends('layouts.dashboard')

@section('content-dashboard')
    <div class="col-span-full!">
        <x-form action="{{ route('dashboard.speaker.store') }}">

            <!-- Nama Tema -->
            <div class="col-span-full">
                <label class="required" class="required" for="name">Nama Tema
                </label>
                <input id="name" value="{{ old('name') ?? '' }}" type="text" name="name" required />
            </div>

            <x-dashboard.submit />
        </x-form>
    </div>
@endsection
