<x-m.page.modal-form id="university-logo-modal">
    <x-slot name="header">University Logo Update</x-slot>

    <div class="row">
        <div class="col s12 file-field input-field mb-3">
            <div class="btn" wire:loading.class="disabled" wire:target="file">
                <span>Image</span>
                <input wire:model="file" type="file" accept="image/png, image/gif, image/jpeg" wire:loading.attr="disabled" wire:target="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="col s12">
            @isset($file)
                <div class="center-align">
                    <img src="{{ $file->temporaryUrl() }}" alt="university" class="mb-3 circle" style="width: 180px; height: 180px;">
                </div>
            @endisset
        </div>
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save_logo()" wire:loading.class="disabled" wire:target="save_logo" :isGood="true" >
            Update
        </x-m.button.a>
    </x-slot>

    <script>
        function save_logo() {
            swal({
				title: 'Update Logo?',
				text: '',
				icon: 'warning',
				buttons: true,
				dangerMode: false,
                buttons: ['Cancel', 'Update'],
            }).then((agree) => {
				if (agree) {
                    @this.save_logo();
				}
            });
        }
    </script>
</x-m.page.modal-form>
