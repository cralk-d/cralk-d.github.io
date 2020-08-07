<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use App\Post;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:landlord');
    }

    public function index()
    {
        $posts= Post::all();
        $orders = Order::all();
        $invoices = Invoice::all();
        return view('owner.index',compact('posts','orders','invoices'));
    }


}
