<?php

namespace App\Http\Livewire\User;

use App\Models\Campus;
use App\Models\Alumnus;
use App\Models\College;
use App\Models\Program;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\User\AlumProgramFormLivewire;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AlumProgramFormLivewire extends Component
{
    use AuthorizesRequests;
    use AlertTrait;
    use ModalTrait;
    
    public $user_id;
    public $alumni_program;

    protected $listeners = [
        'create' => 'create',
    ];

    protected function rules() {
    
        return [
         
            'alumni_program.campus_id' => [
                'exists:campuses,id',
                'nullable','exclude'

            ],
            'alumni_program.college_id' => [
                'exists:colleges,id',
                'nullable','exclude'
                
            ],
            'alumni_program.program_id' => [
                'exists:programs,id',
                'nullable',
               
            ],
            'alumni_program.graduated_at' => "required|min:1|max:200|unique:alumni,graduated_at,{$this->user_id},id,program_id,{$this->alumni_program->program_id}",
        
            
        ];
    }

    public function mount(User $user)
    {
        
        $this->user_id = $user->id;
        $this->alumni_program = new Alumnus;
    }

    public function hydrate()
    {
        // if ( Gate::denies('updateAlumProgram', $this->user) ) {
        //     return redirect(url()->previous());
        // }
    }
    
    public function render()
    {
        return view('livewire.user.alum-program-form-livewire', [
            'campuses' => $this->get_campuses(),
            'colleges' => $this->get_colleges(),
            'programs' => $this->get_programs(),
            
        ]);
    }

    public function getUserProperty()
    {
        return User::find($this->user_id);
    }

    protected function get_campuses()
    {
        return Campus::orderBy('campus')->get();
    }

    protected function get_colleges()
    {
      $campus_id = $this->alumni_program->campus_id?? null;
        return College::query()
            ->where('campus_id', $campus_id)
            ->orderBy('college')
            ->get();
    }

    protected function get_programs()
    {
        $college_id = $this->alumni_program->college_id?? null;
        return Program::query()
            ->where('college_id', $college_id)
            ->orderBy('program')
            ->get();
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    


    public function updatedAlumniProgramCampusId($value)
    {
        $this->alumni_program->college_id = null;
        $this->alumni_program->program_id = null;
    }

    public function updatedAlumniProgramCollegeId($value)
    {
        $this->alumni_program->program_id = null;
    }
    
    public function create()
    {

        $this->alumni_program = new Alumnus;
        $this->show_modal('designation-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
            
    }

    

    public function save()
    {
        $data = $this->validate();
        
        $this->store($data);
        
        $this->emitUp('refresh');

        
    }

    protected function store($data)
    {
        // if ( Gate::denies('updateAlumProgram', $this->user) ) {
        //     return;
        // }

        $alumni_program = Alumnus::firstOrCreate(['user_id'=>$this->user_id]+$data['alumni_program']);

        if ( isset($alumni_program) ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('designation-form-modal');
        }
    }
}


