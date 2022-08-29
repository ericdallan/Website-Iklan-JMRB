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
</style>

<div class="py-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container">
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
        <div class="row">
            <div class="col-md-8 mb-2">
                <button type="button" class="btn btn-default btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create New Forum</button>
            </div>
            <div class="col-6 col-md-4 text-end mb-2">
                <form action="" method="GET">
                    <div class="btn-group" style="width: 21rem;">
                        <button class="btn btn-default dropdown-toggle" type="button" name="search" data-bs-toggle="dropdown" aria-expanded="false" aria-describedby="search-addon">
                            Kategori
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user/forum">All</a></li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user/forum?search=Iklan">Iklan</a></li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user/forum?search=Negosiasi">Negosiasi</a></li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user/forum?search=Chat+Room">Chat Room</a></li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user/forum?search=Pembayaran">Pembayaran</a></li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user/forum?search=Akun">Akun</a></li>
                            <li><a class="dropdown-item" href="http://127.0.0.1:8000/user/forum?search=Lainnya">Lainnya</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            @php
            if (!$forum->isEmpty()){
            @endphp
            @foreach($forum as $forums)
            <div class="card mx-4 my-4" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $forums-> title }}</h5>
                    <hr>
                    <div class="text-center">
                        @if(isset($forums->pic_forum) && $forums->pic_forum)
                        <img src="/Dokumen/Forum/{{$forums->pic_forum}}" alt="hugenerd" width="100" height="100">
                        @else
                        <img src="{{url('Web/forum.png')}}" alt="hugenerd" width="100" height="100">
                        @endif
                    </div>
                    <h6 class="card-subtitle my-3 text-muted">{{ $forums-> body }}</h6>
                    <hr>
                    <h6 class="card-subtitle my-3 text-bold">Kategori : {{ $forums-> category }}</h6>
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <a class="btn btn-default btn-sm w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Open</a>
                    </div>
                </div>
            </div>
            @endforeach
            @php
            } else{
            @endphp
            <p class='text-center mt-4'>Tidak ada forum, silahkan untuk membuat forum.</p>
            @php
            }
            @endphp
        </div>
        <!-- Modal New Advert-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <form action="{{route('user/forum/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Forum</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-5">
                            <div class="row mb-2">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Advertisement Name">
                            </div>
                            <div class="row mb-2">
                                <label for="pic_forum" class="form-label">Foto Forum <i class="fs-6 text-muted">(Opsional)</i></label>
                                <input type="file" id="pic_forum" class="form-control" name="pic_forum">
                            </div>
                            <div class="row mb-2">
                                <label for="body" class="form-label">Isi Forum</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="body" name="body" style="height: 10rem"></textarea>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label" for="category">Kategori</label>
                                <select class="main form-select" id="category" id="category" name="category">
                                    <option value="" disabled selected>Kategori Forum</option>
                                    <option value="Iklan">Iklan</option>
                                    <option value="Negosiasi">Negosiasi</option>
                                    <option value="Chat Room">Chat Room</option>
                                    <option value="Pembayaran">Pembayaran</option>
                                    <option value="Akun">Akun</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <input type="hidden" id="time" name="time" value="{{Carbon\Carbon::now()->format('Y/m/d H:i:s')}}">
                            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::guard('web')->user()->id_user }}">
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-sm rounded-3 w-25">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection