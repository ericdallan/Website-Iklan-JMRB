@extends('layouts/app')
@section('content')
<style>
    #rate_negotiation,
    #status_pembayaran {
        pointer-events: none;
        background-color: #e9ecef;
    }

    .form-label {
        color: #0A142F;
        font-weight: bold;
    }

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
<div class="py-3" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container mt-4">
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
        <div class="row mb-3">
            <div class="col-md-4 mb-4">
                <div class="row justify-content-center">
                    @if (!$pembayaran->isEmpty())
                    @foreach($pembayaran as $pembayarans)
                    <div class="card mx-2 mb-4" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $pembayarans-> name }}</h5>
                            <hr>
                            <h6 class="card-subtitle my-3 text-muted">Zone : {{ $pembayarans-> zone }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Location : KM {{ $pembayarans-> location }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Type : {{ $pembayarans-> type }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Advertisement Type : {{ $pembayarans-> advert_type }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Coordinate : <a href="https://www.google.com/search?q={{ $pembayarans-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $pembayarans-> maps_coord }}</a></h6>
                            <h6 class="card-subtitle my-3 text-muted">Status : {{ $pembayarans-> status_negotiation }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Harga Negosiasi : Rp. {{ number_format($pembayarans-> rate_negotiation,0,',','.') }}</h6>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="text-center">
                                    <a class="btn btn-default btn-md rounded-3" href="{{ route('user/pembayaran/detail', ['id'=>$pembayarans->id_negotiation]) }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class='text-center'>Tidak ada Pembayaran.</p>
                    @endif
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="row">
                    <div class="card-body">
                        <div class="container rounded-3" style="background-color:#FFFFFF;">
                            @if(Route::is('user/pembayaran'))
                            <h5 class="card-title mb-4 text-center py-1">Pilih detail pembayaran yang ingin dilihat</h5>
                            @endif
                            @if (!$pembayaran->isEmpty())
                            @if(Route::is('user/pembayaran/detail', ['id'=>$pembayarans->id_negotiation]))
                            @foreach($pembayaran_onboard as $pembayaran_onboards)
                            <div class="py-2">
                                <h5 class="card-title mb-4 text-center">{{ $pembayaran_onboards->name }}</h5>
                                <hr style="width:100%;">
                                <h5 class="card-title mb-4 text-center">{{ $pembayaran_onboards->advert_type }}</h5>
                                <form action="{{route('user/pembayaran/create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mx-4">
                                        <input type="hidden" class="form-control" id="id_user" value="{{$pembayaran_onboards->id_user}}" name="id_user" readonly>
                                        <input type="hidden" class="form-control" id="id_iklan" value="{{$pembayaran_onboards->id_iklan}}" name="id_iklan" readonly>
                                        <input type="hidden" class="form-control" id="id_negotiation" value="{{$pembayaran_onboards->id_negotiation}}" name="id_negotiation" readonly>
                                        <input type="hidden" id="time" name="time" value="{{Carbon\Carbon::now()->format('Y/m/d H:i:s')}}" readonly>
                                        <div class="row mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$pembayaran_onboards->rate_negotiation}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="rate_negotiation" class="form-label">Bukti Pembayaran</label>
                                            <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
                                        </div>
                                        <div class="row mb-3">
                                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                            <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran" placeholder="Menunggu Konfirmasi Pembayaran" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row align-item-center">
                                                <button type="submit" class="btn btn-default btn-md rounded-3">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
</div>
@endsection