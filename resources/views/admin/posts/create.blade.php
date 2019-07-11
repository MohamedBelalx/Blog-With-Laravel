@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create New Post</div>
        <div class="card-body">
            <form action="{{route('post.store')}}" method='post'>
                {{csrf_field()}}

                <div class="md-form">
                    <input type="text" id="form1" name='title' class="form-control">
                    <label for="form1">Post Title</label>
                </div>
                <div class="md-form">
                    <textarea id="form10" name='content' class="md-textarea form-control" rows="3"></textarea>
                    <label for="form10">Post Content</label>
                </div>
                <div class="md-form">
                    <input type="file" name='featured' id="form1" class="form-control">
                </div>
                <div class="md-form">
                    <button type="submit" class="btn btn-cyan">Save Post</button>
                </div>

            </form>
        </div> 
        <div class="card-footer">Footer</div>
    </div>
@stop