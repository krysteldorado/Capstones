<li class="mb-2">
@isset($comment)
    <div class="d-flex">
        <div class="user-img">
            <img src="{{ asset('socialv/images/user/02.jpg') }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
        </div>
        <div class="comment-data-block ms-3">
            <h6>
                {{ $comment->user->flname }}
            </h6>
            <p class="mb-0">
                {!! nl2br(e($comment->comment)) !!}
            </p>
            <div class="d-flex flex-wrap align-items-center comment-activity">
                @can('react', $comment)
                    <a wire:click="react" style="color: #50b5ff" @class(['fw-bolder' => isset($comment->react),])>
                        {{ $comment->reacts_count? $comment->reacts_count: '' }}
                        {{ $comment->reacts_count>1? 'likes': 'like' }}
                    </a>
                @endcan
                <a href="">reply</a>
                @can('delete', $comment)
                    <a wire:click="delete" style="color: #50b5ff">delete</a>
                @endcan
                <span> 
                    {{ $comment->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
    </div>
@endisset
</li>
