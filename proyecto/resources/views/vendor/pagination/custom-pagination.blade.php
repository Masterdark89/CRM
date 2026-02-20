@if ($paginator->hasPages())
<div style="display: flex; gap: 0.3rem; align-items: center; flex-wrap: wrap; margin: 0.5rem 0 0 0; font-size: 0.7rem;">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span style="padding: 0.25rem 0.4rem; color: #ccc; border: 1px solid #e0e0e0; border-radius: 0.2rem; background: #f9f9f9;">‹</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="padding: 0.25rem 0.4rem; color: #e85692; border: 1px solid #e0e0e0; border-radius: 0.2rem; text-decoration: none; background: #fff; cursor: pointer; display: inline-block;">‹</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span style="padding: 0.25rem 0.4rem; color: #999;">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span style="padding: 0.25rem 0.4rem; background: #ff6fa6; color: #fff; border: 1px solid #ff6fa6; border-radius: 0.2rem; font-weight: 600;">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" style="padding: 0.25rem 0.4rem; color: #e85692; border: 1px solid #e0e0e0; border-radius: 0.2rem; text-decoration: none; background: #fff; cursor: pointer; display: inline-block;">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="padding: 0.25rem 0.4rem; color: #e85692; border: 1px solid #e0e0e0; border-radius: 0.2rem; text-decoration: none; background: #fff; cursor: pointer; display: inline-block;">›</a>
    @else
        <span style="padding: 0.25rem 0.4rem; color: #ccc; border: 1px solid #e0e0e0; border-radius: 0.2rem; background: #f9f9f9;">›</span>
    @endif
</div>
@endif
