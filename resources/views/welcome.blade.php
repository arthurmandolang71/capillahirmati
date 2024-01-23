\@extends('template.main')

@section('header')
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/datatables/css/jquery.dataTables.min.css">
@endSection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/welcome/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href=""></a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4  col-md-4 col-xxl-4 ">

                                    {{-- <img src="{{ asset('') }}assets/images/avatar/1.png" width="200"> --}}


                                </div>
                                <!--Tab slider End-->
                                <div class="col-xl-8 col-lg-8  col-md-8 col-xxl-8 col-sm-8">
                                    <div class="product-detail-content">
                                        <!--Product details-->
                                        <div class="new-arrival-content pr">


                                            <div class="d-table mb-2">
                                                <p class="price float-start d-block">Selamat Datang</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
