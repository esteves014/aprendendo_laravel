@if ($paginator->haspages())
    <nav aria-label="paginação">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a href="#" class="page-link"><span aria-hidden="true">&laquo;</span></a></li>
            @else
                <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"><span aria-hidden="true">&laquo;</span></a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item"><a class="page-link active" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><span aria-hidden="true">&raquo;</span></a></li>
            @else
                <li class="page-item disabled"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><span aria-hidden="true">&raquo;</span></a></li>
            @endif
        </ul>
    </nav>
@endif