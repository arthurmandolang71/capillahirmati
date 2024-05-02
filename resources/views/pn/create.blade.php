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

                            <form action="/perkara/" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-4 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Nama Penggugat
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="nama" value="{{ old('nama') }}" type="text"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                id="validationCustomUsernama" placeholder="Masukan nama Penggugat">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Nama Tergugat
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="tergugat" value="{{ old('tergugat') }}" type="text"
                                                class="form-control @error('tergugat') is-invalid @enderror"
                                                id="validationCustomUsertergugat" placeholder="Masukan nama tergugat ">
                                            @error('tergugat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label class="text-label form-label" for="validationCustomUsername">Nomor. Wa (yang
                                            bisa dihubungi)
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="bi bi-card-heading"></i> </span>
                                            <input name="nomor_hp" value="{{ old('nomor_hp') }}" type="text"
                                                class="form-control @error('nomor_hp') is-invalid @enderror"
                                                id="validationCustomUsernama"
                                                placeholder="Masukan nomor yang bisa dihubungi">
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
                                    <div class="mb-6 col-md-6">
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

                                <div class="row">
                                    <div class="mb-12 col-md-12">
                                        <label class="text-label form-label" for="validationCustomUsername">Katagori
                                        </label>
                                        <div class="input-group">
                                            <select name="katagori"
                                                class="form-control wide mb-3 @error('katagori') is-invalid @enderror">
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

                                <div class="row">
                                    <div class="mb-12 col-md-12">
                                        <label class="text-label form-label" for="validationCustomUsername">*FIle Keputusan
                                            (Scan PDF)
                                        </label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input name="file_cover" type="file"
                                                    class="form-file-input form-control @error('file_cover') is-invalid @enderror"
                                                    id="image1" onchange="priviewImage1()">
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                            @error('file_cover')
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
