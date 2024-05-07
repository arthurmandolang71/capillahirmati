@extends('template.main')

@section('header')
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endSection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/perkara/">Keputusan PN Manado</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah Data</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">

                        <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            content star                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ***********************************-->
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/putusanpn/" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="mb-4 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Nomor Perkara
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="nomor_perkara" value="{{ old('nomor_perkara') }}" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustomnomor_perkara" placeholder="Masukan nomor Keputusan">
                                            @error('nomor_perkara')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label class="text-label form-label"
                                            for="validationCustomUsername">Pemohon/Penggugat
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="penggugat" value="{{ old('penggugat') }}" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustompenggugat"
                                                placeholder="Masukan nomor Pemohon/Penggugat">
                                            @error('penggugat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Tanggal
                                            Keputusan
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="tanggal" value="{{ old('tanggal') }}" type="date"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustomtanggal" placeholder="Masukan tanggal">
                                            @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="mb-12 col-md-12">
                                        <label class="text-label form-label" for="validationCustomUsername">*FIle Keputusan
                                            (Scan PDF)
                                        </label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input name="file" type="file"
                                                    class="form-file-input form-control @error('file') is-invalid @enderror"
                                                    id="image1" onchange="priviewImage1()">
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="mb-6 col-md-6 text text-center">
                                        <img class="img-preview1 img-fluid" width="400">
                                    </div> --}}
                                </div>


                                <hr>
                                <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                            </form>

                        </div>
                        <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            content start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ***********************************-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection

@section('footer')
    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{ asset('') }}assets/vendor/moment/moment.min.js"></script>


    <!--  vendors -->
    <script src="{{ asset('') }}assets/vendor/global/global.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="{{ asset('') }}assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('') }}assets/js/plugins-init/select2-init.js"></script>
@endSection

{{-- <script>
    function priviewImage1() {
        const image = document.querySelector('#image1');
        const view = document.querySelector('.img-preview1');

        view.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            view.src = oFREvent.target.result;
        }
    }
</script> --}}
