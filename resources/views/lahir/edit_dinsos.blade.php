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

                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">Nama Ibu
                                                Kandung</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
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

                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">
                                                Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-whatsapp"></i>
                                                </span>
                                                <input name="email" value="{{ old('email', $aktelahir->email) }}"
                                                    type="text" class="form-control @error('email') is-invalid @enderror"
                                                    id="validationCustomUsername" placeholder="Masukan email dari keluarga"
                                                    disabled>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">Anak Ke
                                                ?</label>
                                            <div class="input-group">
                                                <select name="anak_ke"
                                                    class="default-select form-control wide mb-3 @error('anak_ke') is-invalid @enderror"
                                                    disabled>
                                                    <option value="">Pilih</option>
                                                    @foreach ($anak_ke as $item)
                                                        @if (old('anak_ke', $aktelahir->anak_ke) == $item)
                                                            <option value="{{ $item }}" selected>
                                                                {{ $item }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item }}">
                                                                {{ $item }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('anak_ke')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row ">
                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">
                                                Nama Anak</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-instagram"></i>
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
                                        <div class="mb-4 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">Jenis
                                                Kelamin</label>
                                            <div class="input-group">
                                                <select name="jenis_kelamin"
                                                    class="default-select form-control wide mb-3 @error('jenis_kelamin') is-invalid @enderror"
                                                    disabled>
                                                    <option value="">Pilih</option>
                                                    @foreach ($jenis_kelamin as $item)
                                                        @if (old('jenis_kelamin', $aktelahir->jenis_kelamin))
                                                            <option value="{{ $item }}" selected>
                                                                {{ $item }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item }}">
                                                                {{ $item }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">
                                                Tanggal Lahir Anak</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-instagram"></i>
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

                                    {{-- <div class="row">
                                        <div class="mb-6 col-md-6">
                                            <label class="text-label form-label" for="validationCustomUsername">Kecamatan
                                                (alamat Kartu Keluarga)
                                            </label>
                                            <div class="input-group">
                                                <select name="kecamatan" id="kecamatan"
                                                    class="default-select form-control wide mb-3 @error('kecamatan') is-invalid @enderror"
                                                    disabled>
                                                    <option value="">Pilih</option>
                                                    @foreach ($kecamatan as $item)
                                                        @if (old('kecamatan'))
                                                            <option value="{{ $item->id }}" selected>
                                                                {{ $item->nama }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->nama }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('kecamatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label" for="multicol-country">Kelurahan (alamat Kartu
                                                Keluarga)</label>
                                            <select id="kelurahan_desa" name="kelurahan_desa" class="form-select">
                                                <option value="">Pilih</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="row ">
                                        <div class="mb-6 col-md-12">
                                            <label class="text-label form-label" for="validationCustomUsername">Respon
                                                BPJS Manado
                                            </label>
                                            <div class="input-group">
                                                <select name="status_dinsos"
                                                    class="default-select form-control wide mb-3 @error('kecamatan') is-invalid @enderror">
                                                    <option value="">Pilih</option>
                                                    <option value="0"
                                                        @if ($aktelahir->status_dinsos == false) selected @endif>Belum update
                                                        status</option>
                                                    <option value="1"
                                                        @if ($aktelahir->status_dinsos == '1') selected @endif>Sudah Update
                                                        Status</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="mb-3 col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="invalidCheck2" required>
                                            <label class="form-check-label" for="invalidCheck2">
                                                Anda yakin data yang di input sudah benar ?
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn me-2 btn-primary">Perbaharui</button>
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
