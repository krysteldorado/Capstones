<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return Post::query()
            ->orderBy('user_id')
            ->groupBy('user_id')
            ->get();
    }
}
