@extends('templates.master')

@section('content')
<div class="col-sm-10">
    <h1>Register</h1>
    
    <form action="{{ route('registration.create') }}" method="POST">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ Request::old('name') }}">
        </div>
        
        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ Request::old('email') }}">
        </div>
        
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        
        <div class="form-group">
            <label class="control-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register">
        </div>
        
        @include('templates.errors')
    </form>
</div>
@endsection