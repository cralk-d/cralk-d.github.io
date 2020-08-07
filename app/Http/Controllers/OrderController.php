<?php

namespace App\Http\Controllers;

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
        return redirect('frontend/show')->with('success','Your order is submitted successfully');

    }
}
