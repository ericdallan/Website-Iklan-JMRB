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
                            <th scope="col">Status Pembayaran</th>
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
                                <td>{{$pembayarans->rate_negotiation}}</td>
                                <td>{{$pembayarans->status_pembayaran}}</td>
                            </tr>
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