<?php

namespace App\Http\Livewire\Post\Comment;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentLivewire extends Component
{
    public $post_id;
    public $comment;

    protected $rules = [
        'comment.comment' => 'required|max:250',
    ];

    public function mount()
    {
        $this->comment = new PostComment;
    }

    public function render()
    {
        return view('livewire.post.comment.comment-livewire');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $data = $this->validate();

        $this->store($data);

        $this->emitUp('comment_added');
    }

    public function store($data)
    {
        $post = Post::find($this->post_id);
        if ( Gate::denies('comment', $post) ) {
            return;
        }

        $post->comments()->create([
            'user_id' => Auth::id(),
        ] + $data['comment']);

        $this->comment = new PostComment;
    }
}
