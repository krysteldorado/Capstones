<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left"> <img src="img/LOGO.png" alt="" />
         <h3>ALTEA</h3> 
         <h6>Already have an account? <h6> 
          <button  type="button"  class="btnSgn "> <a href="/">  <h5> Sign-in </h5> </a> </button>                                  
       </div>
         <div class="col-md-9 register-right">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <form wire:submit.prevent="save">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">ALUMNI REGISTRATION</h3>
                                    @includeWhen($step===1, 'livewire.alumni-register.form.register-1')
                                    @includeWhen($step===2, 'livewire.alumni-register.form.register-2')
                                    @includeWhen($step===3, 'livewire.alumni-register.form.register-3')
                                    <div class="text-end">
                                        @if ( $step<$last_step )
                                            @if ( $step>1 )
                                                <button wire:click="prev" type="button" id="prev" class="btnDrk ">
                                                    Previous
                                                </button><br>
                                            @endif
                                            @if ( $step<2 )
                                                <button wire:click="next" type="button" id="next" class="btnRegister">
                                                    Next
                                                </button>
                                                @else
                                                <button wire:click="submit" type="button" id="submit" class="btnRegister">
                                                    Submit
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>