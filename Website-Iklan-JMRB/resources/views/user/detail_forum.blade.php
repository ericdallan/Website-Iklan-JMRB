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
        <div class="row rounded-3" style="background-color:#FFFFFF;">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h5 class="card-title text-center">{{$forum->title}}</h5>
                    <hr>
                    @if(isset($forums->pic_forum) && $forums->pic_forum)
                    <img src="/Dokumen/Forum/{{$forums->pic_forum}}" alt="hugenerd" width="100" height="100">
                    @else
                    <img src="{{url('Web/forum.png')}}" alt="hugenerd" width="100" height="100">
                    @endif
                </div>
                <div class="card-body mx-3">
                    <p class="card-text">{{$forum->body}}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <span class="mx-3">
                                <i class="bi bi-hand-thumbs-up"></i>Like
                            </span>
                            <span class="mx-3">
                                <i class="bi bi-reply"></i>Balas
                            </span>
                            <span class="mx-3">
                                <i class="bi bi-share"></i>Share
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection