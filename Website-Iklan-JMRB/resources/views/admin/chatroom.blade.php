@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Chatroom')
@section('subtitle', 'Chatroom')
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
        <div class="col-6 col-md-4 text-end text-white"><a class="btn btn-default btn-sm rounded-3" href="#" role="button" data-bs-toggle="modal" data-bs-target="#addModal">Create New Conversation</a></div>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin/chatroom/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User List</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if(!$user->isEmpty())
                            <div class="form-group">
                                <select class="form-control" id="position-option" name="id_user" id="id_user">
                                    @foreach($user as $users)
                                    <option value="{{ $users->id_user }}">{{ $users->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" id="id_admin" name="id_admin" value="{{ Auth::guard('admin')->user()->id_admin }}">
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
    <div class="row my-4">
        <div class="col-md-4">
            @if(!$chatroom->isEmpty())
            @foreach($chatroom as $chatrooms)
            <div class="card my-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $chatrooms-> username }}</h5>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('admin/chatroom/detail', ['id'=>$chatrooms->id_chatroom]) }}" class="btn btn-default">Buka Percakapan</a>
                </div>
            </div>
            @endforeach
            @else
            <p class='text-center'>Tidak ada chatroom.</p>
            @endif
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="container rounded-3">
                    @if(Route::is('admin/chatroom'))
                    <h5 class="card-title mb-4 text-center my-4">Pilih chatroom yang ingin dilihat</h5>
                    @endif
                    @if (!$chatroom->isEmpty())
                    @if(Route::is('admin/chatroom/detail', ['id'=>$chatrooms->id_chatroom]))
                    @foreach($chatroom_onboard as $chatroom_onboards)
                    <div class="container my-2 rounded-3" style="background-color:rgb(0,0,0,0.1);">
                        <div class="text-center py-2">
                            <h5>{{ $chatroom_onboards->username }}</h5>
                            <hr style="width: 100%;">
                        </div>
                        <div class="chat-input py-1">
                            @foreach($message as $messages)
                            <p>[{{ strftime("%d %b %Y, %H:%M:%S",strtotime($messages->time))}}] {{ $messages-> from }} : {{ $messages-> message }}</p>
                            @endforeach
                            <form action="{{route('admin/chatroom/message/create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" id="id_chatroom" name="id_chatroom" value=" {{ $chatroom_onboards-> id_chatroom }}">
                                    <input type="hidden" id="id_user" name="id_user" value="{{  $chatroom_onboards-> id_user }}">
                                    <input type="hidden" id="id_admin" name="id_admin" value=" {{ Auth::guard('admin')->user()->id_admin }}">
                                    <input type="hidden" id="time" name="time" value="{{Carbon\Carbon::now()->format('Y/m/d H:i:s')}}">
                                    <input type="hidden" id="from" name="from" value="{{ Auth::guard('admin')->user()->username }}">
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
@endsection