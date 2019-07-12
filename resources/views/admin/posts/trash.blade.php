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
                <th scope="col">Delete</th>
                <th scope="col">Restore</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                <td scope="row"><img width='50px' height='50px' src="{{$post->featured}}"></td>
                <td>{{$post->title}}</td>
                <td><a class="btn-floating btn-sm btn-danger" href="{{route('posts.kill',['id'=>$post->id])}}"><i class="fas fa-trash"></i></a></td>
                <td><a class="btn-floating btn-sm btn-primary" href="{{route('posts.restore',['id'=>$post->id])}}"><i class="fas fa-redo-alt"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>





@stop