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
                            <td>Image</td>
                            <td>Owner</td>
                            <td>Price</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->orders as $order)
                            <tr>
                            <td>{{ $order->id}}</td>
                                <td>{{$order->series->prefix ?? ''}}-{{ str_pad($order->id, 5,'0', STR_PAD_LEFT) }}</td>
                                <td><img src="/storage/{{ $order->image }}"  class="img-size-50"></td>
                                <td>{{$order->post->landlord->name}}</td>
                                <td></td>
                                <td></td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection