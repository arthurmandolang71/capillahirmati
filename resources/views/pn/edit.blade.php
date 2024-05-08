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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tinjai Perkara</a></li>
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

                            <form action="/perkara/{{ $perkara->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @php
                                    if (auth()->user()->level == 2) {
                                        $edit_capil = '';
                                    } else {
                                        $edit_capil = 'readonly';
                                    }

                                    if (auth()->user()->level == 5) {
                                        $edit_pn = '';
                                    } else {
                                        $edit_pn = 'readonly';
                                    }

                                @endphp

                                <div class="row">
                                    @if ($perkara->katagori == 'Perceraian')
                                        <div class="mb-4 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">Nama Pelapor
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                                <input name="nama" value="{{ old('nama', $perkara->nama) }}"
                                                    type="text" class="form-control @error('nama') is-invalid @enderror"
                                                    id="validationCustomUsernama" placeholder="Masukan nama pelapor"
                                                    {{ $edit_capil }}>
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">Nama
                                                Tergugat
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                                <input name="tergugat" value="{{ old('tergugat', $perkara->tergugat) }}"
                                                    type="text"
                                                    class="form-control @error('tergugat') is-invalid @enderror"
                                                    id="validationCustomUsertergugat" placeholder="Masukan nama tergugat "
                                                    {{ $edit_capil }}>
                                                @error('tergugat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @else
                                        <div class="mb-6 col-md-6">
                                            <label class="text-label form-label" for="validationCustomUsername">Pemohon
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                                <input name="nama" value="{{ old('nama', $perkara->nama) }}"
                                                    type="text" class="form-control @error('nama') is-invalid @enderror"
                                                    id="validationCustomUsernama" placeholder="Masukan nama pelapor"
                                                    {{ $edit_capil }}>
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-6 col-md-6 invisible">
                                            <label class="text-label form-label" for="validationCustomUsername">Nama
                                                Tergugat
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                                <input name="tergugat" value="{{ old('tergugat', $perkara->tergugat) }}"
                                                    type="text"
                                                    class="form-control @error('tergugat') is-invalid @enderror"
                                                    id="validationCustomUsertergugat" placeholder="Masukan nama tergugat "
                                                    {{ $edit_capil }}>
                                                @error('tergugat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mb-4 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Nomor. Wa
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="nomor_hp" value="{{ old('nomor_hp', $perkara->nomor_hp) }}"
                                                type="text" class="form-control @error('nomor_hp') is-invalid @enderror"
                                                id="validationCustomUsernama" placeholder="Masukan nomor hp pelapor"
                                                {{ $edit_capil }}>
                                            @error('nomor_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-6 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">Nomor
                                            Perkara
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="nomor_perkara"
                                                value="{{ old('nomor_perkara', $perkara->nomor_perkara) }}" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustomnomor_perkara" placeholder="Masukan nomor Keputusan"
                                                {{ $edit_capil }}>
                                            @error('nomor_perkara')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-6 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">Tanggal
                                            Keputusan
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="tanggal" value="{{ old('tanggal', $perkara->tanggal) }}"
                                                type="date" class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustomtanggal" placeholder="Masukan tanggal"
                                                {{ $edit_capil }}>
                                            @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                @if (auth()->user()->level == 2)
                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="text-label form-label" for="validationCustomUsername">Katagori
                                            </label>
                                            <div class="input-group">
                                                <select name="katagori"
                                                    class="form-control wide mb-3 @error('katagori') is-invalid @enderror"
                                                    {{ $edit_capil }}>
                                                    <option value="">Pilih</option>
                                                    </option>
                                                    @foreach ($katagori as $item)
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
                                @else
                                    <div class="mb-12 col-md-12">
                                        <label class="text-label form-label" for="validationCustomUsername">Katagori
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="" value="{{ old('nama', $perkara->katagori) }}"
                                                type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="validationCustomUsernama" placeholder="Masukan nama pelapor"
                                                {{ $edit_capil }}>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="mb-6 col-md-6">
                                        <label class="text-label form-label" for="validationCustomUsername">*File
                                            Perkara
                                        </label>
                                        <div class="input-group">
                                            @if (auth()->user()->level == 2)
                                                <div class="form-file">
                                                    <input name="file_cover" type="file"
                                                        class="form-file-input form-control @error('file_cover') is-invalid @enderror"
                                                        id="image1" onchange="priviewImage1()" {{ $edit_capil }}>
                                                </div>
                                                <span class="input-group-text">Upload</span>
                                                @error('file_cover')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif
                                            <div class="">
                                                {{-- <img href="{{ asset('storage/' . $perkara->file_cover) }}"
                                                    class="img-preview1 img-fluid"> --}}
                                                <embed type="application/pdf"
                                                    src="{{ asset('storage/' . $perkara->file_cover) }}" width="600"
                                                    height="400"></embed>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="mb-3 col-md-12">
                                    <label class="text-label form-label" for="validationCustomUsername">Penjelasan
                                        Konfirmasi</label>
                                    <div class="input-group">
                                        <textarea name="penjelasan" class="form-control" {{ $edit_pn }}>{{ $perkara->penjelasan ?? null }}
                                        </textarea>
                                    </div>
                                </div>

                                @if (auth()->user()->level == 5)
                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="text-label form-label"
                                                for="validationCustomUsername">Status</label>
                                            <div class="basic-form">
                                                <select name="status"
                                                    class="default-select form-control wide mb-3 @error('status') is-invalid @enderror"
                                                    required>
                                                    <option value="">Pilih</option>
                                                    @foreach ($status as $item)
                                                        @if (old('status', $perkara->status ?? null) == $item)
                                                            <option value="{{ $item }}" selected>
                                                                {{ $item }}</option>
                                                        @else
                                                            <option value="{{ $item }}">
                                                                {{ $item }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="mb-12 col-md-12">
                                        <label class="text-label form-label" for="validationCustomUsername">Status
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="" value="{{ old('status', $perkara->status) }}"
                                                type="text" class="form-control @error('status') is-invalid @enderror"
                                                id="validationCustomUserstatus" placeholder="Masukan status pelapor"
                                                {{ $edit_pn }}>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                @endif

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

<script>
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
</script>
