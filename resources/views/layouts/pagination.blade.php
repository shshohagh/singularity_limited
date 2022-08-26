@if ($paginator->hasPages())
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
                @if(!$paginator->onFirstPage())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">←</a></li>
                @endif

                @foreach($elements as $element)
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item"><span aria-current="page" class="page-link current">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endforeach

                @if($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">→</a></li>
                @endif
            </ul>
        </nav>
@endif