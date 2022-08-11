@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Admin')
@section('subtitle', 'List Admin')
<style>
    .btn-default {
        background-color: #0C1531;
        font-weight: bold;
        width: 9.5rem;
        color: #FFFFFF;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active {
        background-color: #0C1531;
        font-weight: bold;
        width: 9.5rem;
        color: #FFFFFF;
    }
</style>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8">
            <div class="input-group rounded" style="width: 18rem;">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
        <div class="col-6 col-md-4 text-end text-white"><a class="btn btn-default btn-sm rounded-3" href="#" role="button">Create New Admin</a></div>
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
                    <th scope="col">Divisi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="align-middle text-center">
                <?php
                $num = 0;
                foreach($admin as $admins){
                $num++;
                ?>
                <tr>
                    <td><?= $num ?></td>
                    <td>@if(isset($admins->pic_profile) && $admins->pic_profile)
                        <img src="/Foto_Profile/User/{{Auth::guard('admin')->user()->pic_profile}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        @else
                        <img src="{{url('Web/default-user.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        @endif
                    </td>
                    <td>{{$admins->username}}</td>
                    <td>{{$admins->first_name}}</td>
                    <td>{{$admins->last_name}}</td>
                    <td>@if(isset($admins->phone_number) && $admins->phone_number)
                        {{$admins->phone_number}}
                        @else
                        <div class="text-danger">
                                Not Updated
                            </div>
                        @endif
                    </td>
                    <td>{{$admins->email}}</td>
                    <td>@if(isset($admins->division) && $admins->division)
                        {{$admins->division}}
                        @else
                        <div class="text-danger">
                                Not Updated
                            </div>
                        @endif
                    </td>
                    <td><a class="btn btn-danger btn-sm" href="#" role="button">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@endsection