@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Survey')
@section('subtitle', 'Survey')
<style>
    select[readonly] {
        pointer-events: none;
        background-color: #e9ecef;
    }

    #name,
    #zone,
    #location,
    #maps_coord {
        background-color: #D9D9D9;
    }

    .btn-default {
        background-color: #0C1531;
        font-weight: bold;
        color: #FFFFFF;
    }

    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active {
        background-color: #0C1531;
        font-weight: bold;
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
        </div>
    </div>
    <div class="row">
        <div class="row mb-2">
            @if (!$iklan->isEmpty())
            <div class="table-responsive-lg" style="background-color:#FFFFFF;">
                <table class="table table-hover table-bordered table-sm">
                    <thead>
                        <tr class="align-middle text-center">
                            <th scope="col">No</th>
                            <th scope="col">Foto Iklan</th>
                            <th scope="col">Nama Iklan</th>
                            <th scope="col">Zona</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Koordinat Maps</th>
                            <th scope="col">Tanggal Survey</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Upload</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">

                        <?php
                        $num = 0;
                        foreach ($iklan as $iklans) {
                            $num++;
                        ?>
                            <tr>
                                <td><?= $num ?></td>
                                <td>@if(isset($iklans->pic_advert) && $iklans->pic_advert)
                                    <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                    @else
                                    Tidak ada foto iklan
                                    @endif
                                </td>
                                <td>{{$iklans->name}}</td>
                                <td>{{$iklans->zone}}</td>
                                <td>{{$iklans->location}}</td>
                                <td>{{$iklans->maps_coord}}</td>
                                <td>
                                    @if(isset($iklans->survey_date) && $iklans->survey_date)
                                    {{{strftime("%d %b %Y, %H:%M:%S",strtotime($iklans->survey_date))}}}
                                    @else
                                    Tentukan Jadwal Survey
                                    @endif
                                </td>
                                <td>{{$iklans->status}}</td>
                                <td><a class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#Detail{{ $iklans->id_iklan }}">Detail</a></td>
                                <td><a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Upload{{ $iklans->id_iklan }}">BA Survey</a></td>
                            </tr>
                            <!-- Modal Detail-->
                            <div class="modal fade" id="Detail{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('dashboard/survey/update', ['id' => $iklans->id_iklan])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail {{$iklans->name}}</h5>
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
                                                    <label for="name" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Iklan" value="{{ $iklans->name }}" readonly>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="zone" class="form-label">Zona</label>
                                                    <input type="text" class="form-control" id="zone" name="zone" placeholder="Zona Iklan" value="{{ $iklans->zone }}" readonly>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="location" class="form-label">Lokasi</label>
                                                    <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi Iklan" value="{{ $iklans->location }}" readonly>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="maps_coord" class="form-label">Koordinat Maps</label>
                                                    <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Koordinat Iklan" value="{{ $iklans->maps_coord }}" readonly>
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="survey_date" class="form-label">Tanggal Survey</label>
                                                    <input type="datetime-local" class="form-control" step="any" id="survey_date" name="survey_date" value="{{ $iklans->survey_date }}">
                                                </div>
                                                <div class="row mb-2">
                                                    @if ($iklans->status == 'Tahap Negosiasi')
                                                    <label class="form-label" for="status">Status</label>
                                                    <select class="form-select" id="status" id="status" name="status" readonly>
                                                        <option value="Tahap Survey" {{($iklans->status == 'Tahap Survey') ? "selected":'' }} disabled selected>Tahap Survey</option>
                                                        <option value="Tahap Survey" {{($iklans->status == 'Tahap Survey') ? "selected":'' }} disabled selected>Tahap Negosiasi</option>
                                                        <option value="Pengajuan Jadwal" {{($iklans->status == 'Pengajuan Jadwal') ? "selected":'' }}>Ajukan Jadwal</option>
                                                        <option value="Survey Diterima" {{($iklans->status == 'Survey Diterima') ? "selected":'' }}>Terima</option>
                                                        <option value="Survey Ditolak" {{($iklans->status == 'Close') ? "selected":'' }}>Tolak</option>
                                                    </select>
                                                    @else
                                                    <label class="form-label" for="status">Status</label>
                                                    <select class="form-select" id="status" id="status" name="status">
                                                        <option value="Tahap Survey" {{($iklans->status == 'Tahap Survey') ? "selected":'' }} disabled selected>Tahap Survey</option>
                                                        <option value="Pengajuan Jadwal" {{($iklans->status == 'Pengajuan Jadwal') ? "selected":'' }}>Ajukan Jadwal</option>
                                                        <option value="Survey Diterima" {{($iklans->status == 'Survey Diterima') ? "selected":'' }}>Terima</option>
                                                        <option value="Survey Ditolak" {{($iklans->status == 'Survey Ditolak') ? "selected":'' }}>Tolak</option>
                                                    </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                @if ($iklans->status == 'Tahap Survey' or $iklans->status == 'Pengajuan Jadwal')
                                                <button type="submit" class="btn btn-default btn-md rounded-3">Update</button>
                                                @else
                                                <button type="submit" class="btn btn-default btn-md rounded-3" disabled>Update</button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal BA Survey-->
                            <div class="modal fade" id="Upload{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('dashboard/survey/upload', ['id' => $iklans->id_iklan])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail {{$iklans->name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-3">
                                                @if($iklans->ba_survey != '')
                                                <div class="row mb-2">
                                                    <div class="mt-2">
                                                        <label class="form-label"><strong>BA Survey</strong> <i class="" style="color:#636363;">file ter-upload : {{$iklans->ba_survey}}</i> </label>
                                                        <embed src="/Dokumen/BA_Survey/{{$iklans->ba_survey}}" style="width:100%;height:250px;" type="application/pdf">
                                                    </div>
                                                    <div class="mt-2">
                                                        <label for="uploadFile" class="form-label">Ganti File</label>
                                                        <input onbeforeeditfocus="return false;" type="file" name="ba_survey" id="uploadFile">
                                                    </div>
                                                </div>
                                                @endif
                                                @if($iklans->ba_survey == '')
                                                <div class="row mb-2">
                                                    <label for="ba_survey" class="form-label">Berita Acara Survey</label>
                                                    <input type="file" class="form-control" id="ba_survey" name="ba_survey" placeholder="Nama Survey">
                                                </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-default btn-md rounded-3">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            @else
            <p class='text-center'>Belum terdapat survey.</p>
            @endif
        </div>
    </div>
</div>
@endsection