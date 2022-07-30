<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card position-relative inner-page-bg bg-primary" style="height: 150px;">
                <div class="inner-page-title">
                <h3 class="text-white">Alumni Tracer</h3>
                <p class="text-white">lorem ipsum</p>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tracer Form</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-wizard1" class="text-center mt-0">
                        <ul id="top-tab-list" class="p-0 row list-inline mb-3">
                            <li id="account" @class([
                                'col-lg-3 col-md-6 text-start mb-2', 
                                'active' => ( $step===1 || $step>1 ),
                                'done' => $step>1,
                            ])>
                                <a>
                                    <i class="ri-lock-unlock-line"></i>
                                    <span>Agreement</span>
                                </a>
                            </li>
                            <li id="personal" @class([
                                'col-lg-3 col-md-6 mb-2 text-start', 
                                'active' => ( $step===2 || $step>2 ),
                                'done' => $step>2,
                            ])>
                                <a>
                                    <i class="ri-user-fill"></i>
                                    <span>Employment</span>
                                </a>
                            </li>
                            <li id="payment" @class([
                                'col-lg-3 col-md-6 mb-2 text-start', 
                                'active' => ( $step===3 || $step>3 ),
                                'done' => $step>3,
                            ])>
                                <a>
                                    <i class="ri-book-fill"></i>
                                    <span>Education</span>
                                </a>
                            </li>
                            <li id="confirm" @class([
                                'col-lg-3 col-md-6 text-start mb-2', 
                                'active done' => $step===4,
                            ])>
                                <a>
                                    <i class="ri-check-fill"></i>
                                    <span>Finish</span>
                                </a>
                            </li>
                        </ul>
                        
                        @includeWhen($step===1, 'livewire.alumni-tracer.form.form-1')
                        @includeWhen($step===2, 'livewire.alumni-tracer.form.form-2')
                        @includeWhen($step===3, 'livewire.alumni-tracer.form.form-3')
                        @includeWhen($step===4, 'livewire.alumni-tracer.form.form-4')
                        
                        <div class="text-end">
                            @if ( $step<$last_step )
                                @if ( $step>1 )
                                    <button wire:click="prev" type="button" id="prev" class="btn btn-dark ms-1">
                                        Previous
                                    </button>
                                @endif
                                @if ( $step<3 )
                                    <button wire:click="next" type="button" id="next" class="btn btn-primary ms-1">
                                        Next
                                    </button>
                                @else
                                    <button wire:click="submit" type="button" id="submit" class="btn btn-success ms-1">
                                        Submit
                                    </button>
                                @endif
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @livewire('alumni-tracer.employer.employer-select-livewire', key('employer-select-livewire'))
</div>
