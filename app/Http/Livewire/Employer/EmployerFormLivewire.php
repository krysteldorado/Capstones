<?php

namespace App\Http\Livewire\Employer;

use Livewire\Component;
use App\Models\Employer;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;

class EmployerFormLivewire extends Component
{

    use AlertTrait;
    use ModalTrait;
    
    public $employer_id;
    public $employer;

    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit',
    ];

    protected function rules() {
        return [
            'employer.logo' => "required|min:1|max:200|unique:employers,logo,{$this->employer_id}",
            'employer.company' => 'required|max:200',
            'employer.address' => 'required|max:200',
            'employer.business_nature' => 'required|max:200',

        ];
    }

    public function mount()
    {
        $this->employer = new Employer;
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', Employer::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.employer.employer-form-livewire');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->employer_id = null;
        $this->employer = new Employer;
        
        $this->show_modal('employer-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($id)
    {
        $employer = Employer::find($id);
        
        if ( Gate::allows('update', $employer) ) {
            $this->employer_id = $id;
            $this->employer = $employer->replicate();
            $this->show_modal('employer-form-modal');
        }
        
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $data = $this->validate();

        isset($this->employer_id)? $this->update($data): $this->store($data);

        $this->employer = new Employer;
        $this->emitUp('refresh');
    }

    protected function store($data)
    {
        if ( Gate::denies('create', Employer::class) ) {
            return;
        }
        
        $employer = Employer::create($data['employer']);
    
        if ( $employer->wasRecentlyCreated ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('employer-form-modal');
        }
    }

    protected function update($data)
    {
        $employer = Employer::find($this->employer_id);
        if ( Gate::denies('update', $employer) ) {
            return;
        }
        
        if ( $employer->update($data['employer']) ) {
            $this->alert_success('Success!', 'Record has been successfully updated');
        }
    
        $this->hide_modal('employer-form-modal');
    }
}

