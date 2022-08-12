@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Iklan')
@section('subtitle', 'Advertisement')
<style>
    .form-label {
        color: #0A142F;
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
        background-color: #D9D9D9;
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
<div class="container">
    <div class="my-4">
        <button type="button" class="btn btn-default btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create New Advertisement</button>
    </div>
    <div class="row">
        @php
        if (!$iklan->isEmpty()){
        @endphp
        @foreach($iklan as $iklans)
        <div class="card mx-3 my-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $iklans-> name }}</h5>
                <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> zone }}</h6>
                <h6 class="card-subtitle my-2 text-muted">{{ $iklans-> location }}</h6>
                <p class="card-text">Total Applicant</p>
                <div class="text-end">
                    <a class="btn btn-default btn-sm rounded-3" href="#" role="button">Detail</a>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{ route('dashboard/iklan/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-5">
                        <div class="row mb-2">
                            <label for="pic_advert" class="form-label">Upload Image</label>
                            <input type="file" id="pic_advert" class="form-control" name="pic_advert">
                        </div>
                        <div class="row mb-2">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name">
                        </div>
                        <div class="row mb-2">
                            <label for="zone" class="form-label">Zona</label>
                            <input type="text" class="form-control" id="zone" name="zone" placeholder="Advertisement Zone">
                        </div>
                        <div class="row mb-2">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Advertisement Location">
                        </div>
                        <div class="row mb-2">
                            <label for="rate" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="rate" name="rate" placeholder="Advertisement Rate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default btn-sm rounded-3">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection