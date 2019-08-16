<?php
// config
$link_limit = 5;
?>
@if ($paginator->lastPage() > 1)
	<nav aria-label="Page navigation example" class="zvn_pagination">
        <ul class="pagination zvn-pagination">
			{{-- First Link --}}
            <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $paginator->url(1) }}">First</a>
			</li>
			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
				<li class="disabled">&laquo;</li>
			@else
				<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
			@endif

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php	
					$half_total_links = ceil($link_limit / 2);
					$from = $paginator->currentPage() - $half_total_links + 1;
					$to   = $from + $link_limit -1;
					if($from <= 1){
						$from = 1;
						$to = $link_limit;
					}
					if($to >= $paginator->lastPage()){
						$to = $paginator->lastPage();
						$from = (($to - $link_limit + 1) <= 1) ? 1 : ($to - $link_limit + 1);
					}
                ?>
                @if ($from <= $i && $i <= $to)
                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
			@endfor
			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
				<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
			@else
				<li class="disabled">&raquo;</li>
			@endif
			{{-- Last Link --}}
            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $paginator->url($paginator->lastPage()) }}">Last</a>
            </li>
        </ul>
    </div>
@endif