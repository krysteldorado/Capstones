<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserFormLivewire extends Component
{
    use AuthorizesRequests;
    use AlertTrait;
    
    public $user_id;
    public $user_info;
    public $password;

    protected function rules() {
        return [
            'user_id' => '',
            'user_info.firstname' => 'min:1|max:250|regex:/^[a-z ,.\'-]+$/i',
            'user_info.middlename' => 'min:1|max:250|regex:/^[a-z ,.\'-]+$/i',
            'user_info.lastname' => 'min:1|max:250|regex:/^[a-z ,.\'-]+$/i',
            'user_info.sex' => 'required|in:male,female',
            'user_info.civil_status' => 'required|min:1',
            'user_info.phone' => "required|regex:/(09)[0-9]{9}/|max:11||unique:users,phone,{$this->user_id},id",
            'user_info.email' => "required|email|unique:users,email,{$this->user_id},id",
            'password' => "exclude_unless:user_id,null|required_if:user_id,null|min:6|max:20",
        ];
    }

    public function mount($user = null)
    {
        is_null($user)
            ? $this->authorize('create', User::class)
            : $this->authorize('update', User::find($user));

        $this->user_id = $user;
        $this->user_info = User::firstOrNew([
            'id' => $user,
        ])->replicate();
    }

    public function hydrate()
    {
        $access = is_null($this->user_id)
            ? Gate::denies('create', User::class)
            : Gate::denies('update', User::find($this->user_id));

        if ( $access ) {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.user.user-form-livewire')->extends('layouts.materialize.app');
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $data = $this->validate();

        isset($this->user_id)? $this->update($data) :$this->create($data);
    }

    protected function create($data)
    {
        if ( Gate::denies('create', User::class) ) {
            return;
        }

        $data['user_info']['usertype'] = 'prsnl';
        $data['user_info']['password'] = Hash::make($data['password']);
        
        $user = User::create($data['user_info']);

        if ( isset($user) ) {
            $this->session_flash_alert_success('Success!', 'Record has been successfully added');
            return redirect()->route('user.management');
        }
    }

    protected function update($data)
    {
        $user = User::find($this->user_id);
        if ( Gate::denies('update', $user) ) {
            return;
        }

        if ( $user->update($data['user_info']) ) {
            $this->session_flash_alert_success('Success!', 'Record has been successfully updated');
            return redirect()->route('user.management');
        }
    }
}
