<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class ChatLivewire extends Component
{
    public function render()
    {
        return view('livewire.chat.chat-livewire')->extends('layouts.socialv.app');
    }
    
    public $uuid;
    public $user;
    public $message;


    public function send_message()
    {
        $this->validate(['message' => "required"]);


        chat::create([
            'user_id' => auth()->id(),
            'message' => $this->message,
            'chat_id' => frinds::where(['user_id'=>auth()->id(), 'friend_id' =>$this->user->id])->first()->chat_id,
            'friend_id' => $this->user->id
        ]);

        $this->message='';
        $this->render();
    }

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $this->user = User::where('uuid',$uuid)->first();


        if (frinds::where(['user_id' => auth()->id(), 'friend_id' => $this->user->id])->count() === 0 || frinds::where(['user_id' => $this->user->id, 'friend_id' => auth()->id()])->count() === 0) {
            $uuid = Str::uuid();
            frinds::create([
                'user_id' => auth()->id(),
                'chat_id' => $uuid,
                'friend_id' => $this->user->id
            ]);

            frinds::create([
                'user_id' => $this->user->id,
                'chat_id' => $uuid,
                'friend_id' => auth()->id()
            ]);
        }
    }
   
}
