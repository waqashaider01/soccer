@if ($paginator->hasPages())
    <style>
        .pagination {
            align-items: center;

        }
    </style>
    <ul class="pagination py-3 ">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled shadow mx-2 p-2" aria-disabled="true" aria-label="@lang('pagination.previous')"
                style="color
            black;border-radius:10px">
                <span class="fw-bold" aria-hidden="true">Previous</span>
            </li>
        @else
            <li class="shadow mx-2 p-2" style="border-radius:10px">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><span
                        class="fw-bold" style="border-radius:10px">Previous</span></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled " aria-disabled="true"><span class="text-light">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active bg-info shadow ms-3 px-2 p-2" aria-current="page" style="border-radius:10px">
                            <span class="fw-bold px-2">{{ $page }}</span>
                        </li>
                    @else
                        <li class="shadow ms-3 px-2 p-2" style="border-radius:10px"><a href="{{ $url }}"><span
                                    class="fw-bold px-2">{{ $page }}</span></a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="shadow mx-4 px-2 p-2" style="border-radius:10px">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span
                        class="fw-bold">Next</span></a>
            </li>
        @else
            <li class="disabled shadow mx-4 px-2 p-2" aria-disabled="true" aria-label="@lang('pagination.next')"
                style="border-radius:10px">
                <span class="fw-bold" aria-hidden="true">Next</span>
            </li>
        @endif
    </ul>
@endif
