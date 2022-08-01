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
@if(Route::current()->getName() == 'login')
<!-- container form -->
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4 reveal" style="background-color:#FFFFFF;">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row py-3">
            <div class="col-6 mx-auto d-flex align-items-center reveal fade-left" style="width: 31.25rem;">
                <img src="{{url('Web/LoginUser.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-6 mx-auto my-5 reveal fade-right" style="width: 31.25rem;">
                <h2 class="text-center">Login To Your Account</h2>
                <form class="my-5" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-default text-white mt-3 mb-2 border-0">Login</button>
                        <div style="font-size: 1rem;">Don’t have an account ? <a href="{{ route('register') }}" style="text-decoration:none; color:#0A142F; font-weight: bold;">Register</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- container form -->
@elseif (Route::current()->getName() == 'login/admin')
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4 mt-2 reveal" style="background-color:#FFFFFF;">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row py-3">
            <div class="col-6 mx-auto d-flex align-items-center reveal fade-left" style="width: 31.25rem;">
                <img src="{{url('Web/LoginAdmin.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-6 mx-auto my-5 reveal fade-right" style="width: 31.25rem;">
                <h2 class="text-center">Login To Admin Account</h2>
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
                        <button type="submit" class="btn btn-default text-white mt-3 mb-2 border-0">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection