<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DESA PENGGARUTAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" <link rel="icon" href="{{ asset('assets/images/logo-desa-penggarutan.jpeg') }}"
        type="image/png">

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Libraries CSS --}}
    <link href="{{ asset('assets/landing-page/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing-page/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing-page/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landing-page/css/style.css') }}" rel="stylesheet">
</head>

<body style="overflow-x: hidden;">
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="container-fluid position-relative p-0" style="overflow-x: hidden;">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><img src="{{ asset('assets/images/logo-desa-penggarutan.jpeg') }}"
                        alt="">
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Beranda</a>
                    <a href="{{ route('home.tentang') }}" class="nav-item nav-link">Tentang</a>
                    <div class=" nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('pengajuan.sktm') }}" class="dropdown-item">Surat Keterangan Tidak
                                Mampu</a>
                            <a href="{{ route('pengajuan.sik') }}" class="dropdown-item">Surat Ijin Keramaian</a>
                            <a href="{{ route('pengajuan.skdtt') }}" class="dropdown-item">Surat Keterangan
                                Domisili</a>
                            <a href="{{ route('pengajuan.skdu') }}" class="dropdown-item">Surat Keterangan
                                Domisili Usaha</a>
                            <a href="{{ route('pengajuan.sku') }}" class="dropdown-item">Surat Keterangan Umum</a>
                            <a href="{{ route('pengajuan.skus') }}" class="dropdown-item">Surat Keterangan Usaha</a>
                            <a href="{{ route('pengajuan.skck') }}" class="dropdown-item">Surat Pengantar SKCK</a>
                            <a href="{{ route('pengajuan.skk') }}" class="dropdown-item">Surat Keterangan
                                Kelahiran</a>
                            <a href="{{ route('pengajuan.skke') }}" class="dropdown-item">Surat Keterangan
                                Kematian</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.login') }}" class="btn btn-primary px-5">Masuk</a>
            </div>
        </nav>
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <img src="{{ asset('assets/landing-page/img/desa.jpeg') }}" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="carousel-caption-content p-3">
                        <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Selamat Datang
                            di Website Resmi</h5>
                        <!-- <h3 class="display-1 text-capitalize text-white mb-4">Website Resmi</h3> -->
                        <h1 class="display-1 text-capitalize text-white mb-4">Desa Penggarutan</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid about bg-light py-5" style="overflow-x: hidden;">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img pb-5 ps-5">
                        <img src="{{ asset('assets/landing-page/img/desa.jpeg') }}" class="img-fluid rounded w-100"
                            style="object-fit: cover;" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="section-title text-start mb-5">
                        <h4 class="sub-title pe-3 mb-3">Tentang Desa Penggarutan</h4>
                        <p class="mb-4">
                            Desa ini memiliki sejarah dan potensi yang menarik, baik dari segi geologi, ekonomi, maupun
                            pariwisata.
                            <br><br>
                            Dari segi geologi, Desa Penggarutan dan sekitarnya memiliki morfologi perbukitan yang
                            terdiri
                            dari singkapan batuan vulkanik dan sedimen, mencerminkan sejarah geologi yang kaya. Daerah
                            ini terbagi menjadi beberapa satuan geomorfologi, seperti Satuan Punggungan Aliran
                            Piroklastik Penggarutan.​.
                        </p>
                        <a href="{{ route('home.tentang') }}"
                            class="btn btn-primary rounded-pill text-white py-3 px-5">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid feature py-5" style="overflow-x: hidden;">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">Penduduk Desa Penggarutan</h4>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-users fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Jumlah Penduduk</h5>
                                <h1><?= $penduduk ?> <span style="font-size: 12pt;">Jiwa</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-chalkboard-teacher fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Jumlah Kartu Keluarga</h5>
                                <h1><?= $kk ?> <span style="font-size: 12pt;">KK</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-male fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Jumlah Pria</h5>
                                <h1><?= $perempuan ?> <span style="font-size: 12pt;">Jiwa</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-female fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Jumlah Wanita</h5>
                                <h1><?= $laki ?> <span style="font-size: 12pt;">Jiwa</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a href="#" class="btn btn-primary rounded-pill text-white py-3 px-5">Detail Statistik</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid about bg-light py-5" style="overflow-x: hidden;">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="section-title text-start mb-5">
                        <h4 class="sub-title pe-3 mb-0">Sambutan Kepala Desa Penggarutan</h4>
                        <!-- <h1 class="display-3 mb-4">Desa Penyarang</h1> -->
                        <p class="mb-4">
                            Assalamu’alaikum warahmatullahi wabarakatuh,
                            <br>
                            <br>
                            Yang saya hormati, para tokoh masyarakat, perangkat desa, serta seluruh warga Desa
                            Penggarutan
                            yang saya cintai.
                            <br>
                            <br>
                            Pertama-tama, marilah kita panjatkan puji dan syukur ke hadirat Allah SWT atas limpahan
                            rahmat dan hidayah-Nya, sehingga kita dapat berkumpul pada kesempatan ini dalam keadaan
                            sehat wal’afiat.
                            <br>
                            <br>
                            Sebagai Kepala Desa Penggarutan, saya ingin menyampaikan terima kasih atas kepsercayaan dan
                            dukungan dari seluruh masyarakat dalam membangun desa kita tercinta. Dengan semangat
                            kebersamaan dan gotong royong, mari kita terus bekerja untuk kemajuan desa, meningkatkan
                            kesejahteraan masyarakat, serta menjaga nilai-nilai budaya dan tradisi yang telah diwariskan
                            oleh leluhur kita.
                            <br>
                            <br>
                            Saya berharap Desa Penggarutan dapat terus berkembang, menjadi desa yang mandiri, sejahtera,
                            dan berdaya saing. Dengan adanya dukungan dari seluruh pihak, insyaAllah kita dapat
                            mewujudkan desa yang lebih baik di masa depan.
                            <br>
                            <br>
                            Akhir kata, saya mengajak seluruh masyarakat untuk tetap menjaga persatuan dan bekerja sama
                            dalam membangun Desa Penggarutan agar lebih maju dan harmonis.
                            <br>
                            <br>
                            Wassalamu’alaikum warahmatullahi wabarakatuh.
                            <br>
                            <br>
                            [ROSYI IBNU HIDAYAT]
                            <br>
                            <br>
                            Kepala Desa Penggarutan

                        </p>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img pb-5 ps-5">
                        <img src="{{ asset('assets/landing-page/img/kepala-desa.png') }}"
                            class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                        <!-- <div class="about-img-inner">
                            <img src="assets/landing-page/img/about-2.jpg" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid feature py-5" style="overflow-x: hidden;">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">Potensi</h4>
                </div>
                <h1 class="display-3 mb-4">Potensi Desa Penggarutan</h1>
                <p class="mb-0">Desa Penggarutan memiliki beberapa potensi yang sangat besar dibeberapa bidang
                    diantaranya
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-seedling fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Pertanian</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-tree fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Perkebunan</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-paw fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Peternakan</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row-cols-1 feature-item p-4">
                        <div class="col-12">
                            <div class="feature-icon mb-4">
                                <div class="p-3 d-inline-flex bg-white rounded">
                                    <i class="fas fa-mountain fa-4x text-primary"></i>
                                </div>
                            </div>
                            <div class="feature-content d-flex flex-column">
                                <h5 class="mb-4">Pariwisata</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href=""><i
                                class="fas fa-copyright text-light me-2"></i>penggarutan.desa.id</a>, All right
                        reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/landing-page/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/landing-page/js/main.js') }}"></script>
</body>

</html>
