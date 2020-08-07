@extends('layouts.app')
@section('content')
    <div class="container col-md-11 bg-white">
        <div class="row">
            <div class="col-12 col-sm-6 mt-4">
                <div class="col-12">
                    <img src="/storage/{{ $post->image }}" class="product-image" alt="House Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="/storage/{{ $post->image }}" alt="House Image"></div>
                    <div class="product-image-thumb" ><img src="/storage/{{ $post->image }}" alt="House Image"></div>
                    <div class="product-image-thumb" ><img src="/storage/{{ $post->image }}" alt="House Image"></div>
                    <div class="product-image-thumb" ><img src="/storage/{{ $post->image }}" alt="House Image"></div>
                    <div class="product-image-thumb" ><img src="/storage/{{ $post->image }}" alt="House Image"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="container mb-2 mt-4">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <div class="d-flex align-items-center">
                                    
                                    <div>
                                        <div class="font-weight-bold">
                                            <a href="/profile/{{ $post->landlord->id }}">
                                                <span class="text-dark">{{ $post->landlord->username }}</span>
                                            </a>
                                            <a href="/profile/{{ $post->landlord->id }}" class=" btn btn-primary pl-3">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card col-md-12">
                    <div class="card-body">
                        <form action="/order" method="post">
                            @csrf
                            <h4 style="text-align: center;">House Details</h4><hr>
                            <input type="hidden" name="p_id" class="form-control" value="{{ $post->id }}">
                            <strong>Title</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->title}}
                            </p>
                            <strong>House Price/Month</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->price}}
                            </p>
                            <strong>Number of Bedrooms</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->bedrooms}}
                            </p>
                            <strong>Number of Bathrooms</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->bathrooms}}
                            </p>
                            <strong>Owner</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->landlord->name}}
                            </p>
                            <strong>Contact</strong>
                            <hr>
                            <p class="text-muted">
                                
                            </p>
                            <hr>
                            <button class="btn btn-success float-right" type="submit"> Request House</button>
                        </form>
                    </div>
                </div>
                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">House Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{ $post->description}}</div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> </div>
            </div>
        </div>
    </div>
@endsection
