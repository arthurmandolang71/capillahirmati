@extends('template.main')

@section('header')
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/datatables/css/jquery.dataTables.min.css">
@endSection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Download File</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Kelahiran</a></li>
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

                            <div class="table-responsive">
                                <table class="table table-striped display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama File</th>
                                            <th>keterangan</th>
                                            <th>Donwload</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Contoh Surat Keterangan Lahir Kelurahan</td>
                                            <td>Format ini digunakan jika bayi di lahirkan bukan di rumah sakit, klinik atau
                                                puskesmas. jika bayi dilahirkan di rumah dapat menggunakan format ini</td>
                                            <td><button class="btn me-2 btn-primary">download</button></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Contoh SPTJM Kelahiran</td>
                                            <td>Gunakan SPTJM Kelahiran jika jika bayi di lahirkan bukan di rumah sakit,
                                                klinik atau
                                                puskesmas</td>
                                            <td><button class="btn me-2 btn-primary">download</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama File</th>
                                            <th>keterangan</th>
                                            <th>Donwload</th>
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
