@extends('layouts/app')
@section('content')
<style>
    select[readonly] {
        pointer-events: none;
        background-color: #D9D9D9;
    }

    .form-label {
        color: #0A142F;
        font-weight: bold;
    }

    #name,
    #status {
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
<div class="py-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row my-3">
            <div class="col-auto">
                <button type="button" class="btn btn-default btn-md rounded-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Buat Iklan</button>
            </div>
        </div>
        <div class="row justify-content-center">
            @if (!$iklan->isEmpty())
            @foreach($iklan as $iklans)
            <div class="card mx-4 my-4" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title text-start">{{ $iklans-> name }}</h5>
                    <hr>
                    <h6 class="card-subtitle my-3 text-muted">Zone : {{ $iklans-> zone }}</h6>
                    <h6 class="card-subtitle my-3 text-muted">Location : KM {{ $iklans-> location }}</h6>
                    <h6 class="card-subtitle my-3 text-muted">Coordinate : <a href="https://www.google.com/search?q={{ $iklans-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $iklans-> maps_coord }}</a></h6>
                    <h6 class="card-subtitle my-3 text-muted">Status : {{ $iklans-> status }}</h6>
                    @if($iklans->expired_date != '')
                    <h6 class="card-subtitle my-3 text-muted">Tenggat Iklan : {{strftime("%d %b %Y, %H:%M:%S",strtotime($iklans->expired_date)) }}</h6>
                    @else
                    @endif
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a class="btn btn-default btn-sm w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#Detail{{ $iklans->id_iklan }}">Detail</a>
                        </div>
                        <div class="col-6 text-end">
                            @if ($iklans->status == 'Tahap Survey' or $iklans->status == 'Tahap Negosiasi' or $iklans->status =='Survey Ditolak' or $iklans->status =='Pengajuan Jadwal' or $iklans->status =='Pembayaran Diterima' or $iklans->status == 'Tahap Negosiasi Perbaruan')
                            <button class="btn btn-default btn-sm w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#Choose{{ $iklans->id_iklan }}" disabled>Pilih</button>
                            @else
                            <a class="btn btn-default btn-sm w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#Choose{{ $iklans->id_iklan }}">Pilih</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Detail-->
            <div class="modal fade" id="Detail{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail {{$iklans->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-3">
                            <input type="hidden" class="form-control" id="status_negotiation" name="status_negotiation" placeholder="Advertisement Status" value="Tahap Negosiasi" readonly>
                            <input type="hidden" class="form-control" id="id_iklan" name="id_iklan" placeholder="id_iklan" value="{{$iklans->id_iklan}}" readonly>
                            <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user" value="{{ Auth::guard('web')->user()->id_user }}" readonly>
                            <div class="row mb-3">
                                <div class="text-muted">Preview Foto Iklan</div>
                            </div>
                            <div class="d-flex justify-content-center align-self-center mb-3">
                                @if(isset($iklans->pic_advert) && $iklans->pic_advert)
                                <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" alt="hugenerd" width="200" height="200">
                                @else
                                <p>Tidak ada foto iklan</p>
                                @endif
                            </div>
                            <div class="row mb-2">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Iklan" value="{{ $iklans->name }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="zone" class="form-label">Zona</label>
                                <input type="text" class="form-control" id="zone" name="zone" placeholder="Zona Iklan" value="{{ $iklans->zone }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi Iklan" value="{{ $iklans->location }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="maps_coord" class="form-label">Koordinat Maps</label>
                                <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Koordinat Iklan" value="{{ $iklans->maps_coord }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="survey_date" class="form-label">Tanggal Survey</label>
                                <input type="datetime-local" class="form-control" step="any" id="survey_date" name="survey_date" value="{{ $iklans->survey_date }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="expired_date" class="form-label">Tenggat Iklan</label>
                                <input type="datetime-local" class="form-control" step="any" id="expired_date" name="expired_date" value="{{ $iklans->expired_date }}" disabled="disabled" readonly>
                            </div>
                            <div class="row mb-2">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $iklans->status }}" disabled="disabled" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Pilih-->
            <div class="modal fade" id="Choose{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        @if($iklans->expired_date == '')
                        <form action="{{ route('user/negotiation/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail {{$iklans->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-3">
                                <input type="hidden" class="form-control" id="status_negotiation" name="status_negotiation" placeholder="Advertisement Status" value="Tahap Negosiasi" readonly>
                                <input type="hidden" class="form-control" id="id_iklan" name="id_iklan" placeholder="id_iklan" value="{{$iklans->id_iklan}}" readonly>
                                <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="id_user" value="{{ Auth::guard('web')->user()->id_user }}" readonly>
                                <div class="row mb-3">
                                    <div class="text-muted">Preview Foto Iklan</div>
                                </div>
                                <div class="d-flex justify-content-center align-self-center mb-3">
                                    @if(isset($iklans->pic_advert) && $iklans->pic_advert)
                                    <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" alt="hugenerd" width="200" height="200">
                                    @else
                                    <p>Tidak ada foto iklan</p>
                                    @endif
                                </div>
                                <div class="row mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Iklan" value="{{ $iklans->name }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="zone" class="form-label">Zona</label>
                                    <input type="text" class="form-control" id="zone" name="zone" placeholder="Zona Iklan" value="{{ $iklans->zone }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi Iklan" value="{{ $iklans->location }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="maps_coord" class="form-label">Koordinat Maps</label>
                                    <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Koordinat Iklan" value="{{ $iklans->maps_coord }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="type" class="form-label">Tipe Iklan Permanen/Non-Permanen</label>
                                    <select class="main form-select" id="type" name="type">
                                        <option value="" disabled selected>Tipe Iklan</option>
                                        <option value="Permanent">Permanen</option>
                                        <option value="Non-Permanent">Non-Permanen</option>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label for="advert_type" class="form-label">Jenis Iklan</label>
                                    <select class="sub form-select" id="advert_type" name="advert_type">
                                        <option value="" disabled selected>Advertisement</option>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label class="form-label" for="side">Sisi</label>
                                    <select class="form-select side" id="sides" name="sides">
                                        <option value="" disabled selected>Berapa Sisi</option>
                                        <option value="1">Satu Sisi</option>
                                        <option value="2">Dua Sisi (Depan dan Belakang)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-default btn-md rounded-3">Open Negotiation</button>
                            </div>
                        </form>
                        @elseif($iklans->expired_date != '')
                        <form action="{{ route('user/iklan/update/perbaruan') }}" method="POST" method="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail {{$iklans->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-3">
                                <input type="hidden" class="form-control" id="status_negotiation" name="status_negotiation" placeholder="Advertisement Status" value="Tahap Negosiasi Perbaruan" readonly>
                                <input type="hidden" id="id" name="id" value="{{ $iklans->id_iklan }}">
                                <div class="row mb-3">
                                    <div class="text-muted">Preview Foto Iklan</div>
                                </div>
                                <div class="d-flex justify-content-center align-self-center mb-3">
                                    @if(isset($iklans->pic_advert) && $iklans->pic_advert)
                                    <img src="/Dokumen/Iklan/{{$iklans->pic_advert}}" alt="hugenerd" width="200" height="200">
                                    @else
                                    <p>Tidak ada foto iklan</p>
                                    @endif
                                </div>
                                <div class="row mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Iklan" value="{{ $iklans->name }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="zone" class="form-label">Zona</label>
                                    <input type="text" class="form-control" id="zone" name="zone" placeholder="Zona Iklan" value="{{ $iklans->zone }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi Iklan" value="{{ $iklans->location }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label for="maps_coord" class="form-label">Koordinat Maps</label>
                                    <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Koordinat Iklan" value="{{ $iklans->maps_coord }}" disabled="disabled" readonly>
                                </div>
                                <div class="row mb-2">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="Tahap Pengajuan Pembaruan" {{($iklans->status == 'Tahap Pengajuan Pembaruan') ? "selected":'' }} disabled>Pengajuan Pembaruan</option>
                                        <option value="Tahap Negosiasi" {{($iklans->status == 'Tahap Negosiasi') ? "selected":'' }}>Perbarui Iklan</option>
                                        <option value="Iklan Tidak Diperpanjang" {{($iklans->status == 'Iklan Tidak Diperpanjang') ? "selected":'' }}>Tidak Perbarui Iklan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-default btn-md rounded-3">Update</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class='text-center'>Belum terdapat iklan.</p>
            @endif
        </div>
    </div>
    <!-- Modal New Advert-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{ route('user/iklan/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Advertisement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-5">
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ Auth::guard('web')->user()->id_user }}" readonly>
                        <div class="row mb-2">
                            <label for="pic_advert" class="form-label">Upload Foto Iklan<i class="fs-6 text-muted">(Opsional)</i></label>
                            <input type="file" id="pic_advert" class="form-control" name="pic_advert">
                        </div>
                        <div class="row mb-2">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name" value="Iklan {{ Auth::guard('web')->user()->company_name }}" readonly>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="zone">Zona</label>
                            <select class="main3 form-select" id="zone" id="zone" name="zone">
                                <option value="" disabled selected>Zona Iklan</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                        </div>
                        <div class="row mb-2">
                            <label for="location" class="form-label">Lokasi (KM) </label>
                            <select class="sub3 form-select" id="location" id="location" name="location">
                                <option value="" disabled selected>Lokasi Iklan</option>
                            </select>
                        </div>
                        <div class="row mb-2">
                            <label for="maps_coord" class="form-label">Koordinat Maps</label>
                            <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Koordinat Iklan">
                        </div>
                        <div class="row mb-2">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Advertisement Status" value="Tahap Survey" readonly>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default btn-sm rounded-3 w-25">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.main').change(function() {
            var options = '';
            if ($(this).val() == 'Permanent') {
                options = '<option value="Baliho">Baliho</option><option value="Iklan Bando">Iklan Bando</option><option value="Banner">Banner</option><option value="Billboard">Billboard</option><option value="Iklan Tugu">Iklan Tugu</option><option value="Neon Box">Neon Box</option><option value="Logo">Logo</option>';
            } else if ($(this).val() == 'Non-Permanent') {
                options = '<option value="Baliho">Baliho</option><option value="Spanduk">Spanduk</option><option value="Banner">Banner</option><option value="Umbul-umbul">Umbul-umbul</option><option value="Balon Udara">Balon Udara</option><option value="Iklan Edaran">Iklan Edaran</option><option value="Logo">Logo</option><option value="Iklan Penunjuk Arah">Iklan Penunjuk Arah</option><option value="Shooting/Foto">Shooting/Foto</option>';
            }
            $('.sub').html(options);
        });
        $('.main3').change(function() {
            var options = '';
            if ($(this).val() == 'I') {
                options = '<option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option>';
            } else if ($(this).val() == 'II') {
                options = '<option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option><option value="121">121</option>';
            } else if ($(this).val() == 'III') {
                options = '<option value="122">122</option><option value="123">123</option><option value="124">124</option><option value="125">125</option><option value="126">126</option><option value="127">127</option><option value="128">128</option><option value="129">129</option><option value="130">130</option><option value="131">131</option><option value="132">132</option><option value="133">133</option><option value="134">134</option><option value="135">135</option><option value="136">136</option><option value="137">137</option><option value="138">138</option><option value="139">139</option><option value="140">140</option><option value="141">141</option><option value="142">142</option><option value="143">143</option><option value="144">144</option><option value="145">145</option><option value="146">146</option><option value="147">147</option><option value="148">148</option><option value="149">149</option><option value="150">150</option><option value="151">151</option>';
            } else if ($(this).val() == 'IV') {
                options = '<option value="Setiap Interchange">Setiap Interchange</option>';
            }
            $('.sub3').html(options);
        });
    </script>
</div>
@endsection