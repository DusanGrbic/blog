@if(session('message'))
<div class="alert alert-success" id="message">
    {{ session('message') }}
</div>
@endif