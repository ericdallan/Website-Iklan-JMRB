@extends('layouts/app')
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
                <h2 class="text-center">Login To Admin Account</h2>
                <form class="my-5" action="{{ route('login/admin') }}" method="POST">
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
                        <button type="submit" class="btn-default text-white mt-3 mb-2 border-0">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login form -->
@endsection