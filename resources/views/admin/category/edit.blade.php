@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
            <form action="{{route('category.update',['id'=>$category->id])}}" method='post'>
                {{csrf_field()}}

                <div class="md-form">
                    <input value='{{$category->name}}' type="text" id="form1" name='name' class="form-control" required>
                    <label for="form1">Name</label>
                </div>
                <div class="md-form">
                    <button type="submit" class="btn btn-cyan">Save</button>
                </div>

            </form>
        </div> 
        <div class="card-footer">Footer</div>
    </div>
@stop