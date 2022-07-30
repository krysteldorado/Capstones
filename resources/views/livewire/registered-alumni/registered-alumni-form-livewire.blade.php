<div wire:ignore.self class="modal fade" id="ExampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alumni Information</h5>
                
            </div>
            <div class="modal-body"> 
                @isset($registered)
                    <div class="mb-3 row">
                        First Name: 
                        {{ $registered -> firstname }}
                    </div>
                    <div class="mb-3 row"> 
                        Middle Name:
                        {{ $registered -> middlename }}
                    </div>
                    <div class="mb-3 row">
                        
                            Last Name:
                            {{ $registered -> lastname }}
                       
                    </div>
                    <div class="mb-3 row">
                        <td>
                            Gender:
                            {{ $registered -> sex }}
                       
                    </div>
                    <div class="mb-3 row">
                       
                            Civil Status:
                            {{ $registered -> civil_status }}
                        </td>
                    </div>
                    <div class="mb-3 row">
                        
                            Phone Number:
                            {{ $registered -> phone }}
                        
                    </div>
                    <div class="mb-3 row">
                        
                            Academic Year:
                            {{ $registered -> graduated_at }}
                       
                    </div>
                    <div class="mb-3 row">
                        
                            Email:
                            {{ $registered -> email }}
                        
                    </div>
                    <div class="mb-3 row">
                      
                        Password:
                            {{ $registered -> password }}
                       
                    </div>  
                @endisset
            </div>
            <div class="modal-footer">
            <button wire:click="save" :isGood="true" type="button" class="btn btn-primary ms-1">
                {{ isset($id)? '': 'Accept' }}
            </button>
            <button type="button" data-bs-dismiss="modal"class="btn btn-secondary">Close</button>
            </div>
        </div>
    </div>
</div>  


