<nav class="w-full flex flex-col gap-4 md:flex-row md:items-center md:gap-x-7 lg:gap-x-10">

    @foreach (menu() as $item)
        <a class="{{ $item[0] == request()->url() ? 'text-primary' : '' }} " href="{{ $item[0] }}"
            title="{{ $item[1] }}">{{ $item[1] }}</a>
    @endforeach

    <a href="{{ Auth::check() ? route('dashboard.index') : route('landing.login') }}"title="login" class="btn-primary">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />

        </svg>

        {{ Auth::check() ? 'Dashboard' : 'Login' }}
    </a>
</nav>
