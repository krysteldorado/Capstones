<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'company',
        'address',
        'business_nature',
    ];

    # attributes -------------------------------------------------------

    public function alumni_tracers()
    {
        return $this->hasMany(AlumniTracer::class, 'employer_id', 'id');
    }

    # relationships ----------------------------------------------------

    

    # scopes -----------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        $query->when(!empty($search), function ($query) use ($search) {
            $query->where('company', 'like', "%{$search}%");
        });
    }
}
