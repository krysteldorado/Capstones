<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnus extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'program_id',
        'graduated_at',
        'profile_pic',
        'cover_photo',
        'birthday',
        'address',
        'age',
    ];

    // protected $attributes = [
    //     '' => '',
    // ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function program()
    {
        return $this->belongsto(Program::class, 'program_id', 'id');
    }

    # scopes -----------------------------------------------------------


    
    # custom functions --------------------------------------------------


}
