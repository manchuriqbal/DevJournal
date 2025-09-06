@if ($paginator->hasPages())
    <div class="mt-4 flex justify-between items-center w-full">
        <div class="text-sm text-gray-700">
            Showing
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            to <span class="font-medium">{{ $paginator->lastItem() }}</span>
            of <span class="font-medium">{{ $paginator->total() }}</span> results
        </div>

        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500">
                    <span class="sr-only">Previous</span>
                    <i class="fas fa-chevron-left h-5 w-5"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <i class="fas fa-chevron-left h-5 w-5"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-blue-600 text-sm font-medium text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right h-5 w-5"></i>
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500">
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right h-5 w-5"></i>
                </span>
            @endif
        </nav>
    </div>
@endif