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
        <div class="row justify-content-center">
            @php
            if (!$iklan->isEmpty()){
            @endphp
            @foreach($iklan as $iklans)
            <div class="card mx-4 my-4" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title text-start">{{ $iklans-> name }}</h5>
                    <hr>
                    <h6 class="card-subtitle my-3 text-muted">Zone : {{ $iklans-> zone }}</h6>
                    <h6 class="card-subtitle my-3 text-muted">Location : KM {{ $iklans-> location }}</h6>
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
                            <div class="d-flex justify-content-center align-self-center mb-3" style="height:14rem;">
                                <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" class="img-fluid rounded" alt="">
                            </div>
                            <div class="row mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Iklan's Name" value="{{ $iklans->name }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zone</label>
                                <input type="text" class="form-control" id="zone" name="zone" placeholder="Iklan's Zone" value="{{ $iklans->zone }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Iklan's Location" value="{{ $iklans->location }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="rate" class="form-label">Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate" placeholder="Iklan's Rate" value="{{ $iklans->rate }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="meter" class="form-label">Meter</label>
                                    <input type="number" class="form-control" id="meter" name="meter" min="1" placeholder="Iklan's Meter">
                                </div>
                                <div class="col">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" min="1" placeholder="Iklan's Year">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="rate_negotiation" class="form-label">Rate Negotiation</label>
                                <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" min="{{ $iklans->rate }}" placeholder="Iklan's Rate Negotiation">
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
    <script>
        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            $("#start_date").attr('min', today);
        });
    </script>
</div>
@endsection