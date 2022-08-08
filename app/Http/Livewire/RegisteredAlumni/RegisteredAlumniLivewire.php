<?php

namespace App\Http\Livewire\RegisteredAlumni;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AlumniRegister;
use App\Http\Traits\AlertTrait;
use App\Models\RegisteredAlumni;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Livewire\RegisteredAlumni\RegisteredAlumniLivewire;

class RegisteredAlumniLivewire extends Component
{
    use AuthorizesRequests;
    use AlertTrait;
    use WithPagination;
    

    public $search, $show_row = 10;
    public $registered_id;

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
      $this->authorize('viewAny', RegisteredAlumni::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', RegisteredAlumni::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.registered-alumni.registered-alumni-livewire',[
            'regis' => $this->get_registered()
        ])->extends('layouts.socialv.app');
    }

    public function get_registered()
    {
        return AlumniRegister::query() //AlumniReg Table
            ->search($this->search)
            ->orderBy('lastname')
            ->paginate($this->show_row);
    }


      public function updatedShowRow()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function deleteId($id, $action)
    {
        if ($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }

        $this->registered_id=$id;
    }
  
    
    public function delete()
    {
        AlumniRegister::find($this->registered_id)->delete();
        return redirect()->to('alumni/registeredalumni');
        
    }

}
