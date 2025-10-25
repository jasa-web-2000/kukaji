<form action="{{ $action }}" enctype="multipart/form-data"
    class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 [&_label.required]:after:content-['*'] [&_label.required]:after:ml-0.5 [&_label.required]:after:text-danger [&_label]:line-clamp-1 [&_button]:overflow-hidden text-text-description-black "
    method="{{ $methodTop }}">
    @method($methodBottom)
    @csrf
    @if (!request()->is('dashboard/*'))
        <x-error-validation />
    @endif

    {{ $slot }}

</form>
