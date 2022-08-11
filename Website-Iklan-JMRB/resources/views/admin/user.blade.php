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
            <div class="input-group rounded" style="width: 18rem;">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>
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
                        <td>
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
                        <td><a class="btn btn-default btn-sm" href="{{ route('dashboard/user/detail',['id'=>$users->id_user]) }}" role="button">Detail</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
@endsection