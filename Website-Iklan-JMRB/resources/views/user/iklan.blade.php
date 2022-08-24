@extends('layouts/app')
@section('content')
<style>
     select[readonly] {
        pointer-events: none;
        background-color: #e9ecef;
    }

    .form-label {
        color: #0A142F;
        font-weight: bold;
    }

    input[type="text"],
    .rate {
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
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-6 col-md-4 text-end ">
                <form action="" method="GET">
                    <div class="input-group rounded" style="width: 21rem;">
                        <input type="text" name="search" class="form-control rounded" value="{{ request()->get('search') }}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="bi bi-search" type="submit"></i>
                        </span>
                    </div>
                </form>
            </div>
        </div>
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
                    <h6 class="card-subtitle my-3 text-muted">Coordinate : <a href="https://www.google.com/search?q={{ $iklans-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $iklans-> maps_coord }}</a></h6>
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <a class="btn btn-default btn-sm w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $iklans->id_iklan }}">Choose</a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('user/negotiation/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Iklan {{$iklans->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-3">
                                <input type="hidden" class="form-control" id="status_negotiation" name="status_negotiation" placeholder="Advertisement Status" value="Tahap Negosiasi" readonly>
                                <input type="hidden" class="form-control" id="id_iklan" name="id_iklan" placeholder="id_iklan" value="{{$iklans->id_iklan}}" readonly>
                                <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user" value="{{ Auth::guard('web')->user()->id_user }}" readonly>
                                <div class="row mb-3">
                                    <div class="text-muted">Preview Foto Iklan</div>
                                </div>
                                <div class="d-flex justify-content-center align-self-center mb-3" style="height:14rem;">
                                    <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" class="img-fluid rounded" alt="">
                                </div>
                                <div class="row mb-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name" value="{{ $iklans->name }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="zone" class="form-label">Zone</label>
                                    <input type="text" class="form-control" id="zone" name="zone" placeholder="Advertisement Zone" value="{{ $iklans->zone }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Advertisement Location" value="{{ $iklans->location }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="maps_coord" class="form-label">Maps Coordinate</label>
                                    <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Advertisement Coordinate" value="{{ $iklans->maps_coord }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="type" class="form-label">Type Permanent/Non-Permanent</label>
                                    <select class="main form-select" id="type" name="type">
                                        <option value="" disabled selected>Advertisement Type</option>
                                        <option value="Permanent">Permanent</option>
                                        <option value="Non-Permanent">Non-Permanent</option>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label for="advert_type" class="form-label">Advertisement Type</label>
                                    <select class="sub form-select" id="advert_type" name="advert_type">
                                        <option value="" disabled selected>Advertisement</option>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label for="month" class="form-label">Month</label>
                                    <input type="number" class="sub2 form-control year" id="month" name="month" placeholder="Advertisement Month">
                                </div>
                                <div class="row mb-2">
                                    <label class="form-label" for="side">Sides</label>
                                    <select class="form-select side" id="sides" name="sides">
                                        <option value="" disabled selected>How many sides</option>
                                        <option value="1">One Sided</option>
                                        <option value="2">Two Sided (Front and Rear)</option>
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
    <script type="text/javascript">
        $('.main').change(function() {
            var options = '';
            if ($(this).val() == 'Permanent') {
                options = '<option value="Baliho">Baliho</option><option value="Iklan Bando">Iklan Bando</option><option value="Banner">Banner</option><option value="Billboard">Billboard</option><option value="Iklan Tugu">Iklan Tugu</option><option value="Neon Box">Neon Box</option><option value="Logo">Logo</option>';
            } else if ($(this).val() == 'Non-Permanent') {
                options = '<option value="Baliho">Baliho</option><option value="Spanduk">Spanduk</option><option value="Banner">Banner</option><option value="Umbul-umbul">Umbul-umbul</option><option value="Balon Udara">Balon Udara</option><option value="Iklan Edaran">Iklan Edaran</option><option value="Logo">Logo</option><option value="Iklan Penunjuk Arah">Iklan Penunjuk Arah</option><option value="Shooting/Foto">Shooting/Foto</option>';
            }
            $('.sub').html(options);
        });
        $('.main').change(function() {
            var inputs = '';
            if ($(this).val() == 'Permanent') {
                $("#month").attr({
                    "min": 12
                });
            } else if ($(this).val() == 'Non-Permanent') {
                $("#month").attr({
                    "max": 12,
                    "min": 1
                });
            }
            $('.sub2').html(inputs);
        });
    </script>
</div>
@endsection