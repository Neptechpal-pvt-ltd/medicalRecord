@extends('layouts.layout')

@section('content')
<h1 class="h2">Categories</h1>
<p>This Lists all the categories available</p>
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <span><strong>Add New Category</strong></span>
                <a class="btn btn-primary float-right" href="{{route('category.index')}}">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                          </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
                          </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon">
                        @error('icon')
                        <div class="invalid-feedback">
                            {{$errors->first('icon')}}
                          </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection