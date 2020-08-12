<?php

namespace App\Http\Controllers;

use App\App;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Order $order)
    {
        return view('orders.index', compact('order'));
    }
    public function store()
    {
        $data= request()->validate(['p_id'=>'required',]);
        auth()->user()->orders()->create(['p_id'=> $data['p_id'],]);
        return redirect('/show')->with('success','Your order is submitted successfully');

    }
    
    public function show(Order $order)
    {
        $apps = App::all();
        return view('orders.show',compact('order','apps'));
    }
}
