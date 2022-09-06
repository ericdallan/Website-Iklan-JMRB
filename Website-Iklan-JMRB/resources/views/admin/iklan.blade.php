@extends('admin/dashboard')
@section('content')
@section('title', 'Dashboard-Iklan')
@section('subtitle', 'Advertisement')
<style>
    select[readonly] {
        pointer-events: none;
        background-color: #e9ecef;
    }

    .form-label {
        color: #0A142F;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="datetime-local"] {
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
    <div class="row my-4">
        <div class="col-md-8">
            <form action="" method="GET">
                <div class="input-group rounded" style="width: 18rem;">
                    <input type="text" name="search" class="form-control rounded" value="{{ request()->get('search') }}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="bi bi-search" type="submit"></i>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-6 col-md-4 text-end text-white">
            <form action="" method="GET">
                <div class="btn-group " style="width: 18rem;">
                    <button class="btn btn-default dropdown-toggle" type="button" name="search" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" aria-describedby="search-addon">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/dashboard/iklan">All</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/dashboard/iklan?search=Tahap+Survey">Tahap Survey</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/dashboard/iklan?search=Tahap+Negosiasi">Tahap Negosiasi</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/dashboard/iklan?search=Diterima">Diterima</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/dashboard/iklan?search=Ditolak">Ditolak</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        @php
        if (!$iklan->isEmpty()){
        @endphp
        @foreach($iklan as $iklans)
        <div class="card mx-4 mb-4" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title fw-bold">{{ $iklans-> name }}</h3>
                <hr>
                <h6 class="card-subtitle my-3 text-muted">Zone : {{ $iklans-> zone }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Location : KM {{ $iklans-> location }}</h6>
                <h6 class="card-subtitle my-3 text-muted">Coordinate : <a href="https://www.google.com/search?q={{ $iklans-> maps_coord }}" style="color:#0C1531;text-decoration:none;">{{ $iklans-> maps_coord }}</a></h6>
                <h6 class="card-subtitle my-3 text-muted">Status : {{ $iklans-> status }}</h6>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="text-start">
                    </div>
                </div>
                <hr class="w-100">
                <div class="row align-items-center">
                    <div class="col-4">
                        <i class="btn bi bi-trash3-fill fs-6" data-bs-toggle="modal" data-bs-target="#deleteIklan{{ $iklans->id_iklan }}" style="color:red; ">Delete</i>
                    </div>
                    <div class="col-8 text-end">
                        <a class="btn btn-default btn-md w-50 rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $iklans->id_iklan }}">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Detai;-->
        <div class="modal fade" id="exampleModal{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('dashboard/iklan/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Iklan {{$iklans->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-3">
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Advertisement Name" value="{{ $iklans->name }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label" for="zone">Zone</label>
                                <select class="main form-select" id="zone" id="zone" name="zone">
                                    <option value="I" {{($iklans->zone == 'I') ? "selected":'' }}>I</option>
                                    <option value="II" {{($iklans->zone == 'II') ? "selected":'' }}>II</option>
                                    <option value="III" {{($iklans->zone == 'III') ? "selected":'' }}>III</option>
                                    <option value="IV" {{($iklans->zone == 'IV') ? "selected":'' }}>IV</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <label for="location" class="form-label">Location (KM) </label>
                                <select class="sub form-select" id="location" id="location" name="location">
                                    <option value="{{ $iklans->location }}">{{ $iklans->location }}</option>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <label for="maps_coord" class="form-label">Maps Coordinate</label>
                                <input type="text" class="form-control" id="maps_coord" name="maps_coord" placeholder="Advertisement Coordinate" value="{{ $iklans->maps_coord }}">
                            </div>
                            <div class="row mb-2">
                                <label for="survey_date" class="form-label">Tanggal Survey</label>
                                <input type="datetime-local" class="form-control" step="any" id="survey_date" name="survey_date" value="{{ $iklans->survey_date }}" readonly>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="Tahap Survey" {{($iklans->status == 'Tahap Survey') ? "selected":'' }}>Tahap Survey</option>
                                    <option value="Tahap Negosiasi" {{($iklans->status == 'Tahap Negosiasi') ? "selected":'' }}>Tahap Negosiasi</option>
                                    <option value="Close" {{($iklans->status == 'Close') ? "selected":'' }}>Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-md rounded-3 w-25">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Delete -->
        <div class="modal fade" id="deleteIklan{{ $iklans->id_iklan }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Iklan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus akun <b>{{$iklans->name}}</b> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-danger btn-sm" href="{{ route('dashboard/iklan/delete', ['id' => $iklans->id_iklan]) }}">Delete</a>
                    </div>
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
    <script>
        $('.main').change(function() {
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
            $('.sub').html(options);
        });
    </script>
</div>
@endsection