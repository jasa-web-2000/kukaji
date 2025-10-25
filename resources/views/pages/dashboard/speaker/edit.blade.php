@extends('layouts.dashboard')
@php
    $id = Auth::user()->id;
    $role = Auth::user()->role;
    $disabled = isset($data->role) && ($data->id == $id || $role != 'admin');
@endphp


@section('content-dashboard')
    <div class="col-span-full!">
        <x-form action="{{ route('dashboard.speaker.update', ['speaker' => $data]) }}" methodTop="POST" methodBottom="PUT">

            <!-- Nama Tema -->
            <div class="col-span-full">
                <label class="required" class="required" for="name">Nama Tema
                </label>
                <input id="name" value="{{ old('name') ?? ($data->name ?? '') }}" type="text" name="name" required />
            </div>

            <x-dashboard.submit />
        </x-form>

    </div>
@endsection
