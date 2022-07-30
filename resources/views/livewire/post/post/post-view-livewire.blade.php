<div class="col-sm-12">
@isset($post)
    <div class="card card-block card-stretch card-height">
        <div class="card-body">
            <div class="user-post-data">
                <div class="d-flex justify-content-between">
                    <div class="me-3">
                    <img class="rounded-circle img-fluid" src="{{ asset('socialv/images/user/01.jpg') }}" alt="">
                    </div>
                    <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h5 class="mb-0 d-inline-block">
                                {{ $post->user->flname }}
                            </h5>
                            <span class="mb-0 d-inline-block"></span>
                            <p class="mb-0 text-primary">
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="card-post-toolbar">
                            <div class="dropdown">
                                <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                                </span>
                                <div class="dropdown-menu m-0 p-0">
                                    @can('delete', $post)
                                        <a class="dropdown-item p-3" wire:click="delete">
                                            <div class="d-flex align-items-top">
                                                <div class="h4">
                                                    <i class="ri-delete-bin-line"></i>
                                                </div>
                                                <div class="data ms-2">
                                                    <h6>Delete Post</h6>
                                                    <p class="mb-0">Delete this post.</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endcan
                                    <a class="dropdown-item p-3" href="#">
                                        <div class="d-flex align-items-top">
                                            <div class="h4">
                                                <i class="ri-save-line"></i>
                                            </div>
                                            <div class="data ms-2">
                                                <h6>Save Post</h6>
                                                <p class="mb-0">Add this to your saved items</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item p-3" href="#">
                                        <div class="d-flex align-items-top">
                                            <i class="ri-close-circle-line h4"></i>
                                            <div class="data ms-2">
                                                <h6>Hide Post</h6>
                                                <p class="mb-0">See fewer posts like this.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item p-3" href="#">
                                        <div class="d-flex align-items-top">
                                            <i class="ri-user-unfollow-line h4"></i>
                                            <div class="data ms-2">
                                                <h6>Unfollow User</h6>
                                                <p class="mb-0">Stop seeing posts but stay friends.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item p-3" href="#">
                                        <div class="d-flex align-items-top">
                                            <i class="ri-notification-line h4"></i>
                                            <div class="data ms-2">
                                                <h6>Notifications</h6>
                                                <p class="mb-0">Turn on notifications for this post</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <p>
                    {!! nl2br(e($post->post)) !!}
                </p>
            </div>
            <div class="user-post">
                {{-- <div class=" d-grid grid-rows-2 grid-flow-col gap-3">
                    <div class="row-span-2 row-span-md-1">
                    <img src="{{ asset('socialv/images/page-img/p2.jpg') }}" alt="post-image" class="img-fluid rounded w-100">
                    </div>
                    <div class="row-span-1">
                    <img src="{{ asset('socialv/images/page-img/p1.jpg') }}" alt="post-image" class="img-fluid rounded w-100">
                    </div>
                    <div class="row-span-1 ">
                    <img src="{{ asset('socialv/images/page-img/p3.jpg') }}" alt="post-image" class="img-fluid rounded w-100">
                    </div>
                </div> --}}
            </div>
            <div class="comment-area mt-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="like-block position-relative d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="like-data">
                                <div class="dropdown">
                                    <span data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"
                                        @class(['dropdown-toggle', 'reacted' => isset($post->react)])
                                        wire:click="react('{{ ($post->react->react??'like') }}')"
                                    >
                                        @switch(($post->react->react??''))
                                            @case('heart')
                                                <i class="fa-solid fa-heart"></i>
                                                @break
                                            @case('haha')
                                                <i class="fa-solid fa-face-laugh-squint"></i>
                                                @break
                                            @case('sad')
                                                <i class="fa-solid fa-face-sad-tear"></i>
                                                @break
                                            @default
                                                <i class="fa-solid fa-thumbs-up"></i>
                                        @endswitch
                                    </span>
                                    <div class="dropdown-menu py-2">
                                        <a class="ms-2 me-2" wire:click="react('like')" data-bs-toggle="tooltip" data-bs-placement="top" title="Like">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </a>
                                        <a class="me-2" wire:click="react('heart')" data-bs-toggle="tooltip" data-bs-placement="top" title="Love">
                                            <i class="fa-solid fa-heart"></i>
                                        </a>
                                        <a class="me-2" wire:click="react('haha')" data-bs-toggle="tooltip" data-bs-placement="top" title="HaHa">
                                            <i class="fa-solid fa-face-laugh-squint"></i>
                                        </a>
                                        <a class="me-2" wire:click="react('sad')" data-bs-toggle="tooltip" data-bs-placement="top" title="Sade" >
                                            <i class="fa-solid fa-face-sad-tear"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="total-like-block ms-2 me-3">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                        {{ $post->reacts_count? $post->reacts_count: '' }}
                                        {{ $post->reacts_count>1? 'Likes': 'Like' }}
                                    </span>
                                    <div class="dropdown-menu">
                                        @isset( $post->react )
                                            <a class="dropdown-item">{{ $post->react->user->flname }}</a>
                                        @endisset
                                        @foreach ($post->reacts as $react)
                                            <a class="dropdown-item">
                                                @switch(($react->react))
                                                    @case('heart')
                                                        <i class="fa-solid fa-heart me-1"></i>
                                                        @break
                                                    @case('haha')
                                                        <i class="fa-solid fa-face-laugh-squint me-1"></i>
                                                        @break
                                                    @case('sad')
                                                        <i class="fa-solid fa-face-sad-tear me-1"></i>
                                                        @break
                                                    @case('like')
                                                        <i class="fa-solid fa-thumbs-up me-1"></i>
                                                @endswitch
                                                {{ $react->user->flname }}
                                            </a>
                                        @endforeach
                                        @if ( $post->reacts_count_excluding_user>$post->reacts->count() )
                                            <a class="dropdown-item">
                                                {{ $post->reacts_count_excluding_user-$post->reacts->count() }}
                                                {{ ($post->reacts_count_excluding_user-$post->reacts->count())>1? 'Others': 'Other' }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="total-comment-block">
                            <div class="dropdown">
                                <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                    {{ $post->comments_count? $post->comments_count: '' }}
                                    {{ $post->comments_count>1? 'Comments': 'Comment' }}
                                </span>
                                <div class="dropdown-menu">
                                    @foreach ($post->comments as $comment)
                                        @break( $loop->iteration>6 )
                                        <a class="dropdown-item">{{ $comment->user->flname }}</a>
                                    @endforeach
                                    @if ( $post->comments->count()>6 )
                                        <a class="dropdown-item">
                                            {{ $post->comments->count()>7? 'Others': 'Other' }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="share-block d-flex align-items-center feather-icon mt-2 mt-md-0">
                        <a href="javascript:void();" data-bs-toggle="offcanvas" data-bs-target="#share-btn" aria-controls="share-btn">
                            <i class="ri-share-line"></i>
                            <span class="ms-1">99 Share</span>
                        </a>                           
                    </div>
                </div>
                <hr class="mb-2">
                @if ( $comments->lastPage()>$comments->currentPage() )
                    <a wire:click="load_more" class="mb-2" style="color: #50b5ff">
                        Load More Comments
                        <span wire:loading wire:target="load_more">...</span>
                    </a>
                @endif
                <ul wire:poll.visible.8000ms  class="post-comments list-inline p-0 m-0 mt-2">
                    @foreach ($comments->reverse() as $comment)
                        @livewire('post.comment.comment-view-livewire', ['comment_id' => $comment->id], key("comment-view-{$comment->id}"))
                    @endforeach
                </ul>
                
                @livewire('post.comment.comment-livewire', ['post_id' => $post_id], key("post-comment-{$post_id}"))
            </div>
        </div>
    </div>
@endisset
</div>
