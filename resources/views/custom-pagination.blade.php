@if ($paginator->hasPages())
    <div class="pagination-no-bx">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!-- Show ellipsis or other text if needed -->
            <div class="pagination-no">
                &hellip;
            </div>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="pagination-no">
                    {{ $element }}
                </div>
            @endif

            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page === $paginator->currentPage())
                        <div class="pagination-no active">
                            {{ $page }}
                        </div>
                    @else
                        <div class="pagination-no">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <!-- Show ellipsis or other text if needed -->
            <div class="pagination-no">
                &hellip;
            </div>
        @endif
    </div>
@endif
