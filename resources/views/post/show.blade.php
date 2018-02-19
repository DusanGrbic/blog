@extends('templates.master')

@section('content')
    <h2>{{ $post->title }}</h2>
    
    @if(count($post->tags))
    <ul>
        @foreach($post->tags as $tag)   
        <li>
            <a href="{{ route('tag.index', $tag->name) }}">{{ $tag->name }}</a>
        </li>
        @endforeach
    </ul>
    @endif
    
    <br>
    <p id="post-body">{{ $post->body }}</p>
    
    <br>
    
    <div class="comments">
        @if(count($post->comments))
            <i>Comments:</i>
        @endif
        <ul class="list-group">
            @foreach($post->comments as $comment)   
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <b>{{ $comment->body }}</b>&nbsp;
                <i class="">{{ $comment->created_at->diffForHumans() }}</i>
            </li>    
            @endforeach
        </ul>
    </div>
    
    <div class="card" id="card">
        <div class="card-body">
            <form action="{{ route('comment.store', $post->id) }}" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <textarea name="body" class="form-control" placeholder="Your Comment Here" rows="4">{{ $body }}</textarea>
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add Comment">
                </div>
            </form>
            
            @include('templates.errors')
        </div>
    </div>
@endsection