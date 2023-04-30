@extends('layouts.layout')

@section('content')
{{-- <h1 class="h2">Categories</h1> --}}
{{-- <p>This Lists all the Questions of {{$category->title}} Category</p> --}}
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <span><strong>Questions Details of {{$question->title}}</strong></span>
                <a class="btn btn-primary float-right" href="{{route('category.show',$question->category_id)}}">Back</a>
            </div>
            <div class="card-body">
                <strong>Title:</strong> <span>{{$question->title}}</span>
                <br>
                <strong>Description:</strong> <span>{{$question->description}}</span>
                <br>
                @if($question->image)
                <strong>Image:</strong> <span><img src="{{asset('uploads/question-images/'.$question->image)}}" alt="{{$question->image}}" height="50px" width="50px"></span>
                <br>
                @endif
                <strong>Options:</strong> 
                <ul>
                    @foreach ($question->options as $option)
                    <li>{{$option}}</li>
                    @endforeach
                </ul>
                <strong>Correct Answer:</strong> <span>{{$question->options[--$question->correct]}}</span>
            </div>
        </div>
    </div>
</div>
@endsection