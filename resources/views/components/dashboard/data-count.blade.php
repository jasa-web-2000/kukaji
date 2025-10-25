<div class="flex h-12 w-12 items-center justify-center rounded-xl simple-gradient">
    <svg class="stroke-1 stroke-white" width="24" height="24" viewBox="0 0 24 24" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="{{ $icon }}" fill=""></path>
    </svg>
</div>
<div class="mt-5 flex items-end justify-between">
    <div>
        <span class="text-sm text-gray-500 ">{{ $title }}</span>
        <h2 class="mt-2 font-bold text-text-title-black ">
            {{ $count }}
        </h2>
    </div>

    <span
        class="flex items-center gap-1 rounded-full bg-green-50 py-0.5 pl-2 pr-2.5 text-sm font-semibold text-success-600 ">
        <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z"
                fill=""></path>
        </svg>

        {{ $percent }}%
    </span>
</div>
