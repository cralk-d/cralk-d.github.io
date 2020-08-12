<?php

namespace App\Http\Controllers\Admin;

use App\App;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use App\Serie;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index',compact('invoices'));
    }
    
    public function create()
    {
        $series = Serie::all();
        return view('admin.orders.create',compact('series'));
    }

   
    public function store(Request $request)
    {
        
        $request->validate(['series_id'=>'required','user_id'=>'required|string','amount'=>'required']);
        Invoice::create($request->all());

        return redirect('/admin/invoices/')->with('success','Invoice is created successfully');


    }

    public function show(Invoice $invoice,Order $order)
    {
        $apps=App::all();
        return view('admin.invoices.show',compact('invoice','apps','order'));
    }

    public function edit(Invoice $invoice)
    {
        //
    }

 
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect('/admin/invoices')
        ->with('success','Invoice is trashed successfully');
    }
}
