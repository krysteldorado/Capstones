<?php

namespace App\Http\Livewire\College;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CollegeLivewire extends Component
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
        $this->authorize('viewAny', College::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', College::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.college.college-livewire', [
            'colleges' => $this->get_colleges()
        ])->extends('layouts.materialize.app');
    }

    public function get_colleges()
    {
        return College::query()
            ->select('colleges.*')
            ->join('campuses', 'campuses.id', '=', 'colleges.campus_id')
            ->search($this->search)
            ->orderBy('campus')
            ->orderBy('college')
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

    public function delete($id)
    {
        $college = College::find($id);
        if ( Gate::allows('delete', $college) && $college->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
