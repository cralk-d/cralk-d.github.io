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
            'image_i' => ['required','image'],
            'image_ii'=> ['required','image'],
            'image_iii' =>['required','image'],
            'description'=>['required','string','max:500'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $imagePath_i = request('image_i')->store('uploads','public');
        $imagePath_ii = request('image_ii')->store('uploads','public');
        $imagePath_iii = request('image_iii')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image_i = Image::make(public_path("storage/{$imagePath_i}"))->fit(1200, 1200);
        $image_ii = Image::make(public_path("storage/{$imagePath_ii}"))->fit(1200, 1200);
        $image_iii = Image::make(public_path("storage/{$imagePath_iii}"))->fit(1200, 1200);
        $image->save();
        $image_i->save();
        $image_ii->save();
        $image_iii->save();

        auth()->user()->posts()->create([
            'price' => $data['price'],
            'bedrooms'=>$data['bedrooms'],
            'bathrooms'=>$data['bathrooms'],
            'image'=> $imagePath,
            'image_i'=>$imagePath_i,
            'image_ii'=>$imagePath_ii,
            'image_iii'=>$imagePath_iii,
            'description'=>$data['description'],
        ]);

        return redirect('/owner/') ->with('success','Post published successfully.');

    }

    public function show(Post $post)
    {
        return view('/owner/posts.show', compact('post'));
    }
}

