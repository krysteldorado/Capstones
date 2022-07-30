<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'abbreviation',
        'program',
    ];
    
    // protected $attributes = [
    //     '' => '',
    // ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function user_designations()
    {
        return $this->hasMany(UserDesignation::class, 'program_id', 'id');
    }

    # scopes -----------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        $query->when(!empty($search), function ($query) use ($search) {
            $query->where('program', 'like', "%{$search}%");
        });
    }
    
    # custom functions --------------------------------------------------


}
