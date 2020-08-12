@extends('layouts.app')
@section('content')
    <div class="container col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Order ID</td>
                            <td>Names</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->orders as $order)
                            <tr>
                            <td>{{ $order->id}}</td>
                                <td>{{$order->series->prefix ?? ''}}-{{ str_pad($order->id, 5,'0', STR_PAD_LEFT) }}</td>
                                <td>{{Auth::user()->name}}</td>
                                <td>
                                    <a href="/orders/{{ $order->id }}"  class="btn btn-info"><i class="fas fa-eye"></i> View</a>
                                    <a href="" class="btn btn-danger"> <i class="fas fa-times-circle"></i> Cancel Order</a>
                                    <a href="" class="btn btn-warning"> <i class="far fa-money"></i>Pay Order </a>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection