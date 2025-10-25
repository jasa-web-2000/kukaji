@extends('app')

@section('content')
    <div class="h-dvh">
        @include('components.dashboard.nav')
        <div class="h-full flex overflow-hidden bg-background-primary">
            @include('components.dashboard.aside')
            <div class="hover:cursor-pointer bg-gray-900 opacity-50 hidden lg:hidden! fixed inset-0 z-10 lg:-z-10"
                id="sidebarBackdrop"></div>
            <div id="main-content"
                class="mt-14 h-full flex flex-col justify-between w-full bg-background-secondary/20 relative overflow-y-auto lg:ml-64">
                <main class="dashboard">
                    <div class="relative">
                        <div class="hero-gradient"></div>
                        <div class="relative pt-10 lg:pt-14 pb-7 lg:p-8 px-4">
                            <h1 class="text-text-title-white text-center text-3xl mb-2">{{ $page }}</h1>
                        </div>
                    </div>
                    {{-- <div class="mt-20"></div> --}}
                    @if ($errors->any())
                        <div class="p-5 md:p-7 xl:p-9 px-4 md:px-6 xl:px-8 pb-0!">
                            <x-error-validation />
                        </div>
                    @endif
                    <div
                        class="p-5 md:p-7 xl:p-9 px-4 md:px-6 xl:px-8  w-full grid grid-cols-12 gap-6 md:gap-7 xl:gap-8 *:col-span-12 *:md:col-span-6 *:bg-white *:border *:border-gray-200 *:rounded-2xl *:p-4 *:sm:p-5 *:xl:p-6">
                        @yield('content-dashboard')
                    </div>
                </main>
                @include('components.dashboard.footer')
            </div>

        </div>
    </div>
@endsection
