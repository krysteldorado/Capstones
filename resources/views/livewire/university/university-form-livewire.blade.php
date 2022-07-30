<x-m.page.modal-form id="university-modal">
    <x-slot name="header">University Update</x-slot>

    <div class="row">
        <div class="col s12">
            <label for="university">University</label>
            <input wire:model.lazy="university_info.university" id="university" type="text">
            @error('university_info.university') <small class="red-text">{{ $message }}</small> @enderror
        </div>
        <div class="col s12">
            <label for="about">About</label>
            <textarea wire:model.lazy="university_info.about" id="about" class="materialize-textarea"></textarea>
            @error('university_info.about') <small class="red-text">{{ $message }}</small> @enderror
        </div>
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            Update
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
				title: 'Update Information?',
				text: '',
				icon: 'warning',
				buttons: true,
				dangerMode: false,
                buttons: ['Cancel', 'Update'],
            }).then((agree) => {
				if (agree) {
                    @this.save();
				}
            });
        }
    </script>
</x-m.page.modal-form>
