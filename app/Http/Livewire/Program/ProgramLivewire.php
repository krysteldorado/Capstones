<?php

namespace App\Http\Livewire\Program;

use App\Models\Program;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProgramLivewire extends Component
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
        $this->authorize('viewAny', Program::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Program::class) ) {
            return redirect(url()->previous());
        }
    }
    
    public function render()
    {
        return view('livewire.program.program-livewire', [
            'programs' => $this->get_programs()
        ])->extends('layouts.materialize.app');
    }

    public function get_programs()
    {
        return Program::query()
            ->select('programs.*')
            ->join('colleges', 'colleges.id', '=', 'programs.college_id')
            ->join('campuses', 'campuses.id', '=', 'colleges.campus_id')
            ->search($this->search)
            ->orderBy('campus')
            ->orderBy('college')
            ->orderBy('program')
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
        $program = Program::find($id);
        if ( Gate::allows('delete', $program) && $program->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
