@extends('layouts.app')

@section('content')
<!-- color label -->
<style>
    label {
        color: #0A142F;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        background-color: #D9D9D9;
    }

    .btn-default {
        background-color: #0A142F;
        width: 20rem;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active {
        background-color: #0A142F;
        width: 20rem;
    }
</style>
<!-- color label -->

<!-- Register form -->
<div class="py-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4 mt-1" style="background-color:#FFFFFF;">
        @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <div type="button" class="btn-close rounded-4" data-bs-dismiss="alert" aria-label="Close"></div>
        </div>
        @endif
        <div class="row">
            <div class="col-6 mx-auto d-flex align-items-center" style="width: 31.25rem;">
                <img src="{{url('Web/RegisterUser.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-6 mx-auto my-3" style="width: 31.25rem;">
                <h2 class="text-center mb-4">Create Your Free Account</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Your Username">
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Your Company Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <i class="fs-6 text-muted">(8 characters minimum)</i></label>
                        <input type="password" class="form-control" id="password" minlength="8" name="password" placeholder="Enter Password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password <i class="fs-6 text-muted">(8 characters minimum)</i></label>
                        <input type="password" class="form-control" id="password_confirmation"  minlength="8" name="repassword" placeholder="Re-enter Password">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-default text-white mt-3 mb-2 border-0">Create Your Account</button>
                        <div style="font-size: 1rem;">Already have an account ? <a href="{{ route('login') }}" style="text-decoration:none; color:#0A142F; font-weight: bold;">Login</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register form -->

@endsection