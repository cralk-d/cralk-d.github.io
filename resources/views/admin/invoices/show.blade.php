@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="invoice p-3 mb-3">
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> {{config('app.name')}}, Inc.
                        <small class="float-right">Date: {{ $invoice->created_at}}</small> 
                    </h4>
                </div>
             </div>
          <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>{{ config('app.name')}}, Inc.</strong><br>
                    @foreach ($apps as $app)
                    {{$app->address}}
                    <br>
                    {{$app->alt_address}}<br>
                    Phone: {{$app->phone}}<br>
                    Email: {{$app->email}}
                    @endforeach
                    
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                   
                    <strong>{{ $invoice->user->name}}</strong><br>
                    Address:{{$invoice->user->profile->address}}<br>
                    Phone:  {{$invoice->user->profile->phone}}<br>
                    Email:  {{$invoice->user->email}}
                   
              
                </address>
            </div>
            
            <div class="col-sm-4 invoice-col">
                <b>Invoice</b> {{$invoice->series->prefix ?? ''}}-{{ str_pad($invoice->id, 5,'0', STR_PAD_LEFT) }}<br>
                <br>
                <b>Order ID:</b><br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order ID #</th>
                            <th>Description</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>{{$invoice->series->prefix ?? ''}}-{{ str_pad($invoice->id, 5,'0', STR_PAD_LEFT) }}</td>
                        <td>ORDER-{{ str_pad($invoice->order_id, 5,'0', STR_PAD_LEFT) }}</td>
                            <td> Payment of post you made on {{ config('app.name')}}</td>
                            <td>{{ $invoice->amount}} RWF</td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img src="../../img/credit/visa.png" alt="Visa">
                <img src="../../img/credit/mastercard.png" alt="Mastercard">
                <img src="../../img/credit/american-express.png" alt="American Express">
                <img src="../../img/credit/paypal2.png" alt="Paypal">
        
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
            </div>
            <div class="col-6">
                <p class="lead">Amount Due 2/22/2014</p>
        
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                        </tr>
                        <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row no-print">
            <div class="col-12">
                <a href="" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment</button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-download"></i> Generate PDF
              </button>
            </div>
        </div>
    </div>
</div>

    
@endsection
