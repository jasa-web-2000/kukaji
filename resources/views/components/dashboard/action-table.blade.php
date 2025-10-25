<div
    class="flex items-center gap-x-2.5  [&_a]:text-text-title-white [&_a]:rounded-md [&_a]:hover:opacity-80 [&_a]:p-1.5">
    <a href="{{ $edit }}" class="bg-yellow-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-3.5 stroke-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
        </svg>
    </a>
    <a href="#!" data-modal="modal-{{ $item->id }}" class="bg-red-500 open-modal">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-3.5 stroke-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
    </a>


    <!-- Modal -->
    <form id="modal-{{ $item->id }}" method="POST" action="{{ $destroy }}"
        class="z-111! fixed inset-0 bg-black/90 bg-opacity-50 px-4 items-center justify-center hidden">
        @method('DELETE')
        @csrf
        <div class="bg-background-primary  rounded-lg shadow-lg w-96 p-4 relative">
            <button type="button"
                class="close-modal absolute text-2xl top-0 right-3 text-gray-500 hover:text-gray-700">&times;</button>
            <h2 class="text-xl text-center font-bold mb-4">Hapus Data?</h2>
            <p class="text-center whitespace-normal">Apakah ada yakin menghapus data
                {{ $item->$column }}?</p>
            <div class="**:text-center mt-4">
                <x-dashboard.submit />
            </div>
        </div>
    </form>

</div>
