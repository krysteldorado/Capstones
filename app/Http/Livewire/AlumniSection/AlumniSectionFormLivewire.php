<?php

namespace App\Http\Livewire\AlumniSection;

use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use Livewire\Component;
use App\Models\AlumniSection;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\AlumniSection\AlumniSectionFormLivewire;

class AlumniSectionFormLivewire extends Component
{

    use AlertTrait;
    use ModalTrait;
    
    public $section_id;
    public $section;

    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit',
    ];


    protected function rules() {
        return [
            'section.campus_id' => 'required|exists:campuses,id|exclude',
            'section.college_id' => 'required|exists:colleges,id|exclude',
            'section.program_id' => 'required|exists:programs,id',
            'section.major' => "required|min:1|max:200|unique:alumni_sections,major,{$this->section_id},id,program_id,{$this->section->program_id}",
            'section.academic_year' => 'required|max:40',
            'section.section' => 'required|max:40',
        ];
    }

    protected $validationAttributes = [
        'section.campus_id' => 'campus',
        'section.college_id' => 'college',
        'section.program_id' => 'program',
    ];
    
    public function hydrate()
    {
        if ( Gate::denies('viewAny', AlumniSection::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.alumni-section.alumni-section-form-livewire', [
            'campuses' => $this->get_campuses(),
            'colleges' => $this->get_colleges(),
            'programs'=> $this-> get_programs(),
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

    public function create()
    {
        $this->section_id = null;
        $this->section = new AlumniSection;
        
        $this->show_modal('alumni_sections-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($id)
    {
        $section = AlumniSection::find($id);
        
        if ( Gate::allows('update', $section) ) {
            $this->section_id = $id;
            $this->section = $section->replicate();
            $this->section -> campus_id = $section->program->college->campus_id;
            $this->section -> college_id = $section->program->college_id;
            $this->show_modal('alumni_sections-form-modal');
        }
        
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $data = $this->validate();

        isset($this->section_id)? $this->update($data): $this->store($data);

        $this->college = new College;
        $this->emitUp('refresh');
    }

    protected function store($data)
    {
        if ( Gate::denies('create', AlumniSection::class) ) {
            return;
        }

        $section = AlumniSection::create($data['section']);

        if ( $section->wasRecentlyCreated ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('alumni_sections-form-modal');
        }
    }

    protected function update($data)
    {
        $section = AlumniSection::find($this->section_id);
        if ( Gate::denies('update', $section) ) {
            return;
        }
        
        if ( $section->update($data['section']) ) {
            $this->alert_success('Success!', 'Record has been successfully updated');
            $this->hide_modal('alumni_sections-form-modal');
        }
    }

}
