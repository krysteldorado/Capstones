<x-m.page.modal-form id="college-form-modal" >
    <x-slot name="header">{{ isset($college_id)? 'Update': 'Add' }} College</x-slot>

    <div class="row">
        <div class="col s12 mb-2">
             <label for="campus" class="active">Campus</label>
             <select wire:model="college.campus_id" id="campus" class="browser-default">
                 <option selected>Select Campus</option>
                 @foreach ($campuses as $campus)
                     <option value="{{ $campus->id }}">
                         {{ $campus->campus }}
                     </option>
                 @endforeach
             </select>
             @error('college.campus_id') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="abbreviation">Abbreviation</label>
            <input wire:model.debounce.800ms="college.abbreviation" class="mb-0" id="abbreviation" type="text">
            @error('college.abbreviation') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="college">College</label>
            <input wire:model.debounce.800ms="college.college" class="mb-0" id="college" type="text">
            @error('college.college') <small class="red-text">{{ $message }}</small> @enderror
        </div>
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            <i class="bi bi-save"></i>
            {{ isset($college_id)? 'Update': 'Add' }}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
				title: @this.college_id? 'Update the record?': 'Add a record?',
				text: @this.college_id? 'Your record will be modified': 'New record will be added',
				icon: 'warning',
				buttons: true,
				dangerMode: false,
                buttons: ['Cancel', @this.college_id? 'Yes, Update It': 'Yes, Add It'],
            }).then((agree) => {
				if (agree) {
                    @this.save();
				}
            });
        }
    </script>
</x-m.page.modal-form>
