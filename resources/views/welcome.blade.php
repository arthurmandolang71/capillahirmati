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
                                    @if (auth()->user()->foto_profil)
                                        <img src="{{ auth()->user()->foto_profil }}" width="200" alt="" />
                                    @else
                                        <img src="{{ asset('') }}assets/images/avatar/1.png" width="200">
                                    @endif

                                </div>
                                <!--Tab slider End-->
                                <div class="col-xl-8 col-lg-8  col-md-8 col-xxl-8 col-sm-8">
                                    <div class="product-detail-content">
                                        <!--Product details-->
                                        <div class="new-arrival-content pr">
                                            <img src="{{ asset('') }}assets/images/logo/{{ $profil_caleg->partai->logo }}"
                                                class="logo-abbr" width="53" height="53">
                                            <h4>{{ $profil_caleg->partai->nama }}</h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>

                                            </div>
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
