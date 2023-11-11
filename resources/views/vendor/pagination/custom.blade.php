@if ($paginator->hasPages())
<div class="pagination-area">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <a href="#" disabled aria-disabled="true" aria-label="@lang('pagination.previous')" class="prev page-numbers">
        <i class="bx bx-chevron-left"></i>
    </a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="prev page-numbers" rel="prev" aria-label="@lang('pagination.prev')">
        <i class="bx bx-chevron-left"></i>
    </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <span class="page-numbers">{{ $element }}</span>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="page-numbers current" aria-current="page">{{ $page }}</span>
    @else
    <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers" rel="next" aria-label="@lang('pagination.next')">
        <i class="bx bx-chevron-right"></i>
    </a>
    @else
    <a href="#" class="next page-numbers" disabled aria-disabled="true" aria-label="@lang('pagination.next')">
        <i class="bx bx-chevron-right"></i>
    </a>
    @endif
</div>
@endif