@props([
    'filter_btn',
])

<div {{ $attributes->class(['invoice-list-wrapper mt-0 mb-0']) }}>
    <div class="responsive-table mb-1">
        <div class="top display-flex">
            <div class="action-filters" style="flex-grow: 1;">
                <div class="dataTables_filter">
                    <label>
                        <input wire:model.debounce.500ms='search' type="search" name="" id="search" placeholder="Search">
                        <div {{ $filter_btn->attributes->class(['filter-btn']) }}>
                            @if ( $filter_btn->isNotEmpty() )
                                {{ $filter_btn }}
                            @else
                                <a class='dropdown-trigger btn waves-effect waves-light gradient-45deg-button-good border-round' href='#' data-target='btn-filter'>
                                    <span class="hide-on-small-only">Rows</span>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </a>
                                <ul id='btn-filter' class='dropdown-content'>
                                    <li><a wire:click="$set('show_row', 5)">5</a></li>
                                    <li><a wire:click="$set('show_row', 10)">10</a></li>
                                    <li><a wire:click="$set('show_row', 25)">25</a></li>
                                    <li><a wire:click="$set('show_row', 50)">50</a></li>
                                    <li><a wire:click="$set('show_row', 100)">100</a></li>
                                </ul>
                            @endif
                        </div>
                    </label>
                </div>
            </div>
            @if ( $slot->isNotEmpty() )
                <div class="actions action-btns display-flex align-items-center">  
                    <div class="invoice-create-btn">
                        {{ $slot }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
