@if ($paginator->hasPages())
<nav class="flex items-center justify-center mt-5 sm:mt-0" aria-label="Pagination">
    {{-- Tombol "First" --}}
    @if ($paginator->onFirstPage())
    <button type="button"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="First" disabled>
        <span class="sr-only">First</span>
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="M17 18l-6-6 6-6"></path>
            <path d="M7 18l-6-6 6-6"></path>
        </svg>
    </button>
    @else
    <a href="{{ $paginator->url(1) }}"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="First">
        <span class="sr-only">First</span>
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="M17 18l-6-6 6-6"></path>
            <path d="M7 18l-6-6 6-6"></path>
        </svg>
    </a>
    @endif

    {{-- Tombol "Previous" --}}
    @if ($paginator->onFirstPage())
    <button type="button"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="Previous" disabled>
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="m15 18-6-6 6-6"></path>
        </svg>
        <span class="sr-only">Previous</span>
    </button>
    @else
    <a href="{{ $paginator->previousPageUrl() }}"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="Previous">
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="m15 18-6-6 6-6"></path>
        </svg>
        <span class="sr-only">Previous</span>
    </a>
    @endif

    {{-- Nomor Halaman --}}
    <div class="flex items-center gap-x-1">
        @foreach ($paginator->links()->elements as $element)
        {{-- Tanda "..." --}}
        @if (is_string($element))
        <span class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800">{{ $element }}</span>
        @endif

        {{-- Link Halaman --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <button type="button"
            class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
            aria-current="page">{{ $page }}</button>
        @else
        <a href="{{ $url }}"
            class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800">{{
            $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>

    {{-- Tombol "Next" --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="Next">
        <span class="sr-only">Next</span>
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
    </a>
    @else
    <button type="button"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="Next" disabled>
        <span class="sr-only">Next</span>
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
    </button>
    @endif

    {{-- Tombol "Last" --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->url($paginator->lastPage()) }}"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="Last">
        <span class="sr-only">Last</span>
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="M7 6l6 6-6 6"></path>
            <path d="M17 6l6 6-6 6"></path>
        </svg>
    </a>
    @else
    <button type="button"
        class="min-h-[38px] min-w-[38px] py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border hover:border-cyan-800 disabled:opacity-50 disabled:cursor-not-allowed text-cyan-800"
        aria-label="Last" disabled>
        <span class="sr-only">Last</span>
        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor">
            <path d="M7 6l6 6-6 6"></path>
            <path d="M17 6l6 6-6 6"></path>
        </svg>
    </button>
    @endif
</nav>
@endif
