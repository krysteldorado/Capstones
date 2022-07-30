<?php

namespace App\Http\Livewire\RegisteredAlumni;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Alumnus;
use Livewire\Component;
use App\Models\AlumniRegister;
use App\Http\Traits\AlertTrait;
use App\Http\Traits\ModalTrait;
use App\Models\RegisteredAlumni;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class RegisteredAlumniFormLivewire extends Component
{ 

    use ModalTrait;

    public $user_id;
    public $registered_id;
    public $register;
    

    protected $listeners = [
        'view' => 'view',
    ];

    protected function rules()
    
    {
        return[
        'register.campus_id' => 'required|exists:campuses,id|exclude',
        'register.college_id' => 'required|exists:colleges,id|exclude',
        'register.program_id' => 'required|exists:programs,id',
        'register.graduated_at' => 'required|max:10',
    ];

    }


    public function view($id){
        $registered = AlumniRegister::find($id);
            if (isset($registered)) {
                $this->registered_id=$id;
                $this->show_modal('ExampleModal');
            }
    }

    public function hydrate()
    {
        if ( Gate::denies('viewAny', AlumniRegister::class) ) {
            return redirect(url()->previous());
        }
    }

    // public function mount(User $user)
    // {
    //   $this->user_id = $user->id;
    //   $this->register = new Alumnus;
    // }

    public function render()
    {
        return view('livewire.registered-alumni.registered-alumni-form-livewire',[
            'registered'=>$this->get_registered(),
        ]) ->extends('layouts.socialv.app');
    }

    public function get_registered()
    {
        return AlumniRegister::find( $this->registered_id);
    }

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function save()
    {
        
        $register=$this->get_registered();

        $today = Carbon::now();

        $data=array ('usertype'=>'alum',
        'firstname'=>$register->firstname,
        'middlename'=>$register->middlename,
        'lastname'=>$register->lastname,
        'sex'=>$register->sex,
        'civil_status'=>$register->civil_status,
        'phone'=>$register->phone,
        'email'=>$register->email, 
        'email_verified_at' => $today,
        'password'=>$register->password,
         'created_at'=>$today, 
         'updated_at'=>$today);

        $alums=array('program_id'=>$register->program_id, 'graduated_at'=>$register->graduated_at);
       
        AlumniRegister::find($this->registered_id)->delete();

        $user=User::create($data);

        Alumnus::create($alums+['user_id'=>$user->id]);

        $this->emitUp('refesh');
        return redirect()->to('alumni/registeredalumni');
    }

}
