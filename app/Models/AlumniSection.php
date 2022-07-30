<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniSection extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'program_id',
        'major',
        'academic_year',
        'section',
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
            $query->where('section', 'like', "%{$search}%");
        });
    }

    
    # custom functions --------------------------------------------------


}
