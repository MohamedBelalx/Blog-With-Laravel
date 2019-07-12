@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Create New Tags</div>
        <div class="card-body">
            <form action="{{route('tags.store')}}" method='post'>
                {{csrf_field()}}

                <div class="md-form">
                    <input type="text" id="form1" name='tag' class="form-control" required>
                    <label for="form1">Tag</label>
                </div>
                <div class="md-form">
                    <button type="submit" class="btn btn-cyan">Add</button>
                </div>

            </form>
        </div> 
        <div class="card-footer">Footer</div>
    </div>
@stop