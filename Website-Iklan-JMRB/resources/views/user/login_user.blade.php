@extends('layouts/app')
@section('content')
<!-- color label -->
<style>
    label{
        color:#0A142F;
    }
    input[type="text"], input[type="email"], input[type="password"]  {
        background-color : #D9D9D9; 
    }
    button{
        background-color:#0A142F;
        width:300px;
    }
</style>
<!-- color label -->

<!-- container form -->
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4" style="background-color:#FFFFFF;">
        <div class="row py-3">
            <div class="col-6 mx-auto d-flex align-items-center" style="width: 500px;">
                <img src="{{url('Web/LoginUser.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-6 mx-auto my-5" style="width: 500px;">
                <h2 class="text-center">Login To Your Account</h2>
                <form class="my-5" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Your Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="text-white mt-3 mb-2 border-0">Login</button>
                        <div style="font-size: 15px;">Don’t have an account ? <a href="/User/Register" style="text-decoration:none; color:#0A142F; font-weight: bold;">Register</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- container form -->
@endsection 