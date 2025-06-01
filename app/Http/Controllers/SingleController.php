<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SingleController extends Controller
{
    public function singlepost(Post $postid)
    {
        return view('single-post', compact('postid'));
    }
}
