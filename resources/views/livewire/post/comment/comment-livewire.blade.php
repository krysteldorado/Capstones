<form wire:submit.prevent="save" class="comment-text d-flex align-items-center mt-2">
    <input wire:model.debounce.800ms="comment.comment" type="text" @class(['form-control rounded', 'border-danger' => $errors->has('comment.comment')]) placeholder="Enter Your Comment">
    <div class="comment-attagement d-flex">
        @error('comment.comment')
            <i class="ri-error-warning-line me-3 text-danger tooltipped" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $message }}"></i>
        @enderror
        <a href="javascript:void();"><i class="ri-link me-3"></i></a>
        <a href="javascript:void();"><i class="ri-camera-line me-3"></i></a>
    </div>
</form>
