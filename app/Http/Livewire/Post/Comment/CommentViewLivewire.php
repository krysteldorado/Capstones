<?php

namespace App\Http\Livewire\Post\Comment;

use Livewire\Component;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentViewLivewire extends Component
{
    public $comment_id;

    public function render()
    {
        return view('livewire.post.comment.comment-view-livewire', [
            'comment' => $this->get_comment(),
        ]);
    }
    
    public function get_comment()
    {
        return PostComment::with(['user','react'])->withCount('reacts')->find($this->comment_id);
    }

    public function react()
    {
        $comment = PostComment::with('react')->find($this->comment_id);
        if ( Gate::denies('react', $comment) ) {
            return;
        }

        isset($comment->react)
            ? $comment->react->delete()
            : $comment->reacts()->create([
                'user_id' => Auth::id(),
            ]);
    }

    public function delete()
    {
        $comment = PostComment::find($this->comment_id);
        if ( Gate::allows('delete', $comment) && $comment->delete() ) {
            $this->emitUp('comment_deleted');
        }
    }
}
