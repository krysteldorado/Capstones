<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'university',
        'about',
        'logo',
    ];

    protected $attributes = [
        'university' => '',
        'about' => '',
    ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    

    # scopes -----------------------------------------------------------


    
    # custom functions --------------------------------------------------


}
