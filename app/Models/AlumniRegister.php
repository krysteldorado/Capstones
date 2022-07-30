<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlumniRegister extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'program_id',
        'firstname',
        'middlename',
        'lastname',
        'sex' ,
        'civil_status' ,
        'phone' ,
        'email' ,
        'password',
        'graduated_at',
    ];

    // protected $attributes = [
    //     '' => '',
    // ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function program()
    {
        return $this->belongsto(Program::class, 'program_id', 'id');
    }

    # scopes -----------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        $query->when(!empty($search), function ($query) use ($search) {
        $query->where('firstname', 'like', "%{$search}%");
        });
    }

    
    # custom functions --------------------------------------------------


}
