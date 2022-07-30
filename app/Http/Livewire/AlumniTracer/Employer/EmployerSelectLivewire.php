<?php

namespace App\Http\Livewire\AlumniTracer\Employer;

use Livewire\Component;
use App\Models\Employer;
use Livewire\WithPagination;
use App\Http\Traits\ModalTrait;
use Illuminate\Support\Facades\Gate;

class EmployerSelectLivewire extends Component
{
    use ModalTrait;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search, $show_row = 5, $create = false;

    public $employer;

    protected $listeners = [
        'select' => 'select',
    ];
    
    public function getQueryString()
    {
        return [];
    }
    
    protected function rules() {
        return [
            'employer.logo' => "required|min:1|max:200",
            'employer.company' => 'required|max:200',
            'employer.address' => 'required|max:200',
            'employer.business_nature' => 'required|max:200',
        ];
    }

    public function mount()
    {
        $this->employer = new Employer;
    }

    public function render()
    {
        return view('livewire.alumni-tracer.employer.employer-select-livewire', [
            'employers' => $this->get_employers(),
        ]);
    }

    protected function get_employers()
    {
        return Employer::query()
            ->search($this->search)
            ->orderBy('company')
            ->paginate($this->show_row);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedSearch($value)
    {
        $this->resetPage();
    }

    public function select()
    {
        $this->show_modal('employer-select-modal');
    }

    public function select_employer($id)
    {
        $this->emitUp('select_employer', $id);
        $this->hide_modal('employer-select-modal');
    }

    public function create()
    {
        $this->create = !$this->create;;
    }

    public function save()
    {
        $data = $this->validate();

        $this->store($data);

        $this->employer = new Employer;
    }

    protected function store($data)
    {
        if ( Gate::denies('create', Employer::class) ) {
            return;
        }
        
        $employer = Employer::create($data['employer']);
    
        if ( $employer->wasRecentlyCreated ) {
            $this->create();
            $this->select_employer($employer->id);
        }
    }
}
