<div class="flex items-center justify-between pb-4 gap-5">
    <select class="px-1 w-14"
        onchange="window.location.href='{{ url()->current() }}?{{ http_build_query(request()->except('perPage', 'page')) }}&page=1&perPage='+this.value">
        @foreach ([10, 50, 100] as $item)
            <option value="{{ $item }}" {{ request('perPage', 10) == $item ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>

    <div class="flex flex-nowrap justify-end items-center gap-3 max-w-sm w-full sm:w-80">
        <div class="relative">
            <input id="search" placeholder="{{ $search }}" type="text" value="{{ request('search') ?? '' }}"
                autocomplete="search" class="border rounded px-3 py-2 w-full placeholder:text-slate-400" />
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="absolute right-3 top-1/2 -translate-y-1/2 stroke-slate-400">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg> --}}
        </div>
        <button id="searchBtn" class="btn-secondary">Cari</button>
    </div>


</div>
