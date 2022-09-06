@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-History Negosiasi')
@section('subtitle', 'History Negosiasi')
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
<div class="container my-4">
    <div class="row justify-content-center">
        @php
        if (!$history->isEmpty()){
        @endphp
        @foreach($history as $historys)
        <div class="card mx-4 mb-4" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title fw-bold">{{ $historys-> name }}</h3>
                <p>{{ $historys-> id_negotiation }}</p>
                <hr>
                <h6 class="card-subtitle my-3 text-muted">Zona : {{ $historys-> zone }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Lokasi : KM {{ $historys-> location }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Tipe : {{ $historys-> type }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Tipe Iklan : {{ $historys-> advert_type }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Koordinat Maps : <a href="https://www.google.com/search?q={{ $historys-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $historys-> maps_coord }}</a></h6>
                <h6 class="card-subtitle my-3 text-muted">Status Negosiasi : {{ $historys-> status_negotiation }}</h6>
            </div>
            <div class="card-footer">
                <div class="row align-items-center">
                    <div class="text-center">
                        <h6 class="card-subtitle my-3 text-muted">User : {{ $historys-> username }}</h6>
                    </div>
                    <div class="text-center">
                        <hr style="width:100%;">
                        <a class="btn btn-default btn-md w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $historys->id_negotiation }}">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $historys->id_negotiation }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Histori Negosiasi {{ $historys->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
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
@endsection