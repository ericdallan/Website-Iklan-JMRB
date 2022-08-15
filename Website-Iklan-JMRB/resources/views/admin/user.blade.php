@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-User')
@section('subtitle', 'List User')
<style>
    .btn-default {
        background-color: #0C1531;
        font-weight: bold;
        color: #FFFFFF;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active {
        background-color: #0C1531;
        font-weight: bold;
        color: #FFFFFF;
    }
</style>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8">
            <form action="" method="GET">
                <div class="input-group rounded" style="width: 18rem;">
                    <input type="text" name="search" class="form-control rounded" value="{{ request()->get('search') }}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="bi bi-search" type="submit"></i>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-6 col-md-4 text-end text-white"></div>
    </div>
    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered table-sm">
            <thead>
                <tr class="align-middle text-center">
                    <th scope="col">No</th>
                    <th scope="col">Pic</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="align-middle text-center">
                <?php
                $num = 0;
                foreach ($user as $users) {
                    $num++;
                ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td>@if(isset($users->pic_profile) && $users->pic_profile)
                            <img src="/Foto_Profile/User/{{$users->pic_profile}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            @else
                            <img src="{{url('Web/default-user.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            @endif
                        </td>
                        <td>{{$users->username}}</td>
                        <td>@if(isset($users->first_name) && $users->first_name)
                            {{$users->first_name}}
                            @else
                            <div class="text-danger">
                                Not Updated
                            </div>
                            @endif
                        </td>
                        <td>@if(isset($users->last_name) && $users->last_name)
                            {{$users->last_name}}
                            @else
                            <div class="text-danger">
                                Not Updated
                            </div>
                            @endif
                        </td>
                        <td>@if(isset($users->phone_number) && $users->phone_number)
                            {{$users->phone_number}}
                            @else
                            <div class="text-danger">
                                Not Updated
                            </div>
                            @endif
                        </td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->company_name}}</td>
                        <td>@if(isset($users->company_address) && $users->company_address)
                            {{$users->company_address}}
                            @else
                            <div class="text-danger">
                                Not Updated
                            </div>
                            @endif
                        </td>
                        <td><a class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $users->id_user }}">Detail</a></td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $users->id_user }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-0 mb-4">
                                        <div class="mx-auto d-flex justify-content-center align-self-center">
                                            <h5>{{ $users->username }} Profile</h5>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                                            <div class="row mb-4 d-flex align-items-center">
                                                @if($users->pic_profile == '')
                                                <strong>Foto Profile*</strong><i class="text-center mb-4" style="color:#636363;">belum ada foto profile ter-upload</i>
                                                <div class="d-flex justify-content-center align-self-center" style="height:24rem;">
                                                    <img src="{{url('Web/default-user.png')}}" class="rounded" alt="">
                                                </div>
                                                @endif
                                                @if($users->pic_profile != '')
                                                <div class="d-flex justify-content-center align-self-center" style="height:28rem;">
                                                    <img src="/Foto_Profile/User/{{$users->pic_profile}}" class="img-fluid rounded" alt="">
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                                            <div class="row mb-4">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" placeholder="Your Username" value="{{ $users->username }}" disabled>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="first_name" class="form-label">First Name</label>
                                                @if($users->first_name == '')
                                                <input type="text" class="form-control" id="first_name" placeholder="Your First Name" value="Not Updated" style="color:red" disabled>
                                                @endif
                                                @if($users->first_name != '')
                                                <input type="text" class="form-control" id="first_name" placeholder="Your First Name" value="{{ $users->first_name }}" disabled>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="last_name" class="form-label">Last Name</label>
                                                @if($users->last_name == '')
                                                <input type="text" class="form-control" id="last_name" placeholder="Your Last Name" value="Not Updated" style="color:red" disabled>
                                                @endif
                                                @if($users->last_name != '')
                                                <input type="text" class="form-control" id="last_name" placeholder="Your Last Name" value="{{ $users->last_name }}" disabled>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" placeholder="Your Email Address" value="{{ $users->email }}" disabled>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="phone_number" class="form-label">Phone Number</label>
                                                @if($users->phone_number == '')
                                                <input type="text" class="form-control" id="phone_number" placeholder="Your Phone Number" value="Not Updated" style="color:red" disabled>
                                                @endif
                                                @if($users->phone_number != '')
                                                <input type="text" class="form-control" id="phone_number" placeholder="Your Phone Number" value="{{ $users->phone_number }}" disabled>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                                            <div class="row mb-4">
                                                <label for="company_address" class="form-label">Company Address</label>
                                                @if($users->company_address == '')
                                                <input type="text" class="form-control" id="company_address" placeholder="Your Company Address" value="Not Updated" style="color:red" disabled>
                                                @endif
                                                @if($users->company_address != '')
                                                <input type="text" class="form-control" id="company_address" placeholder="Your Company Address" value="{{ $users->company_address }}" disabled>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                                            <div class="row mb-4">
                                                <label for="company_name" class="form-label">Company Name</label>
                                                <input type="text" class="form-control" id="company_name" placeholder="Your Company Name" value="{{ $users->company_name }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-sm-6 col-md-6 mx-auto" style="width: 30rem;">
                                            <div class="row mb-4">
                                                <label for="company_desc" class="form-label">Company Description</label>
                                                @if($users->company_desc == '')
                                                <input name="text" class="form-control" id="company_desc" placeholder="Your Company Description" value="Not Updated" style="color:red" disabled></input>
                                                @endif
                                                @if($users->company_desc != '')
                                                <input name="text" class="form-control" id="company_desc" placeholder="Your Company Description" value="{{ $users->company_desc }}" disabled></input>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@endsection