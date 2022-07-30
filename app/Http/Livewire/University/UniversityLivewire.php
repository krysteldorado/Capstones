<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use App\Models\University;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UniversityLivewire extends Component
{
    use AuthorizesRequests;

    public $logo_refresh = 1;

    protected $listeners = [
        'refresh' => '$refresh',
        'refresh_logo' => 'refresh_logo',
    ];

    public function mount()
    {
        $this->authorize('viewAny', University::class);
    }
    
    public function hydrate()
    {
        if ( Gate::denies('viewAny', University::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.university.university-livewire', [
            'university' =>  $this->get_university(),
        ])->extends('layouts.materialize.app');
    }

    protected function get_university()
    {
        return University::first();
    }

    public function refresh_logo()
    {
        $this->logo_refresh++;
    }
}
