@if ($errors->any())
    <div class="bg-primary/15 rounded-md border border-slate-400/90 text-sm p-5 col-span-full">
        <ul class="{{ $errors->count() > 1 && 'list-decimal pl-5' }}">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
