@extends('template.main')

@section('header')
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/datatables/css/jquery.dataTables.min.css">
    <meta http-equiv="refresh" content="60">
@endSection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/perkara/">Data</a></li>
                    <li class="breadcrumb-item"><a href="">Data Keputusan PN Manado</a></li>
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
                            {{-- <div class="col-md-4">
                                <a href="/admindpd/create" class="btn btn-block btn-primary"><span
                                        class="btn-icon-start text-primary"><i class="fa fa-plus"></i>
                                    </span>Tambah Admin DPD</a>
                            </div> --}}
                            @if (auth()->user()->level == 5)
                                <a class="btn btn-primary" href="/putusanpn/create"> Tambah
                                </a>
                                <hr>
                            @endif


                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No. Keputusan</th>
                                            <th>Tanggal</th>
                                            <th>File</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($putusanpn as $item)
                                            <tr>
                                                <td>{{ $item->nomor_perkara ?? null }}</td>
                                                <td>{{ $item->tanggal ?? null }} </td>
                                                <td> <a href="{{ asset('storage/' . $item->file) }}" class="btn btn-primary"
                                                        target="_blank">File
                                                        PDF</a>
                                                </td>
                                                <td>
                                                    @if (auth()->user()->level == 5)
                                                        <a href="/putusanpn/{{ $item->id }}/edit"
                                                            class="btn btn-primary"> Edit
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No. Keputusan</th>
                                            <th>Tanggal</th>
                                            <th>File</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                </table>
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

    <script></script>
@endSection
