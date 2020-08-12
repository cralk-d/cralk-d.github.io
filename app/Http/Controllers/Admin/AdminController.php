<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use App\Feed;
use App\Invoice;
use App\Landlord;
use App\Notifications\NewUserCreated;
use App\Order;
use App\Payment;
use App\Post;
use App\Serie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $users=User::all();
        $feeds= Feed::all();
        $invoices = Invoice::all();
        $series = Serie::all();
        $orders = Order::all();
        $landlords= Landlord::all();
        $payments = Payment::all();
        $posts = Post::all();
        //$registered->notify(new NewUserCreated(Auth::user()));
        return view('admin.dashboard',compact('users','feeds','invoices','series','orders','landlords','payments','posts'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.settings.edit', compact('admin'));
        
    }
    public function update(Admin $admin)
    {
        $data = request()->validate([
            'image' => '',
            'title'=>'required',
            

        ]);

        if (request('image')) {
            $imagePath = request('image')->store('admin', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        $admin->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/admin/");

    }
}
