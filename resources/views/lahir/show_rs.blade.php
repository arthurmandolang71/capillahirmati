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

                                <div class="row ">
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">
                                            *Nama Bayi</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-person-bounding-box"></i>
                                            </span>
                                            <input name="nama_anak" value="{{ old('nama_anak', $aktelahir->nama_anak) }}"
                                                type="text" class="form-control @error('nama_anak') is-invalid @enderror"
                                                id="validationCustomUsername" disabled>
                                            @error('nama_anak')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">
                                            *Jenis Kelamin</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-person-bounding-box"></i>
                                            </span>
                                            <input name="jenis_kelamin"
                                                value="{{ old('jenis_kelamin', $aktelahir->jenis_kelamin) }}" type="text"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                id="validationCustomUsername" disabled>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">
                                            *Tanggal Lahir Bayi</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-calendar-check"></i>
                                            </span>
                                            <input name="tanggal_lahir"
                                                value="{{ old('tanggal_lahir', $aktelahir->tanggal_lahir) }}" type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror" disabled>
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="mb-3 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">*Berat
                                            Bayi (satuan Kg.)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-person-bounding-box"></i>
                                            </span>
                                            <input name="berat_bayi"
                                                value="{{ old('berat_bayi', $aktelahir->berat_bayi) }}" type="text"
                                                class="form-control @error('berat_bayi') is-invalid @enderror"
                                                id="validationCustomUsername" placeholder="Masukan Barat Berat Bayi"
                                                disabled>
                                            @error('berat_bayi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">*Panjang
                                            Bayi (Satuan cm.)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-person-bounding-box"></i>
                                            </span>
                                            <input name="panjang_bayi"
                                                value="{{ old('panjang_bayi', $aktelahir->panjang_bayi) }}" type="text"
                                                class="form-control @error('panjang_bayi') is-invalid @enderror"
                                                id="validationCustomUsername" placeholder="Masukan Panjang Bayi" disabled>
                                            @error('panjang_bayi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row bg bg-light">

                                    <div class="mb-3 col-md-6 ">
                                        <label class="text-label form-label" for="validationCustomUsername"><b>*No.Kartu
                                                Keluarga</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-list"></i> </span>
                                            <input name="no_kk" value="{{ old('no_kk', $aktelahir->no_kk) }}"
                                                type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                                id="" placeholder="No. Kartu Keluaraga" disabled />
                                            @error('no_kk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <br>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">
                                            <b>*Email</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-envelope"></i>
                                            </span>
                                            <input name="email" value="{{ old('email', $aktelahir->email) }}"
                                                type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="validationCustomUsername"
                                                placeholder="Masukan Email Aktif dari keluarga" disabled>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row bg bg-light">
                                    <div class="mb-3 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">*Nama Ibu
                                            Kandung</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-person-circle"></i>
                                            </span>
                                            <input name="nama_ibu" value="{{ old('nama_ibu', $aktelahir->nama_ibu) }}"
                                                type="text"
                                                class="form-control @error('nama_ibu') is-invalid @enderror"
                                                id="validationCustomUsername" placeholder="Masukan nama Ibu Kandung"
                                                disabled>
                                            @error('nama_ibu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">
                                            *Anak Ke</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-person-bounding-box"></i>
                                            </span>
                                            <input name="anak_ke" value="{{ old('anak_ke', $aktelahir->anak_ke) }}"
                                                type="text" class="form-control @error('anak_ke') is-invalid @enderror"
                                                id="validationCustomUsername" disabled>
                                            @error('anak_ke')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <p class="text-center"> Surat Keterangan Lahir : </p>
                                        <a href="{{ asset('storage/' . $aktelahir->file_surat_lahir) }}"
                                            target="_blank"><img
                                                src="{{ asset('storage/' . $aktelahir->file_surat_lahir) }}"
                                                alt="" width="300px">
                                        </a>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <p class="text-center"> Kartu Keluaraga :</p>
                                        <a href="{{ asset('storage/' . $aktelahir->file_kartu_keluarga) }}"
                                            target="_blank">
                                            <img src="{{ asset('storage/' . $aktelahir->file_kartu_keluarga) }}"
                                                alt="" width="300px">
                                        </a>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <p class="text-center"> Akte Nikah :</p>
                                        <a href="{{ asset('storage/' . $aktelahir->file_akte_nikah) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $aktelahir->file_akte_nikah) }}"
                                                alt="" width="300px">
                                        </a>
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
