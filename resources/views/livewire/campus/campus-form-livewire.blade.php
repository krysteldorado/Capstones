<x-m.page.modal-form id="campus-form-modal">
    <x-slot name="header">{{ isset($campus_id)? 'Update': 'Add' }} Campus</x-slot>

    <div class="row">
        <div class="col s12 mb-2">
            <label for="campus">Campus</label>
            <input wire:model.debounce.800ms="campus.campus" class="mb-0" id="campus" type="text">
            @error('campus.campus') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="address">Address</label>
            <input wire:model.debounce.800ms="campus.address" class="mb-0" id="address" type="text">
            @error('campus.address') <small class="red-text">{{ $message }}</small> @enderror
        </div>
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            {{ isset($campus_id)? 'Update': 'Add' }}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
                title: @this.campus_id? 'Update the record?': 'Add a record?',
                text: @this.campus_id? 'Your record will be modified': 'New record will be added',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
                buttons: ['Cancel', @this.campus_id? 'Yes, Update It': 'Yes, Add It'],
            }).then((agree) => {
                if (agree) {
                    @this.save();
                }
            });
        }
    </script>
</x-m.page.modal-form>
