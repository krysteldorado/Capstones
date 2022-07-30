<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GradLivewire extends Component
{
    use AuthorizesRequests;
    use AlertTrait;
    use WithPagination;
    protected $paginationTheme = 'materialize';

    public $search, $show_row = 5;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'show_row' => ['except' => 5, 'as' => 'row'],
        'page' => ['except' => 1],
    ];

    public function getQueryString()
    {
        return $this->queryString;
    }

    public function mount()
    {
        $this->authorize('viewAny', User::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', User::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.user.grad-livewire', [
            'users' => $this->get_users(),
        ])->extends('layouts.materialize.app');
    }
    
    public function get_users()
    {
        return User::query()
            ->alumni()
            ->search($this->search)
            ->orderBy('lastname')
            ->orderBy('firstname')
            ->paginate($this->show_row);
    }
    
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedShowRow()
    {
        $this->resetPage();
    }
    
    public function delete($user_id)
    {
        $user = User::find($user_id);
        if ( Gate::allows('delete', $user) && $user->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
