@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Create New Category</div>
        <div class="card-body">
            <form action="{{route('category.store')}}" method='post'>
                {{csrf_field()}}

                <div class="md-form">
                    <input type="text" id="form1" name='name' class="form-control" required>
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