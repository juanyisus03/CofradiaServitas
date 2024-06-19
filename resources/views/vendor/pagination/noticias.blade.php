@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-accent bg-background border border-gray-300 cursor-default leading-5 rounded-md ">
                    {!! __('pagination.previous') !!}
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-texto bg-background border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 ">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-texto bg-background border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-accent bg-background border border-gray-300 cursor-default leading-5 rounded-md ">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="ml-4 flex-shrink-0">
            <span class="relative z-0 inline-flex rounded-md shadow-sm border border-primary">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-accent bg-background cursor-default rounded-l-md leading-5" aria-hidden="true">
                            {!! __('pagination.previous') !!}
                        </span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-texto bg-background cursor-default rounded-l-md leading-5">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-texto bg-background cursor-default rounded-l-md leading-5">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-accent bg-background cursor-default rounded-l-md leading-5" aria-hidden="true">
                            {!! __('pagination.next') !!}
                        </span>
                    </span>
                @endif
            </span>
        </div>
    </nav>
@endif
