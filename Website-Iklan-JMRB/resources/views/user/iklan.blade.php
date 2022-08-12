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
<div class="py-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container">
        <div class="row">
            @php
            if (!$iklan->isEmpty()){
            @endphp
            @foreach($iklan as $iklans)
            <div class="card mx-auto my-4" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $iklans-> name }}</h5>
                    <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> zone }}</h6>
                    <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> location }}</h6>
                    <p class="card-text">Harga : <b>{{ $iklans-> rate }}</b></p>
                </div>
                <div class="card-footer">
                    <div class="text-start">
                        <p class="card-text text-muted">Total Applicant : </p>
                    </div>
                    <hr>
                    <div class="text-end">
                        <a class="btn btn-default btn-sm w-50 rounded-3" href="#" role="button">Detail</a>
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

</div>
@endsection