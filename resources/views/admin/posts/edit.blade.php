@extends('layouts.app')

@section('content')

@if(count($errors)>0)
    <ul class="list-group">
    @foreach($errors->all() as $error)

        <li class="list-group-item text-danger">
                {{$error}}
        </li>
        @endforeach

    </ul>
@endif
    <div class="card">
        <div class="card-header">Edit {{$posts->title}} Post</div>
        <div class="card-body">
            <form action="{{route('post.update',['id'=>$posts->id])}}" method='post' enctype='multipart/form-data'>
                {{csrf_field()}}

                <div class="md-form">
                    <input type="text" id="form1" name='title' class="form-control" value="{{$posts->title}}" required>
                    <label for="form1">Post Title</label>
                </div>
                <div class="md-form">
                    <textarea id="form10" name='content' class="md-textarea form-control" rows="3" required>{{$posts->content}}</textarea>
                    <label for="form10">Post Content</label>
                </div>

                <select name='category_id' class="browser-default custom-select">

                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

                <div class="md-form">
                    <input type="file" name='featured' id="form1" class="form-control" required>
                </div>

                <div class="md-form">
                    <button type="submit" class="btn btn-cyan">Update Post</button>
                </div>

            </form>
        </div> 
        <div class="card-footer">Footer</div>
    </div>
@stop