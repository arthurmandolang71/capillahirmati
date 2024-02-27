@extends('template.main')

@section('header')
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/datatables/css/jquery.dataTables.min.css">
@endSection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelahiran</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Kelahiran</a></li>
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

                        <!--********************************** content start ***********************************-->

                        <div class="card-body">

                            <!-- start content -->
                            <div class="container">
                                <form action="/dptcaleg" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="multicol-country">Kecamatan</label>
                                            <select id="kecamatan" name="kecamatan" class="select2 form-select"
                                                data-allow-clear="true">
                                                {{-- @if ($select_kecamatan)
                                                    <option value="{{ $select_kecamatan['id'] }}"> Pencarian
                                                        {{ $select_kecamatan['nama'] }}</option>
                                                @endif --}}
                                                <option value="">Pilih</option>
                                            </select>
                                            <hr>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="multicol-country">Kelurahan</label>
                                            <select id="kelurahandesa" name="kelurahandesa" class="select2 form-select"
                                                data-allow-clear="true">
                                                {{-- @if ($select_kelurahandesa)
                                                    <option value="{{ $select_kelurahandesa['id'] }}"> Pencarian
                                                        {{ $select_kelurahandesa['nama'] }}</option>
                                                @endif --}}
                                                <option value="">Pilih</option>
                                            </select>
                                            <hr>
                                        </div>
                                        <div class="col-md-8">
                                            {{-- <label class="form-label" for="multicol-country">Nama</label> --}}
                                            @if ($cari_nama)
                                                <input type="text" name="cari_nama" id="nama" class="form-control"
                                                    placeholder="John" value="{{ $cari_nama }}" />
                                            @else
                                                <input type="text" name="cari_nama" id="nama" class="form-control"
                                                    placeholder="Masukan pencarian nama/marga" value="" />
                                            @endif
                                            <hr>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" href="/dpt/create"
                                                class="btn btn-block btn-primary"><span
                                                    class="btn-icon-start text-primary"><i class="fa fa-search"></i>
                                                </span>Cari!</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="table table-striped display" style="width:100%">
                                    <thead>
                                        <tr>
                                            @if (auth()->user()->level != 1)
                                                <th>Stakeholder</th>
                                            @endif
                                            <th>Nama Anak</th>
                                            <th>Nama Ibu</th>
                                            <th>Kelurahan</th>
                                            <th>Tanggal Lahir</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aktelahir as $item)
                                            <tr>
                                                @if (auth()->user()->level != 1)
                                                    <td>{{ $item->user_ref->name }}</td>
                                                @endif
                                                <td><strong>{{ $item->nama_anak }}</strong></td>
                                                <td>{{ $item->nama_ibu }}</td>
                                                <td>{{ $item->kecamatan_ref->nama }} <br> {{ $item->kelurahan_ref->nama }}
                                                </td>
                                                <td>{{ $item->tanggal_lahir }}</td>
                                                <td>
                                                    @if ($item->status_akte == 1)
                                                        @if (auth()->user()->level == 1)
                                                            <a href="/kelahiran/show_rs/{{ $item->id }}"><span
                                                                    class="badge badge-lg light badge-info">Pengajuan</span></a>
                                                        @endif
                                                        @if (auth()->user()->level == 2)
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-info">Pengajuan</span></a>
                                                        @endif
                                                    @endif

                                                    @if ($item->status_akte == 10)
                                                        @if (auth()->user()->level == 2)
                                                            <a href="/kelahiran/show_rs/{{ $item->id }}"><span
                                                                    class="badge badge-lg light badge-danger">Perbaikan
                                                                    Berkas</span></a>
                                                        @endif
                                                        @if (auth()->user()->level == 1)
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-danger">Perbaikan
                                                                    Berkas</span></a>
                                                        @endif
                                                    @endif

                                                    @if ($item->status_akte == 2)
                                                        @if (auth()->user()->level == 1)
                                                            <a href="/kelahiran/show_rs/{{ $item->id }}"><span
                                                                    class="badge badge-lg light badge-warning">Capil Sedang
                                                                    Mengerjakan</span></a>
                                                        @endif
                                                        @if (auth()->user()->level == 2)
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-warning">Capil Sedang
                                                                    Mengerjakan</span></a>
                                                        @endif
                                                    @endif

                                                    @if ($item->status_akte == 3)
                                                        @if (auth()->user()->level == 1)
                                                            <a href="/kelahiran/show_rs/{{ $item->id }}"><span
                                                                    class="badge badge-lg light badge-success">Capil
                                                                    Selesai</span></a>
                                                        @endif
                                                        @if (auth()->user()->level == 2)
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-success">Capil
                                                                    Selesai</span></a>
                                                        @endif
                                                    @endif



                                                    @if (auth()->user()->level == 3)
                                                        <br>
                                                        @if ($item->status_bpjs == 1)
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-success">BPJS
                                                                    Selesai</span></a>
                                                        @else
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-warning">BPJS
                                                                    Belum Update</span></a>
                                                        @endif
                                                    @else
                                                        <br>
                                                        @if ($item->status_bpjs == 1)
                                                            <span class="badge badge-lg light badge-success">BPJS
                                                                Selesai</span>
                                                        @else
                                                            <span class="badge badge-lg light badge-warning">BPJS
                                                                Belum Update</span>
                                                        @endif
                                                    @endif

                                                    @if (auth()->user()->level == 4)
                                                        <br>
                                                        @if ($item->status_dinsos == 1)
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-success">Dinsos
                                                                    Selesai</span></a>
                                                        @else
                                                            <a href="/kelahiran/{{ $item->id }}/edit"><span
                                                                    class="badge badge-lg light badge-warning">Dinsos
                                                                    Belum Update</span></a>
                                                        @endif
                                                    @else
                                                        <br>
                                                        @if ($item->status_dinsos == 1)
                                                            <span class="badge badge-lg light badge-success">Dinsos
                                                                Selesai</span>
                                                        @else
                                                            <span class="badge badge-lg light badge-warning">Dinsos
                                                                Belum Update</span>
                                                        @endif
                                                    @endif





                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Anak</th>
                                            <th>Nama Ibu</th>
                                            <th>Kelurahan</th>
                                            <th>Tanggal</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="container">
                                    {{-- {{ $aktelahir->links() }} --}}
                                </div>
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
    <!-- Datatable -->
    <script src="{{ asset('') }}assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/js/plugins-init/datatables.init.js"></script>
@endSection



<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
    integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        // Department Change
        $('#kabkota').change(function() {

            // Department id
            var id = $(this).val();

            // Empty the dropdown
            $('#kecamatan').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/get_kecamatan/dptcaleg/' + id,
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

                            $("#kecamatan").append(option);
                        }
                    }

                }
            });
        });
    });
</script>

{{-- get kelurahan --}}
<script>
    $(document).ready(function() {

        // Department Change
        $('#kecamatan').change(function() {
            var id = $(this).val();
            // Empty the dropdown
            $('#kelurahandesa').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/get_kelurahandesa/dptcaleg/' + id,
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

                            $("#kelurahandesa").append(option);
                        }
                    }

                }
            });
        });
    });
</script>
