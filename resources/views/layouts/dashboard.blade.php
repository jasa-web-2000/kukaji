@extends('app')

@section('content')
    <div class="">
        @include('components.dashboard.nav')
        <div class="flex overflow-hidden bg-background-primary pt-16 lg:pt-[3.3rem]">
            @include('components.dashboard.aside')
            <div class="hover:cursor-pointer bg-gray-900 opacity-50 hidden lg:hidden! fixed inset-0 z-10 lg:-z-10"
                id="sidebarBackdrop"></div>
            <div id="main-content" class="h-full w-full bg-background-secondary relative overflow-y-auto lg:ml-64">
                <main class="dashboard">
                    <div class="relative">
                        <div class="hero-gradient"></div>
                        <div class="relative pt-10 lg:pt-14 pb-7 lg:p-8 px-4">
                            <h1 class="text-text-title-white text-center text-3xl">{{ $page }}</h1>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="pt-6 w-full px-4 pb-2">
                            <x-error-validation />
                        </div>
                    @endif
                    <div
                        class="pt-5 px-4 w-full grid grid-cols-12 gap-4 *:col-span-12 *:md:col-span-6 *:bg-white *:shadow *:rounded-lg *:p-4 *:sm:p-6 *:xl:p-8">
                        @yield('content-dashboard')
                    </div>
                </main>
                @include('components.dashboard.footer')
            </div>

        </div>
    </div>
@endsection
