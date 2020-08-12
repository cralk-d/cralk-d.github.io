<?php

namespace App\Http\Controllers;


use App\Post;
use App\Feed;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts= Post::all();
        return view('frontend.index',compact('posts'));
    }

    public function store(Request $request)
    {
        $request-> validate(['email'=>'required|email','feed'=>'required|string']);
        Feed::create($request->all());
        return view('frontend.index');
    }


    public function show(Request $request, Post $post)
    {
        return view('frontend.show',compact('post'));
    }
}
