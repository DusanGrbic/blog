@extends('templates.master')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <h1>Create New Post</h1>
        <hr>
        
        @include('templates.errors')
        
        <form action="{{ route('post.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label class="control-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label class="control-label">Body</label>
                <textarea name="body" class="form-control" rows="4"></textarea>
            </div>
            
            <br>
            
            <div class="form-group">
                <label class="control-label">Attach Tags:</label><br>
                @foreach($tags as $tag)   
                    <input type="checkbox" name="{{ $tag->name }}"> {{ $tag->name }} &nbsp;&nbsp;&nbsp;
                @endforeach
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Publish">
            </div>
        </form>
    </div>
</div>
@endsection