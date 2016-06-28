<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $posts= \App\Post::all();

        return view('post.index',compact('posts'));
    }
}
