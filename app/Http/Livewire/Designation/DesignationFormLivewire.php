<?php

namespace App\Http\Livewire\Designation;

use Livewire\Component;
use App\Models\Designation;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;

class DesignationFormLivewire extends Component
{
    use AlertTrait;
    use ModalTrait;
    
    public $designation_id;
    public $designation;

    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit',
    ];

    protected function rules() {
        return [
            'designation.designation' => "required|min:1|max:200|unique:designations,designation,{$this->designation_id}",
            'designation.access' => 'required|max:200|in:university,campus,college,program',
        ];
    }

    public function mount()
    {
        $this->designation = new Designation;
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Designation::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.designation.designation-form-livewire');
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->designation_id = null;
        $this->designation = new Designation;
        
        $this->show_modal('designation-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($id)
    {
        $designation = Designation::find($id);
        
        if ( Gate::allows('update', $designation) ) {
            $this->designation_id = $id;
            $this->designation = $designation->replicate();
            $this->show_modal('designation-form-modal');
        }
        
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $data = $this->validate();

        isset($this->designation_id)? $this->update($data): $this->store($data);

        $this->designation = new Designation;
        $this->emitUp('refresh');
    }

    protected function store($data)
    {
        if ( Gate::denies('create', Designation::class) ) {
            return;
        }
        
        $designation = Designation::create($data['designation']);
    
        if ( $designation->wasRecentlyCreated ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('designation-form-modal');
        }
    }

    protected function update($data)
    {
        $designation = Designation::find($this->designation_id);
        if ( Gate::denies('update', $designation) ) {
            return;
        }
        
        if ( $designation->update($data['designation']) ) {
            $this->alert_success('Success!', 'Record has been successfully updated');
        }
    
        $this->hide_modal('designation-form-modal');
    }
}
