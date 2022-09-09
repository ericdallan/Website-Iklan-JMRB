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
<div class="py-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container">
        <div class="row mb-2">
            @if (!$pembayaran->isEmpty())
            <div class="table-responsive-lg rounded-3" style="background-color:#FFFFFF;">
                <table class="table table-hover table-bordered table-sm">
                    <h4 class="text-center my-3">Table Pembayaran {{Auth::guard('web')->user()->username}}</h4>
                    <thead>
                        <tr class="align-middle text-center">
                            <th scope="col">No</th>
                            <th scope="col">Tipe Iklan</th>
                            <th scope="col">Jenis Iklan</th>
                            <th scope="col">Zone</th>
                            <th scope="col">Location</th>
                            <th scope="col">Negosiasi Harga</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">
                        <?php
                        $num = 0;
                        foreach ($pembayaran as $pembayarans) {
                            $num++;
                        ?>
                            <tr>
                                <td><?= $num ?></td>
                                <td>{{$pembayarans->type}}</td>
                                <td>{{$pembayarans->advert_type}}</td>
                                <td>{{$pembayarans->zone}}</td>
                                <td>{{$pembayarans->location}}</td>
                                <td>Rp. {{ number_format($pembayarans->rate_negotiation,0,',','.') }}</td>
                                <td>@if(isset($pembayarans->time) && $pembayarans->time)
                                    {{{strftime("%d %b %Y, %H:%M:%S",strtotime($pembayarans->time))}}}
                                    @else
                                    Menunggu Pembayaran
                                    @endif
                                </td>
                                <td>{{$pembayarans->status_pembayaran}}</td>
                                <td><a class="btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pembayarans->id_pembayaran }}">Detail</td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $pembayarans->id_pembayaran }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="row mb-2">
                                                <label for="name" class="form-label">Nama Iklan</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $pembayarans->name }}" disabled="disabled" readonly>
                                            </div>
                                            <div class="row mb-2">
                                                <label for="zone" class="form-label">Zona</label>
                                                <input type="text" class="form-control" id="zone" name="zone" value="{{ $pembayarans->zone }}" disabled="disabled" readonly>
                                            </div>
                                            <div class="row mb-2">
                                                <label for="location" class="form-label">Lokcasi</label>
                                                <input type="text" class="form-control" id="location" name="location" value="{{ $pembayarans->location }}" disabled="disabled" readonly>
                                            </div>
                                            <div class="row mb-2">
                                                <label for="maps_coord" class="form-label">Koordinat Maps</label>
                                                <input type="text" class="form-control" id="maps_coord" name="maps_coord" value="{{ $pembayarans->maps_coord }}" disabled="disabled" readonly>
                                            </div>
                                            <div class="row mb-2">
                                                <label for="type" class="form-label">Tipe Iklan</label>
                                                <input type="text" class="form-control" id="type" name="type" value="{{ $pembayarans->type }}" disabled="disabled" readonly>
                                            </div>
                                            <div class="row mb-2">
                                                <label for="advert_type" class="form-label">Jenis Iklan</label>
                                                <input type="text" class="form-control" id="advert_type" name="advert_type" value="{{ $pembayarans->advert_type }}" disabled="disabled" readonly>
                                            </div>
                                            <div class="row mb-2">
                                                <label for="rate_negotiation" class="form-label">Harga Negosiasi</label>
                                                <input type="text" class="form-control" id="rate_negotiation" name="rate_negotiation" value="Rp. {{ number_format($pembayarans->rate_negotiation,0,',','.') }}" disabled="disabled" readonly>
                                            </div>
                                            <div class="row mb-2">
                                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                                <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran" value="{{ $pembayarans->status_pembayaran }}" disabled="disabled" readonly>
                                            </div>
                                        </div>
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