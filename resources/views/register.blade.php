@extends('skeleton')
@section('content')


<div class="row d-flex justify-content-center my-1">
    <div class="col-md-6">
        <div class="alert alert-primary">Register</div>
        <form action="api/register" method="post">
            @csrf
            <input class="form-control my-1" type="text" name="first_name" placeholder="First Name"/>
            <input class="form-control my-1" type="text" name="last_name" placeholder="Last Name"/>
            <input class="form-control my-1" type="text" name="email_address" placeholder="Email Address"/>
            <input class="form-control my-1" type="password" name="password" placeholder="Password"/>
            <input type="submit" class="form-control btn-primary btn my-1">
            <input type="reset" class="form-control btn-secondary btn my-1">
        </form>
    </div>

</div>
@endsection