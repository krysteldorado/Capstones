<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id',
        'user_id',
        'react',
    ];

    protected $attributes = [
        'react' => 'like',
    ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    # scopes -----------------------------------------------------------


    
    # custom functions --------------------------------------------------


}
