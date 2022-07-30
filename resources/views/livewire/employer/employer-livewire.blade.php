<div>
    <section class="section mt-2">
        <x-m.page.search>
            <x-slot name="filter_btn"></x-slot>
    
            @can('create', \App\Models\Employer::class)
                <x-m.page.search-button wire:click="$emit('create')">
                    <i class="material-icons">add</i>
                    <span class="hide-on-small-only">Create Employers</span>
                </x-m.page.search-button>
            @endcan
        </x-m.page.search>
    
        <x-m.table>
            <thead>
                <tr>
                    <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                    <th style="width: 20%;">Logo</th>
                    <th style="width: 30%;">Company</th>
                    <th style="width: 40%;">Address</th>
                    <th style="width: 20%;">Business_Nature</th>
                    <th style="width: 80px; min-width: 80px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employers as $employer )  
                    <tr id="employer-row-{{ $employer->id }}">
                        <td class="center-align">
                            {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                        </td>
                        <td>
                            {{ $employer->logo }}
                        </td>
                        <td>
                            {{ $employer->company }}
                        </td>
                        <td>
                            {{ $employer->address }}
                        </td>
                        <td>
                            {{ $employer->business_nature }}
                        </td>
                        

                        <td class="text-nowrap center-align">
                            @can('update', $employer)
                                <x-m.table.button wire:click="$emit('edit', {{ $employer->id }})" class="mr-4" data-tooltip="Edit">
                                    <i class="material-icons">edit</i>
                                </x-m.table.button>
                            @endcan
    
                            @can('delete', $employer)
                                <x-m.table.button onclick="delete_employer({{ $employer->id }})" data-tooltip="Delete">
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
                {{ $employers->links() }}
            </x-slot>
        </x-m.table>
    
        <div wire:ignore>
         @livewire('employer.employer-form-livewire', key('employer-form-livewire')) 
        </div>
        
        <script>
            function delete_employer(employer_id) {
                swal({
                    title: 'Delete the record?',
                    text: 'You will not be able to recover it',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                    buttons: ['Cancel', 'Yes, Delete It'],
                }).then((agree) => {
                    if (agree) {
                        @this.delete(employer_id);
                    }
                });
            }
        </script>
    </section>
    





</div>
