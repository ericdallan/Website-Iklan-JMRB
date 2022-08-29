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
<div class="py-3" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-4 mb-4">
                <div class="row justify-content-center">
                    @if (!$negotiation->isEmpty())
                    @foreach($negotiation as $negotiations)
                    <div class="card mx-2 mb-4" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">{{ $negotiations-> name }}</h3>
                            <hr>
                            <h6 class="card-subtitle my-3 text-muted">Zone : {{ $negotiations-> zone }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Location : KM {{ $negotiations-> location }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Type : {{ $negotiations-> type }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Advertisement Type : {{ $negotiations-> advert_type }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Month : {{ $negotiations-> month }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Coordinate : <a href="https://www.google.com/search?q={{ $negotiations-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $negotiations-> maps_coord }}</a></h6>
                            <h6 class="card-subtitle my-3 text-muted">Status : {{ $negotiations-> status }}</h6>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="text-center">
                                    <a class="btn btn-default btn-md rounded-3" href="{{ route('user/negotiation/detail', ['id'=>$negotiations->id_negotiation]) }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class='text-center'>Tidak ada negosiasi.</p>
                    @endif
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="row">
                    <div class="card-body">
                        <div class="container rounded-3" style="background-color:#FFFFFF;">
                            @if(Route::is('user/negotiation'))
                            <h5 class="card-title mb-4 text-center py-1">Pilih detail negosiasi yang ingin dilihat</h5>
                            @endif
                            @if (!$negotiation->isEmpty())
                            @if(Route::is('user/negotiation/detail', ['id'=>$negotiations->id_negotiation]))
                            @foreach($negotiation_onboard as $negotiation_onboards)
                            <div class="py-2">
                                <h5 class="card-title mb-4 text-center">{{ $negotiation_onboards->name }}</h5>
                                <hr style="width:100%;">
                                <h5 class="card-title mb-4 text-center">{{ $negotiation_onboards->advert_type }}</h5>
                                <form action="">
                                    <div class="mx-4">
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Dokumen Teknis</label>
                                            <input class="form-control" type="file" id="formFile">
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