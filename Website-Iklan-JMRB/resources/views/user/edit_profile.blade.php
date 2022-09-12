@extends('layouts/app')
@section('content')
<style>
    .form-label {
        color: #0A142F;
        font-weight: bold;
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
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <div type="button" class="btn-close rounded-4" data-bs-dismiss="alert" aria-label="Close"></div>
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <div type="button" class="btn-close rounded-4" data-bs-dismiss="alert" aria-label="Close"></div>
        </div>
        @endif
        <div class="container mx-auto">
            <form action="{{route('user/profile/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-0 ">
                    <div class="mx-auto d-flex justify-content-center align-self-center my-4">
                        <h5>Company Name Profile</h5>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <div class="row mb-4 d-flex align-items-center">
                            @if(Auth::guard('web')->user()->pic_profile == '')
                            <div class="row mb-4">
                                <label for="pic_profile" class="form-label">Tambah Foto Profile <i class="text-center mb-4" style="color:#636363;">belum ada foto profile ter-upload</i></label>
                                <input onbeforeeditfocus="return false;" type="file" id="pic_profile" name="pic_profile">
                            </div>
                            <div class="d-flex justify-content-center align-self-center" style="height:28rem;">
                                <img src="{{url('Web/default-user.png')}}" class="img-fluid" alt="">
                            </div>
                            @endif
                            @if(Auth::guard('web')->user()->pic_profile != '')
                            <div class="d-flex justify-content-center align-self-center mb-4" style="height:28rem;">
                                <img src="/Foto_Profile/User/{{Auth::guard('web')->user()->pic_profile}}" class="img-fluid rounded" alt="">
                            </div>
                            <div class="row">
                                <label for="pic_profile" class="form-label">Ganti Foto Profile</label>
                                <input type="file" id="pic_profile" class="form-control" name="pic_profile">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <input type="hidden" id="id" name="id" value="{{ Auth::guard('web')->user()->id_user }}" readonly>
                        <div class="row mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" value="{{ Auth::guard('web')->user()->username }}">
                        </div>
                        <div class="row mb-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Your First Name" value="{{ Auth::guard('web')->user()->first_name }}">
                        </div>
                        <div class="row mb-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Your Last Name" value="{{ Auth::guard('web')->user()->last_name }}">
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" value="{{ Auth::guard('web')->user()->email }}">
                        </div>
                        <div class="row mb-4">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Your Phone Number" value="{{ Auth::guard('web')->user()->phone_number }}">
                        </div>
                        <div class="row mb-4">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Your Company Name" value="{{ Auth::guard('web')->user()->company_name }}">
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
                        <div class="row">
                            <label for="company_desc" class="form-label">Company Description</label>
                            <input type="text" class="form-control" id="company_desc" name="company_desc" placeholder="Your Company Description" value="{{ Auth::guard('web')->user()->company_desc }}">
                        </div>
                    </div>
                </div>
                <div class="row g-0 pb-2">
                    <div class="col-sm-6 col-md-6 mx-auto d-flex justify-content-center align-self-center my-4">
                        <button type="submit" class="btn btn-default border-0 rounded-5">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection