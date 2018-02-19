<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
    </h2>
    
    <p class="blog-post-meta">
         posted by: <strong>{{ $post->user->name }}</strong><br>
        {{ $post->created_at->toFormattedDateString() }}
    </p>
    
    <p>{{ $post->body }}</p>
</div>