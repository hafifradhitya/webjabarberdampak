@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="display: flex; justify-content: center; gap: 8px; margin-top: 30px;">
        
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="padding: 8px 16px; border-radius: 8px; background: #f0f0f0; color: #aaa; cursor: not-allowed; font-weight: 500;">
                &laquo; Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" style="padding: 8px 16px; border-radius: 8px; background: var(--bg-white); color: var(--primary-green); border: 1px solid var(--primary-green); text-decoration: none; font-weight: 600; transition: all 0.3s;">
                &laquo; Sebelumnya
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="padding: 8px 16px; color: var(--text-muted);">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding: 8px 16px; border-radius: 8px; background: var(--primary-green); color: white; font-weight: 700;">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" style="padding: 8px 16px; border-radius: 8px; background: var(--bg-white); color: var(--text-muted); border: 1px solid rgba(0,0,0,0.1); text-decoration: none; transition: all 0.3s;">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" style="padding: 8px 16px; border-radius: 8px; background: var(--bg-white); color: var(--primary-green); border: 1px solid var(--primary-green); text-decoration: none; font-weight: 600; transition: all 0.3s;">
                Selanjutnya &raquo;
            </a>
        @else
            <span style="padding: 8px 16px; border-radius: 8px; background: #f0f0f0; color: #aaa; cursor: not-allowed; font-weight: 500;">
                Selanjutnya &raquo;
            </span>
        @endif
    </nav>
    <style>
        nav[role="navigation"] a:hover {
            background: var(--primary-green) !important;
            color: white !important;
        }
    </style>
@endif
