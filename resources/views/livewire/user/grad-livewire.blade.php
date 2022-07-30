<section class="section mt-2">
    <x-m.page.search>
        <x-slot name="filter_btn"></x-slot>

        @can('create', \App\Models\User::class)
            <x-m.page.search-button href="{{ route('user.form') }}">
                <i class="material-icons">add</i>
                <span class="hide-on-small-only">Create User</span>
            </x-m.page.search-button>
        @endcan
    </x-m.page.search>

    <x-m.table>
        <thead>
            <tr>
                <th class="center-align" style="width: 40px; min-width: 40px">#</th>
                <th style="width: 45%;">Fullname</th>
                <th style="width: 55%;">Email</th>
                <th style="width: 110px; min-width: 110px;"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)  
                <tr id="row-{{ $user->id }}">
                    <td class="center-align">
                        {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                    </td>
                    <td>
                        {{ $user->fmlname }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td class="text-nowrap center-align">
                        @can('update', $user)
                            <x-m.table.button href="{{ route('user.form', ['user'=>$user->id]) }}" class="mr-4" data-tooltip="Edit">
                                <i class="material-icons">edit</i>
                            </x-m.table.button>
                        @endcan

                        @can('updateAlumniProgram', $user)
                            <x-m.table.button href="{{ route('user.alumni.alumprogram',['user'=>$user->id]) }}"  data-tooltip="Program">
                                <i class="material-icons">view_list</i>
                            </x-m.table.button>
                        @endcan

                        @can('delete', $user)
                            <x-m.table.button onclick="delete_user({{ $user->id }})" data-tooltip="Delete">
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
            {{ $users->links() }}
        </x-slot>
    </x-m.table>
    
    <script>
        function delete_user(user_id) {
            swal({
                title: 'Delete the record?',
				text: 'You will not be able to recover it',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
                buttons: ['Cancel', 'Yes, Delete It'],
            }).then((agree) => {
				if (agree) {
                    @this.delete(user_id);
				}
            });
        }
    </script>
</section>
