@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Forum')
@section('subtitle', 'Forum')
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
<div class="container">
    <div class="row">
        <div class="col-md-8 mb-2">
        </div>
        <div class="col-md-4 text-end mb-2">
            <form action="" method="GET">
                <div class="btn-group " style="width: 12rem;">
                    <button class="btn btn-default dropdown-toggle" type="button" name="search" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" aria-describedby="search-addon">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin/forum">All</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin/forum?search=Iklan">Iklan</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin/forum?search=Negosiasi">Negosiasi</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin/forum?search=Chat+Room">Chat Room</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin/forum?search=Pembayaran">Pembayaran</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin/forum?search=Akun">Akun</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin/forum?search=Lainnya">Lainnya</a></li>
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
        <div class="card mx-3 my-4" style="width: 21rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $forums-> title }}</h5>
                <p>Diposting oleh : <b>{{$forums->owner}}</b> <i>({{strftime("%d %b %Y, %H:%M:%S",strtotime($forums->time))}})</i></p>
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
                    <a class="btn btn-default btn-sm w-50 rounded-3" href="{{route('admin/forum/detail',['id' => $forums->id_forum])}}">Open</a>
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
</div>
@endsection