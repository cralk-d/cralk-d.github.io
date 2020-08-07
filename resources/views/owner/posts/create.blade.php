@extends('layouts.app')
@section('content')
<div class="container col-md-11">
    <div class="card col-6 card-outline card-green">
        <div class="card-body">
            <h4>ADD POST HERE</h4>
            <hr>
            <form action="/owner/p" enctype="multipart/form-data" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="House for rent" readonly>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">
                    @error('price')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">No of Bedrooms</label>
                    <input type="text" class="form-control @error('bedrooms') is-invalid @enderror" name="bedrooms" value="{{old('bedrooms')}}">
                    @error('bedrooms')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">No of Bathrooms</label>
                    <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms" value="{{old('bathrooms')}}">
                    @error('bathrooms')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Upload House image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="image">Upload</span>
                        </div>
                    </div>
                    @error('image')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Enter House Description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}">
                    </textarea>
                    @error('description')
                    <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <hr>
                <div class="row">
                    <button type="submit" class="btn btn-warning"> Publish Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
