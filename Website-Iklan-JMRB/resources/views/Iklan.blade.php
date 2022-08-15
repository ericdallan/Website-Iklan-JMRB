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
                    <h5 class="card-title">{{ $iklans-> name }}</h5>
                    <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> zone }}</h6>
                    <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> location }}</h6>
                    <p class="card-text">Harga : <b>{{ $iklans-> rate }}</b></p>
                </div>
                <div class="card-footer">
                    <div class="text-start">
                        <p class="card-text text-muted">Total Applicant : </p>
                    </div>
                    <hr>
                    <div class="text-end">
                        <a class="btn btn-default btn-sm w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $iklans->id_iklan }}">Detail</a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $iklans->id_iklan }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <div class="d-flex justify-content-center align-self-center mb-3" style="height:14rem;">
                                <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" class="img-fluid rounded" alt="">
                            </div>
                            <div class="row mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Iklan's Name" value="{{ $iklans->name }}" disabled>
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zone</label>
                                <input type="text" class="form-control" id="zone" name="zone" placeholder="Iklan's Zone" value="{{ $iklans->zone }}" disabled>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Lozation</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Iklan's Location" value="{{ $iklans->location }}" disabled>
                            </div>
                            <div class="row mb-2">
                                <label for="rate" class="form-label">Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate" placeholder="Iklan's Rate" value="{{ $iklans->rate }}" disabled>
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