<?php

namespace App\Http\Livewire\User\Designation;

use App\Models\User;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Models\UserDesignation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserDesignationLivewire extends Component
{
    use AuthorizesRequests;
    use AlertTrait;
    
    public $user_id;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->authorize('updateDesignation', $user);
    }

    public function hydrate()
    {
        if ( Gate::denies('updateDesignation', $this->user) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.user.designation.user-designation-livewire', [
            'user' => $this->user,
            'user_designations' => $this->get_user_designations(),
        ])->extends('layouts.materialize.app');
    }

    public function getUserProperty()
    {
        return User::find($this->user_id);
    }

    public function get_user_designations()
    {
        return UserDesignation::query()
            ->where('user_id', $this->user_id)
            ->get();
    }

    public function delete($id)
    {
        $user_designation = UserDesignation::find($id);
        if ( Gate::allows('delete', $user_designation) && $user_designation->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
