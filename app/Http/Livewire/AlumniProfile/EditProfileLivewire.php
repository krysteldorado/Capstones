<?php

namespace App\Http\Livewire\AlumniProfile;

use App\Models\User;
use App\Models\Alumnus;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EditProfileLivewire extends Component
{
    public $alumni_id;
    public $user_id;
    public $alumni, $alum;


    protected $listeners = [
        'create' => 'create',
        'edit' => 'edit',
    ];

    public function hydrate()
    {
        // if ( Gate::denies('viewAny', User::class) ) {
        //     return redirect(url()->previous());
        // }
    }

    protected function rules() {
    $user_id=Auth::id();
        return [
            'user.firstname' => 'required|min:2|max:250',
            'user.lastname' => 'required|min:2|max:250|',
            'user.sex' => 'required|in:male,female',
            'user.civil_status' => 'required|min:2',
            'user.phone' => "required|regex:/(09)[0-9]{9}/|max:11||unique:users,phone,{$user_id},id",
            'user.email' => "required|email|unique:users,email,{$user_id},id",
            'alum.profile_pic'=>'required|min:6|max:200',
            'alum.birthday'=>'required|min:2|max:200',
            'alum.address'=>'required|min:2|max:200',
            'alum.age'=>'required|max:3',
        ];
    }

    public function mount()
    {
        $this->user = Auth::user()->replicate();
    }


    public function render()
    {
        return view('livewire.alumni-profile.edit-profile-livewire',[
             'alum' => $this->get_alum(),
        ])->extends('layouts.socialv.app');
    }
    
    
    public function get_alum()
    {
        return Auth::user();
    }

    public function get_alumni()
    {
        DB::table('alumni')->where('user_id',Session('id'))->first();
    }

    
    public function save(){

         $data = $this->validate();

         $user = $this->get_alum();

         $user->update($data['user']);


        

        $alumni = array('birthday'=>$this->birthday,
            'address'=>$this->address,
            'age'=>$this->age,
        );
       
        $section = Alumnus::create($alumni);

        dd($section);

        

        





        return redirect()->to('/newsfeed');
         

        
    }




}
