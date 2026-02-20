@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="margin: 0; padding: 0;">
        <ul class="pagination pagination-compact" style="margin: 0; gap: 0.2rem;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" style="margin: 0;" aria-disabled="true">
                    <span class="page-link" style="padding: 0.3rem 0.5rem; font-size: 0.7rem; height: auto;">‹</span>
                </li>
            @else
                <li class="page-item" style="margin: 0;">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="padding: 0.3rem 0.5rem; font-size: 0.7rem; height: auto;">‹</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" style="margin: 0;"><span class="page-link" style="padding: 0.3rem 0.5rem; font-size: 0.7rem; height: auto;">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" style="margin: 0;" aria-current="page"><span class="page-link" style="padding: 0.3rem 0.5rem; font-size: 0.75rem; height: auto; background-color: var(--pink, #ff6fa6); border-color: var(--pink, #ff6fa6);">{{ $page }}</span></li>
                        @else
                            <li class="page-item" style="margin: 0;"><a class="page-link" href="{{ $url }}" style="padding: 0.3rem 0.5rem; font-size: 0.75rem; height: auto;">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" style="margin: 0;">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="padding: 0.3rem 0.5rem; font-size: 0.7rem; height: auto;">›</a>
                </li>
            @else
                <li class="page-item disabled" style="margin: 0;" aria-disabled="true">
                    <span class="page-link" style="padding: 0.3rem 0.5rem; font-size: 0.7rem; height: auto;">›</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
