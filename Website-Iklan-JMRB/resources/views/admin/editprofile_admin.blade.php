@extends('admin/layout_profile')
@section('title', 'Edit Profile Admin')
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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container rounded-4" style="background-color:#FFFFFF;">
        <div class="container mx-auto">
            <form action="{{route('admin/profile/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-0">
                    <div class="mx-auto d-flex justify-content-center align-self-center my-4">
                        <h5>Admin Profile</h5>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        <input type="hidden" id="id" name="id" value="{{ Auth::guard('admin')->user()->id_admin}}" readonly>
                        <div class="row mt-2 mb-5 d-flex align-items-center">
                            @if(Auth::guard('admin')->user()->pic_profile == '')
                            <div class="row mb-4">
                                <label for="pic_profile" class="form-label">Tambah Foto Profile <i class="text-center mb-4" style="color:#636363;">belum ada foto profile ter-upload</i></label>
                                <input onbeforeeditfocus="return false;" type="file" id="pic_profile" name="pic_profile">
                            </div>
                            <div class="d-flex justify-content-center align-self-center" style="height:28rem;">
                                <img src="{{url('Web/default-user.png')}}" class="img-fluid" alt="">
                            </div>
                            @endif
                            @if(Auth::guard('admin')->user()->pic_profile != '')
                            <div class="d-flex justify-content-center align-self-center mb-3" style="height:28rem;">
                                <img src="/Foto_Profile/Admin/{{Auth::guard('admin')->user()->pic_profile}}" class="img-fluid rounded" alt="">
                            </div>
                            <div class="row">
                                <label for="pic_profile" class="form-label">Ganti Foto Profile</label>
                                <input type="file" id="pic_profile" class="form-control" name="pic_profile">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                        @if(Auth::guard('admin')->user()->username == 'SuperAdmin')
                        <div class="row mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" value="{{ Auth::guard('admin')->user()->username }}" readonly>
                        </div>
                        @else
                        <div class="row mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" value="{{ Auth::guard('admin')->user()->username }}">
                        </div>
                        @endif
                        <div class="row mb-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Your First Name" value="{{ Auth::guard('admin')->user()->first_name }}">
                        </div>
                        <div class="row mb-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Your Last Name" value="{{ Auth::guard('admin')->user()->last_name }}">
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" value="{{ Auth::guard('admin')->user()->email }}">
                        </div>
                        <div class="row mb-4">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Your Phone Number" value="{{ Auth::guard('admin')->user()->phone_number }}">
                        </div>
                        <div class="row mb-4">
                            <label for="division" class="form-label">Division</label>
                            <input type="text" class="form-control" id="division" name="division" placeholder="Your Company Divison" value="{{ Auth::guard('admin')->user()->division }}">
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6 mx-auto d-flex justify-content-center align-self-center">
                        <button type="submit" class="btn btn-default border-0 rounded-5 mb-4">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection