<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:landlord');
    }

    public function index()
    {


        $posts = Post::all();

        return view('owner.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('owner.posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'price' => ['required','string'],
            'bedrooms'=>['required','integer'],
            'bathrooms'=>['required','integer'],
            'image' => ['required', 'image'],
            'description'=>['required','string','max:500'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'price' => $data['price'],
            'bedrooms'=>$data['bedrooms'],
            'bathrooms'=>$data['bathrooms'],
            'image' => $imagePath,
            'description'=>$data['description'],
        ]);

        return redirect('/owner/') ->with('success','Post published successfully.');

    }

    public function show(Post $post)
    {
        return view('/owner/posts.show', compact('post'));
    }
}

