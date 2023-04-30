@extends('layouts.layout')

@section('content')
<h1 class="h2">Category Question</h1>
<p>Edit Question {{$question->title}}</p>
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                {{-- <span><strong>Add New Category</strong></span> --}}
                <a class="btn btn-primary float-right" href="{{route('category.show',$category->id)}}">Back</a>
            </div>
            <div class="card-body">
                {{-- @if($errors->any())
                    <ul>
                        @foreach ($errors as $error)
                            {{dd($error)}}
                        @endforeach
                    </ul>
                @endif --}}
                <form action="{{route('question.update',$question->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="number" value="{{$question->category_id}}" hidden name="category_id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror " id="title"
                            name="title" value="{{$question->title}}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description"
                            class="form-control @error('description') is-invalid @enderror">{{$question->description}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image">
                        @error('image')
                        <div class="invalid-feedback">
                            {{$errors->first('image')}}
                        </div>
                        @enderror
                        @if($question->image)<img src="{{asset('uploads/question-images/'.$question->image)}}" alt="{{$question->image}}" height="50px" width="50px">@endif
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Options</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="correct" value="1" id="flexRadioDefault2" {{$question->correct === 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <input type="text" name="option1" class="form-control" value="{{$question->option1}}">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="correct" value="2" id="flexRadioDefault2" {{$question->correct === 2 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <input type="text" name="option2" class="form-control" value="{{$question->option2}}">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="correct" value="3" id="flexRadioDefault2" {{$question->correct === 3 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <input type="text" name="option3" class="form-control" value="{{$question->option3}}">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="correct" value="4" id="flexRadioDefault2" {{$question->correct === 4 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <input type="text" name="option4" class="form-control" value="{{$question->option4}}">
                            </label>
                        </div>
                        @error('correct')
                        <div class="invalid-feedback">
                            {{$errors->first('correct')}}
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