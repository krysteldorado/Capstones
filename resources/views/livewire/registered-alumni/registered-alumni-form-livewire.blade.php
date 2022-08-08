<div wire:ignore.self class="modal fade" id="ExampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alumni Information</h5>
                
            </div>
            <div class="modal-body "> 
                @isset($registered)
                    <div class="mb-3 row form-control mdlfrm" readonly>
                       <h7> First Name: </h7>
                        {{ $registered -> firstname }}
                    </div>
                    <div class="mb-3 row form-control mdlfrm" readonly> 
                        <h7> Middle Name:</h7>
                        {{ $registered -> middlename }}
                    </div>
                    <div class="mb-3 row form-control mdlfrm" readonly>
                        
                        <h7>Last Name:</h7>
                            {{ $registered -> lastname }}
                       
                    </div>
                    <div class="mb-3 row form-control mdlfrm" readonly>
                        <td>
                            <h7>Gender:</h7>
                            {{ $registered -> sex }}
                       
                    </div>
                    <div class="mb-3 row form-control mdlfrm" readonly>
                       
                            <h7>Civil Status:</h7>
                            {{ $registered -> civil_status }}
                        </td>
                    </div>
                    <div class="mb-3 row form-control mdlfrm" readonly>
                        
                            <h7>Phone Number:</h7>
                            {{ $registered -> phone }}
                            
                    </div>
                    <div class="mb-3 row form-control mdlfrm" readonly>
                        
                              <h7>Academic Year:</h7>
                            {{ $registered -> graduated_at }}
                       
                    </div>
                    <div class="mb-3 row  form-control mdlfrm" readonly>
                        
                            <h7> Email:</h7>
                            {{ $registered -> email }}
                        
                    </div>
                    <!-- <div class="mb-3 row  form-control " readonly >
                      
                            <h7>Password:</h7>
                            {{ $registered -> password }}
                       
                    </div>   -->
                @endisset
            </div>
            <div class="modal-footer">
            <button wire:click="save" :isGood="true" type="button" class="btn btnaccp ms-1">
                {{ isset($id)? '': 'Accept' }}
            </button>
            <button type="button" data-bs-dismiss="modal"class="btn btncls">Close</button>
            </div>
        </div>
    </div>
</div>  


