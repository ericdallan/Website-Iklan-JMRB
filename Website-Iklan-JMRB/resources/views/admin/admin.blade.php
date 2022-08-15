@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Admin')
@section('subtitle', 'List Admin')
<style>
    .form-label {
        color: #0A142F;
        font-weight: bold;
    }
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
            <form action="" method="GET">
                <div class="input-group rounded" style="width: 18rem;">
                    <input type="text" name="search" class="form-control rounded" value="{{ request()->get('search') }}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="bi bi-search" type="submit"></i>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-6 col-md-4 text-end text-white"><a class="btn btn-default btn-sm rounded-3" href="#" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create New Admin</a></div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <form action="{{Route('dashboard/admin/create')}}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-5">
                            <div class="row mb-2">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Admin Username">
                            </div>
                            <div class="row mb-2">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Admin First Name">
                            </div>
                            <div class="row mb-2">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Admin Last Name">
                            </div>
                            <div class="row mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Admin Email">
                            </div>
                            <div class="row mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="row mb-2">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="repassword" placeholder="Re-enter Password">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-sm rounded-3 w-25">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                foreach ($admin as $admins) {
                    $num++;
                ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td>@if(isset($admins->pic_profile) && $admins->pic_profile)
                            <img src="/Foto_Profile/User/{{$admins->pic_profile}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
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
                        <td>
                            <a class="btn btn-danger btn-sm" role="button" data-bs-toggle="modal" data-bs-target="#DeleteAdmin{{ $admins->id_admin }}">Delete</a>
                        </td>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="DeleteAdmin{{ $admins->id_admin }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Admin</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus akun <b>{{$admins->username}}</b> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-danger btn-sm" href="{{ route('dashboard/admin/delete', ['id' => $admins->id_admin]) }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@endsection