@if($errors->count())
    <div class="alert alert-danger">
        <ul class="">
            @foreach($errors->all() as $error)   
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif