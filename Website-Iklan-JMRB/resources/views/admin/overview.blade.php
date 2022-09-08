@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Overview')
@section('subtitle', 'Overview')
<div class="container">
    <div class="row justify-content-center my-2">
        <div class="col mb-2">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Iklan</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ count($iklan) }}</p>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Pendapatan</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Rp. {{ number_format($pembayaran,0,',','.') }}</p>
                </div>
            </div>
        </div>
        <div class="col mb-2">
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
    <div class="row justify-content-center my-2">
        <div class="col-4 mb-2">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">Total Negosiasi</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ count($negosiasi) }}</p>
                </div>
            </div>
        </div>
        <div class="col-4 mb-2">
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
</div>
@endsection