<div class=" group relative flex items-center">
    <span>{{ $name }}</span>
    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" class="ml-3 -rotate-90" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="bottom-0.5 relative">
        <polyline points="6 9 12 15 18 9"></polyline>
    </svg>
    <div
        class="bg-white rounded-md border border-slate-300 flex invisible flex-col -translate-y-2.5 group-hover:visible! group-hover:translate-y-6 transform duration-200 transition-all absolute top-0 left-0 ">
        @foreach ($list as $item)
            <a class="capitalize odd:bg-slate-50 min-w-28 px-4 py-2 hover:text-primary! no-underline text-text-description-black!"
                href="{{ route('dashboard.user.index', array_merge(request()->query(), [$param => $item == 'all' ? '' : $item])) }}">
                {{ $item }}
            </a>
        @endforeach
    </div>
</div>
