<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDesignation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'designation_id',
        'campus_id',
        'college_id',
        'program_id',
    ];
    
    protected $attributes = [
        'campus_id' => null,
        'college_id' => null,
        'program_id' => null,
    ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id', 'id');
    }
    
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    # scopes -----------------------------------------------------------
}
