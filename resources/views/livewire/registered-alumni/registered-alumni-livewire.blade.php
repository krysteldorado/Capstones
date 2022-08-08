<div>
    <section class="section mt-2">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card position-relative" style="height: 465px;">
                        <table class="table table-hover mt-4">
                            <thead>
                                <tr>
                                    <th style="width: 10%">#</th>
                                    <th style="width: 15%">First Name</th>
                                    <th style="width: 15%">Middle Name</th>
                                    <th style="width: 15%">Last Name</th>
                                    <th style="width: 15%">Email</th>
                                    <th style="width: 15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($regis as $registered)  
                                    <tr id="section-row-{{ $registered->id }}">
                                        <td class="center-align">
                                            {{ ( ($loop->index + 1) + ( ($show_row * $page ) - $show_row) ) }}
                                        </td>
                                        <td>
                                            {{ $registered->firstname}}
                                        </td>
                                        <td>
                                            {{ $registered->middlename }}
                                        </td>
                                        <td>
                                            {{ $registered->lastname }}
                                        </td>
                                        <td>
                                            {{ $registered->email }}
                                        </td>
                                        <td> <button wire:click ="$emit('view', {{ $registered->id }} )" class="btn btnaccp">
                                            View
                                        </button>
                                        <button type="button" wire:click="deleteId({{ $registered->id }},'delete')" class="btn btncls" 
                                            data-toggle="modal" data-target="#exampleModal">Delete</button>
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
                                {{ $regis->links() }} <!--paginations Kung anong naka declare na variable sa component-->
                            </x-slot> 
                        </table>

                        <div wire:ignore>
                            @livewire('registered-alumni.registered-alumni-form-livewire', key('registered-alumni-form-livewire')) 
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                    </div>  
                                        <div class="modal-body">
                                            <p>Are you sure want to delete?</p>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal"class="btn btncls">Close</button>
                                        <button type="button" wire:click.prevent="delete()" class="btn btnaccp">Yes, Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                        <button type="button" class="close" wire:click="closeDeleteModal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Are you sure?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btncls" wire:click="closeDeleteModal">Cancel</button>
                                        <button type="button" class="btn btnaccp" wire:click="destroy">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    
                        <script>
                            window.addEventListener('openDeleteModal', event => {
                            $("#exampleModal").modal('show');
                            })

                            window.addEventListener('closeDeleteModal', event => {
                                    $("#exampleModal").modal('hide', function() {
                                    });
                                })
                        </script>
                        {{-- <script>
                            function delete_section(registered_id) {
                                swal({
                                    title: 'Delete the record?',
                                    text: 'You will not be able to recover it',
                                    icon: 'warning',
                                    buttons: true,
                                    dangerMode: true,
                                    buttons: ['Cancel', 'Yes, Delete It'],
                                }).then((agree) => {
                                    if (agree) {
                                        @this.delete(registered_id);
                                    }
                                });
                            }
                        </script> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
