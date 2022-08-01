@extends('layouts.app')
@section('content')
<!-- background image -->
<div class="bg-image mb-4 reveal" style=" background-image: url('https://www.jmrb.co.id/wp-content/uploads/2021/09/5_2021-Jelang-IPO-PT-JMRB-Gencarkan-Pengembangan-Koridor-Jalan-Tol-1024x576.png'); height:39rem;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); height:39rem;">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
                <h2 class="mb-3" style="text-shadow :0 0 0.7rem #FECD0A;">IKLAN & UTILITAS</h2>
                <h5 class="mb-3">Sejak 2019, PT JMRB menambah lini bisnisnya ke sektor pengelolaan media periklanan dan utilitas di ruas-ruas jalan tol dan rest area milik Jasa Marga Group</h5>
            </div>
        </div>
    </div>
</div>
<!-- background image -->

<!-- body image -->
<div class="d-flex justify-content-center align-items-center reveal">
    <img src="{{url('Web/Jenis-Iklan&Utilitas.png')}}" class="img-fluid" alt="">
</div>
<!-- body image -->
@endsection