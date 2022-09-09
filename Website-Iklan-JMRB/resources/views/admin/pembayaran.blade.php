@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Pembayaran')
@section('subtitle', 'Pembayaran')
<style>
    #rate_negotiation {
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
<div class="container my-4">
    <div class="row justify-content-center">
        @php
        if (!$pembayaran->isEmpty()){
        @endphp
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
                        <h6 class="card-subtitle my-3 text-muted">User : {{ $pembayarans-> username }}</h6>
                    </div>
                    <div class="text-center">
                        <hr style="width:100%;">
                        <a class="btn btn-default btn-md rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pembayarans->id_pembayaran }}">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $pembayarans->id_pembayaran }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin/pembayaran/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pembayaran" id="id_pembayaran" value="{{$pembayarans->id_pembayaran}}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Iklan {{$pembayarans->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-3">
                            <input type="hidden" class="form-control" id="id_negotiation" name="id_negotiation" value="{{ $pembayarans->id_negotiation }}">
                            <input type="hidden" class="form-control" id="id_iklan" name="id_iklan" value="{{ $pembayarans->id_iklan }}">
                            <div class="row mb-2">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name" value="{{ $pembayarans->name }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zona</label>
                                <input type="text" class="form-control" id="zone" name="zone" placeholder="Advertisement Zone" value="{{ $pembayarans->zone }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Advertisement Location" value="{{ $pembayarans->location }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="maps_coord" class="form-label">Koordinat Maps</label>
                                <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Advertisement Coordinate" value="{{ $pembayarans->maps_coord }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                <input type="text" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{ $pembayarans->rate_negotiation }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="time" class="form-label">Waktu Pembayaran</label>
                                <input type="text" class="form-control" id="time" name="time" value="{{strftime("%d %b %Y, %H:%M:%S",strtotime($pembayarans->time)) }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label">Bukti Pembayaran</label>
                                <embed src="/Dokumen/Bukti_Pembayaran/{{$pembayarans->bukti_pembayaran}}" style="width:100%;height:250px;">
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="text-center">
                                    <a class="btn btn-success btn-md" href="/Dokumen/Bukti_Pembayaran/{{$pembayarans->bukti_pembayaran}}" download>Unduh Bukti Pembayaran</a>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="expired_date" class="form-label">Tenggat Iklan</label>
                                <input type="datetime-local" class="form-control" step="any" id="expired_date" name="expired_date" value="{{ $pembayarans->expired_date }}">
                            </div>
                            <div class="row mb-3">
                                <label class="form-label" for="status_pembayaran">Status Pembayaran</label>
                                <select class="form-select" id="status_pembayaran" id="status_pembayaran" name="status_pembayaran">
                                    <option value="Menunggu Konfirmasi Pembayaran" {{($pembayarans->status_pembayaran == 'Menunggu Konfirmasi Pembayaran') ? "selected":'' }} disabled>Menunggu Konfirmasi Pembayaran</option>
                                    <option value="Pembayaran Diterima" {{($pembayarans->status_pembayaran == 'Tahap Pembayaran Diterima') ? "selected":'' }}>Terima Pembayaran</option>
                                    <option value="Pembayaran Ditolak" {{($pembayarans->status_pembayaran == 'Pembayaran Ditolak') ? "selected":'' }}>Tolak Pembayaran</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-md rounded-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @php
        } else{
        @endphp
        <p class='text-center'>No record found.</p>
        @php
        }
        @endphp
    </div>
</div>
@endsection