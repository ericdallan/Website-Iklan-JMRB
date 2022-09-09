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
                                        <input type="hidden" class="form-control" id="id_negotiation" value="{{$negotiation_onboards->id_negotiation}}" name="id_negotiation">
                                        <input type="hidden" id="time" name="time" value="{{Carbon\Carbon::now()->format('Y/m/d H:i:s')}}">
                                        @if($negotiation_onboards->rate_negotiation == '' && $negotiation_onboards->status_negotiation == 'Tahap Negosiasi')
                                        <div class="mb-3">
                                            <label class="form-label" for="status_negotiation">Status Negosiasi</label>
                                            <select class="form-select" id="status_negotiation" id="status_negotiation" name="status_negotiation">
                                                <option value="Tahap Negosiasi" {{($negotiations->status_negotiation == 'Tahap Negosiasi') ? "selected":'' }} disabled>Tahap Negosiasi</option>
                                                <option value="Pengajuan Negosiasi User" {{($negotiations->status_negotiation == 'Pengajuan Negosiasi User') ? "selected":'' }}>Pengajuan Negosiasi User</option>
                                                <option value="Pengajuan Negosiasi Admin" {{($negotiations->status_negotiation == 'Pengajuan Negosiasi Admin') ? "selected":'' }} disabled>Pengajuan Negosiasi Admin</option>
                                                <option value="Negosiasi Diterima" {{($negotiations->status_negotiation == 'Negosiasi Diterima') ? "selected":'' }} disabled>Terima Pengajuan Negosiasi</option>
                                                <option value="Negosiasi Ditolak" {{($negotiations->status_negotiation == 'Negosiasi Ditolak') ? "selected":'' }} disabled>Tolak Pengajuan Negosiasi</option>
                                            </select>
                                        </div>
                                        @elseif($negotiation_onboards->rate_negotiation != '' && $negotiation_onboards->status_negotiation != 'Tahap Negosiasi')
                                        <div class="mb-3">
                                            <label class="form-label" for="status_negotiation">Status Negosiasi</label>
                                            <select class="form-select" id="status_negotiation" id="status_negotiation" name="status_negotiation">
                                                <option value="Tahap Negosiasi" {{($negotiations->status_negotiation == 'Tahap Negosiasi') ? "selected":'' }} disabled>Tahap Negosiasi</option>
                                                <option value="Pengajuan Negosiasi User" {{($negotiations->status_negotiation == 'Pengajuan Negosiasi User') ? "selected":'' }}>Pengajuan Negosiasi User</option>
                                                <option value="Pengajuan Negosiasi Admin" {{($negotiations->status_negotiation == 'Pengajuan Negosiasi Admin') ? "selected":'' }} disabled>Pengajuan Negosiasi Admin</option>
                                                <option value="Negosiasi Diterima" {{($negotiations->status_negotiation == 'Negosiasi Diterima') ? "selected":'' }}>Terima Pengajuan Negosiasi</option>
                                                <option value="Negosiasi Ditolak" {{($negotiations->status_negotiation == 'Negosiasi Ditolak') ? "selected":'' }}>Tolak Pengajuan Negosiasi</option>
                                            </select>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->rate_negotiation == '' && $negotiation_onboards->status_negotiation == 'Tahap Negosiasi')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation">
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->rate_negotiation != '' && $negotiation_onboards->status_negotiation == 'Pengajuan Negosiasi User')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi <i class="" style="color:#636363;">(Menunggu Balasan Negosiasi Admin)</i></label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$negotiation_onboards->rate_negotiation}}" readonly>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->rate_negotiation != '' && $negotiation_onboards->status_negotiation == 'Pengajuan Negosiasi Admin')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$negotiation_onboards->rate_negotiation}}">
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->rate_negotiation != '' && $negotiation_onboards->status_negotiation == 'Negosiasi Diterima')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$negotiation_onboards->rate_negotiation}}">
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->rate_negotiation != '' && $negotiation_onboards->status_negotiation == 'Tahap Negosiasi Perbaruan')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$negotiation_onboards->rate_negotiation}}">
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->status_negotiation == 'Tahap Pembayaran')
                                        <div class="mb-3">
                                            <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                            <input type="number" class="form-control" id="rate_negotiation" name="rate_negotiation" value="{{$negotiation_onboards->rate_negotiation}}">
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
                                        @if($negotiation_onboards->type == 'Permanent' && $negotiation_onboards->status_negotiation == 'Tahap Negosiasi' && $negotiation_onboards->dokumen_teknis == '')
                                        <div class="mb-3">
                                            <div class="mt-2">
                                                <label class="form-label">Dokumen Teknis</label>
                                                <input type="file" name="dokumen_teknis" id="dokumen_teknis">
                                            </div>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->type == 'Non-Permanent')
                                        @endif
                                        @if($negotiation_onboards->status_negotiation == 'Negosiasi Diterima' or $negotiation_onboards->status_negotiation == 'Negosiasi Ditolak')
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
                                        @if($negotiation_onboards->status_negotiation == 'Pengajuan Negosiasi User')
                                        <div class="mb-3">
                                            <div class="row align-item-center">
                                                <button type="submit" class="btn btn-default btn-md rounded-3" disabled>Submit</button>
                                            </div>
                                        </div>
                                        @endif
                                        @if($negotiation_onboards->status_negotiation == 'Tahap Negosiasi Perbaruan')
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