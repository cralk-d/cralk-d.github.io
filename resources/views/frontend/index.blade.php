@extends('layouts.app')
@section('content')
    <div class="container pt-4 mt-4">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="/frontend/{{ $post->id }}">
                            <img class="bd-placeholder-img card-img-top" src="/storage/{{ $post->image }}">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $post->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/frontend/{{ $post->id }}"  class="btn btn-md btn-outline-info"><img src="icons/eye.svg"> View</a>
                                    <button  class="btn btn-md btn-primary"><img src="icons/cart-fill.svg"> Request </button>
                                </div>
                                <small class="text-muted">{{ $post->created_at->diffForHumans()}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
    