<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisteredAlumni extends Model
{
   
    
    protected $fillable = [
        'usertype',
        'program_id',
        'firstname',
        'middlename',
        'lastname',
        'sex',
        'civil_status',
        'phone',
        'email',
        'password',
    ];

    protected $attributes = [
        'usertype' => '',
        'program_id' => '',
        'firstname' => '',
        'middlename' => '',
        'lastname' => '',
        'sex' => 'male',
        'civil_status' => '',
        'phone' => '',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

     protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # attributes -------------------------------------------------------
   public function program()
    {
        return $this->belongsto(Program::class, 'program_id', 'id');
    
    }

    public function getIsAlumniAttribute()
    {
        return $this->usertype === 'alum';
    }

    # relationships ----------------------------------------------------

    

    # scopes -----------------------------------------------------------
    
    # custom functions --------------------------------------------------


}
