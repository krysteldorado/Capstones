<fieldset id="form-2">
    <div class="form-card text-start">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">Personal Information:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label">
                        What was your position regarding employment in the last 24 months after graduation 
                        (including permanent, contract, casual and self employment)? 
                        Please select the response best describes your position: <span class="text-danger">*</span>
                    </label><br>
                    <div class="form-check">
                        <input wire:model="tracer.position" value="fulltime" class="form-check-input" type="radio" name="position" id="radio-fulltime">
                        <label class="form-check-label" for="radio-fulltime">
                            In fulltime work (i.e. working 35 hrs a week or more)
                        </label>
                    </div><br>
                    <div class="form-check">
                        <input wire:model="tracer.position" value="parttime" class="form-check-input" type="radio" name="position" id="radio-parttime">
                        <label class="form-check-label" for="radio-parttime">
                            In part time work (i.e. working fewer than 35 hrs a week)
                        </label>
                    </div><br>
                    <div class="form-check">
                        <input wire:model="tracer.position" value="unemployed" class="form-check-input" type="radio" name="position" id="radio-unemployed">
                        <label class="form-check-label" for="radio-unemployed">
                            Unemployed but seeking employment
                        </label>
                    </div><br>  
                    <div class="form-check">
                        <input wire:model="tracer.position" value="notavailable" class="form-check-input" type="radio" name="position" id="radio-not-available">
                        <label class="form-check-label" for="radio-not-available">
                            Not available for work for reasons such as ill, health, military service, travel, further study
                        </label>
                    </div><br>
                    @error('tracer.position') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label">Company/Employer<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control bg-white" placeholder="Company Name & Address" aria-label="Recipient's username" aria-describedby="button-addon2" readonly
                            value="{{ $tracer->employer->company?? '' }}">
                        <button wire:click="$emit('select')" class="btn btn-secondary" type="button" id="button-addon2">
                            Select Employer
                        </button>
                    </div>
                    @error('tracer.employer_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>
</fieldset>
