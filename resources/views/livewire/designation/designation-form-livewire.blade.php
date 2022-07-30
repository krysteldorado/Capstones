<x-m.page.modal-form id="designation-form-modal">
    <x-slot name="header">{{ isset($designation_id)? 'Update': 'Add' }} Designation</x-slot>

    <div class="row">
        <div class="col s12 mb-2">
            <label for="designation">Designation</label>
            <input wire:model.debounce.800ms="designation.designation" class="mb-0" id="designation" type="text">
            @error('designation.designation') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="input-field col s12 mb-2">
            <label for="access" class="active">Campus</label>
            <select wire:model="designation.access" id="access" class="browser-default">
                <option value="">Select Access</option>
                <option value="university">University</option>
                <option value="campus">Campus</option>
                <option value="college">College</option>
                <option value="program">Program</option>
            </select>
            @error('designation.access') <small class="red-text">{{ $message }}</small> @enderror
       </div>
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            {{ isset($designation_id)? 'Update': 'Add' }}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
                title: @this.designation_id? 'Update the record?': 'Add a record?',
                text: @this.designation_id? 'Your record will be modified': 'New record will be added',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
                buttons: ['Cancel', @this.designation_id? 'Yes, Update It': 'Yes, Add It'],
            }).then((agree) => {
                if (agree) {
                    @this.save();
                }
            });
        }
    </script>
</x-m.page.modal-form>
