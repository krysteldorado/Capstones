<x-m.page.modal-form id="alumni_sections-form-modal" >
    <x-slot name="header">{{ isset($section_id)? 'Update': 'Add' }} Section</x-slot>

    <div class="row">
        <div class="col s12 mb-2">
            <label for="campus" class="active">Campus</label>
            <select wire:model="section.campus_id" id="campus" class="browser-default">
                <option selected>Select Campus</option>
                @foreach ($campuses as $campus)
                    <option value="{{ $campus->id }}">
                        {{ $campus->campus }}
                    </option>
                @endforeach
            </select>
            @error('section.campus_id') <small class="red-text">{{ $message }}</small> @enderror
       </div>

       <div class="col s12 mb-2">
        <label for="college" class="active">College</label>
        <select wire:model="section.college_id" id="college" class="browser-default" {{ empty($section->campus_id)? 'disabled': '' }}>
            <option selected>Select College</option>
            @foreach ($colleges as $college)
                <option value="{{ $college->id }}">
                    {{ $college->college }}
                </option>
            @endforeach
        </select>
        @error('section.college_id') <small class="red-text">{{ $message }}</small> @enderror
   </div>
        
        <div class="col s12 mb-2">
             <label for="program" class="active">Program</label>
                <select wire:model="section.program_id" id="campus" class="browser-default"  {{ empty($section->college_id)? 'disabled': '' }}> 
                    <option selected>Select Program</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">
                                {{ $program->program }}
                            </option>
                        @endforeach
                </select>
            @error('section.program_id') <small class="red-text">{{ $message }}</small> @enderror
        </div>
        
        <div class="col s12 mb-2">
            <label for="major">Major</label>
            <input wire:model.debounce.800ms="section.major" class="mb-0" id="major" type="text">
            @error('section.major') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="academic_year">Academic Year</label>
            <input wire:model.debounce.800ms="section.academic_year" class="mb-0" id="academic_year" type="text">
            @error('section.academic_year') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="section">Section</label>
            <input wire:model.debounce.800ms="section.section" class="mb-0" id="section" type="text">
            @error('section.section') <small class="red-text">{{ $message }}</small> @enderror
        </div>
    
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            <i class="bi bi-save"></i>
            {{ isset($section_id)? 'Update': 'Add' }}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
				title: @this.section_id? 'Update the record?': 'Add a record?',
				text: @this.secction_id? 'Your record will be modified': 'New record will be added',
				icon: 'warning',
				buttons: true,
				dangerMode: false,
                buttons: ['Cancel', @this.section_id? 'Yes, Update It': 'Yes, Add It'],
            }).then((agree) => {
				if (agree) {
                    @this.save();
				}
            });
        }
    </script>
</x-m.page.modal-form>
