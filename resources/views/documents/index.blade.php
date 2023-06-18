@extends('layouts.layout')

@section('content')
<h1 class="h2">Documents</h1>
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <span><strong>All Documents</strong></span>
                <a class="btn btn-primary float-right" href="{{route('documents.create')}}">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Birth Certificate No</th>
                                <th scope="col">I.P No</th>
                                <th scope="col">Guardian's Name</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $key=>$data)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$data->birth_date_bs}}</td>
                                <td>{{$data->certificate_no}}</td>
                                <td>{{$data->ip_no}}</td>
                                <td>{{$data->father_name . '/' . $data->mother_name}}</td>
                                <td><a href="{{route('documents.edit',$data->id)}}" class="btn btn-sm btn-outline-primary mx-1">Edit</a><a href="{{route('documents.show',$data->id)}}" class="btn btn-sm btn-outline-success mx-1">View</a></td>
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