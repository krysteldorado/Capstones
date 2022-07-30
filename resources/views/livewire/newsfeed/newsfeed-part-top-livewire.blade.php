<div id="post-modal-data" class="card card-block card-stretch card-height">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Create Post</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div class="user-img">
                <img src="{{ asset('socialv/images/user/1.jpg') }}" alt="userimg" class="avatar-60 rounded-circle">
            </div>
            <form class="post-text ms-3 w-100 "  data-bs-toggle="modal" data-bs-target="#post-modal" action="javascript:void();">
                <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
            </form>
        </div>
        <hr>
        <ul class=" post-opt-block d-flex list-inline m-0 p-0 flex-wrap">
            <li class="me-3 mb-md-0 mb-2">
                <a href="#" class="btn btn-soft-primary">
                <img src="{{ asset('socialv/images/small/07.png') }}" alt="icon" class="img-fluid me-2"> Photo/Video
                </a>
            </li>
            <li class="me-3 mb-md-0 mb-2">
                <a href="#" class="btn btn-soft-primary">
                <img src="{{ asset('socialv/images/small/08.png') }}" alt="icon" class="img-fluid me-2"> Tag Friend
                </a>
            </li>
            <li class="me-3">
                <a href="#" class="btn btn-soft-primary">
                <img src="{{ asset('socialv/images/small/09.png') }}" alt="icon" class="img-fluid me-2"> Feeling/Activity
                </a>
            </li>
            <li>
                <button class="btn btn-soft-primary">
                <div class="card-header-toolbar d-flex align-items-center">
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="post-option"   data-bs-toggle="dropdown">
                            <i class="ri-more-fill"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option" style="">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Check in</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Live Video</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Gif</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Watch Party</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Play with Friend</a>
                        </div>
                    </div>
                </div>
                </button>
            </li>
        </ul>
    </div>
    
    @livewire('post.post.post-livewire', key("post-livewire"))
</div>
