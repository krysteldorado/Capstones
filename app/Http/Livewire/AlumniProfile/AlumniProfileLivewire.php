<?php

namespace App\Http\Livewire\AlumniProfile;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\PostComment;
use Livewire\WithPagination;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AlumniProfileLivewire extends Component
{
    //use WithPagination;
    use ModalTrait;

    public $search;
    public $post;
    public $post_id;
    public $posts_count = 5;
    public $prof_id;
    public $prof;

    protected $listeners = [
        'refresh' => '$refresh',
        'post_added' => '$refresh',
    ];

    public function getQueryString()
    {
        return [];
    }

    public function mount()
    {
        
    }

    public function view($id){
        $prof = User::find($id);
            if (isset($prof)) {
                $this->prof_id=$id;
            }
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', User::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.alumni-profile.alumni-profile-livewire', [
            'posts' => $this->get_posts(),
            'prof' => $this->get_profile(),
            'alum' => $this->get_profile(),
            
        ])->extends('layouts.socialv.app');
    }

    public function get_posts()
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
            ->where('user_id',Auth::id())
            ->orderBy('created_at','desc')
            ->paginate($this->posts_count);
    }

    

    public function load_posts()
    {
        $this->posts_count += 5;
    }


    public function get_profile()
    {
        return Auth::user();
    }

}
