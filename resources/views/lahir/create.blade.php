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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah Kelahiran</a></li>
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
                                <form action="/kelahiran" class="form-valide-with-icon needs-validation" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row ">
                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">
                                                *Nama Bayi</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-person-bounding-box"></i>
                                                </span>
                                                <input name="nama_anak" value="{{ old('nama_anak') }}" type="text"
                                                    class="form-control @error('nama_anak') is-invalid @enderror"
                                                    id="validationCustomUsername">
                                                @error('nama_anak')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">*Jenis
                                                Kelamin</label>
                                            <div class="input-group">
                                                <select name="jenis_kelamin"
                                                    class="default-select form-control wide mb-3 @error('jenis_kelamin') is-invalid @enderror">
                                                    <option value="">Pilih</option>
                                                    @foreach ($jenis_kelamin as $item)
                                                        @if (old('jenis_kelamin'))
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
                                                *Tanggal Lahir Bayi</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-calendar-check"></i>
                                                </span>
                                                <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                                    type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror">
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
                                                <input name="berat_bayi" value="{{ old('berat_bayi') }}" type="text"
                                                    class="form-control @error('berat_bayi') is-invalid @enderror"
                                                    id="validationCustomUsername" placeholder="Masukan Barat Berat Bayi">
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
                                                <input name="panjang_bayi" value="{{ old('panjang_bayi') }}" type="text"
                                                    class="form-control @error('panjang_bayi') is-invalid @enderror"
                                                    id="validationCustomUsername" placeholder="Masukan Panjang Bayi">
                                                @error('panjang_bayi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="mb-3 col-md-6">
                                            <label class="text-label form-label" for="validationCustomUsername">*No.Kartu
                                                Keluarga</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-card-list"></i> </span>
                                                <input name="no_kk" value="{{ old('no_kk') }}" type="text"
                                                    class="form-control @error('no_kk') is-invalid @enderror" id=""
                                                    placeholder="No. Kartu Keluaraga" />
                                                @error('no_kk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="text-label form-label" for="validationCustomUsername">
                                                *Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-envelope"></i>
                                                </span>
                                                <input name="email" value="{{ old('email') }}" type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="validationCustomUsername"
                                                    placeholder="Masukan Email Aktif dari keluarga">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="mb-3 col-md-6">
                                            <label class="text-label form-label" for="validationCustomUsername">*Nama Ibu
                                                Kandung</label>
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="bi bi-person-circle"></i>
                                                </span>
                                                <input name="nama_ibu" value="{{ old('nama_ibu') }}" type="text"
                                                    class="form-control @error('nama_ibu') is-invalid @enderror"
                                                    id="validationCustomUsername" placeholder="Masukan nama Ibu Kandung">
                                                @error('nama_ibu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 col-md-6">
                                            <label class="text-label form-label" for="validationCustomUsername">*Anak Ke
                                                ?</label>
                                            <div class="input-group">
                                                <select name="anak_ke"
                                                    class="default-select form-control wide mb-3 @error('anak_ke') is-invalid @enderror">
                                                    <option value="">Pilih</option>
                                                    @foreach ($anak_ke as $item)
                                                        @if (old('anak_ke') == $item)
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



                                    <hr><br>
                                    <div class="row ">
                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">
                                                *Surat Keterangan Lahir (jpeg/jpg)</label>
                                            <div class="input-group">
                                                <div class="form-file">
                                                    <input name="file_surat_lahir" type="file"
                                                        class="form-file-input form-control @error('file_surat_lahir') is-invalid @enderror"
                                                        id="image1" onchange="priviewImage1()">
                                                </div>
                                                <span class="input-group-text">Upload</span>
                                                @error('file_surat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div>
                                                    <img class="img-preview1 img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">*Kartu
                                                Keluarga (jpeg/jpg) </label>
                                            <div class="input-group">
                                                <div class="form-file">
                                                    <input name="file_kartu_keluarga" type="file"
                                                        class="form-file-input form-control @error('file_kartu_keluarga') is-invalid @enderror"
                                                        id="image2" onchange="priviewImage2()">
                                                </div>
                                                <span class="input-group-text">Upload</span>
                                                @error('file_kartu_keluarga')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div>
                                                    <img class="img-preview2 img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="text-label form-label" for="validationCustomUsername">Foto
                                                Akte Nikah (Jika ada) </label>
                                            <div class="input-group">
                                                <div class="form-file">
                                                    <input name="file_akte_nikah" type="file"
                                                        class="form-file-input form-control @error('file_akte_nikah') is-invalid @enderror"
                                                        id="image3" onchange="priviewImage3()">
                                                </div>
                                                <span class="input-group-text">Upload</span>
                                                @error('file_kte_nikah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div>
                                                    <img class="img-preview3 img-fluid">
                                                </div>
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
                                    <button type="submit" class="btn me-2 btn-primary">Tambahkan</button>
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

{{-- <div class="row">
                                        <div class="mb-6 col-md-6">
                                            <label class="text-label form-label" for="validationCustomUsername">*Kecamatan
                                                (alamat Kartu Keluarga)
                                            </label>
                                            <div class="input-group">
                                                <select name="kecamatan" id="kecamatan"
                                                    class="default-select form-control wide mb-3 @error('kecamatan') is-invalid @enderror">
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
                                            <label class="form-label" for="multicol-country">*Kelurahan (alamat Kartu
                                                Keluarga)</label>
                                            <select id="kelurahan_desa" name="kelurahan_desa" class="form-select">
                                                <option value="">Pilih</option>
                                            </select>
                                        </div>
                                    </div> --}}

{{-- <div class="mb-3 col-md-3">
                                            <label class="text-label form-label" for="validationCustomUsername">Foto
                                                SPTJM Kelahiran (Khusus Kelurahan) </label>
                                            <div class="input-group">
                                                <div class="form-file">
                                                    <input name="sptjm" type="file"
                                                        class="form-file-input form-control @error('sptjm') is-invalid @enderror"
                                                        id="image4" onchange="priviewImage4()">
                                                </div>
                                                <span class="input-group-text">Upload</span>
                                                @error('sptjm')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div>
                                                    <img class="img-preview4 img-fluid">
                                                </div>
                                            </div>
                                        </div> --}}

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

    <script>
        function priviewImage2() {
            const image = document.querySelector('#image2');
            const view = document.querySelector('.img-preview2');

            view.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                view.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        function priviewImage3() {
            const image = document.querySelector('#image3');
            const view = document.querySelector('.img-preview3');

            view.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                view.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        function priviewImage4() {
            const image = document.querySelector('#image4');
            const view = document.querySelector('.img-preview4');

            view.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                view.src = oFREvent.target.result;
            }
        }
    </script>
@endSection

<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
    integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>


{{-- get kelurahan --}}
<script>
    $(document).ready(function() {

        // Department Change
        $('#kecamatan').change(function() {
            var id = $(this).val();
            console.log(id);
            // Empty the dropdown
            $('#kelurahan_desa').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/get_kelurahandesa/kelahiran/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log(response['data']);
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].id;
                            var nama = response['data'][i].nama;

                            var option = "<option value='" + id + "'>" + nama + "</option>";

                            $("#kelurahan_desa").append(option);
                        }
                    }

                }
            });
        });
    });
</script>
