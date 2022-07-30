<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'campus',
        'address',
    ];

    protected $attributes = [
        'campus' => '',
        'address' => '',
    ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function colleges()
    {
        return $this->hasMany(College::class, 'campus_id', 'id');
    }

    public function programs()
    {
        return $this->hasManyThrough(Program::class, College::class, 'campus_id', 'college_id', 'id', 'id');
    }

    public function user_designations()
    {
        return $this->hasMany(UserDesignation::class, 'campus_id', 'id');
    }

    # scopes -----------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        $query->when(!empty($search), function ($query) use ($search) {
            $query->where('campus', 'like', "%{$search}%");
        });
    }
    
    # custom functions --------------------------------------------------


}
