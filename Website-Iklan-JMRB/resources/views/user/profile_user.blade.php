@extends('layouts/app')
@section('content')
<style>
    label {
        color: #0A142F;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
        background-color: #D9D9D9;
    }

    textarea {
        background-color: #D9D9D9;
    }

    button {
        background-color: #FECD0A;
        font-weight: bold;
        width: 9.5rem;
        height: 3rem;
        color: #0A142F;
    }
</style>
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4" style="background-color:#FFFFFF;">
        <div class="container mx-auto">
            <form action="">
                <div class="row g-0 ">
                    <div class="mx-auto d-flex justify-content-center align-self-center my-4">
                        <h5>Company Name Profile</h5>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem; height:20rem;">
                        <div class="row mb-4 d-flex align-items-center">
                            <img src="{{url('Web/LoginUser.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Your Username" value="{{ Auth::guard('web')->user()->username }}" disabled>
                        </div>
                        <div class="row mb-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Your First Name" value="{{ Auth::guard('web')->user()->first_name }}" disabled>
                        </div>
                        <div class="row mb-4">
                            <label for="last_Name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_Name" placeholder="Your Last Name" value="{{ Auth::guard('web')->user()->last_Name }}" disabled>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email Address" value="{{ Auth::guard('web')->user()->email }}" disabled>
                        </div>
                        <div class="row mb-4">
                            <label for="phone_mumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_mumber" placeholder="Your Phone Number" value="{{ Auth::guard('web')->user()->phone_mumber }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="company_address" class="form-label">Company Address</label>
                            <input type="text" class="form-control" id="company_address" placeholder="Your Company Address" value="{{ Auth::guard('web')->user()->company_address }}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" placeholder="Your Company Name" value="{{ Auth::guard('web')->user()->company_name }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto d-flex justify-content-center align-self-center" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="company_desc" class="form-label">Company Description</label>
                            <input name="text" class="form-control" id="company_desc" placeholder="Your Company Description" value="{{ Auth::guard('web')->user()->company_desc }}" disabled></input>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto d-flex justify-content-center align-self-center my-4">
                        <button type="submit" class="border-0 rounded-5">Edit Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection