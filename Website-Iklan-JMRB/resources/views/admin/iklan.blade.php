@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Iklan')
@section('subtitle', 'Advertisement')
<style>
    .form-label {
        color: #0A142F;
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
        background-color: #D9D9D9;
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
        <div class="col-6 col-md-4 text-end text-white">
            <button type="button" class="btn btn-default btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create New Advertisement</button>
        </div>
    </div>
    <div class="row justify-content-center">
        @php
        if (!$iklan->isEmpty()){
        @endphp
        @foreach($iklan as $iklans)
        <div class="card mx-4 my-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $iklans-> name }}</h5>
                <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> zone }}</h6>
                <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> location }}</h6>
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
        <!-- Modal Detai;-->
        <div class="modal fade" id="exampleModal{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('dashboard/iklan/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Iklan {{$iklans->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-3">
                            <input type="hidden" id="id" name="id" value="{{ $iklans->id_iklan }}">
                            <div class="row mb-3">
                                <label for="pic_advert" class="form-label">Ganti Foto Iklan</label>
                                <input type="file" id="pic_advert" class="form-control" name="pic_advert">
                            </div>
                            <div class="row mb-3">
                                <div class="text-muted">Preview Foto Iklan</div>
                            </div>
                            <div class="d-flex justify-content-center align-self-center mb-3" style="height:14rem;">
                                <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" class="img-fluid rounded" alt="">
                            </div>
                            <div class="row mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Iklan's Name" value="{{ $iklans->name }}">
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zone</label>
                                <input type="text" class="form-control" id="zone" name="zone" placeholder="Iklan's Zone" value="{{ $iklans->zone }}">
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Iklan's Location" value="{{ $iklans->location }}">
                            </div>
                            <div class="row mb-2">
                                <label for="rate" class="form-label">Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate" placeholder="Iklan's Rate" value="{{ $iklans->rate }}">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-md rounded-3 w-25">Update</button>
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
    <!-- Modal New Advert-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{ route('dashboard/iklan/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Advertisement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-5">
                        <div class="row mb-2">
                            <label for="pic_advert" class="form-label">Upload Image</label>
                            <input type="file" id="pic_advert" class="form-control" name="pic_advert">
                        </div>
                        <div class="row mb-2">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name">
                        </div>
                        <div class="row mb-2">
                            <label for="zone" class="form-label">Zona</label>
                            <input type="text" class="form-control" id="zone" name="zone" placeholder="Advertisement Zone">
                        </div>
                        <div class="row mb-2">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Advertisement Location">
                        </div>
                        <div class="row mb-2">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Advertisement Type" value="Dashboard" readonly>
                        </div>
                        <div class="row mb-2">
                            <label for="rate" class="form-label">Rate</label>
                            <input type="text" class="form-control" id="rate" name="rate" placeholder="Advertisement Rate" value="2500000" readonly>
                        </div>
                        <div class="row mb-2">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Advertisement Status" value="Open" readonly>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default btn-sm rounded-3 w-25">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection