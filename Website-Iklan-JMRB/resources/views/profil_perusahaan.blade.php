@extends('layouts/app')
@section('content')
<!-- background image -->
<div class="bg-image mb-4" style=" background-image: url('https://www.jmrb.co.id/wp-content/uploads/2021/08/screenshot-1024x768.jpg'); height: 100vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
                <h2 class="mb-3" style="text-shadow :0 0 10px #FECD0A;">Profil Perusahaan</h2>
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
<div class="container">
    <div class="row mb-2">
        <h2 class="fw-bold text-center mb-3" style="text-decoration: underline; text-decoration-color:#FECE3D;">Tata Nilai Akhlak</h2>
    </div>
    <div class="row">
        <div class="col">
            <div class="text-center mx-auto rounded-3 mt-2 fw-bold fs-3" style="background-color:#0C1531;width:450px;color:#FECE3D">Amanah</div>
            <div class="text-left mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:350px;color:#0C1531">
                <div>Memegang teguh kepercayaan yang telah diberikan.</div>
            </div>
        </div>
        <div class="col">
            <div class="text-center mx-auto rounded-3 mt-2 fw-bold fs-3" style="background-color:#0C1531;width:450px;color:#FECE3D">Misi</div>
            <div class="text-left mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:350px;color:#0C1531">
                <div>Terus belajar dan mengembangkan kapabilitas.</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="text-center mx-auto rounded-3 mt-2 fw-bold fs-3" style="background-color:#0C1531;width:450px;color:#FECE3D">Harmonis</div>
            <div class="text-left mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:350px;color:#0C1531">
                <div>Saling peduli dan menghargai perbedaan.</div>
            </div>
        </div>
        <div class="col">
            <div class="text-center mx-auto rounded-3 mt-2 fw-bold fs-3" style="background-color:#0C1531;width:450px;color:#FECE3D">Loyal</div>
            <div class="text-left mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:350px;color:#0C1531">
                <div>Berdedikasi dan mengutamakan kepentingan Bangsa dan Negara.</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="text-center mx-auto rounded-3 mt-2 fw-bold fs-3" style="background-color:#0C1531;width:450px;color:#FECE3D">Adaptif</div>
            <div class="text-left mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:350px;color:#0C1531">
                <div>Terus berinovasi dan antusias dalam menggerakkan ataupun menghadapi perubahan.</div>
            </div>
        </div>
        <div class="col">
            <div class="text-center mx-auto rounded-3 mt-2 fw-bold fs-3" style="background-color:#0C1531;width:450px;color:#FECE3D">Kolaboratif</div>
            <div class="text-left mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:350px;color:#0C1531">
                <div>Membangun kerja sama yang sinergis.</div>
            </div>
        </div>
    </div>
</div>
<!-- tata nilai akhlak -->
@endsection