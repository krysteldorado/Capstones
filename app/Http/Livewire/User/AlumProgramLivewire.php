<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Alumnus;
use App\Models\Program;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Models\UserDesignation;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\User\AlumProgramLivewire;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AlumProgramLivewire extends Component
{

    use AuthorizesRequests;
    use AlertTrait;
    
    public $count;
    public $user_id;
    public $search, $show_row = 5;


    protected $listeners = [
        'refresh' => '$refresh',
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'show_row' => ['except' => 5, 'as' => 'row'],
    ];

    public function disabled(){
        
    }
    public function getQueryString()
    {
        return $this->queryString;
    }


    public function mount(User $user)
    {
        
        $this->user_id = $user->id;
        $this->authorize('updateAlumniProgram', $user);
    }

    public function hydrate()
    {
        if ( Gate::denies('updateAlumniProgram', $this->user) ) {
            return redirect(url()->previous());
        }
    }
    

    public function render()
    {
        return view('livewire.user.alum-program-livewire', [
            'user' => $this->user,
            'alumni_program' => $this->get_alumni_program(),
        ])->extends('layouts.materialize.app');

       
    }

    public function getUserProperty()
    {
        return User::find($this->user_id);
    }

    public function get_alumni_program()
    {
        return Alumnus::query()
            ->where('user_id', $this->user_id)
            ->get();
    }



    public function delete($id)
    {
        $alumni_program = Alumnus::find($id);
        if ( Gate::allows('delete', $alumni_program) && $alumni_program->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}

