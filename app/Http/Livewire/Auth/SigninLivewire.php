<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SigninLivewire extends Component
{
    use AlertTrait;

    public $email;
    public $password;
    public $remember_me;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $validationAttributes = [
        'email' => 'username'
    ];

    protected $messages = [
        'email.required' => 'Username cannot be empty.',
        'password.required' => 'Password cannot be empty.',
    ];

    public function render()
    {
        return view('livewire.auth.signin-livewire')->extends('layouts.materialize.blank-right');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function signin()
    {
        $validator = Validator::make([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->rules, $this->messages);
        
        if ( $validator->fails() ) {
            $this->alert_info($validator->errors()->first());
        } elseif (Auth::attempt($validator->valid(), (boolean)$this->remember_me)) {
            $user = Auth::user();

            if ( $user->is_alumni ) {
                return redirect()->route('signin');
            } else if ( $user->is_admin ) {
                return redirect()->route('campus');
            }
            Auth::logout();
        }

        $this->reset(['email', 'password']);

        $this->alert_error('Email and Password does not match');
    }
}
