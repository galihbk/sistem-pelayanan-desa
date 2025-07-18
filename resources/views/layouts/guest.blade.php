<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="{{ asset('assets/images/logo-desa-penggarutan.jpeg') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap"
        rel="stylesheet">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

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
    <div class="container-fluid position-relative p-0">
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
    </div>
    @yield('content')
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
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apex-custom.js') }}"></script>
    @yield('script')

</body>

</html>
