<div wire:ignore.self class="modal fade" id="post-modal" tabindex="-1"  aria-labelledby="post-modalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="post-modalLabel">Create Post</h5>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="ri-close-fill"></i></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center">
                    <div class="user-img">
                        <img src="{{ asset('socialv/images/user/1.jpg') }}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                    </div>
                    <div class="post-text ms-3 w-100">
                        <textarea wire:model.debounce.800ms ="post.post" class="form-control rounded" placeholder="Write something here..." class="w-100" rows="1" style="border:none;"></textarea>
                        @error('post.post') <small class="form-control pb-0 text-danger" style="border:none;">{{ $message }}</small> @enderror
                    </div>
                </div>
                <hr>
                <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                    <li class="col-md-6 mb-3">
                        <div class="bg-soft-secondary rounded p-2 pointer me-3"><a href="#"></a><img src="{{ asset('socialv/images/small/07.png') }}" alt="icon" class="img-fluid"> Photo/Video</div>
                    </li>
                    <li class="col-md-6 mb-3">
                        <div class="bg-soft-secondary rounded p-2 pointer me-3"><a href="#"></a><img src="{{ asset('socialv/images/small/08.png') }}" alt="icon" class="img-fluid"> Tag Friend</div>
                    </li>
                </ul>
                <hr>
                <div class="other-option">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="user-img me-3">
                            <img src="{{ asset('socialv/images/user/1.jpg') }}" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                            </div>
                            <h6>Your Story</h6>
                        </div>
                        <div class="card-post-toolbar">
                            <div class="dropdown">
                            <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                            <span class="btn btn-primary">Friend</span>
                            </span>
                            <div class="dropdown-menu m-0 p-0">
                                <a class="dropdown-item p-3" href="#">
                                    <div class="d-flex align-items-top">
                                        <i class="ri-save-line h4"></i>
                                        <div class="data ms-2">
                                        <h6>Public</h6>
                                        <p class="mb-0">Anyone on or off Facebook</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item p-3" href="#">
                                    <div class="d-flex align-items-top">
                                    <i class="ri-close-circle-line h4"></i>
                                        <div class="data ms-2">
                                        <h6>Friends</h6>
                                        <p class="mb-0">Your Friend on facebook</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item p-3" href="#">
                                    <div class="d-flex align-items-top">
                                        <i class="ri-user-unfollow-line h4"></i>
                                        <div class="data ms-2">
                                        <h6>Friends except</h6>
                                        <p class="mb-0">Don't show to some friends</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item p-3" href="#">
                                    <div class="d-flex align-items-top">
                                        <i class="ri-notification-line h4"></i>
                                        <div class="data ms-2">
                                        <h6>Only Me</h6>
                                        <p class="mb-0">Only me</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button wire:click="save" class="btn btn-primary d-block w-100 mt-3">Post</button>
            </div>
        </div>
    </div>
</div>