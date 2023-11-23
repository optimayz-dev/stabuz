@if ($paginator->hasPages())
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <button class="pagination-btn" id="pagination-prev" disabled>
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M26.6066 26.6066C24.5088 28.7044 21.8361 30.133 18.9264 30.7118C16.0166 31.2906 13.0006 30.9935 10.2597 29.8582C7.51886 28.7229 5.17618 26.8003 3.52796 24.3336C1.87973 21.8668 1 18.9667 1 16C1 13.0333 1.87973 10.1332 3.52796 7.66645C5.17618 5.19971 7.51886 3.27712 10.2597 2.14181C13.0006 1.00649 16.0166 0.709443 18.9264 1.28822C21.8361 1.867 24.5088 3.29561 26.6066 5.3934"
                        stroke-width="2" stroke-linecap="round"></path>
                    <path d="M17.5 8.5L11.5 16M11.5 16L17.5 23.5M11.5 16H29.5" stroke-width="2"
                          stroke-linecap="round"></path>
                </svg>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">
                <button class="pagination-btn" id="pagination-prev">
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M26.6066 26.6066C24.5088 28.7044 21.8361 30.133 18.9264 30.7118C16.0166 31.2906 13.0006 30.9935 10.2597 29.8582C7.51886 28.7229 5.17618 26.8003 3.52796 24.3336C1.87973 21.8668 1 18.9667 1 16C1 13.0333 1.87973 10.1332 3.52796 7.66645C5.17618 5.19971 7.51886 3.27712 10.2597 2.14181C13.0006 1.00649 16.0166 0.709443 18.9264 1.28822C21.8361 1.867 24.5088 3.29561 26.6066 5.3934"
                            stroke-width="2" stroke-linecap="round"></path>
                        <path d="M17.5 8.5L11.5 16M11.5 16L17.5 23.5M11.5 16H29.5" stroke-width="2"
                              stroke-linecap="round"></path>
                    </svg>
                </button>
            </a>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <a href="/">{{ $element }}</a>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="active" disabled>{{ $page }}</a>

                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                        @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
                            <a href="#" disabled>...</a>
                        @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <button class="pagination-btn" id="pagination-next">
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934"
                            stroke-width="2" stroke-linecap="round"></path>
                        <path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2"
                              stroke-linecap="round"></path>
                    </svg>
                </button>
            </a>
        @else
            <button class="pagination-btn" id="pagination-next" disabled>
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934"
                        stroke-width="2" stroke-linecap="round"></path>
                    <path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2"
                          stroke-linecap="round"></path>
                </svg>
            </button>
        @endif
    </div>
@endif
