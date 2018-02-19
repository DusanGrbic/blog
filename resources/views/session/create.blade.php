@extends('templates.master')

@section('content')
<div class="col-sm-10">
    <h1>Sign In</h1>
    <form action="{{ route('session.store') }}" method="POST">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ session('email') ? : '' }}">
        </div>
        
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Sign In">
            <span style="margin-left: 50px">
                Don't have an account? <a href="{{ route('registration.create') }}">Create Account!</a> instead
            </span>
        </div>
        
        @include('templates.errors')
    </form>
</div>
@endsection