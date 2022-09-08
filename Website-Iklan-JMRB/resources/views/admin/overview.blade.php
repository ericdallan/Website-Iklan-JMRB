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
    <div class="row my-2">
    </div>
</div>
@endsection