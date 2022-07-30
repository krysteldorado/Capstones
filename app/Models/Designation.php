<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'designation',
        'access',
    ];
    
    protected $attributes = [
        'designation' => '',
        'access' => 'university',
    ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function user_designations()
    {
        return $this->hasMany(UserDesignation::class, 'designation_id', 'id');
    }

    # scopes -----------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        $query->when(!empty($search), function ($query) use ($search) {
            $query->where('designation', 'like', "%{$search}%");
        });
    }

    # custom functions --------------------------------------------------


}
