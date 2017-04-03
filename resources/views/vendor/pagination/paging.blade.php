@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}

        <?php
            if($paginator->lastPage()>=5){
                if ($paginator->currentPage()>2)
                    $cal=$paginator->currentPage()-2;
                else
                    $cal=1;

                if($paginator->currentPage()==$paginator->lastPage())
                    $cal=$paginator->currentPage()-4;
                else
                    if($paginator->currentPage()+2>$paginator->lastPage())
                        $cal=$paginator->currentPage()-3;
            }
            else
                $cal=1;
        ?>

        @for($i=$cal;$i<$cal+5 && $i<=$paginator->lastPage();$i++)
            @if ($i == $paginator->currentPage())
                <li class="active"><span>{{ $i }}</span></li>
            @else
                <li><a href="{{ $paginator->url($i)}}">{{ $i }}</a></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
        @endif
    </ul>
@endif
