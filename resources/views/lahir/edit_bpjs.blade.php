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
                    <li class="breadcrumb-item active"><a href="/kelahiran">Kelahiran</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Update Kelahiran</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">

                        <!--********************************** content start ***********************************-->
                        {{-- <div class="row container">
                            <div class="col-3">
                                <a href="/kelahiran" class="btn btn-block btn-primary"><span
                                        class="btn-icon-start text-primary"><i class="bi bi-backspace-fill"></i>
                                    </span>Kembali</a>
                            </div>
                        </div> --}}

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

                            <div class="basic-form">
                                <form action="/kelahiran/{{ $aktelahir->id }}"
                                    class="form-valide-with-icon needs-validation" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="mb-3">
                                        <label class="text-label form-label" for="validationCustomUsername">No.Kartu
                                            Keluaraga</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="no_kk" value="{{ old('no_kk', $aktelahir->no_kk) }}"
                                                type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                                id="" placeholder="No. Kartu Keluaraga" disabled />
                                            @error('no_kk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row ">

                                        <div class="row ">
                                            <div class="mb-3 col-md-4">
                                                <label class="text-label form-label" for="validationCustomUsername">
                                                    *Nama Bayi</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"> <i
                                                            class="bi bi-person-bounding-box"></i>
                                                    </span>
                                                    <input name="nama_anak"
                                                        value="{{ old('nama_anak', $aktelahir->nama_anak) }}" type="text"
                                                        class="form-control @error('nama_anak') is-invalid @enderror"
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
                                                    <span class="input-group-text"> <i
                                                            class="bi bi-person-bounding-box"></i>
                                                    </span>
                                                    <input name="jenis_kelamin"
                                                        value="{{ old('jenis_kelamin', $aktelahir->jenis_kelamin) }}"
                                                        type="text"
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
                                                        value="{{ old('tanggal_lahir', $aktelahir->tanggal_lahir) }}"
                                                        type="date"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        disabled>
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
                                                    <span class="input-group-text"> <i
                                                            class="bi bi-person-bounding-box"></i>
                                                    </span>
                                                    <input name="berat_bayi"
                                                        value="{{ old('berat_bayi', $aktelahir->berat_bayi) }}"
                                                        type="text"
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
                                                    <span class="input-group-text"> <i
                                                            class="bi bi-person-bounding-box"></i>
                                                    </span>
                                                    <input name="panjang_bayi"
                                                        value="{{ old('panjang_bayi', $aktelahir->panjang_bayi) }}"
                                                        type="text"
                                                        class="form-control @error('panjang_bayi') is-invalid @enderror"
                                                        id="validationCustomUsername" placeholder="Masukan Panjang Bayi"
                                                        disabled>
                                                    @error('panjang_bayi')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row bg ">

                                            <div class="mb-3 col-md-6 ">
                                                <label class="text-label form-label"
                                                    for="validationCustomUsername"><b>*No.Kartu
                                                        Keluarga</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"> <i class="bi bi-card-list"></i>
                                                    </span>
                                                    <input name="no_kk" value="{{ old('no_kk', $aktelahir->no_kk) }}"
                                                        type="text"
                                                        class="form-control @error('no_kk') is-invalid @enderror"
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
                                                        type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
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

                                        <div class="row bg ">
                                            <div class="mb-3 col-md-6">
                                                <label class="text-label form-label" for="validationCustomUsername">*Nama
                                                    Ibu
                                                    Kandung</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"> <i class="bi bi-person-circle"></i>
                                                    </span>
                                                    <input name="nama_ibu"
                                                        value="{{ old('nama_ibu', $aktelahir->nama_ibu) }}"
                                                        type="text"
                                                        class="form-control @error('nama_ibu') is-invalid @enderror"
                                                        id="validationCustomUsername"
                                                        placeholder="Masukan nama Ibu Kandung" disabled>
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
                                                    <span class="input-group-text"> <i
                                                            class="bi bi-person-bounding-box"></i>
                                                    </span>
                                                    <input name="anak_ke"
                                                        value="{{ old('anak_ke', $aktelahir->anak_ke) }}" type="text"
                                                        class="form-control @error('anak_ke') is-invalid @enderror"
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
                                                    <a href="{{ asset('storage/' . $aktelahir->file_kk_baru) }}"
                                                        target="_blank" type="button"
                                                        class="btn btn-sm btn-info btn-lg btn-block">File
                                                        Kartu Keluarga Baru</a>
                                                @endif
                                            </div>
                                        </div>
                                        <br> <br>
                                        <hr>
                                        <div class="row bg bg-light">
                                            <div class="mb-6 col-md-12">
                                                <label class="text-label form-label" for="validationCustomUsername">
                                                    <b>Respon
                                                        BPJS Manado </b>
                                                </label>
                                                <div class="input-group">
                                                    <select name="status_bpjs"
                                                        class="default-select form-control wide mb-3 @error('kecamatan') is-invalid @enderror">
                                                        <option value="">Pilih</option>
                                                        <option value="0"
                                                            @if ($aktelahir->status_bpjs == false) selected @endif>Belum
                                                            update
                                                            BPJS
                                                        </option>
                                                        <option value="1"
                                                            @if ($aktelahir->status_bpjs == '1') selected @endif>Sudah
                                                            Update
                                                            BPJS
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="invalidCheck2" required>
                                                    <label class="form-check-label" for="invalidCheck2">
                                                        <b> Anda yakin data yang di input sudah benar ? </b>
                                                    </label>
                                                </div>
                                            </div>


                                        </div>

                                    </div>



                                    <br> <br></hr> <button type="submit" class="btn me-2 btn-primary">Perbaharui</button>
                                    <a href="/kelahiran" class="btn btn-light">Batal</a>

                                </form>
                            </div>

                        </div>
                        <!--********************************** content end ***********************************-->
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
    <script src="{{ asset('') }}assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- pickdate -->
    <script src="{{ asset('') }}assets/vendor/pickadate/picker.js"></script>
    <script src="{{ asset('') }}assets/vendor/pickadate/picker.date.js"></script>

    <!-- Material color picker -->
    <script
        src="{{ asset('') }}assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>

    <script src="{{ asset('') }}assets/js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="{{ asset('') }}assets/js/plugins-init/pickadate-init.js"></script>



    <!--  vendors -->

    <script src="{{ asset('') }}assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="{{ asset('') }}assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('') }}assets/js/plugins-init/select2-init.js"></script>
@endSection

<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
    integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
