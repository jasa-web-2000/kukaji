<div class="pagination flex flex-col items-center justify-center border-t border-t-slate-200 py-5 space-y-3">
    <div class="space-y-3.5 text-sm text-center text-muted-foreground">
        @php
            $totalRow = ($pagination->currentPage() - 1) * 10 + 1;
        @endphp
        <p>{{ $totalRow }} - {{ $totalRow + $pagination->count() - 1 }} dari {{ $pagination->total() }} baris.</p>
        <p>Halaman {{ $pagination->currentPage() }} dari {{ $pagination->lastPage() }}.</p>
    </div>


    <div class="">
        <a href="{{ $pagination->url(1) }}">{{ '<<' }}</a>
        <a href="{{ $pagination->previousPageUrl() ?? '#' }}">{{ '<' }}</a>
        <a href="{{ $pagination->nextPageUrl() ?? '#' }}">{{ '>' }}</a>
        <a href="{{ $pagination->url($pagination->lastPage()) }}">{{ '>>' }}</a>
    </div>
</div>
