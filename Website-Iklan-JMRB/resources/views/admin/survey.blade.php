@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Iklan')
@section('subtitle', 'Advertisement')
<style>
    select[readonly] {
        pointer-events: none;
        background-color: #e9ecef;
    }

    input[type="text"],
    input[type="file"],
    input[type="number"] {
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
                                    <p>Tidak ada foto iklan</p>
                                    @endif
                                </td>
                                <td>{{$iklans->name}}</td>
                                <td>{{$iklans->zone}}</td>
                                <td>{{$iklans->location}}</td>
                                <td>{{$iklans->maps_coord}}</td>
                                <td>{{{strftime("%d %b %Y, %H:%M:%S",strtotime($iklans->survey_date))}}}</td>
                                <td>{{$iklans->status}}</td>
                                <td><a class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $iklans->id_iklan }}">Detail</a></td>
                            </tr>
                            <!-- Modal Detail-->
                            <div class="modal fade" id="exampleModal{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                <div class="d-flex justify-content-center align-self-center mb-3" style="height:14rem;">
                                                    @if(isset($iklans->pic_advert) && $iklans->pic_advert)
                                                    <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" alt="hugenerd" width="100" height="100">
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
                                                    <label class="form-label" for="status">Status</label>
                                                    <select class="form-select" id="status" id="status" name="status">
                                                        <option value="Tahap Survey" {{($iklans->status == 'Tahap Survey') ? "selected":'' }} disabled selected>Tahap Survey</option>
                                                        <option value="Ubah Jadwal" {{($iklans->status == 'Tahap Negosiasi') ? "selected":'' }}>Ubah Jadwal</option>
                                                        <option value="Survey Diterima" {{($iklans->status == 'Tahap Negosiasi') ? "selected":'' }}>Terima</option>
                                                        <option value="Survey Ditolak" {{($iklans->status == 'Close') ? "selected":'' }}>Tolak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-default btn-md rounded-3">Update</button>
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
    <script>
        var today = new Date().toISOString().slice(0, 16);

        document.getElementsByName("survey_date")[0].min = today;
    </script>
</div>
@endsection