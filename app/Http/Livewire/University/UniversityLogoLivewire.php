<?php

namespace App\Http\Livewire\University;

use Livewire\Component;
use App\Models\University;
use Livewire\WithFileUploads;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UniversityLogoLivewire extends Component
{
    use WithFileUploads;
    use AlertTrait;
    use ModalTrait;

    public $file;
    
    protected $listeners = [
        'edit_logo' => 'edit_logo',
    ];

    public function hydrate()
    {
        if ( Gate::denies('updateLogo', University::class) ) {
            return redirect(url()->previous());
        }
    }
    
    public function render()
    {
        return view('livewire.university.university-logo-livewire');
    }
    
    protected function get_university()
    {
        return University::first()?? new University;
    }

    public function edit_logo()
    {
        if ( Gate::denies('updateLogo', University::class) ) {
            return;
        }

        $this->file = null;
        $this->show_modal('university-logo-modal');
    }

    public function get_file_extension()
    {
        return pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION);
    }

    public function save_logo()
    {
        if ( Gate::denies('updateLogo', University::class) ) {
            return;
        }

        $validator = Validator::make([
            'file' => $this->file,
        ], [
            'file' => 'file|max:6000',
        ]);

        if ( $validator->fails() ) {
            $this->addError('file', $validator->errors()->first());
            return;
        }
        
        $filename = 'university.'.$this->get_file_extension();

        $this->file->storeAs('university', $filename);

        $university_info = $this->get_university();
        $university_info->logo = $filename;
        $university_info->save();

        $this->alert_success('University Logo Updated!');
        $this->hide_modal('university-logo-modal');
        $this->emitUp('refresh_logo');
    }
}
