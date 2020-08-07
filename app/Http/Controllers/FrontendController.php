<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts= Post::all();
        return view('frontend.index',compact('posts'));
    }

    public function show(Request $request, Post $post)
    {
        return view('frontend.show',compact('post'));
    }
}
