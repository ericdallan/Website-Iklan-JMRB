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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 col-md-4">
            <div class="row">
                @if(!$history->isEmpty())
                @foreach($history as $historys)
                <div class="card mb-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $historys-> name }}</h5>
                        <hr>
                        <h6 class="card-subtitle my-3 text-muted">Zona : {{ $historys-> zone }}</h6>
                        <h6 class="card-subtitle my-3 text-muted">Lokasi : KM {{ $historys-> location }}</h6>
                        <h6 class="card-subtitle my-3 text-muted">Status Negosiasi : {{ $historys-> status_negotiation }}</h6>
                        <h6 class="card-subtitle my-3 text-muted">User : {{ $historys-> username }}</h6>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="text-center">
                                <a class="btn btn-default btn-md w-50 rounded-3" href="{{ route('admin/negotiation/history/detail', ['id'=>$historys->id_negotiation]) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class='text-center'>Tidak ada histori negosiasi.</p>
                @endif
            </div>
        </div>
        <div class="col-md-8 ">
            <div class="row">
                <div class="container rounded-3">
                    @if(Route::is('admin/negotiation/history'))
                    <h5 class="card-title mb-4 text-center">Pilih detail history yang ingin dilihat</h5>
                    @endif
                    @if (!$history->isEmpty())
                    @if(Route::is('admin/negotiation/history/detail', ['id'=>$historys->id_negotiation]))
                    @foreach($history_onboard as $history_onboards)
                    <div class="container">
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
                                    <tbody class="align-middle text-center">
                                        <?php
                                        $num = 0;
                                        foreach ($history_list as $history_lists) {
                                            $num++;
                                        ?>
                                            <tr>
                                                <td><?= $num ?></td>
                                                <td>Rp. {{ number_format($history_lists->HistoryRate_negotiation,0,',','.')}}</td>
                                                <td>{{$history_lists->HistoryStatus_negotiation}}</td>
                                                <td>{{strftime("%d %b %Y, %H:%M:%S",strtotime($history_lists->time)) }}</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
@endsection