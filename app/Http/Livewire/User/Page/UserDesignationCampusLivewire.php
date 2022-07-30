<?php

namespace App\Http\Livewire\User\Page;

use App\Models\User;
use Livewire\Component;
use App\Models\Designation;
use Livewire\WithPagination;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserDesignationCampusLivewire extends Component
{
    use AuthorizesRequests;
    use AlertTrait;
    use WithPagination;
    protected $paginationTheme = 'materialize';

    public $search, $show_row = 5;
    
    public $designation_id;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'show_row' => ['except' => 5, 'as' => 'row'],
        'page' => ['except' => 1],
    ];

    public function getQueryString()
    {
        return $this->queryString;
    }

    public function mount(Designation $designation)
    {
        $this->designation_id = $designation->id;
        
        abort_if($designation->access!='campus', 404);

        $this->authorize('viewAny', User::class);
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', User::class) ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.user.page.user-designation-campus-livewire', [
            'users' => $this->get_users(),
        ])->extends('layouts.materialize.app', [
            'designation_id' => $this->designation_id,
        ]);
    }
    
    public function get_users()
    {
        $designation_id = $this->designation_id;
        return User::query()
            ->with([
                'user_designations' => function ($query) use ($designation_id) {
                    $query->with('campus')
                    ->where('designation_id', $designation_id);
                },
            ])
            ->notAdmin()
            ->search($this->search)
            ->whereHas('user_designations', function ($query) use ($designation_id) {
                $query->where('designation_id', $designation_id);
            })
            ->orderBy('lastname')
            ->orderBy('firstname')
            ->paginate($this->show_row);
    }
    
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedShowRow()
    {
        $this->resetPage();
    }
    
    public function delete($user_id)
    {
        $user = User::find($user_id);
        if ( Gate::allows('updateDesignation', $user) ) {
            $user->user_designations()
                ->where('designation_id', $this->designation_id)
                ->delete();

            $this->alert_success('Success!', 'Record has been successfully deleted');
        }
    }
}
