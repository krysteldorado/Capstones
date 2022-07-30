<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniTracer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employer_id',
        'position',
        'futher_study',
        'related_specialization',
        'traced_at',
    ];

    protected $attributes = [
        'position' => '',
    ];

    protected $casts = [
        'traced_at'  => 'datetime',
    ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id', 'id');
    }

    # scopes -----------------------------------------------------------


    
    # custom functions --------------------------------------------------


}
