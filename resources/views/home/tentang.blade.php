@extends('layouts.guest')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Tentang</h1>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active text-primary">Tentang</li>
                </ol>
        </div>
    </div>
    <div class="container-fluid about bg-light py-5" style="overflow-x: hidden;">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <div class="about-img pb-5 ps-5">
                        <img src="{{ asset('assets/landing-page/img/balai-desa-penyarang.jpeg') }}"
                            class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s"
                    style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
                    <div class="section-title text-start mb-5">
                        <h4 class="sub-title pe-3 mb-0">Tentang Desa Penyarang</h4>
                        <h1 class="display-3 mb-4">Desa Penyarang</h1>
                        <p class="mb-4">Desa Penyarang terletak di Kecamatan Sidareja, Kabupaten Cilacap, Jawa Tengah.
                            Desa ini memiliki 4 Dusun diantaranya yaitu ada Dusun Cisagu, Dusun Penyarang, Dusun
                            Karangsalam, Dusung Karangbolang
                            Desa ini memiliki sejarah dan potensi yang menarik, baik dari segi geologi, ekonomi, maupun
                            pariwisata.
                            <br><br>
                            Dari segi geologi, Desa Penyarang dan sekitarnya memiliki morfologi perbukitan yang terdiri
                            dari singkapan batuan vulkanik dan sedimen, mencerminkan sejarah geologi yang kaya. Daerah
                            ini terbagi menjadi beberapa satuan geomorfologi, seperti Satuan Punggungan Aliran
                            Piroklastik Penyarang dan Satuan Lembah Antiklin Rungkang​.
                            <br>
                            Desa penyarang mempunyai Visi dan Misi diantaranya:
                        </p>
                        <div class="d-flex">
                            <div class="mb-4">
                                <p class="mb-4">Visi</p>
                                <div class="mb-4">
                                    <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Refresing to get
                                        such a personal touch.</p>
                                    <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Duis aute irure
                                        dolor in reprehenderit in voluptate.</p>
                                    <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Velit esse
                                        cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                            <div class="mb-4">
                                <p class="mb-4">Misi</p>
                                <div class="mb-4">
                                    <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Refresing to get
                                        such a personal touch.</p>
                                    <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Duis aute irure
                                        dolor in reprehenderit in voluptate.</p>
                                    <p class="text-secondary"><i class="fa fa-check text-primary me-2"></i> Velit esse
                                        cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
