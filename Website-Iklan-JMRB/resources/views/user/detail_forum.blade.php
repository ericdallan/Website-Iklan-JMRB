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
        <div class="row rounded-3 mx-5" style="background-color:#FFFFFF;">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h5 class="card-title text-center">{{$forum->title}}</h5>
                    <p>Diposting oleh : <b>{{$forum->owner}}</b><i> ({{strftime("%d %b %Y, %H:%M:%S",strtotime($forum->time))}})</i></p>
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
                            <button type="button" id="reply" class="mx-2 btn btn-secondary">
                                <i class="bi bi-reply" type="button"></i> Balas
                            </button>
                        </div>
                    </div>
                </div>
                <form action="{{route('user/forum/replay/create')}}" method="POST" id="body" name="body" enctype="multipart/form-data">
                    @csrf
                    <div class="container my-2">
                        <div class="mx-4">
                            <div class="row mb-2 d-flex flex-row-reverse">
                                <button type="button" class="btn-close" id="close" name="close"></button>
                            </div>
                            <div class="row mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="reply_body" name="reply_body" style="height: 6rem;"></textarea>
                            </div>
                            <div class="row mb-3">
                                <label for="reply_pict" class="form-label">Upload Foto<i class="fs-6 text-muted">(Opsional)</i></label>
                                <input type="file" id="reply_pict" class="form-control" name="reply_pict">
                            </div>
                            <input type="hidden" id="id_forum" name="id_forum" value="{{$forum->id_forum}}" readonly>
                            <input type="hidden" id="time_reply" name="time_reply" value="{{Carbon\Carbon::now()->format('Y/m/d H:i:s')}}" readonly>
                            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::guard('web')->user()->id_user }}" readonly>
                            <input type="hidden" id="owner_reply" name="owner_reply" value="{{ Auth::guard('web')->user()->username }}" readonly>
                            <div class="row mb-3 justify-content-center">
                                <button type="submit" class="btn btn-default btn-sm rounded-3 w-25">Reply</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center fs-4" style="background-color:rgba(12, 21, 49, 0.5)">
                <p class="mx-2 my-3 rounded-3 text-white" style="background-color:#0C1531;">Balasan
                </p>
            </div>
            @foreach($replay as $replays)
            <div class="container" id="body-reply" name="body-reply">
                <div class="card my-2">
                    <div class="card-header">
                        <p class="card-text">Balasan dari <b>{{$replays-> owner_reply}}</b><i> ({{strftime("%d %b %Y, %H:%M:%S",strtotime($replays->time_reply))}})</i></p>
                        @if(isset($replays->reply_pict) && $replays->reply_pict)
                        <img src="/Dokumen/Forum/Replay/{{$replays->reply_pict}}" alt="hugenerd" width="100" height="100">
                        @else
                        @endif
                    </div>
                    <div class="card-body mx-3">
                        <p class="card-text">{{$replays-> reply_body}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#body").hide();
            $("#reply").click(function(e) {
                $("#body").show();
                $("#reply").hide();
            });
            $("#close").click(function(e) {
                $("#reply").show();
                $("#body").hide();
            });
            $("#share_body").hide();
            $("#share").click(function(e) {
                $("#share_body").show();
                $("#share").hide();
            });
            $("#close2").click(function(e) {
                $("#share").show();
                $("#share_body").hide();
            });
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        function copyToClipboard() {
            var valueText = $("#share").select().val();
            document.execCommand("copy");
            alert("data '" + valueText + "' berhasil di salin")
        }
    </script>
</div>
@endsection