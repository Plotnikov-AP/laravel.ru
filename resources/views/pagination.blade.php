<div class="paginate">
    @if ($paginator->hasPages())
        <span>Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}</span>
        @if ($paginator->onFirstPage())
            В начало&nbsp;
        @else
            <a href="{{ Request::url() }}">В начало</a>&nbsp;
            <a href="{{ $paginator->previousPageUrl() }}">&laquo;</a>&nbsp;
        @endif
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page=>$url)
                    @if ($page==$paginator->currentPage())
                        {{ $page }}&nbsp;
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>&nbsp;
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->onLastPage())
            В конец
        @else
            <a href="{{ $paginator->nextPageUrl() }}">&raquo;</a>&nbsp;
            <a href="{{ Request::url().'?page='.$paginator->lastPage() }}">В конец</a>
        @endif
    @endif
</div>