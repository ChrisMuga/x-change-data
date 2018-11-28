@extends('skeleton')
@section('content')


<div class="row d-flex justify-content-center my-1">
    <div class="col-md-6">
        <div class="alert alert-primary">Sign In</div>
        <form action="api/user-signin" method="post">
            @csrf
            <input class="form-control my-1" type="text" name="email_address" placeholder="Email Address"/>
            <input class="form-control my-1" type="password" name="password" placeholder="Password"/>
            <input type="submit" class="form-control btn-primary btn my-1">
            <input type="reset" class="form-control btn-secondary btn my-1">
            <a href="/" class="btn btn-warning form-control">Register</a>
        </form>
    </div>

</div>
@endsection