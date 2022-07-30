<?php

namespace App\Http\Livewire\AlumniRegister;

use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\AlumniRegister;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Livewire\AlumniRegister\AlumniRegisterLivewire;

class AlumniRegisterLivewire extends Component
{
    use AuthorizesRequests;
    
    public $register;

    public $step = 1, $last_step = 3;

    protected  $rules=[
        'register.campus_id' => 'required|exists:campuses,id|exclude',
        'register.college_id' => 'required|exists:colleges,id|exclude',
        'register.program_id' => 'required|exists:programs,id',
        'register.graduated_at' => 'required|max:10',
        'register.firstname' => 'required|max:40',
        'register.middlename' => 'required|max:40',
        'register.lastname' => 'required|max:40',
        'register.sex' => 'required|required|in:female,male',
        'register.civil_status' => 'required|max:40',
        'register.phone' => "required|regex:/(09)[0-9]{9}/|max:11||unique:users,phone,id",
        'register.email' => "required|email|unique:users,email,id",
        'register.password' => 'required|max:20',
        
    ];

    protected $validationAttributes = [
        'section.campus_id' => 'campus',
        'section.college_id' => 'college',
        'section.program_id' => 'program',
    ];

    public function mount()
    {
        
        $this->register = new AlumniRegister;

    }
    
    public function render()
    {
        return view('livewire.alumni-register.alumni-register-livewire', [
            'campuses' => $this->get_campuses(),
            'colleges' => $this->get_colleges(),
            'programs'=> $this-> get_programs(),
        ])->extends('layouts.socialv.blank');
    }
    protected function get_campuses()
    {
        return Campus::orderBy('campus')->get();
    }

    protected function get_colleges()
    {
        $campus_id = $this->program->campus_id?? null;
        return College::query()
            ->when(!empty($campus_id), function ($q) use ($campus_id) {
                $q->where('campus_id', $campus_id);
            })
            ->orderBy('college')
            ->get();
    }

    protected function get_programs()
    {

        $college_id = $this->section->college_id?? null;
        return Program::query()
            ->when(!empty($college_id), function ($q) use ($college_id) {
                $q->where('college_id', $college_id);
            })
            ->orderBy('program')
            ->get();
    }
    

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function next()
    {
        switch ($this->step) {
            case 1:
                $this->validate(Arr::only($this->rules, [
                    'register.firstname',
                    'register.middlename',
                    'register.lastname',
                    'register.sex' ,
                    'register.civil_status' ,
                    'register.phone' ,
                    'register.email' ,
                    'register.password',
                ]));
                
                break;
            case 2:

                $this->validate(Arr::only($this->rules, [
                    'register.campus_id',
                    'register.college_id',
                    'register.program_id',
                    'register.graduated_at' ,
                ]));
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

        return redirect()->to('register');
    }

    public function store($data)
    {
        $data['register']['password'] = Hash::make($data['register']['password']);

        $register= AlumniRegister::create($data['register']);
        
    }

    

}
