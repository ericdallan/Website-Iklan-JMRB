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
        <div class="row">
            @php
            if (!$iklan->isEmpty()){
            @endphp
            @foreach($iklan as $iklans)
            <div class="card mx-auto my-4" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title text-start">{{ $iklans-> name }}</h5>
                    <hr>
                    <h6 class="card-subtitle my-3 text-muted">Zone : {{ $iklans-> zone }}</h6>
                    <h6 class="card-subtitle my-3 text-muted">Location : KM {{ $iklans-> location }}</h6>
                    <p class="card-text">Coordinate : <a href="https://www.google.com/search?q={{ $iklans-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $iklans-> maps_coord }}</a></p>
                    @if($iklans->expired_date != '')
                    <h6 class="card-subtitle my-3 text-muted">Tenggat Iklan : {{strftime("%d %b %Y, %H:%M:%S",strtotime($iklans->expired_date)) }}</h6>
                    @else
                    <h6 class="card-subtitle my-3 text-muted">Tenggat Iklan : Masih Tahap Negosiasi</h6>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="text-start">
                        <p class="card-text text-muted">Pemilik : {{ $iklans-> username }}</p>
                    </div>
                    <hr>
                    <div class="text-end">
                        <a class="btn btn-default btn-sm w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $iklans->id_iklan }}">Detail</a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Iklan {{$iklans->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="row mb-3">
                                <div class="text-muted">Preview Foto Iklan</div>
                            </div>
                            <div class="d-flex justify-content-center align-self-center mb-3">
                                @if(isset($iklans->pic_advert) && $iklans->pic_advert)
                                <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" alt="hugenerd" width="200" height="200">
                                @else
                                <p>Tidak ada foto iklan</p>
                                @endif
                            </div>
                            <div class="row mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $iklans->name }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zone</label>
                                <input type="text" class="form-control" id="zone" name="zone" value="{{ $iklans->zone }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ $iklans->location }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="maps_coord" class="form-label">Maps Coodinate</label>
                                <input type="text" class="form-control" id="maps_coord" name="maps_coord" value="{{ $iklans->maps_coord }}" readonly>
                            </div>
                        </div>
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

</div>
@endsection