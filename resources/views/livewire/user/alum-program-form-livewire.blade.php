<x-m.page.modal-form id="designation-form-modal">
    <x-slot name="header"> Update Program</x-slot>

     <div class="row">
            <div class="col s12 mb-2" wire:key='campus-select'>
                <label for="campus" class="active">Campus</label>
                <select wire:model="alumni_program.campus_id" id="campus" class="browser-default">
                    <option selected>Select Campus</option>
                    @foreach ($campuses as $campus)
                        <option value="{{ $campus->id }}">
                            {{ $campus->campus }}
                        </option>
                    @endforeach
                </select>
                @error('alumni_program.campus_id') <small class="red-text">{{ $message }}</small> @enderror
            </div>  

    
            <div class="col s12 mb-2" wire:key='college-select'>
                <label for="college" class="active">College</label>
                <select wire:model="alumni_program.college_id" id="college" class="browser-default" {{ empty($alumni_program->campus_id)? 'disabled': '' }}>
                    <option selected>Select College</option>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}">
                            {{ $college->college }}
                        </option>
                    @endforeach
                </select>
                @error('alumni_program.college_id') <small class="red-text">{{ $message }}</small> @enderror
            </div>
       
    
            <div class="col s12 mb-2" wire:key='program-select'>
                <label for="program" class="active">Program</label>
                <select wire:model="alumni_program.program_id" id="college" class="browser-default" {{ empty($alumni_program->college_id)? 'disabled': '' }}>
                    <option selected>Select Program</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">
                            {{ $program->program }}
                        </option>
                    @endforeach
                </select>
                @error('alumni_program.program_id') <small class="red-text">{{ $message }}</small> @enderror
            </div>
            
            <div class="col s12 mb-2">
                <label for="graduated_at">Academic Year (e.g.2020)</label>
                <input wire:model.debounce.800ms="alumni_program.graduated_at" class="mb-0" id="graduated_at" type="text">
                @error('alumni_program.graduated_at') <small class="red-text">{{ $message }}</small> @enderror
            </div>
           
    </div> 
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            {{ isset($alumni_id)? 'Update': 'Add'}}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
                title: 'Add a record?',
                text: 'New record will be added',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
                buttons: ['Cancel', 'Yes, Add It'],
            }).then((agree) => {
                if (agree) {
                    @this.save();
                }
            });
        }
    </script>
</x-m.page.modal-form>
