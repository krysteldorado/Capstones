<?php

namespace App\Http\Livewire\AlumniSection;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AlumniSection;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Livewire\AlumniSection\AlumniSectionLivewire;

class AlumniSectionLivewire extends Component
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
      $this->authorize('viewAny', AlumniSection::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', AlumniSection::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.alumni-section.alumni-section-livewire', [
            'alumni_sections' => $this->get_alumnisections()
        ])->extends('layouts.materialize.app');
    }

    public function get_alumnisections()
    {
        return AlumniSection::query()
           ->select('alumni_sections.*')
           ->join('programs', 'programs.id', '=', 'alumni_sections.program_id')
            ->search($this->search)
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
        $section = AlumniSection::find($id);
        if ( Gate::allows('delete', $section) && $section->delete() ) {
            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}

