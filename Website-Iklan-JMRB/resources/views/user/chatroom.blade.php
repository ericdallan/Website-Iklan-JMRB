@extends('layouts/app')
@section('content')
<style>
    .btn-default {
        background-color: #0C1531;
        color: #FFFFFF;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active {
        background-color: #0C1531;
        color: #FFFFFF;
    }

    .card-body:hover {
        background-color: #0C1531;
        color: #FFFFFF;
    }
</style>
<div class="py-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container">
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
        <div class="row rounded-3" style="background-color:#FFFFFF;">
            <div class="col-md-4">
                <div class="row my-2 mx-3">
                    <div class="justify-content-center text-start" style="color:#0A142F;">
                        <h3><i class="bi bi-inbox"></i> Chatroom</h3>
                    </div>
                </div>
                <div class="row my-2 mx-3">
                    <form action="" method="GET">
                        <div class="input-group rounded" style="width: 21rem;">
                            <input type="text" name="search" class="form-control rounded" value="{{ request()->get('search') }}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="bi bi-search" type="submit"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="row my-4 mx-3">
                    <button class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-circle"></i> Membuat Percakapan</button>
                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{Route('user/chatroom/create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Admin List</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if(!$admin->isEmpty())
                                        @foreach($admin as $admins)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::guard('web')->user()->id_user }}">
                                            <input type="hidden" id="id_admin" name="id_admin" value=" {{ $admins-> id_admin }}">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="row justify-content-center align-middle">
                                                    <div class="col-md-4">
                                                        @if(isset($admins->pic_profile) && $admins->pic_profile)
                                                        <img src="/Foto_Profile/User/{{$admins->pic_profile}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                                        @else
                                                        <img src="{{url('Web/default-user.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8 text-start">
                                                        {{ $admins-> username }}
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        @endforeach
                                        @else
                                        <p class='text-center'>No Admin found.</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-default">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>
</div>
@endsection