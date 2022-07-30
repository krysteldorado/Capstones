<div class="bottom">
    @if ($paginator->hasPages())
        <span class="mt-2" style="font-size: 12px; float: left;">
            Showing {{ ($paginator->currentPage()*$paginator->perPage())>$paginator->total()? $paginator->total():$paginator->currentPage()*$paginator->perPage() }} of {{  $paginator->total() }} entries
        </span>
        <ul class="pagination mb-3" style="float: right;">
            @if ($paginator->currentPage()==1)
                <li class="disabled" wire:key="first-page-0"><a>Previous</a></li>
            @else
                <li class="waves-effect" wire:key="first-page-1">
                    <a wire:click="gotoPage(1)" wire:loading.attr="disabled">Previous</a>
                </li>
            @endif

            @if ($paginator->onFirstPage())
                <li class="disabled" wire:key="prev-page-0"><a><i class="material-icons">navigate_before</i></a></li>
            @else
                <li class="waves-effect" wire:key="prev-page-1">
                    <a wire:click="previousPage" wire:loading.attr="disabled"><i class="material-icons">navigate_before</i></a>
                </li>
            @endif

            @if ($paginator->lastPage()<$paginator->currentPage() && $paginator->currentPage()>1)
                <li class="waves-effect" wire:key="paginator-page-clickable-1">
                    <a wire:click="gotoPage(1)">
                        1
                    </a>
                </li>
            @else
                @if ($paginator->lastPage() > 0)
                    @php
                        $currentpage = $paginator->currentPage();
                        $firstpage = $currentpage;
                        $lastpage = $currentpage;
                        $numOfPagination = 3;
                    @endphp
                    @while ($firstpage != 1 || $lastpage != $paginator->lastPage())
                        @if ($numOfPagination <= 1)
                            @break
                        @endif
                        @if ($lastpage < $paginator->lastPage())
                            @php
                                $lastpage++;
                                $numOfPagination--;
                            @endphp
                        @endif
                        @if ($numOfPagination <= 1)
                            @break
                        @endif
                        @if ($firstpage > 1)
                            @php
                                $firstpage--;
                                $numOfPagination--;
                            @endphp
                        @endif
                    @endwhile
                @endif

                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page >= $firstpage && $page <= $lastpage)
                                @if ($page == $paginator->currentPage())
                                    <li class="active paginate_button current" wire:key="paginator-page-{{ $page }}">
                                        <a>
                                            {{ $page }}
                                        </a>
                                    </li>
                                @else
                                    <li class="waves-effect" wire:key="paginator-page-clickable-{{ $page }}">
                                        <a wire:click="gotoPage({{ $page }})">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif

            @if ($paginator->hasMorePages())
                <li class="waves-effect" wire:key="next-page-1">
                    <a wire:click="nextPage" wire:loading.attr="disabled"><i class="material-icons">navigate_next</i></a>
                </li>
            @else
                <li class="disabled" wire:key="next-page-0">
                    <a><i class="material-icons">navigate_next</i></a>
                </li>
            @endif

            @if ($paginator->lastPage()!=1 && $paginator->lastPage()!=$paginator->currentPage())
                <li class="waves-effect" wire:key="last-page-1">
                    <a wire:click="gotoPage({{ $paginator->lastPage() }})" wire:loading.attr="disabled">Next</a>
                </li>
            @else
                <li class="disabled" wire:key="last-page-0">
                    <a>Next</a>
                </li>
            @endif
        </ul>
    @endif
</div>
