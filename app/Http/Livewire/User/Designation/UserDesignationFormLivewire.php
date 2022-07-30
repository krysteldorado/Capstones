<?php

namespace App\Http\Livewire\User\Designation;

use App\Models\User;
use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use Livewire\Component;
use App\Models\Designation;
use Illuminate\Support\Arr;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use App\Models\UserDesignation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserDesignationFormLivewire extends Component
{
    use AuthorizesRequests;
    use AlertTrait;
    use ModalTrait;
    
    public $user_id;
    public $user_designation;

    protected $listeners = [
        'create' => 'create',
    ];

    protected function rules() {
        $access = $this->get_access();

        return [
            'user_designation.designation_id' => 'required|exists:designations,id',
            'user_designation.campus_id' => [
                'exists:campuses,id',
                'nullable',
                Rule::requiredIf(in_array($access, [
                    'campus',
                    'college',
                    'program',
                ])),
            ],
            'user_designation.college_id' => [
                'exists:colleges,id',
                'nullable',
                Rule::requiredIf(in_array($access, [
                    'college',
                    'program',
                ])),
            ],
            'user_designation.program_id' => [
                'exists:programs,id',
                'nullable',
                Rule::requiredIf(in_array($access, [
                    'program',
                ])),
            ],
        ];
    }

    public function mount(User $user)
    {
        $this->authorize('updateDesignation', $user);

        $this->user_id = $user->id;
        $this->user_designation = new UserDesignation;
    }

    public function hydrate()
    {
        if ( Gate::denies('updateDesignation', $this->user) ) {
            return redirect(url()->previous());
        }
    }
    
    public function render()
    {
        return view('livewire.user.designation.user-designation-form-livewire', [
            'designations' => $this->get_designations(),
            'access' => $this->get_access(),
            'campuses' => $this->get_campuses(),
            'colleges' => $this->get_colleges(),
            'programs' => $this->get_programs(),
        ]);
    }

    public function getUserProperty()
    {
        return User::find($this->user_id);
    }

    protected function get_designations()
    {
        return Designation::orderBy('designation')->get();
    }

    protected function get_access()
    {
        return Designation::find($this->user_designation->designation_id)->access?? '';
    }

    protected function get_campuses()
    {
        return Campus::orderBy('campus')->get();
    }

    protected function get_colleges()
    {
        $campus_id = $this->user_designation->campus_id?? null;
        return College::query()
            ->where('campus_id', $campus_id)
            ->orderBy('college')
            ->get();
    }

    protected function get_programs()
    {
        $college_id = $this->user_designation->college_id?? null;
        return Program::query()
            ->where('college_id', $college_id)
            ->orderBy('program')
            ->get();
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedUserDesignationDesignationId($value)
    {
        $this->user_designation->campus_id = null;
        $this->user_designation->college_id = null;
        $this->user_designation->program_id = null;
    }

    public function updatedUserDesignationCampusId($value)
    {
        $this->user_designation->college_id = null;
        $this->user_designation->program_id = null;
    }

    public function updatedUserDesignationCollegeId($value)
    {
        $this->user_designation->program_id = null;
    }

    public function create()
    {
        $this->user_designation = new UserDesignation;
        
        $this->show_modal('designation-form-modal');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $data = $this->validate();
        
        switch ($this->get_access()) {
            case 'university':
                $data['user_designation']['campus_id'] = null;
            case 'campus':
                $data['user_designation']['college_id'] = null;
                $data['user_designation']['program_id'] = null;
                break;
            case 'college':
                $data['user_designation']['campus_id'] = null;
                $data['user_designation']['program_id'] = null;
                break;
            case 'program':
                $data['user_designation']['campus_id'] = null;
                $data['user_designation']['college_id'] = null;
                break;
        }

        $this->store($data);
        
        $this->emitUp('refresh');
    }

    protected function store($data)
    {
        if ( Gate::denies('updateDesignation', $this->user) ) {
            return;
        }

        $user_designation = UserDesignation::firstOrCreate(['user_id'=>$this->user_id]+$data['user_designation']);

        if ( isset($user_designation) ) {
            $this->alert_success('Success!', 'Record has been successfully added');
            $this->hide_modal('designation-form-modal');
        }
    }
}
