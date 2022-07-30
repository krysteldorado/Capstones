<?php

namespace App\Http\Livewire\AlumniTracer;

use Livewire\Component;
use App\Models\Employer;
use Illuminate\Support\Arr;
use App\Models\AlumniTracer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TracerLivewire extends Component
{
    use AuthorizesRequests;
    
    public $tracer;

    public $step = 1, $last_step = 4;

    protected $listeners = [
        'select_employer' => 'select_employer',
    ];

    protected function rules()
    {
        return [
            'tracer.employer_id' => 'required|exists:employers,id',
            'tracer.position' => 'required|in:fulltime,parttime,unemployed,notavailable',
            'tracer.futher_study' => 'required|boolean',
            'tracer.related_specialization' => 'required|boolean',
        ];
    }

    protected $validationAttributes = [
        'tracer.employer_id' => 'company',
    ];

    public function mount()
    {
        $this->authorize('create', AlumniTracer::class);
        $this->tracer = new AlumniTracer;

        if ( Gate::denies('submittedThisYear', AlumniTracer::class) ) {
            $this->step = $this->last_step;
        }
    }

    public function render()
    {
        return view('livewire.alumni-tracer.tracer-livewire')->extends('layouts.socialv.app');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function select_employer($id)
    {
        $this->tracer->employer_id = Employer::where('id', $id)->exists()? $id: null;
    }

    public function next()
    {
        switch ($this->step) {
            case 1:
                
                break;
            case 2:
                $this->validate(Arr::only($this->rules(), [
                    'tracer.employer_id',
                    'tracer.position',
                ]));
                break;
            case 3:
                $this->validate(Arr::only($this->rules(), [
                    'tracer.futher_study',
                    'tracer.related_specialization',
                ]));
                break;
            case 4:
                
                break;
        }

        $this->step++;
    }

    public function prev()
    {
        $this->step = ($this->step>1)? $this->step-1: 1;
    }

    public function submit()
    {
        $data = $this->validate();

        $this->store($data);

        $this->step++;
    }

    public function store($data)
    {
        AlumniTracer::create([
            'user_id' => Auth::id(),
            'traced_at' => now(), 
        ] + $data['tracer'] );
    }
}
