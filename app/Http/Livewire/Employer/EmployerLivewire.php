<?php

namespace App\Http\Livewire\Employer;

use App\Models\Employer;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmployerLivewire extends Component
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
        $this->authorize('viewAny', Employer::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Employer::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.employer.employer-livewire', [
            'employers' => $this->get_employer(),
        ])->extends('layouts.materialize.app');
    }

    public function get_employer()
    {
        return Employer::query()
        ->search($this->search)
        ->orderBy('company')
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
        $employer = Employer::find($id);
        if ( Gate::allows('delete', $employer) && $employer->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
