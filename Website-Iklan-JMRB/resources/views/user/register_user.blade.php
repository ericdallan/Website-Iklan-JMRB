@extends('layouts/app')
@section('content')
<!-- color label --> 
<style>
    label{
        color:#0A142F;
        font-weight:bold;
    }
    input[type="text"], input[type="email"], input[type="password"]  {
        background-color : #D9D9D9; 
    }
    .btn-default{
        background-color:#0A142F;
        width:20rem;
    }
    .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active{
        background-color:#0A142F;
        width:20rem;
    }
</style>
<!-- color label -->

<!-- Register form -->
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4" style="background-color:#FFFFFF;">
        <div class="row">
            <div class="col-6 mx-auto d-flex align-items-center" style="width: 500px;">
                <img src="{{url('Web/RegisterUser.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-6 mx-auto my-3" style="width: 500px;">
                <h2 class="text-center mb-4">Create Your Free Account</h2>
                <form action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Your Username">
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Your Company Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email Address">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <div class="mb-3">
                        <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="ConfirmPassword" placeholder="Re-enter Password">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-default text-white mt-3 mb-2 border-0">Create Your Account</button>
                        <div style="font-size: 15px;">Already have an account ? <a href="/User/Login" style="text-decoration:none; color:#0A142F; font-weight: bold;">Login</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register form

@endsection