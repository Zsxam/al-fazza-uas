@if ($paginator->hasPages())
    <nav style="display: flex; justify-content: center; align-items: center; gap: 6px; margin-top: 20px; flex-wrap: wrap;">

        {{-- Tombol Sebelumnya --}}
        @if ($paginator->onFirstPage())
            <span style="padding: 7px 14px; background: #f0ece8; color: #bbb; border-radius: 6px; cursor: not-allowed; font-size: 13px;">
                &laquo; Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               style="padding: 7px 14px; background: #4a3b32; color: white; border-radius: 6px; text-decoration: none; font-size: 13px;">
                &laquo; Sebelumnya
            </a>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span style="padding: 7px 10px; color: #aaa; font-size: 13px;">{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding: 7px 12px; background: #a67c52; color: white; border-radius: 6px; font-weight: bold; font-size: 13px;">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           style="padding: 7px 12px; background: white; color: #4a3b32; border: 1px solid #d4c5b8; border-radius: 6px; text-decoration: none; font-size: 13px;">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Selanjutnya --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               style="padding: 7px 14px; background: #4a3b32; color: white; border-radius: 6px; text-decoration: none; font-size: 13px;">
                Selanjutnya &raquo;
            </a>
        @else
            <span style="padding: 7px 14px; background: #f0ece8; color: #bbb; border-radius: 6px; cursor: not-allowed; font-size: 13px;">
                Selanjutnya &raquo;
            </span>
        @endif

    </nav>

    {{-- Info halaman --}}
    <p style="text-align: center; color: #888; font-size: 12px; margin-top: 8px;">
        Menampilkan {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} dari {{ $paginator->total() }} data
    </p>
@endif
