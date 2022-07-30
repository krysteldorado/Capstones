<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostComment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];

    protected $attributes = [
        'comment' => '',
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

    public function react()
    {
        return $this->hasOne(PostCommentReact::class, 'post_comment_id', 'id')->where('user_id', (Auth::id()??0));
    }

    public function reacts()
    {
        return $this->hasMany(PostCommentReact::class, 'post_comment_id', 'id');
    }

    # scopes -----------------------------------------------------------


    
    # custom functions --------------------------------------------------


}
