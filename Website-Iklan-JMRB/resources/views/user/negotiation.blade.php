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

    #status_negotiation {
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
                            <h6 class="card-subtitle my-3 text-muted">Coordinate : <a href="https://www.google.com/search?q={{ $negotiations-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $negotiations-> maps_coord }}</a></h6>
                            <h6 class="card-subtitle my-3 text-muted">Status : {{ $negotiations-> status_negotiation }}</h6>
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
                                <form action="{{route('user/negotiation/update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mx-4">
                                        <input type="hidden" class="form-control" id="id_user" value="{{$negotiation_onboards->id_user}}" name="id_user">
                                        <input type="hidden" class="form-control" id="id_iklan" value="{{$negotiation_onboards->id_iklan}}" name="id_iklan">
                                        <input type="hidden" class="form-control" id="id_iklan" value="{{$negotiation_onboards->id_negotiation}}" name="id_negotiation">
                                        <div class="mb-3">
                                            <label for="status_negotiation" class="form-label">Status Negosiasi</label>
                                            <input type="text" class="form-control" id="status_negotiation" value="{{$negotiation_onboards->status_negotiation}}" name="status_negotiation" readonly>
                                        </div>
                                        @if($negotiation_onboards->rate_negotiation != '' && $negotiation_onboards->status_negotiation == 'Pengajuan Negosiasi User')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$negotiation_onboards->rate_negotiation}}" readonly>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->rate_negotiation != '' && $negotiation_onboards->status_negotiation == 'Pengajuan Negosiasi Admin')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$negotiation_onboards->rate_negotiation}}">
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->rate_negotiation == '')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation">
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->type == 'Permanent' && $negotiation_onboards->dokumen_teknis == '')
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Dokumen Teknis</label>
                                            <input type="file" class="form-control" id="dokumen_teknis" name="dokumen_teknis">
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->type == 'Permanent' && $negotiation_onboards->dokumen_teknis != '')
                                        <div class="mb-3">
                                            <div class="mt-2">
                                                <label class="form-label"><strong>Dokumen Teknis</strong> <i class="" style="color:#636363;">file ter-upload : {{$negotiation_onboards->dokumen_teknis}}</i></label>
                                                <embed src="/Dokumen/Dokumen_Teknis/{{$negotiation_onboards->dokumen_teknis}}" style="width:100%;height:250px;" type="application/pdf">
                                            </div>
                                            <div class="mt-2">
                                                <label for="dokumen_teknis" class="form-label">Ganti File</label>
                                                <input onbeforeeditfocus="return false;" type="file" name="dokumen_teknis" id="dokumen_teknis">
                                            </div>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->status_negotiation == 'Pengajuan Negosiasi User')
                                        <div class="mb-3">
                                            <div class="row align-item-center">
                                                <button type="submit" class="btn btn-default btn-md rounded-3" disabled>Submit</button>
                                            </div>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->status_negotiation == 'Tahap Negosiasi')
                                        <div class="mb-3">
                                            <div class="row align-item-center">
                                                <button type="submit" class="btn btn-default btn-md rounded-3">Submit</button>
                                            </div>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->status_negotiation == 'Pengajuan Negosiasi Admin')
                                        <div class="mb-3">
                                            <div class="row align-item-center">
                                                <button type="submit" class="btn btn-default btn-md rounded-3">Submit</button>
                                            </div>
                                        </div>
                                        @endif
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