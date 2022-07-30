<?php

namespace App\Http\Livewire\Post\Post;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostComment;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PostViewLivewire extends Component
{
    use WithPagination;
    
    public $post_id;
    public $comment_count = 3;

    protected $listeners = [
        'refresh' => '$refresh',
        'comment_added' => 'comment_added',
        'comment_deleted' => 'comment_deleted',
    ];

    public function getQueryString()
    {
        return [];
    }

    public function render()
    {
        return view('livewire.post.post.post-view-livewire', [
            'post' => $this->get_post(),
            'comments' => $this->get_comments(),
        ]);
    }

    public function get_post()
    {
        return Post::with([
                'user',
                'react',
                'reacts'=>function ($query) {
                    $query->with('user')
                    ->where('user_id', '!=', Auth::id())
                    ->limit(6);
                },
                'comments'=>function ($query) {
                    $query->with('user')
                    ->groupBy('user_id')
                    ->limit(8);
                },
            ])
            ->withCount([
                'comments',
                'reacts',
                'reacts as reacts_count_excluding_user'=>function ($query) {
                    $query->where('user_id', '!=', Auth::id());
                },
            ])
            ->find($this->post_id);
    }

    public function get_comments()
    {
        return PostComment::query()
            ->select('id')
            ->where('post_id', $this->post_id)
            ->latest()
            ->paginate($this->comment_count);
    }

    public function load_more()
    {
        $this->comment_count += 5;
    }

    public function comment_added()
    {
        $this->comment_count++;
    }

    public function comment_deleted()
    {
        $this->comment_count = $this->comment_count<=1? 1 :$this->comment_count-1;
    }

    public function react($react)
    {
        $data = Validator::make(
            ['react' => $react],
            ['react' => 'required|in:like,heart,haha,sad'],
            [],
        )->validate();

        $post = Post::find($this->post_id);
        if ( Gate::allows('react', $post) ) {
            if ( isset($post->react) && $post->react->react===$react ) {
                $post->react->delete();
                return;
            }

            $post->reacts()->updateOrCreate([
                'user_id' => Auth::id(),
            ], $data);
        }
    }

    public function delete()
    {
        $post = Post::find($this->post_id);
        if ( Gate::allows('delete', $post) && $post->delete() ) {
            $this->emitUp('refresh');
        }
    }
}
