<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use App\Models\University;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;

class UniversityFormLivewire extends Component
{
    use AlertTrait;
    use ModalTrait;
    
    public $university_info;
    
    protected $listeners = [
        'edit' => 'edit',
    ];

    protected function rules() {
        return [
            'university_info.university' => 'required|min:1|max:200',
            'university_info.about' => 'required|min:1|max:1000',
        ];
    }

    public function hydrate()
    {
        if ( Gate::denies('update', University::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.university.university-form-livewire');
    }

    protected function get_university()
    {
        return University::first();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit()
    {
        if ( Gate::denies('update', University::class) ) {
            return;
        }

        $university = $this->get_university();
        $this->university_info = $university? $university->replicate(): new University;
        $this->show_modal('university-modal');
    }

    public function save()
    {
        if ( Gate::denies('update', University::class) ) {
            return;
        }

        $this->validate();

        $university_info = $this->get_university();
        $university = $university_info? $university_info: new University;
        $university->university = $this->university_info->university;
        $university->about = $this->university_info->about;
        $university->save();

        if ( $university ) {
            $this->alert_success('University Updated!');
        }

        $this->hide_modal('university-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emitUp('refresh');
    }
}
