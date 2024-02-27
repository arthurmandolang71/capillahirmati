@extends('template.main')

@section('header')
    <!-- Material color picker -->
    <link href="{{ asset('') }}assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">

    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/pickadate/themes/default.date.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endSection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/kelahiran/">Kelahiran</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Detail Kelahiran</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">

                        @if (session()->has('pesan'))
                            <div class="container text-center">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ session('pesan') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Kartu Keluarga
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input value="{{ $aktelahir->no_kk }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Nama Ibu
                                            Kandung</label>
                                        <div class="input-group">
                                            <input value="{{ $aktelahir->nama_anak }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Email</label>
                                        <div class="input-group">
                                            <input value="{{ $aktelahir->email }}" class="form-control" disabled>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Nama
                                            Bayi</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input value="{{ $aktelahir->nama_anak }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Jenis Kelamin
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input value="{{ $aktelahir->jenis_kelamin }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Tanggal Lahir
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input value="{{ $aktelahir->tanggal_lahir }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="text-label form-label"
                                            for="validationCustomUsername">Kecamatan</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input value="{{ $aktelahir->kecamatan_ref->nama ?? '' }}" class="form-control"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="text-label form-label"
                                            for="validationCustomUsername">Kelurahan/Desa</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input value="{{ $aktelahir->kelurahan_ref->nama ?? '' }}" class="form-control"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <p class="text-center"> Surat Keterangan Lahir : </p>
                                        <img src="{{ asset('storage/' . $aktelahir->file_surat_lahir) }}" alt=""
                                            width="300px">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <p class="text-center"> Kartu Keluaraga :</p>
                                        <img src="{{ asset('storage/' . $aktelahir->file_kartu_keluarga) }}"
                                            alt="" width="300px">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <p class="text-center"> Akte Nikah :</p>
                                        <img src="{{ asset('storage/' . $aktelahir->file_akte_nikah) }}" alt=""
                                            width="300px">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        @if ($aktelahir->file_akte_lahir)
                                            <a href="{{ asset('storage/' . $aktelahir->file_akte_lahir) }}"
                                                target="_blank" type="button"
                                                class="btn btn-sm btn-info btn-lg btn-block">File
                                                Akte Lahir</a>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if ($aktelahir->file_kk_baru)
                                            <a href="{{ asset('storage/' . $aktelahir->file_kk_baru) }}" target="_blank"
                                                type="button" class="btn btn-sm btn-info btn-lg btn-block">File
                                                Kartu Keluarga Baru</a>
                                        @endif
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <a href="{{ asset('storage/' . $aktelahir->aktelahir) }}" target="_blank">lihat
                                        file PDF</a>
                                </div> --}}

                                <br>

                                <a href="/kelahiran" type="submit" class="btn rounded-pill btn-info">Kembali
                                </a>


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
@endSection


<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
    integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
{{-- get kecamatan --}}
