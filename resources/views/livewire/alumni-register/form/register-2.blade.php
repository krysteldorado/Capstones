<fieldset id="register-2">    
    <div class="form-card text-start">
        <div class="row register-form">
            <div class="col-xs-6">
                <div class="col-xs-8 mb-2 form-group">
                    <label for="campus" class="active">Campus</label>
                        <select wire:model="register.campus_id" id="campus" class="form-control">
                            <option selected>Select Campus</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">
                                        {{ $campus->campus }}
                                    </option>
                                @endforeach
                        </select>
                    @error('campus_id') <small class="red-text">{{ $message }}</small> @enderror
                </div>
            
                <div class="col-xs-6">
                    <div class="col s12 mb-2">
                    <label for="college" class="active ">College</label>
                        <select wire:model="register.college_id" id="college" class="form-control " {{ empty($register->campus_id)? 'disabled': '' }}>
                            <option selected>Select College</option>
                                @foreach ($colleges as $college)
                                    <option value="{{ $college->id }}">
                                        {{ $college->college }}
                                    </option>
                                @endforeach
                        </select>
                @error('college_id') <small class="red-text">{{ $message }}</small> @enderror
                </div>
                    
                <div class="col-xs-6">
                    <div class="col s12 mb-2">
                    <label for="program" class="active">Program</label>
                        <select wire:model="register.program_id" id="campus" class="form-control"  {{ empty($register->college_id)? 'disabled': '' }}> 
                            <option selected>Select Program</option>
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">
                                        {{ $program->program }}
                                    </option>
                                @endforeach
                        </select>
                        @error('program_id') <small class="red-text">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="col-xs-6">
                <label for="graduated_at">Academic Year (e.g 2021-2022)</label>
                <input wire:model.debounce.800ms="register.graduated_at" class="form-control" id="graduated_at" type="text">
                @error('register.graduated_at') <small class="red-text">{{ $message }}</small> @enderror
            </div>
    
</fieldset>
