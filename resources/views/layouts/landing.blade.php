@extends('app')

@section('content')
    <x-landing.header />

    @includeWhen(Route::currentRouteName() !== 'landing.index', 'components.landing.hero')

    <main class="landing">
        @yield('content-landing')
    </main>
    <x-landing.footer />
@endsection
