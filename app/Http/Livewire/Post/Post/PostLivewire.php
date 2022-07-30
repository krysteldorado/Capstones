<?php

namespace App\Http\Livewire\Post\Post;

use App\Models\Post;
use Livewire\Component;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostLivewire extends Component
{
    use ModalTrait;

    public $post;

    protected $rules = [
        'post.post' => 'required|min:3|max:65,535',
    ];

    public function mount()
    {
        $this->post = new Post;
    }

    public function render()
    {
        return view('livewire.post.post.post-livewire');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $data = $this->validate();

        $id = $this->store($data);

        $this->emitUp('post_added', $id);
    }

    public function store($data)
    {
        if ( Gate::denies('create', Post::class) ) {
            return;
        }

        $post = Post::create([
            'user_id' => Auth::id(),
        ] + $data['post']);

        $this->post = new Post;
        $this->hide_modal('post-modal');

        return $post->id;
    }
}
