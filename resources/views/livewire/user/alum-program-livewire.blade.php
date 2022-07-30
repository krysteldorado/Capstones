<section class="section mt-2">
    <x-m.page.breadcrumb>
        <li class="breadcrumb-item">
            <a href="{{ route('user.alumni') }}">Alumni</a>
        </li>
        <li class="breadcrumb-item">
            <a>User</a>
        </li>
        <li class="breadcrumb-item active">
            <a>Program</a>
        </li>
    </x-m.page.breadcrumb>

    <div class="card card card-default">
        <div class="card-content">
            <h5 class="card-title">Alumni Information</h5>
            <table>
                <tr style="border: none;">
                    <td class="pt-1 pb-0 pl-0">
                        Name:
                    </td>
                    <th class="pt-1 pb-0 pl-0" style="width: 100%;">
                        {{ $user->fmlname }}
                    </th>
                </tr>
                <tr style="border: none;">
                    <td class="pt-1 pb-0 pl-0">
                        Email
                    </td>
                    <th class="pt-1 pb-0 pl-0">
                        {{ $user->email }}
                    </th>
                </tr>
            </table>
        </div>
    </div>
   
 
    <div class="right-align">  
       
                @if ($user->alumni ->count() == 1) 
                        <x-m.page.search-button>  
                            <i class="material-icons left">do_not_disturb</i>
                            <span>Add Program</span> 
                        </x-m.page.search-button> 
                
                @else 
                    @can('updateAlumniProgram', $user)
                        <x-m.page.search-button wire:click="$emit('create')"> 
                            <i class="material-icons left">add</i>
                            <span>Add Program</span> 
                        </x-m.page.search-button> 
                    @endcan 
                
                 
                @endif        
       
    </div>

    <x-m.table class="mt-2">
        <thead>
            <tr>
                <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                <th style="width: 30%;">Campus</th>
                <th style="width: 20%;">College</th>
                <th style="width: 20%;">Program </th>
                <th style="width: 20%;">Academic Year</th>

                <th style="width: 40px; min-width: 40px"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user->alumni as $alumnus)  
                <tr id="program-row-{{ $alumnus->id }}">
                    <td class="center-align">
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $alumnus->program->college->campus->campus }}
                    </td>
                    <td>
                        {{ $alumnus->program->college->college }}
                    </td>
                    <td>
                        {{ $alumnus->program->program }}
                    </td>
                    <td>
                        {{ $alumnus->graduated_at}}
                    </td>
                    <td class="text-nowrap center-align">

                         @can('delete', $alumnus)
                            <x-m.table.button onclick="delete_alumni_program({{ $alumnus->id }})" data-tooltip="Delete">
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
           
        </x-slot>
    </x-m.table>

    
    
        <div wire:ignore>
            
            @livewire('user.alum-program-form-livewire', ['user'=>$user_id], key('alum-program-form-livewire'))
        </div>
    
    
    <script>
        function delete_alumni_program(alumni_program_id) {
            swal({
				title: 'Delete the record?',
				text: 'You will not be able to recover it',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
                buttons: ['Cancel', 'Yes, Delete It'],
            }).then((agree) => {
				if (agree) {
                    @this.delete(alumni_program_id);
				}
            });
        }
    </script>
</section>
