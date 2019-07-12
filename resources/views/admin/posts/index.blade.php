@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Category</div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Trash</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                <td scope="row"><img width='50px' height='50px' src="{{$post->featured}}"></td>
                <td>{{$post->title}}</td>
                <td><a class="btn-floating btn-sm btn-default" href="{{route('posts.edit',['id'=>$post->id])}}"><i class="fas fa-pen"></i></a></td>
                <td><a class="btn-floating btn-sm btn-danger" href="{{route('post.destroy',['id'=>$post->id])}}"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>





@stop