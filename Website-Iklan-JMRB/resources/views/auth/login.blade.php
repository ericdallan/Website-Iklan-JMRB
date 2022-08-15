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

    .form-group {
        position: relative;
    }

    .form-group .form-control-icon {
        position: absolute;
        z-index: 2;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        color: black;
        right: 0;
        top: 0px;
    }
</style>
<!-- color label -->
<!-- Login form -->
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4" style="background-color:#FFFFFF;">
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
            <div class="col-6 mx-auto d-flex align-items-center" style="width: 31.25rem;">
                <img src="{{url('Web/LoginUser.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-6 mx-auto my-5" style="width: 31.25rem;">
                <h2 class="text-center">Login To Your Account</h2>
                <form class="my-5" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="form-group">
                            <i class="bi bi-eye-slash form-control-icon" id="togglePassword"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-default text-white mt-3 mb-2 border-0">Login</button>
                        <div style="font-size: 1rem;">Don’t have an account ? <a href="{{ route('register') }}" style="text-decoration:none; color:#0A142F; font-weight: bold;">Register</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
</div>
<!-- Login form -->
@endsection