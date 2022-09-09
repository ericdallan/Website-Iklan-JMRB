@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Overview')
@section('subtitle', 'Overview')
<div class="container">
    <div class="row my-2">
        <div class="col mb-2 d-flex justify-content-center">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Iklan</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ count($iklan) }}</p>
                </div>
            </div>
        </div>
        <div class="col mb-2 d-flex justify-content-center">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Pendapatan</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Rp. {{ number_format($pembayaran,0,',','.') }}</p>
                </div>
            </div>
        </div>
        <div class="col mb-2 d-flex justify-content-center">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Pengguna</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ count($user) }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr style="width:100%;">
    <div class="row my-2">
        <div class="col mb-2 d-flex justify-content-center">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Negosiasi</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ count($negosiasi) }}</p>
                </div>
            </div>
        </div>
        <div class="col mb-2 d-flex justify-content-center">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Forum</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ count($forum) }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr style="width:100%;">
    <div class="row my-4">
        <h2 style="text-align: center;">Zona Iklan Jasa Marga Cabang Purbaleunyi</h2>
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="pie-chart" height="280" width="600"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    $(function() {
        Highcharts.chart('pie-chart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Zona Iklan'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Zona',
                colorByPoint: true,
                data: <?= $data ?>
            }]
        });
    });
</script>

@endsection