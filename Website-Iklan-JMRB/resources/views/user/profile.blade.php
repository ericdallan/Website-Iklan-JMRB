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
        color: #0A142F;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active {
        background-color: #FECD0A;
        font-weight: bold;
        width: 9.5rem;
        color: #0A142F;
    }
</style>
<div class="py-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4" style="background-color:#FFFFFF;">
        <div class="container mx-auto">
            <form action="">
                <div class="row g-0">
                    <div class="mx-auto d-flex justify-content-center align-self-center my-4">
                        <h5>Company Name Profile</h5>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4 d-flex align-items-center">
                            @if(Auth::guard('web')->user()->pic_profile == '')
                            <strong>Foto Profile*</strong><i class="text-center mb-4" style="color:#636363;">belum ada foto profile ter-upload</i> </label>
                            <div class="d-flex justify-content-center align-self-center" style="height:24rem;">
                                <img src="{{url('Web/default-user.png')}}" class="rounded" alt="">
                            </div>
                            @endif
                            @if(Auth::guard('web')->user()->pic_profile != '')
                            <div class="d-flex justify-content-center align-self-center" style="height:28rem;">
                                <img src="/Foto_Profile/User/{{Auth::guard('web')->user()->pic_profile}}" class="img-fluid rounded" alt="">
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
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Your Last Name" value="{{ Auth::guard('web')->user()->last_name }}" disabled>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email Address" value="{{ Auth::guard('web')->user()->email }}" disabled>
                        </div>
                        <div class="row mb-4">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" placeholder="Your Phone Number" value="{{ Auth::guard('web')->user()->phone_number }}" disabled>
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
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4">
                            <label for="company_desc" class="form-label">Company Description</label>
                            <input name="text" class="form-control" id="company_desc" placeholder="Your Company Description" value="{{ Auth::guard('web')->user()->company_desc }}" disabled></input>
                        </div>
                    </div>
                </div>
                <div class="row g-0 mb-4">
                    <div class="col-sm-6 col-md-6 mx-auto d-flex justify-content-center align-self-center">
                        <div class="row mb-4">
                            <a class="btn btn-default text-center border-0 rounded-5" href="{{ route('user/profile/edit', ['id' => $user->id_user]) }}">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection