@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Update Tags</div>
        <div class="card-body">
            <form action="{{route('tags.update',['id'=>$tag->id])}}" method='post'>
                {{csrf_field()}}

                <div class="md-form">
                    <input value='{{$tag->tag}}' type="text" id="form1" name='tag' class="form-control" required>
                    <label for="form1">Tag</label>
                </div>
                <div class="md-form">
                    <button type="submit" class="btn btn-cyan">Update</button>
                </div>

            </form>
        </div> 
        <div class="card-footer">Footer</div>
    </div>
@stop