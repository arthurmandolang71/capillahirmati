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


                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No. Keputusan</th>
                                            <th>Katagori</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perkara as $item)
                                            <tr>
                                                <td>Penggugta/Pelapor : <b>{{ $item->nama ?? null }} </b>
                                                    <br> Tergugat : <b>{{ $item->tergugat ?? '-' }} </b>
                                                    <br> Kontak
                                                    <b> {{ $item->nomor_hp ?? null }} </b>
                                                </td>
                                                <td>{{ $item->nomor_perkara ?? null }} <br> {{ $item->tanggal ?? null }}
                                                </td>
                                                <td>{{ $item->katagori }} </td>
                                                <td>
                                                    @if ($item->status == 'Perlu Konfirmasi')
                                                        <span class="badge badge-lg light badge-warning">Perlu
                                                            Konfirmasi</span>
                                                    @endif

                                                    @if ($item->status == 'Tidak Valid')
                                                        <span class="badge badge-lg light badge-danger">Tidak Valid
                                                        </span>
                                                    @endif

                                                    @if ($item->status == 'Valid')
                                                        <span class="badge badge-lg light badge-success">Valid
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/perkara/{{ $item->id }}/edit"> <span
                                                            class="badge badge-lg light badge-warning">Tinjau</span> </a>
                                                    @if (auth()->user()->level == 2)
                                                        <br> <br>
                                                        <a href="https://wa.me/6282229532675?text=Ada Laporan Baru dari Disdukcapil Manado dengan Nomor Perkara {{ $item->nomor_perkara }} mohon di tindaklanjuti. "
                                                            target="_blank">
                                                            <span class="badge badge-lg light badge-default">Kirim
                                                                Notif</span>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Pelapor</th>
                                            <th>No. Keputusan</th>
                                            <th>Katagori</th>
                                            <th>Status</th>
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

    <script>
        function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            swal({
                    title: "Apakah anda yakin menghapus menghapus pengguna ?",
                    text: "jika benar silakan tekan Yes, Saya Yakin.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Saya Yakin!",
                    cancelButtonText: "Tidak, Saya tidak Yakin!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        form.submit(); // submitting the form when user press yes
                    } else {
                        swal("dibatalkan", "data anda dibatalkan :)", "error");
                    }
                });
        }
    </script>
@endSection
