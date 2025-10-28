<div class="">
    <label @class(['required' => $required]) for="thumbnail" class="">Thumbnail/Foto</label>
    <div class="relative mt-1 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
        <div class="text-center group">
            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="file-upload"
                    class="cursor-pointer rounded-md bg-white font-semibold text-mine focus-within:outline-none focus-within:ring-2 focus-within:ring-mine focus-within:ring-offset-2 hover:text-mine">
                    <span>Unggah gambar</span>
                    <input onchange="displayImage(this)" @required($required) id="thumbnail" accept="image/*"
                        name="{{ $name }}" type="file"
                        class="opacity-0 absolute inset-0 h-full! hover:cursor-pointer">
                </label>
                <p class="pl-1">batas 10mb</p>
            </div>
            <p class="text-xs leading-5 text-gray-600 uppercase">jpeg, png, jpg, gif, jfif, <span
                    class="lowercase">atau</span> webp</p>
        </div>
    </div>
</div>

<div class="">
    <label @class(['required' => $required])>Preview Thumbnail/Foto</label>
    <div
        class="relative mt-1 overflow-hidden flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
        <div class="text-center group">
            <svg class="mx-auto opacity-0 h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="file-upload"
                    class="cursor-pointer rounded-md bg-white font-semibold text-mine focus-within:outline-none focus-within:ring-2 focus-within:ring-mine focus-within:ring-offset-2 hover:text-mine">
                    <span class="opacity-0">Unggah gambar</span>
                    <img class="border border-slate-200 h-full aspect-square absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                        id="preview" src="{{ $src }}" alt="preview">
                </label>
                <p class="pl-1 opacity-0">batas 10mb</p>
            </div>
            <p class="text-xs leading-5 text-gray-600 uppercase opacity-0">jpeg, png, jpg, gif, jfif, <span
                    class="lowercase">atau</span> webp</p>
        </div>
    </div>
</div>

<script>
    // Preview Image
    function displayImage(e) {
        let preview = document.getElementById('preview');
        const reader = new FileReader();
        reader.onloadend = function() {
            preview.classList.add('!block');
            preview.src = reader.result;
        }

        if (e.files[0]) {
            reader.readAsDataURL(e.files[0]);
        }
    }

    {{ old('thumbnail') || old('photo') ? 'displayImage()' : '' }}
</script>
