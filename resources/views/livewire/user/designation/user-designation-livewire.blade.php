<section class="section mt-2">
    <x-m.page.breadcrumb>
        <li class="breadcrumb-item">
            <a href="{{ route('user.management') }}">User Management</a>
        </li>
        <li class="breadcrumb-item">
            <a>User</a>
        </li>
        <li class="breadcrumb-item active">
            <a>Designation</a>
        </li>
    </x-m.page.breadcrumb>

    <div class="card card card-default">
        <div class="card-content">
            <h5 class="card-title">User Information</h5>
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
        @can('updateDesignation', $user)
            <x-m.page.search-button wire:click="$emit('create')">
                <i class="material-icons left">add</i>
                <span>Add Designation</span>
            </x-m.page.search-button>
        @endcan
    </div>

    <x-m.table class="mt-2">
        <thead>
            <tr>
                <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                <th style="width: 30%;">Designation</th>
                <th style="width: 30%;">Campus</th>
                <th style="width: 20%;">College</th>
                <th style="width: 20%;">Program</th>
                <th style="width: 40px; min-width: 40px"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user_designations as $user_designation)  
                <tr id="row-{{ $user_designation->id }}">
                    <td class="center-align">
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $user_designation->designation->designation }}
                    </td>
                    @switch($user_designation->designation->access)
                        @case('university')
                            <td colspan="3"></td>
                            @break
                        @case('campus')
                            <td>
                                {{ $user_designation->campus->campus?? '' }}
                            </td>
                            <td colspan="2"></td>
                            @break
                        @case('college')
                            <td>
                                {{ $user_designation->college->campus->campus?? '' }}
                            </td>
                            <td>
                                {{ $user_designation->college->college?? '' }}
                            </td>
                            <td></td>
                            @break
                        @case('program')
                            <td>
                                {{ $user_designation->program->college->campus->campus?? '' }}
                            </td>
                            <td>
                                {{ $user_designation->program->college->college?? '' }}
                            </td>
                            <td>
                                {{ $user_designation->program->program?? '' }}
                            </td>
                            @break
                    @endswitch
                    <td class="text-nowrap center-align">
                        @can('delete', $user_designation)
                            <x-m.table.button onclick="delete_user_designation({{ $user_designation->id }})" data-tooltip="Delete">
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
        <x-slot name="bottom"></x-slot>
    </x-m.table>

    
    @can('updateDesignation', $user)
        <div wire:ignore>
            @livewire('user.designation.user-designation-form-livewire', ['user'=>$user_id], key('user-designation-form-livewire'))
        </div>
    @endcan
    
    <script>
        function delete_user_designation(user_designation_id) {
            swal({
				title: 'Delete the record?',
				text: 'You will not be able to recover it',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
                buttons: ['Cancel', 'Yes, Delete It'],
            }).then((agree) => {
				if (agree) {
                    @this.delete(user_designation_id);
				}
            });
        }
    </script>
</section>
