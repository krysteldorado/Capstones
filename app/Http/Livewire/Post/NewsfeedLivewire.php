<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class NewsfeedLivewire extends Component
{
    public $posts = [];
    public $post_load = 10;

    protected $listeners = [
        'refresh' => '$refresh',
        'post_added' => 'post_added',
    ];

    public function mount()
    {
        $this->load_posts();
    }

    public function render()
    {
        return view('livewire.post.newsfeed-livewire')->extends('layouts.socialv.app');
    }

    public function post_added($id)
    {
        $posts = Post::query()
            ->select('id')
            ->where('id', $id)
            ->get()
            ->toArray();
            
        $this->posts = array_merge($posts, $this->posts);
    }

    public function load_posts()
    {
        $posts = Post::query()
            ->select('id')
            ->whereNotIn('id', $this->posts)
            ->limit($this->post_load)
            ->latest()
            ->get()
            ->toArray();

        $this->posts = array_merge($this->posts, $posts);
    }
}
