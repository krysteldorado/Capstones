<?php

namespace App\Http\Livewire\College;

use App\Models\Campus;
use App\Models\College;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;

class CollegeFormLivewire extends Component
{
    use AlertTrait;
    use ModalTrait;
    
    public $college_id;
    public $college;

    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit',
    ];

    protected function rules() {
        return [
            'college.campus_id' => 'required|exists:campuses,id',
            'college.college' => "required|min:1|max:200|unique:colleges,college,{$this->college_id},id,campus_id,{$this->college->campus_id}",
            'college.abbreviation' => 'required|max:40',
        ];
    }

    protected $validationAttributes = [
        'college.campus_id' => 'campus',
    ];

    public function hydrate()
    {
        if ( Gate::denies('viewAny', College::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.college.college-form-livewire', [
            'campuses' => $this->get_campuses(),
        ]);
    }

    protected function get_campuses()
    {
        return Campus::orderBy('campus')->get();
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->college_id = null;
        $this->college = new College;
        
        $this->show_modal('college-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($id)
    {
        $college = College::find($id);
        
        if ( Gate::allows('update', $college) ) {
            $this->college_id = $id;
            $this->college = $college->replicate();
            $this->show_modal('college-form-modal');
        }
        
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $data = $this->validate();

        isset($this->college_id)? $this->update($data): $this->store($data);

        $this->college = new College;
        $this->emitUp('refresh');
    }

    protected function store($data)
    {
        if ( Gate::denies('create', College::class) ) {
            return;
        }

        $college = College::create($data['college']);

        if ( $college->wasRecentlyCreated ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('college-form-modal');
        }
    }

    protected function update($data)
    {
        $college = College::find($this->college_id);
        if ( Gate::denies('update', $college) ) {
            return;
        }
        
        if ( $college->update($data['college']) ) {
            $this->alert_success('Success!', 'Record has been successfully updated');
            $this->hide_modal('college-form-modal');
        }
    }
}
