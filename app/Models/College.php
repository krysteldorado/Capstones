<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'campus_id',
        'abbreviation',
        'college',
    ];

    // protected $attributes = [
    //     '' => '',
    // ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id', 'id');
    }
    
    public function programs()
    {
        return $this->hasMany(Program::class, 'college_id', 'id');
    }

    public function user_designations()
    {
        return $this->hasMany(UserDesignation::class, 'college_id', 'id');
    }

    # scopes -----------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        $query->when(!empty($search), function ($query) use ($search) {
            $query->where('college', 'like', "%{$search}%");
        });
    }
    
    # custom functions --------------------------------------------------


}
