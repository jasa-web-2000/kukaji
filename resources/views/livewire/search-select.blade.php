@php
    // Trust Issue, Hosting Ga Bisa Baca
    $table = $table ?? '';
    $label = $label ?? '';
    $name = $name ?? '';
    $search = $search ?? '';
    $selectedId = $selectedId ?? '';
    $selectedName = $selectedName ?? '';
    $required = $required ?? true;
@endphp

{{-- @dd($selectedName, $selectedId) --}}

<div class="">
    <label @class(['required' => $required]) for="{{ $name }}-front">{{ $label }}
    </label>
    <div class="relative group search-dropdown-button">

        <input wire:model.live="search" id="{{ $name }}-front" placeholder="Pilih {{ $label }}"
            value="{{ old($name . '-front') ?? $selectedName }}" type="text" name="{{ $name }}-front"
            autocomplete="off" @required($required) class="input-front -z-1!" />

        <input id="{{ $name }}-back" value="{{ old($name) ?? $selectedId }}" type="hidden"
            name="{{ $name }}" autocomplete="off" class="hidden input-back " />
        <svg class="absolute top-1/2 -translate-y-1/2 right-0 size-5 opacity-85" xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>

        <div
            class="search-dropdown-menu z-2 absolute right-0 w-full mt-2 rounded-md shadow-lg bg-white border border-slate-300 p-1 space-y-1 [&_div]:block [&_div]:px-2 [&_div]:py-1 [&_div]:text-gray-700 [&_div]:hover:bg-gray-100 [&_div]:active:bg-blue-100 [&_div]:cursor-pointer [&_div]:text-[13px] [&_div]:rounded-md">
            @forelse ($data as $item)
                <div class="search-dropdown-menu-select" wire:loading.remove data-target="{{ $item['id'] }}">
                    {{ $item['name'] }}</div>
            @empty
                <div wire:loading.remove class="search-dropdown-menu-select" data-target="1">Tidak Diketahui</div>
            @endforelse
            <div wire:loading> Mencari...</div>
        </div>
    </div>

</div>
