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
                <div class="row mt-5 mx-3">
                    <div class="justify-content-center text-start" style="color:#0A142F;">
                        <h2><i class="bi bi-inbox"></i> Chatroom</h2>
                    </div>
                </div>
                <div class="row my-2 mx-3">
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
                                        <div class="form-group">
                                            <select class="form-control" id="position-option" name="id_admin" id="id_admin">
                                                @foreach ($admin as $admins)
                                                <option value="{{ $admins->id_admin }}">{{ $admins->username }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::guard('web')->user()->id_user }}">
                                        </div>
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
                <div class="row my-4 mx-3 justify-content-center">
                    @if(!$chatroom->isEmpty())
                    @foreach($chatroom as $chatrooms)
                    <div class="card my-2" style="width: 18rem;">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-2">
                                        @if(isset($chatrooms->pic_profile) && $chatrooms->pic_profile)
                                        <img src="/Foto_Profile/Admin/{{$chatrooms->pic_profile}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                        @else
                                        <img src="{{url('Web/default-user.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                        @endif
                                    </div>
                                    <div class="col-md-10 text-start">
                                        {{ $chatrooms-> username }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('user/chatroom/detail', ['id'=>$chatrooms->id_chatroom]) }}" class="btn btn-default">Buka Percakapan</a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class='text-center'>Tidak ada chatroom.</p>
                    @endif
                </div>
            </div>
            <div class="col-md-8 my-4">
                <div class="row">
                    <div class="container rounded-3">
                        @if(Route::is('user/chatroom'))
                        <h5 class="card-title mb-4 text-center my-4">Pilih chatroom yang ingin dilihat</h5>
                        @endif
                        @if (!$chatroom->isEmpty())
                        @if(Route::is('user/chatroom/detail', ['id'=>$chatrooms->id_chatroom]))
                        @foreach($chatroom_onboard as $chatroom_onboards)
                        <div class="container my-4 rounded-3" style="background-color:rgb(0,0,0,0.1);">
                            <div class="text-center py-2">
                                <h5>{{ $chatroom_onboards->username }}</h5>
                                <hr style="width: 100%;">
                            </div>
                            <div class="chat-input py-1">
                                @foreach($message as $messages)
                                <p>[{{ $messages->time }}] {{ $messages-> from }} : {{ $messages-> message }}</p>
                                @endforeach
                                <form action="{{Route('user/chatroom/message/create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="hidden" id="id_chatroom" name="id_chatroom" value=" {{ $chatroom_onboards-> id_chatroom }}">
                                        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::guard('web')->user()->id_user }}">
                                        <input type="hidden" id="id_admin" name="id_admin" value="{{ $chatroom_onboards-> id_admin }}">
                                        <input type="hidden" id="time" name="time" value="{{Carbon\Carbon::now()->format('Y/m/d H:i:s')}}">
                                        <input type="hidden" id="from" name="from" value="{{ Auth::guard('web')->user()->username }}">
                                        <input type="hidden" id="for" name="for" value="{{ $chatrooms-> username }}">
                                        <input type="text" class="form-control" id="message" name="message" placeholder="Pesan" aria-label="message" aria-describedby="button-addon2">
                                        <button class="btn btn-default" type="submit" id="button-addon2">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection