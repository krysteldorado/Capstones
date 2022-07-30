<?php

namespace App\Http\Livewire\Campus;

use App\Models\Campus;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;

class CampusFormLivewire extends Component
{
    use AlertTrait;
    use ModalTrait;
    
    public $campus_id;
    public $campus;

    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit',
    ];

    protected function rules() {
        return [
            'campus.campus' => "required|min:1|max:200|unique:campuses,campus,{$this->campus_id}",
            'campus.address' => 'required|max:200',
        ];
    }

    public function mount()
    {
        $this->campus = new Campus;
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Campus::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.campus.campus-form-livewire');
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->campus_id = null;
        $this->campus = new Campus;
        
        $this->show_modal('campus-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($id)
    {
        $campus = Campus::find($id);
        
        if ( Gate::allows('update', $campus) ) {
            $this->campus_id = $id;
            $this->campus = $campus->replicate();
            $this->show_modal('campus-form-modal');
        }
        
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $data = $this->validate();

        isset($this->campus_id)? $this->update($data): $this->store($data);

        $this->campus = new Campus;
        $this->emitUp('refresh');
    }

    protected function store($data)
    {
        if ( Gate::denies('create', Campus::class) ) {
            return;
        }
        
        $campus = Campus::create($data['campus']);
    
        if ( $campus->wasRecentlyCreated ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('campus-form-modal');
        }
    }

    protected function update($data)
    {
        $campus = Campus::find($this->campus_id);
        if ( Gate::denies('update', $campus) ) {
            return;
        }
        
        if ( $campus->update($data['campus']) ) {
            $this->alert_success('Success!', 'Record has been successfully updated');
        }
    
        $this->hide_modal('campus-form-modal');
    }
}
