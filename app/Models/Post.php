<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'post',
    ];

    protected $attributes = [
        'user_id' => '',
        'post' => '',
    ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function react()
    {
        return $this->hasOne(PostReact::class, 'post_id', 'id')->where('user_id', (Auth::id()??0));
    }

    public function reacts()
    {
        return $this->hasMany(PostReact::class, 'post_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'post_id', 'id');
    }

    # scopes -----------------------------------------------------------


    
    # custom functions --------------------------------------------------


}
