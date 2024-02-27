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
                    <li class="breadcrumb-item active"><a href="/pengguna/">Stakeholder</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">

                        <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        content start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
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

                            <form action="/pengguna/{{ $pengguna->id }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-9">
                                        <label class="text-label form-label" for="validationCustomUsername">Nama
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="name" value="{{ old('name', $pengguna->name) }}" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustomUsername" placeholder="Masukan nama pengguna">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-9">
                                        <label class="text-label form-label" for="validationCustomUsername">Username
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="username" value="{{ old('username', $pengguna->username) }}"
                                                type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustomUsername" placeholder="Masukan username">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-9">
                                        <label class="text-label form-label" for="validationCustomUsername">Password
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="password" value="{{ old('password') }}" type="text"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="validationCustomUsername"
                                                placeholder="Masukan Password minimal 6 karakter">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-9">
                                        <label class="text-label form-label" for="validationCustomUsername">No. Wa
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="no_wa" value="{{ old('no_wa', $pengguna->no_wa) }}"
                                                type="text" class="form-control @error('no_wa') is-invalid @enderror"
                                                id="validationCustomUsername" placeholder="Masukan nomor WA Admin">
                                            @error('no_wa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-9">
                                        <label class="text-label form-label" for="validationCustomUsername">Kategori
                                        </label>
                                        <div class="input-group">
                                            <select name="katagori"
                                                class="form-control wide mb-3 @error('katagori') is-invalid @enderror">

                                                <option value="{{ $pengguna->katagori }}">{{ $pengguna->kategori }}
                                                </option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item }}">{{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('katagori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="text-label form-label" for="validationCustomUsername">Status Pengguna
                                        ?</label>
                                    <div class="form-check form-switch">
                                        <input name="active" value="1" class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckChecked" @if (old('acitve', $pengguna->active)) checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">centang jika pengguna
                                            akan di aktifkan
                                        </label>
                                    </div>
                                </div>


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
