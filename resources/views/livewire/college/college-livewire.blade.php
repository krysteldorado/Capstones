<section class="section mt-2">
    <x-m.page.search>
        <x-slot name="filter_btn"></x-slot>

        @can('create', \App\Models\College::class)
            <x-m.page.search-button wire:click="$emit('create')">
                <i class="material-icons">add</i>
                <span class="hide-on-small-only">Create College</span>
            </x-m.page.search-button>
        @endcan
    </x-m.page.search>

    
    <x-m.table>
        <thead>
            <tr>
                <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                <th style="width: 30%;">Campus</th>
                <th style="width: 50%;">College</th>
                <th style="width: 20%;">Abbreviation</th>
                <th style="width: 80px; min-width: 80px"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($colleges as $college)  
                <tr id="college-row-{{ $college->id }}">
                    <td class="center-align">
                        {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                    </td>
                    <td>
                        {{ $college->campus->campus }}
                    </td>
                    <td>
                        {{ $college->college }}
                    </td>
                    <td>
                        {{ $college->abbreviation }}
                    </td>
                    <td class="text-nowrap center-align">
                        @can('update', $college)
                            <x-m.table.button wire:click="$emit('edit', {{ $college->id }})" class="mr-4" data-tooltip="Edit">
                                <i class="material-icons">edit</i>
                            </x-m.table.button>
                        @endcan

                        @can('delete', $college)
                            <x-m.table.button onclick="delete_college({{ $college->id }})" data-tooltip="Delete">
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
            {{ $colleges->links() }}
        </x-slot>
    </x-m.table>

    <div wire:ignore>
        @livewire('college.college-form-livewire', key('college-form-livewire'))
    </div>
    
    <script>
        function delete_college(college_id) {
            swal({
				title: 'Delete the record?',
				text: 'You will not be able to recover it',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
                buttons: ['Cancel', 'Yes, Delete It'],
            }).then((agree) => {
				if (agree) {
                    @this.delete(college_id);
				}
            });
        }
    </script>
</section>
