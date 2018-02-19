<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="{{ route('home') }}">Home</a>
            @if(Auth::check())
                <a class="nav-link" href="{{ route('post.create') }}">New Post</a>
            @endif

            @if(Auth::check())
                <a class="nav-link ml-auto" href="">{{ Auth::user()->name }}</a>
                <a class="nav-link" href="{{ route('session.destroy') }}">Logout</a>
            @else
                <a class="nav-link ml-auto" href="{{ route('session.create') }}">Login</a>
                <a class="nav-link" href="{{ route('registration.create') }}">Register</a>
            @endif
        </nav>
    </div>
</div>
