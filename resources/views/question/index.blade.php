@extends('layouts.layout')

@section('content')
<h1 class="h2">Categories</h1>
<p>This Lists all the categories available</p>
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <span><strong>All Categories</strong></span>
                <a class="btn btn-primary float-right" href="{{route('category.create')}}">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Icon</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key=>$category)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$category->title}}</td>
                                <td>{{$category->description}}</td>
                                <td><img src="{{asset('uploads/category-images/'.$category->icon)}}" alt="$category->title" height="50px" width="50px"></td>
                                <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-outline-primary mx-1">Edit</a><a href="{{route('category.show',$category->id)}}" class="btn btn-sm btn-outline-success mx-1">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection