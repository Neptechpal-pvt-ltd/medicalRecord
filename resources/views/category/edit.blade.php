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
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{$category->title}}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                          </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{$category->description}}"></textarea>
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
                        <img src="{{asset('uploads/category-images/'.$category->icon)}}" alt="$category->title" height="50px" width="50px">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        {{-- <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{$category->description}}"></textarea> --}}
                        <select name="status" id="status" class="form-select">
                            <option value="0" {{$category->status === 0 ? 'selected' : ''}}>Inctive</option>
                            <option value="1" {{$category->status === 1 ? 'selected' : ''}}>Active</option>
                        </select>
                        @error('description')
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
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