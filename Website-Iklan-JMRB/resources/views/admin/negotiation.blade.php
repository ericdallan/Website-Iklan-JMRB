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

    input[type="number"] {
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
                <h6 class="card-subtitle my-3 text-muted">Zone : {{ $negotiations-> zone }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Location : KM {{ $negotiations-> location }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Type : {{ $negotiations-> type }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Advertisement Type : {{ $negotiations-> advert_type }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Coordinate : <a href="https://www.google.com/search?q={{ $negotiations-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $negotiations-> maps_coord }}</a></h6>
                <h6 class="card-subtitle my-3 text-muted">Status : {{ $negotiations-> status }}</h6>
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name" value="{{ $negotiations->name }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zone</label>
                                <input type="text" class="form-control" id="zone" name="zone" placeholder="Advertisement Zone" value="{{ $negotiations->zone }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Advertisement Location" value="{{ $negotiations->location }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="maps_coord" class="form-label">Maps Coordinate</label>
                                <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Advertisement Coordinate" value="{{ $negotiations->maps_coord }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="type" class="form-label">Type Permanent/Non-Permanent</label>
                                <select class="main form-select" id="type" name="type" readonly>
                                    <option value="" disabled selected>Advertisement Type</option>
                                    <option value="Permanent" {{($negotiations->type == 'Permanent') ? "selected":'' }}>Permanent</option>
                                    <option value="Non-Permanent" {{($negotiations->type == 'Non-Permanent') ? "selected":'' }}>Non-Permanent</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <label for="advert_type" class="form-label">Advertisement Type</label>
                                <select class="sub form-select" id="advert_type" name="advert_type" readonly>
                                    <option value="{{ $negotiations->advert_type }}">{{ $negotiations->advert_type }}</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label" for="side">Sides</label>
                                <select class="form-select side" id="sides" name="sides" readonly>
                                    <option value="" disabled selected>How many sides</option>
                                    <option value="1" {{($negotiations->sides == '1') ? "selected":'' }}>One Sided</option>
                                    <option value="2" {{($negotiations->sides == '2') ? "selected":'' }}>Two Sided (Front and Rear)</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-md rounded-3">Open Negotiation</button>
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