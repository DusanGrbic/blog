@include('templates.partials.head')
@include('templates.partials.navigation')
@include('templates.partials.header')

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            @yield('content')
        </div>

        @include('templates.partials.sidebar')

    </div>
</main>

@include('templates.partials.footer')
        
