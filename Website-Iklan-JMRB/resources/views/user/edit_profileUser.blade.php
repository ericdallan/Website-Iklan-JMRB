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
            <form action="{{route('profile/update') }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
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
                        <input type="hidden" id="id" name="id" value="{{ Auth::guard('web')->user()->id_user }}">
                        <div class="row mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" value="{{ Auth::guard('web')->user()->username }}">
                        </div>
                        <div class="row mb-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Your First Name" value="{{ Auth::guard('web')->user()->first_name }}">
                        </div>
                        <div class="row mb-4">
                            <label for="last_Name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_Name" name="last_Name" placeholder="Your Last Name" value="{{ Auth::guard('web')->user()->last_Name }}">
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" value="{{ Auth::guard('web')->user()->email }}">
                        </div>
                        <div class="row mb-4">
                            <label for="phone_mumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_mumber" name="phone_mumber" placeholder="Your Phone Number" value="{{ Auth::guard('web')->user()->phone_mumber }}">
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="company_address" class="form-label">Company Address</label>
                            <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Your Company Address" value="{{ Auth::guard('web')->user()->company_address }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Your Company Name" value="{{ Auth::guard('web')->user()->company_name }}">
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto d-flex justify-content-center align-self-center" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="company_desc" class="form-label">Company Description</label>
                            <input name="text" class="form-control" id="company_desc" name="company_desc" placeholder="Your Company Description" value="{{ Auth::guard('web')->user()->company_desc }}"></input>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto d-flex justify-content-center align-self-center my-4">
                        <button type="submit" class="border-0 rounded-5">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection