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
                            @php
                                if ($total_capil) {
                                    $persen_capil = ($total_capil / $total_berkas) * 100;
                                }
                                if ($total_bpjs) {
                                    $persen_bpjs = ($total_bpjs / $total_capil) * 100;
                                }
                                if ($total_dinsos) {
                                    $persen_dinsos = ($total_dinsos / $total_capil) * 100;
                                }
                            @endphp

                            @if (auth()->user()->level == 2)
                                <div class="card-body col-md-5">
                                    <h4 class="card-title">Akte yang diterbikan Disdukcapil</h4>
                                    <div class="d-flex align-items-center">

                                        <div class="me-auto">
                                            <div class="progress mt-8" style="height:10px;">
                                                <div class="progress-bar bg-success progress-animated"
                                                    style="width: {{ $persen_capil ?? null }}%; height:10px;"
                                                    role="progressbar">
                                                </div>
                                            </div>
                                            <p class="fs-16 mb-0 mt-2"><span class="text-info">{{ $persen_capil ?? null }}%
                                                    dari total pengajuan stakholder (Rumah Sakit/Kelurahan)</span>
                                            </p>
                                        </div>
                                        <h2 class="fs-38">{{ $total_capil ?? null }}</h2>
                                    </div>
                                </div>
                            @endif

                            @if (auth()->user()->level == 3)
                                <div class="card-body col-md-5">
                                    <h4 class="card-title">Berkas yang ditanggapi BPJS</h4>
                                    <div class="d-flex align-items-center">

                                        <div class="me-auto">
                                            <div class="progress mt-8" style="height:10px;">
                                                <div class="progress-bar bg-success progress-animated"
                                                    style="width: {{ $persen_bpjs ?? null }}%; height:10px;"
                                                    role="progressbar">
                                                </div>
                                            </div>
                                            <p class="fs-16 mb-0 mt-2"><span class="text-info">{{ $persen_capil ?? null }}%
                                                    dari total pengajuan stakholder (Rumah Sakit/Kelurahan)</span>
                                            </p>
                                        </div>
                                        <h2 class="fs-38">{{ $total_bpjs ?? null }}</h2>
                                    </div>
                                </div>
                            @endif

                            @if (auth()->user()->level == 4)
                                <div class="card-body col-md-5">
                                    <h4 class="card-title">Berkas yang ditanggapi Dinas Sosial</h4>
                                    <div class="d-flex align-items-center">

                                        <div class="me-auto">
                                            <div class="progress mt-8" style="height:10px;">
                                                <div class="progress-bar bg-success progress-animated"
                                                    style="width: {{ $persen_dinsos ?? null }}%; height:10px;"
                                                    role="progressbar">
                                                </div>
                                            </div>
                                            <p class="fs-16 mb-0 mt-2"><span class="text-info">{{ $persen_dinsos ?? null }}%
                                                    dari total pengajuan stakholder (Rumah Sakit/Kelurahan)</span>
                                            </p>
                                        </div>
                                        <h2 class="fs-38">{{ $total_dinsos ?? null }}</h2>
                                    </div>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="example" class="table table-striped display" style="width:100%">
                                    <thead>
                                        <tr>
                                            @if (auth()->user()->level != 1)
                                                <th>Stakeholder</th>
                                            @endif
                                            <th>Nama Bayi</th>
                                            <th>Nama Ibu Kandung</th>
                                            <th>Kartu Keluarga</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Progress</th>
                                            <th>File</th>
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
                                                <td> <a href="{{ asset('storage/' . $item->file_kartu_keluarga) }}"
                                                        target="_blank"><span
                                                            class="badge badge-lg light badge-info">{{ $item->no_kk }}
                                                        </span>
                                                    </a>
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
                                                <td>
                                                    <br>
                                                    @if ($item->file_akte_lahir)
                                                        <a href="{{ asset('storage/' . $item->file_akte_lahir) }}"
                                                            target="_blank"><span
                                                                class="badge badge-lg light badge-success">Akte
                                                                Lahir</span></a>
                                                    @endif
                                                    <br>
                                                    @if ($item->file_kk_baru)
                                                        <a href="{{ asset('storage/' . $item->file_kk_baru) }}"
                                                            target="_blank"><span
                                                                class="badge badge-lg light badge-success">Kartu
                                                                Keluarga</span></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            @if (auth()->user()->level != 1)
                                                <th>Stakeholder</th>
                                            @endif
                                            <th>Nama Bayi</th>
                                            <th>Nama Ibu Kandung</th>
                                            <th>Kartu Keluaraga</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Progress</th>
                                            <th>File</th>
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
@endSection
