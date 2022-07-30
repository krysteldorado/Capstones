<form wire:submit.prevent='save' id="part-create">
    <div class="mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input wire:model.lazy="employer.logo" type="text" class="form-control" id="logo">
        @error('employer.logo') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <input wire:model.lazy="employer.company" type="text" class="form-control" id="company">
        @error('employer.company') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input wire:model.lazy="employer.address" type="text" class="form-control" id="address">
        @error('employer.address') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label for="business_nature" class="form-label">Business Nature</label>
        <input wire:model.lazy="employer.business_nature" type="text" class="form-control" id="business_nature">
        @error('employer.business_nature') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="text-end">
        <button wire:click="create" class="btn btn-secondary">
            Search
        </button>
        <button class="btn btn-success" type="submit">
            Create & Select
        </button>
    </div>
</form>
