@extends('layouts.layout')

@section('content')
<h1 class="h2">Categories</h1>
<p>This Lists all the Questions of {{$category->title}} Category</p>
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <span><strong>Questions of {{$category->title}} Category</strong></span>
                <a class="btn btn-primary float-right" href="{{url('category/'.$category->id.'/add-question')}}">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Question Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($category->questions)
                            @foreach ($category->questions as $key=>$question)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$question->title}}</td>
                                <td>{{$question->description}}</td>
                                {{-- <td><img src="{{asset('uploads/category-images/'.$category->icon)}}" alt="$category->title" height="50px" width="50px"></td> --}}
                                <td><a href="{{url('category/'.$category->id.'/edit-question/' . $question->id)}}" class="btn btn-sm btn-outline-primary mx-1">Edit</a><a href="{{url('category/'.$category->id.'/view-question/' . $question->id)}}" class="btn btn-sm btn-outline-success mx-1">View</a></td>
                            </tr>
                            @endforeach
                            @else
                            <h5>No Question Available</h5>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection