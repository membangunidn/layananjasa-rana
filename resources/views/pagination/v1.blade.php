@if ($paginator->hasPages())
    <ul class="pagination pagination pull-right">
        {{-- Previous Page Link --}}
        @if($paginator->currentPage() > 1)
            <a href="{{ $paginator->url(1).session()->get('urlsearchparam') }}" class="btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-double-arrow-back icon-xs"></i>
            </a>
        @else
            <a class="disabled btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-double-arrow-back icon-xs"></i>
            </a>
        @endif


        @if ($paginator->onFirstPage())
            <a class="disabled btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-arrow-back icon-xs"></i>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl().session()->get('urlsearchparam') }}" class="btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-arrow-back icon-xs"></i>
            </a>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 3 && $i <= $paginator->currentPage() + 3)

                @if ($i == $paginator->currentPage())
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-warning active mr-2 my-1">{{ $i }}</a>
                @elseif ($i != $paginator->currentPage())
                    <a href="{{ $paginator->url($i).session()->get('urlsearchparam') }}" class="btn btn-icon btn-sm border-0 btn-hover-warning mr-2 my-1">{{$i}}</a>
                @endif
               
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-arrow-next icon-xs"></i>
            </a>
        @else
            <a class="disabled btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-arrow-next icon-xs"></i>
            </a>
            <a class="disabled btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-double-arrow-next icon-xs"></i>
            </a>
        @endif

        {{-- last page --}}
        @if($paginator->currentPage() < $paginator->lastPage())
            <a href="{{ $paginator->url($paginator->lastPage()).session()->get('urlsearchparam') }}" class="btn btn-icon btn-sm btn-light-warning mr-2 my-1">
                <i class="ki ki-bold-double-arrow-next icon-xs"></i>
            </a>
        @endif
    </ul>
@endif