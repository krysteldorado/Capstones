<x-m.page.modal-form id="program-form-modal">
    <x-slot name="header">{{ isset($program_id)? 'Update': 'Add' }} Program</x-slot>

    <div class="row">
        <div class="col s12 mb-2">
             <label for="campus" class="active">Campus</label>
             <select wire:model="program.campus_id" id="campus" class="browser-default">
                 <option selected>Select Campus</option>
                 @foreach ($campuses as $campus)
                     <option value="{{ $campus->id }}">
                         {{ $campus->campus }}
                     </option>
                 @endforeach
             </select>
             @error('program.campus_id') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
             <label for="college" class="active">College</label>
             <select wire:model="program.college_id" id="college" class="browser-default" {{ empty($program->campus_id)? 'disabled': '' }}>
                 <option selected>Select College</option>
                 @foreach ($colleges as $college)
                     <option value="{{ $college->id }}">
                         {{ $college->college }}
                     </option>
                 @endforeach
             </select>
             @error('program.college_id') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="abbreviation">Abbreviation</label>
            <input wire:model.debounce.800ms="program.abbreviation" class="mb-0" id="abbreviation" type="text">
            @error('program.abbreviation') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="program">Program</label>
            <input wire:model.debounce.800ms="program.program" class="mb-0" id="program" type="text">
            @error('program.program') <small class="red-text">{{ $message }}</small> @enderror
        </div>
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            {{ isset($program_id)? 'Update': 'Add' }}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
				title: @this.program_id? 'Update the record?': 'Add a record?',
				text: @this.program_id? 'Your record will be modified': 'New record will be added',
				icon: 'warning',
				buttons: true,
				dangerMode: false,
                buttons: ['Cancel', @this.program_id? 'Yes, Update It': 'Yes, Add It'],
            }).then((agree) => {
				if (agree) {
                    @this.save();
				}
            });
        }
    </script>
</x-m.page.modal-form>
