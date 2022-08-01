@extends('layouts/app')
@section('content')
<style>
    .tata-nilai {
        font-size: 1rem;
        font-weight: bold;
    }

    @media only screen and (max-device-width: 900px),
    screen and (min-width: 200px) {
        .tata-nilai {
            font-size: 0.8rem;
            font-weight: bold;
        }
    }

    .reveal {
        position: relative;
        transform: translateY(150px);
        opacity: 0;
        transition: 1s all ease;
    }

    .reveal.active {
        transform: translateY(0);
        opacity: 1;
    }

    .active.fade-left {
        animation: fade-left 1s ease-in;
    }

    .active.fade-right {
        animation: fade-right 1s ease-in;
    }

    @keyframes fade-left {
        0% {
            transform: translateX(-100px);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fade-right {
        0% {
            transform: translateX(100px);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>
<!-- background image -->
<div class="bg-image mb-4 reveal" style=" background-image: linear-gradient(rgba(0,0,0,0.42), rgba(0,0,0,0.52));background-image: url('https://www.jmrb.co.id/wp-content/uploads/2021/08/screenshot-1024x768.jpg'); height: 39rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;"">
    <div class=" mask" style="background-color: rgba(0, 0, 0, 0.6); height:39rem;">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white text-center">
            <h2 class="mb-3" style="text-shadow :0 0 0.7rem #FECD0A;">Profil Perusahaan</h2>
        </div>
    </div>
</div>
</div>
<!-- body image -->
<div class="reveal">
    <div class="text-center mb-4">
        <h3 class="my-4 fw-bold">Tentang PT Jasamarga Related Business (JMRB)</h3>
        <p>PT Jasamarga Properti berdiri pada 15 Januari 2013, sebagai anak perusahaan PT Jasa Marga (Persero) Tbk. yang bergerak di bidang properti. Dalam rangka mendukung perkembangan bisnis Jasa Marga Group, pada 28 Mei 2019 PT Jasamarga Properti bertransformasi menjadi PT Jasamarga Related Business (JMRB) dan mulai melakukan pengembangan bisnis di sekitar koridor ruas jalan tol milik Jasa Marga Group. Adapun lini bisnis PT Jasamarga Related Business antara lain pengembangan kawasan di sekitar jalan tol atau Toll Corridor Development (TCD), pengembangan dan pengelolaan rest area dengan brand “Travoy”, pemanfaatan koridor jalan tol untuk iklan dan utilitas baik secara konvensional maupun digital, serta bisnis digital.</p>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <img src="{{url('Web/Roadmap.jpg')}}" class="img-fluid" alt="">
    </div>
</div>
<!-- body image -->

<!-- visi dan misi -->
<div class="container-fluid mt-5 mb-5 fw-bold">
    <div class="row">
        <div class="col pb-5 reveal" style="background-color:#0C1531">
            <h3 class="text-center mx-auto rounded-3 mt-5 mb-5 fw-bold reveal fade-left" style="background-color:#FECE3D;width:9.5rem; color:#0C1531">Visi</h3>
            <div class="row reveal fade-right" style="color:#FFFFFF;">
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Menjadi perusahaan terpercaya dalam memberikan nilai tambah di bidang kawasan di jalan tol dan bisnis terkait lainnya.</p>
            </div>
        </div>
        <div class="col pb-5 reveal" style="background-color:#FECE3D">
            <h3 class="text-center mx-auto rounded-3 mt-5 mb-5 fw-bold reveal fade-right" style="background-color:#0C1531;width:9.5rem; color:#FECE3D">Misi</h3>
            <div class="row reveal fade-left" style="color:#0C1531">
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
    <div class="row mb-4 reveal">
        <h2 class="fw-bold text-center" style="text-decoration: underline; text-decoration-color:#FECE3D;">Tata Nilai Akhlak</h2>
    </div>
    <div class="row mb-2 reveal">
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Amanah</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom reveal fade-left" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Memegang teguh kepercayaan yang telah diberikan.</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Misi</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom reveal fade-right" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Terus belajar dan mengembangkan kapabilitas.</p>
            </div>
        </div>
    </div>
    <div class="row mb-2 reveal">
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Harmonis</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom reveal fade-left" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Saling peduli dan menghargai perbedaan.</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Loyal</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom reveal fade-right" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Berdedikasi dan mengutamakan kepentingan Bangsa dan Negara.</p>
            </div>
        </div>
    </div>
    <div class="row mb-2 reveal">
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Adaptif</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom reveal fade-left" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Terus berinovasi dan antusias dalam menggerakkan ataupun menghadapi perubahan.</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Kolaboratif</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom reveal fade-right" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Membangun kerja sama yang sinergis.</p>
            </div>
        </div>
    </div>
</div>
<!-- tata nilai akhlak -->
@endsection