<?php

namespace App\Http\Livewire\Campus;

use App\Models\Campus;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CampusLivewire extends Component
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
        $this->authorize('viewAny', Campus::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Campus::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.campus.campus-livewire', [
            'campuses' => $this->get_campuses(),
        ])->extends('layouts.materialize.app');
    }

    public function get_campuses()
    {
        return Campus::query()
            ->search($this->search)
            ->orderBy('campus')
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
        $campus = Campus::find($id);
        if ( Gate::allows('delete', $campus) && $campus->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
