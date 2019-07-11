@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Category</div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach($category as $cat)
                <tr>
                <th scope="row">{{$cat->id}}</th>
                <td>{{$cat->name}}</td>
                <td><a class="btn-floating btn-sm btn-default" href="{{route('category.edit',['id'=>$cat->id])}}"><i class="fas fa-pen"></i></a></td>
                <td><a class="btn-floating btn-sm btn-danger" href="{{route('category.destroy',['id'=>$cat->id])}}"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>





@stop