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
                    @if (!$history->isEmpty())
                    @foreach($history as $historys)
                    <div class="card mx-2 mb-4" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">{{ $historys-> name }}</h3>
                            <hr>
                            <h6 class="card-subtitle my-3 text-muted">Zona : {{ $historys-> zone }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Lokasi : KM {{ $historys-> location }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Tipe : {{ $historys-> type }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Tipe Iklan : {{ $historys-> advert_type }}</h6>
                            <h6 class="card-subtitle my-3 text-muted">Koordinat Maps : <a href="https://www.google.com/search?q={{ $historys-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $historys-> maps_coord }}</a></h6>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="text-center">
                                    <a class="btn btn-default btn-md rounded-3" href="{{ route('user/negotiation/history/detail', ['id'=>$historys->id_negotiation]) }}">Detail</a>
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
                            @if(Route::is('user/negotiation/history'))
                            <h5 class="card-title mb-4 text-center py-1">Pilih detail history yang ingin dilihat</h5>
                            @endif
                            @if (!$history->isEmpty())
                            @if(Route::is('user/negotiation/history/detail', ['id'=>$historys->id_negotiation]))
                            @foreach($history_onboard as $history_onboards)
                            <div class="container my-4 rounded-3">
                                <div class="text-center py-2">
                                    <h5>Histori Negosiasi {{ $history_onboards->name }}</h5>
                                    <hr style="width: 100%;">
                                    <div class="table-responsive-lg">
                                        <table class="table table-hover table-bordered table-sm">
                                            <thead>
                                                <tr class="align-middle text-center">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Negosiasi Harga</th>
                                                    <th scope="col">Status Negosiasi</th>
                                                    <th scope="col">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $num = 0;
                                                foreach ($history_list as $history_lists) {
                                                    $num++;
                                                ?>
                                                <tr>
                                                    <td><?= $num ?></td>
                                                    <td>{{$history_lists->HistoryRate_negotiation}}</td>
                                                    <td>{{$history_lists->HistoryStatus_negotiation}}</td>
                                                    <td>[{{strftime("%d %b %Y, %H:%M:%S",strtotime($history_lists->time)) }}</td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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