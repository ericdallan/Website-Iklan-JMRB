@extends('layouts/app')
@section('content')
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

    textarea {
        background-color: #D9D9D9;
    }

    .btn-default {
        background-color: #FECD0A;
        font-weight: bold;
        width: 9.5rem;
        height: 3rem;
        color: #0A142F;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active {
        background-color: #FECD0A;
        font-weight: bold;
        width: 9.5rem;
        height: 3rem;
        color: #0A142F;
    }
</style>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
</div>
@endif
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4" style="background-color:#FFFFFF;">
        <div class="container mx-auto">
            <form action="">
                <div class="row g-0 ">
                    <div class="mx-auto d-flex justify-content-center align-self-center my-4">
                        <h5>Company Name Profile</h5>
                        <p>{{ Auth::guard('web')->user()->id_user }}</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem; height:20rem;">
                        <div class="row mb-4 d-flex align-items-center">
                            @if(Auth::guard('web')->user()->pic_profile == '')
                            <strong>Foto Profile*</strong><i class="text-center" style="color:#636363;">belum ada foto profile ter-upload</i> </label>
                            <img src="{{url('Web/LoginUser.jpg')}}" class="img-fluid" alt="">
                            @endif
                            @if(Auth::guard('web')->user()->pic_profile != '')>
                            <img src="/gambar/userprofile/{{Auth::guard('web')->user()->pic_profile}}" class="img-fluid" alt="">
                            <div class="pic">
                                <div class="mt-1">
                                    <label class="form-label"><strong>Ganti Foto Profile*</strong></label>
                                </div>
                                <div class="mb-3">
                                    <input onbeforeeditfocus="return false;" type="file" name="pic" id="pic">
                                </div>
                            </div>
                            @endif
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
                            <input type="text" class="form-control" id="phone_mumber" placeholder="Your Phone Number" value="{{ Auth::guard('web')->user()->phone_mumber }}" disabled>
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
                        <a class="btn btn-default  border-0 rounded-5" href="{{ route('user/profile/edit', ['id' => $user->id_user]) }}">Edit Profile</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection