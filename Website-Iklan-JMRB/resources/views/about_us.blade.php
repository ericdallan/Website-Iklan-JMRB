@extends('layouts/app')
@section('content')
<style>
    .tata-nilai {
        font-size: 1rem;
        font-weight: bold;
    }

    .dropdown-item:hover {
        cursor: pointer;
        background-color: rgba(255, 255, 255, 0.5);
    }

    @media only screen and (max-device-width: 900px),
    screen and (min-width: 200px) {
        .tata-nilai {
            font-size: 0.8rem;
            font-weight: bold;
        }
    }
</style>
<!-- background image -->
<div class="bg-image mb-4" style=" background-image: linear-gradient(rgba(0,0,0,0.42), rgba(0,0,0,0.52));background-image: url('https://www.jmrb.co.id/wp-content/uploads/2021/08/screenshot-1024x768.jpg'); height: 39rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); height:39rem;">
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
        <div class="col pb-5 reveal fade-left" style="background-color:#0C1531">
            <h3 class="text-center mx-auto rounded-3 mt-5 mb-5 fw-bold reveal fade-left" style="background-color:#FECE3D;width:9.5rem; color:#0C1531">Visi</h3>
            <div class="row reveal fade-left" style="color:#FFFFFF;">
                <p><i class="bi bi-square-fill" style="vertical-align: baseline"></i> Menjadi perusahaan terpercaya dalam memberikan nilai tambah di bidang kawasan di jalan tol dan bisnis terkait lainnya.</p>
            </div>
        </div>
        <div class="col pb-5 reveal fade-right" style="background-color:#FECE3D">
            <h3 class="text-center mx-auto rounded-3 mt-5 mb-5 fw-bold reveal fade-right" style="background-color:#0C1531;width:9.5rem; color:#FECE3D">Misi</h3>
            <div class="row reveal fade-right" style="color:#0C1531">
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
<!-- Jenis-Jenis Iklan -->
<div class="container">
    <div class="row mb-4 reveal">
        <h2 class="fw-bold text-center" style="text-decoration: underline; text-decoration-color:#FECE3D;">Jenis-Jenis Iklan</h2>
    </div>
    <div class="row mb-2 reveal">
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Permanen</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Iklan Permanen adalah iklan dengan masa tayang (pemasangan) minimal 12 (dua belas) bulan.</p>
                <hr>
                <div class="dropdown text-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#0C1531;color:#FECE3D">
                        Jenis Iklan
                    </button>
                    <ul class="dropdown-menu" style="background-color:#0C1531;">
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#BalihoPermanent">Baliho</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#IklanBando">Iklan Bando</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#BannerPermanent">Banner</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#Billboard">Billboard</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#IklanTugu">Iklan Tugu</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#NeonBox">Neon Box</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#Logo">Logo</button></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="text-center mx-auto rounded-3 fw-bold fs-3" style="background-color:#0C1531;width:75%;color:#FECE3D">Non-Permanen</div>
            <div class="text-start mx-auto px-5 py-3 mb-5 rounded-bottom" style="background-color:#FECE3D;width:65%;color:#0C1531">
                <p class="tata-nilai">Iklan Tidak Permanen adalah iklan dengan masa tayang (pemasangan) kurang dari 12 (dua belas) bulan.</p>
                <hr>
                <div class="dropdown text-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#0C1531;color:#FECE3D">
                        Jenis Iklan
                    </button>
                    <ul class="dropdown-menu" style="background-color:#0C1531;">
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#BalihoNonPermanent">Baliho Non-Permanen</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#Spanduk">Spanduk</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#BannerNonPermanent">Banner Non-Permanen</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#Umbul-umbul">Umbul-Umbul</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#BalonUdara">Balon Udara</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#IklanEdaran">Iklan Edaran</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#LogoNonPermanent">Logo Non-Permanen</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#IklanPenunjukArah">Iklan Penunjuk Arah</button></li>
                        <li><button class="dropdown-item tata-nilai" style="color:#FECE3D" type="button" data-bs-toggle="modal" data-bs-target="#ShootingFilm">Shooting/Film</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="permanent">
        <!-- Modal Baliho Permanent-->
        <div class="modal fade" id="BalihoPermanent" tabindex="-1" aria-labelledby="BalihoPermanent" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="BalihoPermanent">Baliho - Permanent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Baliho adalah pesan layanan (biasanya dengan gambar) dan iklan yang terbuat di atas papan kayu atau bahan lain, dipasang menggunakan tiang.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Iklan Bando-->
        <div class="modal fade" id="IklanBando" tabindex="-1" aria-labelledby="IklanBando" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="IklanBando">Iklan Bando - Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bando adalah jenis konstruksi lainnya yang melintang di atas jalan yang hanya diperbolehkan untuk iklan yang berada di luar ruang bebas.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Banner Permanent-->
        <div class="modal fade" id="BannerPermanent" tabindex="-1" aria-labelledby="BannerPermanent" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="BannerPermanent">Banner - Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Banner adalah pesan layanan dan iklan yang terbuat dari bahan kain dan/atau bahan lainnya yang dipasang secara horizontal (memanjang) Bangunan Pelengkap Jalan tol atau Sarana Pelengkap Jalan Tol
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Billboard-->
        <div class="modal fade" id="Billboard" tabindex="-1" aria-labelledby="Billboard" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Billboard">Billboard - Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Billboard adalah iklan yang melekat pada papan, terbuat dari bahan logam atau lainnya seperti plat aluminium, fiberglass atau plastik.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Iklan Tugu-->
        <div class="modal fade" id="IklanTugu" tabindex="-1" aria-labelledby="IklanTugu" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="IklanTugu">Iklan Tugu - Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Iklan tugu adalah iklan yang berbentuk tugu.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Neon Box-->
        <div class="modal fade" id="NeonBox" tabindex="-1" aria-labelledby="NeonBox" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="NeonBox">Neon Box - Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Neon Box adalah iklan yang terbuat dari bahan yang bersinar dapat berupa <i>neon sign (internal illumination bilboard</i> atau <i>energized legend billboard</i>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Logo-->
        <div class="modal fade" id="Logo" tabindex="-1" aria-labelledby="Logo" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Logo">Logo - Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="non-permanent">
        <!-- Modal Baliho Non-Permanent-->
        <div class="modal fade" id="BalihoNonPermanent" tabindex="-1" aria-labelledby="BalihoNonPermanent" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="BalihoNonPermanent">Baliho - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Baliho adalah pesan layanan (biasanya dengan gambar) dan iklan yang terbuat di atas papan kayu atau bahan lain, dipasang menggunakan tiang.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Spanduk-->
        <div class="modal fade" id="Spanduk" tabindex="-1" aria-labelledby="Spanduk" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Spanduk">Spanduk - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Spanduk adalah jenis iklan yang sama dengan banner namun memiliki ukuran yang lebih besar.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Banner Non-Permanent-->
        <div class="modal fade" id="BannerNonPermanent" tabindex="-1" aria-labelledby="BannerNonPermanent" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="BannerNonPermanent">Banner - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Banner adalah pesan layanan dan iklan yang terbuat dari bahan kain dan/atau bahan lainnya yang dipasang secara horizontal (memanjang) Bangunan Pelengkap Jalan tol atau Sarana Pelengkap Jalan Tol
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Umbul-Umbul -->
        <div class="modal fade" id="Umbul-umbul" tabindex="-1" aria-labelledby="Umbul-umbul" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Umbul-umbul">Umbul-Umbul - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Umbul-umbul adalah pesan layanan dan iklan yang terbuat dari bahan kain dan/atau bahkan lainnya yang dipasang secara vertikal dengan menggunakan tiang pada jarak-jarak tertentu.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Balon Udara -->
        <div class="modal fade" id="BalonUdara" tabindex="-1" aria-labelledby="BalonUdara" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="BalonUdara">Balon Udara - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Balon Udara adalah iklan berupa balon dengan ukuran yang cukup besar yang diikat dengan menggunakan alat pengikat serta melayang di udara yang umumnya digabung dengan pesan layanan dari kain yang tergantung di bawahnya.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Iklan Edaran -->
        <div class="modal fade" id="IklanEdaran" tabindex="-1" aria-labelledby="IklanEdaran" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="IklanEdaran">Iklan Edaran - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Iklan Edaran adalah pesan layanan dan iklan yang berbentuk lembaran lepas atau beberapa halaman dilipat tanpa dijilid, yang diselenggarakan dengan cara diberikan atau diminta.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Logo Non-Permanent -->
        <div class="modal fade" id="LogoNonPermanent" tabindex="-1" aria-labelledby="LogoNonPermanent" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="LogoNonPermanent">Logo - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Iklan Penunjuk Arah -->
        <div class="modal fade" id="IklanPenunjukArah" tabindex="-1" aria-labelledby="IklanPenunjukArah" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="IklanPenunjukArah">Iklan Penunjuk Arah - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Shooting/Film -->
        <div class="modal fade" id="ShootingFilm" tabindex="-1" aria-labelledby="ShootingFilm" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ShootingFilm">Shooting/Film - Non-Permanen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Shooting adalah kegiatan merekam video atau mengambil gambar di wilayah Jalan tol untuk kegiatan komersil.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jenis-Jenis Iklan -->
@endsection