<section class="section mt-2">
    <x-m.page.search>
        <x-slot name="filter_btn"></x-slot>

        @can('create', \App\Models\AlumniSection::class)
            <x-m.page.search-button wire:click="$emit('create')">
                <i class="material-icons">add</i>
                <span class="hide-on-small-only">Create Section</span>
            </x-m.page.search-button>
        @endcan 
    </x-m.page.search>

    
    <x-m.table>
        <thead>
            <tr>
                <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                <th style="width: 20%;">Program</th>
                <th style="width: 20%;">Major</th>
                <th style="width: 20%;">Academic Year</th>
                <th style="width: 20%;">Section</th>
                <th style="width: 10px; min-width: 80px"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumni_sections as $sections)  
                <tr id="section-row-{{ $sections->id }}">
                    <td class="center-align">
                        {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                    </td>
                    <td>
                        {{ $sections->program->program}}
                    </td>
                    <td>
                        {{ $sections->major }}
                    </td>
                    <td>
                        {{ $sections->academic_year }}
                    </td>
                    <td>
                        {{ $sections->section }}
                    </td>
                    <td class="text-nowrap center-align">
                        @can('update', $sections)
                            <x-m.table.button wire:click="$emit('edit', {{ $sections->id }})" class="mr-4" data-tooltip="Edit">
                                <i class="material-icons">edit</i>
                            </x-m.table.button>
                        @endcan

                        @can('delete', $sections)
                            <x-m.table.button onclick="delete_section({{ $sections->id }})" data-tooltip="Delete">
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
            {{ $alumni_sections->links() }} <!--paginations-->
        </x-slot> 
    </x-m.table>

    <div wire:ignore>
        @livewire('alumni-section.alumni-section-form-livewire', key('alumni-section-form-livewire')) 
    </div>
  
    <script>
        function delete_section(section_id) {
            swal({
                title: 'Delete the record?',
                text: 'You will not be able to recover it',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                buttons: ['Cancel', 'Yes, Delete It'],
            }).then((agree) => {
                if (agree) {
                    @this.delete(section_id);
                }
            });
        }
    </script>
</section>
</div>
