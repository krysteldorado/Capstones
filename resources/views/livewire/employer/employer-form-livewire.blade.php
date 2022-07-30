<x-m.page.modal-form id="employer-form-modal">
    <x-slot name="header">{{ isset($employer_id)? 'Update': 'Add' }} Employers</x-slot>

    <div class="row">
        <div class="col s12 mb-2">
            <label for="logo">Logo</label>
            <input wire:model.debounce.800ms="employer.logo" class="mb-0" id="logo" type="text">
            @error('employer.logo') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="company">Company</label>
            <input wire:model.debounce.800ms="employer.company" class="mb-0" id="company" type="text">
            @error('employer.company') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="address">Address</label>
            <input wire:model.debounce.800ms="employer.address" class="mb-0" id="address" type="text">
            @error('employer.address') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        <div class="col s12 mb-2">
            <label for="business_nature">Business_Nature</label>
            <input wire:model.debounce.800ms="employer.business_nature" class="mb-0" id="business_nature" type="text">
            @error('employer.business_nature') <small class="red-text">{{ $message }}</small> @enderror
        </div>
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            {{ isset($employer_id)? 'Update': 'Add' }}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
                title: @this.employer_id? 'Update the record?': 'Add a record?',
                text: @this.employer_id? 'Your record will be modified': 'New record will be added',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
                buttons: ['Cancel', @this.employer_id? 'Yes, Update It': 'Yes, Add It'],
            }).then((agree) => {
                if (agree) {
                    @this.save();
                }
            });
        }
    </script>
</x-m.page.modal-form>
