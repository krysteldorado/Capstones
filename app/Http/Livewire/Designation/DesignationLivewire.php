<?php

namespace App\Http\Livewire\Designation;

use Livewire\Component;
use App\Models\Designation;
use Livewire\WithPagination;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DesignationLivewire extends Component
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
        $this->authorize('viewAny', Designation::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Designation::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.designation.designation-livewire', [
            'designations' => $this->get_designations(),
        ])->extends('layouts.materialize.app');
    }

    public function get_designations()
    {
        return Designation::query()
            ->search($this->search)
            ->orderBy('designation')
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
        $designation = Designation::find($id);
        if ( Gate::allows('delete', $designation) && $designation->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
