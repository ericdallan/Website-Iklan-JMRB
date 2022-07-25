@extends('layouts/app')
@section('content')
<!-- background image -->
<div class="text-center bg-image" style=" background-image:{{url('Web/Kantor.png')}}; height: 400px;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
        <h2 class="mb-3">Profil Perusahaan</h2>
        </div>
    </div>
    </div>
</div>
<!-- background image -->

<!-- body image -->
<img src="{{url('Web/Roadmap.jpg')}}" class="img-fluid" alt="">
<!-- body image -->

<!-- visi dan misi -->
<div class="container-fluid mt-5 mb-5 fw-bold">
    <div class="row">
        <div class="col pb-5" style="background-color:#0C1531">
            <h3 class="text-center mx-auto rounded-3 mt-5 mb-5 fw-bold" style="background-color:#FECE3D;width: 150px; color:#0C1531">Visi</h3>
            <div class="row" style="color:#FFFFFF;">
                <!-- <div class="col-auto">
                    <i class="bi bi-square-fill" style="color:#FFFFFF;"></i>
                </div>
                <div class="col">
                    <p style="color:#FFFFFF;">Menjadi perusahaan terpercaya dalam memberikan nilai tambah di bidang kawasan di jalan tol dan bisnis terkait lainnya.</p>
                </div> -->
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Menjadi perusahaan terpercaya dalam memberikan nilai tambah di bidang kawasan di jalan tol dan bisnis terkait lainnya.</p> 
            </div>
        </div>
        <div class="col pb-5" style="background-color:#FECE3D">
            <h3 class="text-center mx-auto rounded-3 mt-5 mb-5 fw-bold" style="background-color:#0C1531;width: 150px; color:#FECE3D">Misi</h3>
            <div class="row" style="color:#0C1531">
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Mewujudkan peran shared services yang optimal bagi Jasa Marga Group.</p> 
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Meningkatkan nilai bagi pemegang saham</p> 
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Menjalankan kerja sama yang saling menguntungkan dengan mitra</p>
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Menyediakan produk dan jasa yang bermutu dan ramah lingkungan</p>
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Menyediakan lingkungan kerja yang terbaik bagi karyawan</p> 
            </div>
        </div>
    </div>
</div>
<!-- visi dan misi -->

<!-- tata nilai akhlah -->
<div class="container text-center">
    <h2 class="fw-bold" style="text-decoration: underline; text-decoration-color:#FECE3D;">Tata Nilai Akhlak</h2>
    <div class="row">
        <div class="col" style="background-color:#0C1531">
        </div>
        <div class="col" style="background-color:#0C1531">
        </div>
    </div>
</div>
<!-- tata nilai akhlak -->
@endsection