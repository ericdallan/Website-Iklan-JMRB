@extends('layouts/app')
@section('content')
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
        <div class="row mb-2">
            @if (!$iklan->isEmpty())
            <div class="table-responsive-lg rounded-3" style="background-color:#FFFFFF;">
                <table class="table table-hover table-bordered table-sm my-5">
                    <h4 class="text-center">Table Survey {{Auth::guard('web')->user()->username}}</h4>
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