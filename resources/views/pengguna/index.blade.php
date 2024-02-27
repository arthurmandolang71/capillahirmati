@extends('template.main')

@section('header')
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/datatables/css/jquery.dataTables.min.css">
@endSection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/pengguna/">Stakeholder</a></li>
                    <li class="breadcrumb-item"><a href="">Data Stakoholder</a></li>
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
                                            <th>username</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengguna as $item)
                                            <tr>
                                                <td>{{ $item->name ?? null }}</td>
                                                <td>{{ $item->username ?? null }}</td>
                                                <td>{{ $item->katagori ?? 'Lainya' }} </td>
                                                <td>
                                                    @if ($item->active == 1)
                                                        <span class="badge badge-lg light badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-lg light badge-danger">Tidak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/pengguna/{{ $item->id }}/edit"> <span
                                                            class="badge badge-lg light badge-warning">Edit</span> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>username</th>
                                            <th>Kategori</th>
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
