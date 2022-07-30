<fieldset id="form-3">
    <div class="form-card text-start">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">Education History</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label">
                        Did you pursue advanced study/further study (e.g. Masters or Doctorate Degree)? <span class="text-danger">*</span>
                    </label><br>
                    <div class="form-check">
                        <input wire:model="tracer.futher_study" value="1" class="form-check-input" type="radio" name="futher-study" id="radio-futher-yes">
                        <label class="form-check-label" for="radio-futher-yes">
                            Yes
                        </label>
                    </div><br>  
                    <div class="form-check">
                        <input wire:model="tracer.futher_study" value="0" class="form-check-input" type="radio" name="futher-study" id="radio-futher-no">
                        <label class="form-check-label" for="radio-futher-no">
                            No
                        </label>
                    </div><br>
                    @error('tracer.futher_study') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label">
                        Does your current employment related to your field of specialization? <span class="text-danger">*</span>
                    </label><br>
                    <div class="form-check">
                        <input wire:model="tracer.related_specialization" value="1" class="form-check-input" type="radio" name="related-study" id="radio-related-yes">
                        <label class="form-check-label" for="radio-related-yes">
                            Yes
                        </label>
                    </div><br>  
                    <div class="form-check">
                        <input wire:model="tracer.related_specialization" value="0" class="form-check-input" type="radio" name="related-study" id="radio-related-no">
                        <label class="form-check-label" for="radio-related-no">
                            No
                        </label>
                    </div><br>
                    @error('tracer.related_specialization') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </div>
</fieldset>
