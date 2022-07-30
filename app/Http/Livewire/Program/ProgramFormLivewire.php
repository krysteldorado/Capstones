<?php

namespace App\Http\Livewire\Program;

use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;

class ProgramFormLivewire extends Component
{
    use AlertTrait;
    use ModalTrait;
    
    public $program_id;
    public $program;

    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit',
    ];

    protected function rules() {
        return [
            'program.campus_id' => 'required|exists:campuses,id|exclude',
            'program.college_id' => 'required|exists:colleges,id',
            'program.program' => "required|min:1|max:200|unique:programs,program,{$this->program_id},id,college_id,{$this->program->college_id}",
            'program.abbreviation' => 'required|max:40',
        ];
    }

    protected $validationAttributes = [
        'program.campus_id' => 'campus',
        'program.college_id' => 'college',
    ];

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Program::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.program.program-form-livewire', [
            'campuses' => $this->get_campuses(),
            'colleges' => $this->get_colleges(),
        ]);
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
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->program_id = null;
        $this->program = new Program;
        
        $this->show_modal('program-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($id)
    {
        $program = Program::find($id);
        
        if ( Gate::allows('update', $program) ) {
            $this->program_id = $id;
            $this->program = $program->replicate();
            $this->program->campus_id = $program->college->campus_id;
            $this->show_modal('program-form-modal');
        }
        
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $data = $this->validate();

        isset($this->program_id)? $this->update($data): $this->store($data);

        $this->program = new Program;
        $this->emitUp('refresh');
    }

    protected function store($data)
    {
        if ( Gate::denies('create', Program::class) ) {
            return;
        }

        $program = Program::create($data['program']);

        if ( $program->wasRecentlyCreated ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('program-form-modal');
        }
    }

    protected function update($data)
    {
        $program = Program::find($this->program_id);
        if ( Gate::denies('update', $program) ) {
            return;
        }
        
        if ( $program->update($data['program']) ) {
            $this->alert_success('Success!', 'Record has been successfully updated');
            $this->hide_modal('program-form-modal');
        }
    }
}
