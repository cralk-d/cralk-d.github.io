@extends('layouts.app')
@section('content')
    <div class="container col-md-11">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-green">
                        <div class="card-header">
                        <h3 class="card-title" style="text-transform: uppercase; text-align:center;">LATEST POSTS ON {{ config('app.name')}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="all-post" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach(Auth::user()->posts as $post)
                                    <tr>
                                    <td>{{ $post->id}}</td>
                                        <td>
                                            <img src="/storage/{{ $post->image }}"  class="img-size-50">
                                        </td>
                                        <td>{{$post->title}}</td>
                                        <td> {{$post->landlord->name}} </td>
                                        <td> {{ $post->price }} Rwf</td>

                                        <td>
                                            <div class="row justify-content-center">
                                                <a href="" class="btn btn-primary ml-4">Edit Post</a>
                                                <a href="" class="btn btn-success ml-4">View Post</a>
                                                <a href="" class="btn btn-danger ml-4">Delete Post</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection