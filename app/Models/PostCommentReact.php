<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCommentReact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_comment_id',
        'user_id',
    ];

    // protected $attributes = [
    //     '' => '',
    // ];

    // protected $casts = [
    //     'date_at'  => 'date:Y-m-d',
    // ];

    # attributes -------------------------------------------------------



    # relationships ----------------------------------------------------

    public function comment()
    {
        return $this->belongsTo(PostComment::class, 'post_comment_id', 'id');
    }

    # scopes -----------------------------------------------------------


    
    # custom functions --------------------------------------------------


}
