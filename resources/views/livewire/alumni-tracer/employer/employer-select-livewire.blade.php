<div wire:ignore.self class="modal fade" id="employer-select-modal" tabindex="-1"
    aria-labelledby="employer-select-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employer-select-modalLabel">Select Employer</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="ri-close-fill"></i></button>
            </div>
            <div class="modal-body">
                @includeWhen(!$create, 'livewire.alumni-tracer.employer.part.part-select')
                @includeWhen($create, 'livewire.alumni-tracer.employer.part.part-create')
            </div>
        </div>
    </div>
</div>
