<section class="section mt-2">
    <x-m.page.search>
        <x-slot name="filter_btn"></x-slot>

        @can('create', \App\Models\Campus::class)
            <x-m.page.search-button wire:click="$emit('create')">
                <i class="material-icons">add</i>
                <span class="hide-on-small-only">Create Campus</span>
            </x-m.page.search-button>
        @endcan
    </x-m.page.search>

    <x-m.table>
        <thead>
            <tr>
                <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                <th style="width: 50%;">Campus</th>
                <th style="width: 50%;">Address</th>
                <th style="width: 80px; min-width: 80px"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($campuses as $campus)  
                <tr id="campus-row-{{ $campus->id }}">
                    <td class="center-align">
                        {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                    </td>
                    <td>
                        {{ $campus->campus }}
                    </td>
                    <td>
                        {{ $campus->address }}
                    </td>
                    <td class="text-nowrap center-align">
                        @can('update', $campus)
                            <x-m.table.button wire:click="$emit('edit', {{ $campus->id }})" class="mr-4" data-tooltip="Edit">
                                <i class="material-icons">edit</i>
                            </x-m.table.button>
                        @endcan

                        @can('delete', $campus)
                            <x-m.table.button onclick="delete_campus({{ $campus->id }})" data-tooltip="Delete">
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
            {{ $campuses->links() }}
        </x-slot>
    </x-m.table>

    <div wire:ignore>
        @livewire('campus.campus-form-livewire', key('campus-form-livewire'))
    </div>
    
    <script>
        function delete_campus(campus_id) {
            swal({
				title: 'Delete the record?',
				text: 'You will not be able to recover it',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
                buttons: ['Cancel', 'Yes, Delete It'],
            }).then((agree) => {
				if (agree) {
                    @this.delete(campus_id);
				}
            });
        }
    </script>
</section>
