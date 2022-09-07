@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Negotiation')
@section('subtitle', 'Negotiation')
<style>
    select[readonly] {
        pointer-events: none;
        background-color: #e9ecef;
    }

    .form-label {
        color: #0A142F;
        font-weight: bold;
    }

    #maps_coord {
        background-color: #e9ecef;
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
        if (!$negotiation->isEmpty()){
        @endphp
        @foreach($negotiation as $negotiations)
        <div class="card mx-4 mb-4" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title fw-bold">{{ $negotiations-> name }}</h3>
                <hr>
                <h6 class="card-subtitle my-3 text-muted">Zona : {{ $negotiations-> zone }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Lokasi : KM {{ $negotiations-> location }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Tipe : {{ $negotiations-> type }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Tipe Iklan : {{ $negotiations-> advert_type }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Koordinat Maps : <a href="https://www.google.com/search?q={{ $negotiations-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $negotiations-> maps_coord }}</a></h6>
                <h6 class="card-subtitle my-3 text-muted">Status Negosiasi : {{ $negotiations-> status_negotiation }}</h6>
            </div>
            <div class="card-footer">
                <div class="row align-items-center">
                    <div class="text-center">
                        <h6 class="card-subtitle my-3 text-muted">User : {{ $negotiations-> username }}</h6>
                    </div>
                    <div class="text-center">
                        <hr style="width:100%;">
                        <a class="btn btn-default btn-md w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $negotiations->id_negotiation }}">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $negotiations->id_negotiation }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('admin/negotiation/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_negotiation" id="id_negotiation" value="{{$negotiations->id_negotiation}}">
                        <input type="hidden" name="id_user" id="id_user" value="{{$negotiations->id_user}}">
                        <input type="hidden" id="time" name="time" value="{{Carbon\Carbon::now()->format('Y/m/d H:i:s')}}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Iklan {{$negotiations->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="row mb-3">
                                <div class="text-muted">Preview Foto Iklan</div>
                            </div>
                            <div class="d-flex justify-content-center align-self-center mb-3">
                                @if(isset($negotiations->pic_advert) && $negotiations->pic_advert)
                                <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" alt="hugenerd" width="200" height="200">
                                @else
                                <p>Tidak ada foto iklan</p>
                                @endif
                            </div>
                            <div class="row mb-2">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name" value="{{ $negotiations->name }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zona</label>
                                <input type="text" class="form-control" id="zone" name="zone" placeholder="Advertisement Zone" value="{{ $negotiations->zone }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Advertisement Location" value="{{ $negotiations->location }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="maps_coord" class="form-label">Koordinat Maps</label>
                                <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Advertisement Coordinate" value="{{ $negotiations->maps_coord }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="type" class="form-label">Tipe Permanen/Non-Permanen</label>
                                <select class="main form-select" id="type" name="type" readonly>
                                    <option value="" disabled selected>Advertisement Type</option>
                                    <option value="Permanent" {{($negotiations->type == 'Permanent') ? "selected":'' }}>Permanent</option>
                                    <option value="Non-Permanent" {{($negotiations->type == 'Non-Permanent') ? "selected":'' }}>Non-Permanent</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <label for="advert_type" class="form-label">Tipe Iklan</label>
                                <select class="sub form-select" id="advert_type" name="advert_type" readonly>
                                    <option value="{{ $negotiations->advert_type }}">{{ $negotiations->advert_type }}</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label" for="side">Sisi</label>
                                <select class="form-select side" id="sides" name="sides" readonly>
                                    <option value="" disabled selected>How many sides</option>
                                    <option value="1" {{($negotiations->sides == '1') ? "selected":'' }}>One Sided</option>
                                    <option value="2" {{($negotiations->sides == '2') ? "selected":'' }}>Two Sided (Front and Rear)</option>
                                </select>
                            </div>
                            @if ($negotiations->status_negotiation == 'Negosiasi Diterima')
                            <div class="row mb-2">
                                <label for="rate_negotiation" class="form-label">Negosiasi Harga</label>
                                <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" placeholder="Advertisement Coordinate" value="{{ $negotiations->rate_negotiation }}" readonly>
                            </div>
                            @else
                            <div class="row mb-2">
                                <label for="rate_negotiation" class="form-label">Negosiasi Harga</label>
                                <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" placeholder="Advertisement Coordinate" value="{{ $negotiations->rate_negotiation }}">
                            </div>
                            @endif
                            @if ($negotiations->type == 'Permanent')
                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Dokumen Teknis</label>
                                <embed src="/Dokumen/Dokumen_Teknis/{{$negotiations->dokumen_teknis}}" style="width:100%;height:250px;" type="application/pdf">
                            </div>
                            @else
                            @endif
                            @if ($negotiations->type == 'Permanent')
                            <div class="row mb-3 text-center">
                                <a class="btn btn-success btn-sm" href="/Dokumen/Dokumen_Teknis/{{ $negotiations->dokumen_teknis }}" download>Unduh</a>
                            </div>
                            @else
                            @endif
                            @if ($negotiations->status_negotiation == 'Negosiasi Diterima')
                            <div class="row mb-3">
                                <label class="form-label" for="status_negotiation">Status Negosiasi</label>
                                <select class="form-select" id="status_negotiation" id="status_negotiation" name="status_negotiation" readonly>
                                    <option value="Tahap Negosiasi" {{($negotiations->status_negotiation == 'Tahap Negosiasi') ? "selected":'' }} disabled>Tahap Negosiasi</option>
                                    <option value="Pengajuan Negosiasi User" {{($negotiations->status_negotiation == 'Tahap Pengajuan Negosiasi User') ? "selected":'' }} disabled>Pengajuan Negosiasi User</option>
                                    <option value="Pengajuan Negosiasi Admin" {{($negotiations->status_negotiation == 'Pengajuan Negosiasi Admin') ? "selected":'' }}>Pengajuan Negosiasi Admin</option>
                                    <option value="Negosiasi Diterima" {{($negotiations->status_negotiation == 'Negosiasi Diterima') ? "selected":'' }}>Terima Pengajuan Negosiasi</option>
                                </select>
                            </div>
                            @else
                            <div class="row mb-3">
                                <label class="form-label" for="status_negotiation">Status Negosiasi</label>
                                <select class="form-select" id="status_negotiation" id="status_negotiation" name="status_negotiation">
                                    <option value="Tahap Negosiasi" {{($negotiations->status_negotiation == 'Tahap Negosiasi') ? "selected":'' }} disabled>Tahap Negosiasi</option>
                                    <option value="Pengajuan Negosiasi User" {{($negotiations->status_negotiation == 'Tahap Pengajuan Negosiasi User') ? "selected":'' }} disabled>Pengajuan Negosiasi User</option>
                                    <option value="Pengajuan Negosiasi Admin" {{($negotiations->status_negotiation == 'Pengajuan Negosiasi Admin') ? "selected":'' }}>Pengajuan Negosiasi Admin</option>
                                    <option value="Negosiasi Diterima" {{($negotiations->status_negotiation == 'Negosiasi Diterima') ? "selected":'' }}>Terima Pengajuan Negosiasi</option>
                                    <option value="Negosiasi Ditolak" {{($negotiations->status_negotiation == 'Negosiasi Ditolak') ? "selected":'' }}>Tolak Pengajuan Negosiasi</option>
                                </select>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            @if ($negotiations->status_negotiation == 'Negosiasi Diterima')
                            <button type="submit" class="btn btn-default btn-md rounded-3" disabled>Submit</button>
                            @else
                            <button type="submit" class="btn btn-default btn-md rounded-3">Submit</button>
                            @endif
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