@extends('templates.master')

@section('content')
    @foreach($posts as $post)   
        @include('post.post')
    @endforeach
    <div style="margin-left: 40%">
        {{ $posts->appends(request()->except('page'))->links() }}
    </div>

    @if($posts->count() > 0)
    <nav class="blog-pagination">
        <!-- Make Latest button disabled by default (because we get posts ordered by latest by default). 
                It will only become active if request('order') exists and it's value is 'oldest', so we can change it's value-->
        <a class="btn btn-outline-{{ (request()->has('order') && request('order') == 'oldest') ? 'primary' : 'secondary' }} 
           {{ (request()->has('order') && request('order') == 'oldest') ? '' : 'disabled' }}"
           href="{{ $request->structure_query('latest') }}">
            Latest
        </a>

        <!-- Make Oldest button disabled only in case request('order') exists and it's value is 'oldest', so we can change it's value -->
        <a class="btn btn-outline-{{ (request()->has('order') && request('order') == 'oldest') ? 'secondary' : 'primary' }} 
            {{ (request()->has('order') && request('order') == 'oldest') ? 'disabled' : '' }}" 
            href="{{ $request->structure_query('oldest') }}">
            Oldest
        </a>
    </nav>
    @endif

@endsection

