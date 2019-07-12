@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Tags</div>

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
            @foreach($tags as $tag)
                <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->tag}}</td>
                <td><a class="btn-floating btn-sm btn-default" href="{{route('tags.edit',['id'=>$tag->id])}}"><i class="fas fa-pen"></i></a></td>
                <td><a class="btn-floating btn-sm btn-danger" href="{{route('tags.destroy',['id'=>$tag->id])}}"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>





@stop