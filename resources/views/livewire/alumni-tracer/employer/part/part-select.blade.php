<div id="part-select">
    <div class="chat-searchbar mb-3 d-flex">
        <div class="form-group chat-search-data m-0 flex-grow-1 me-1">
            <input wire:model.debounce.800ms="search" type="text" class="form-control round" id="chat-search"
                placeholder="Search">
            <i class="ri-search-line"></i>
        </div>
        <button wire:click="create" class="btn btn-secondary">
            Create
        </button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Company</th>
                <th scope="col">Address</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employers as $employer)
            <tr id="row-{{ $employer->id }}">
                <th scope="row">
                    {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                </th>
                <td>
                    {{ $employer->company }}
                </td>
                <td>
                    {{ $employer->address }}
                </td>
                <td class="py-1">
                    <button wire:click="select_employer({{ $employer->id }})" class="btn btn-primary">
                        Select
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employers->links() }}
</div>