<div class="group relative flex items-center ">
    <span>{{ $name }}</span>
    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" class="ml-3 -rotate-90" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="bottom-0.5 relative">
        <polyline points="6 9 12 15 18 9"></polyline>
    </svg>
    <div class="pt-5 flex invisible flex-col  absolute group-hover:visible!  top-0 left-0 ">
        <div
            class="rounded-md text-sm bg-white py-1 shadow [&_a]:px-4 [&_a]:py-2 **:block [&_a]:text-slate-600 [&_a]:hover:text-primary focus:[&_a]:outline-none [&_a]:w-full [&_a]:text-left">

            @foreach ($list as $item)
                <a class="capitalize min-w-28 px-4 py-2 hover:text-primary! no-underline {{ request()->query('role', 'all') == $item ? 'text-primary!' : '' }} "
                    href="{{ route('dashboard.user.index', array_merge(request()->query(), [$param => $item == 'all' ? '' : $item])) }}">
                    {{ $item }}
                </a>
            @endforeach
        </div>
    </div>
</div>
