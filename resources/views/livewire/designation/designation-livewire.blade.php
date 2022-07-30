<section class="section mt-2">
    <x-m.page.search>
        <x-slot name="filter_btn"></x-slot>

        @can('create', \App\Models\Designation::class)
            <x-m.page.search-button wire:click="$emit('create')">
                <i class="material-icons">add</i>
                <span class="hide-on-small-only">Create Designation</span>
            </x-m.page.search-button>
        @endcan
    </x-m.page.search>

    <x-m.table>
        <thead>
            <tr>
                <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                <th style="width: 70%;">Designation</th>
                <th style="width: 300%;">Access</th>
                <th style="width: 80px; min-width: 80px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($designations as $designation)  
                <tr id="row-{{ $designation->id }}">
                    <td class="center-align">
                        {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                    </td>
                    <td>
                        {{ $designation->designation }}
                    </td>
                    <td>
                        {{ $designation->access }}
                    </td>
                    <td class="text-nowrap center-align">
                        @can('update', $designation)
                            <x-m.table.button wire:click="$emit('edit', {{ $designation->id }})" class="mr-4" data-tooltip="Edit">
                                <i class="material-icons">edit</i>
                            </x-m.table.button>
                        @endcan

                        @can('delete', $designation)
                            <x-m.table.button onclick="delete_designation({{ $designation->id }})" data-tooltip="Delete">
                                <i class="material-icons">delete</i>
                            </x-m.table.button>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">
                        &nbsp;
                    </td>
                </tr>
            @endforelse
        </tbody>

        <x-slot name="bottom">
            {{ $designations->links() }}
        </x-slot>
    </x-m.table>

    <div wire:ignore>
        @livewire('designation.designation-form-livewire', key('designation-form-livewire'))
    </div>
    
    <script>
        function delete_designation(designation_id) {
            swal({
				title: 'Delete the record?',
				text: 'You will not be able to recover it',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
                buttons: ['Cancel', 'Yes, Delete It'],
            }).then((agree) => {
				if (agree) {
                    @this.delete(designation_id);
				}
            });
        }
    </script>
</section>
