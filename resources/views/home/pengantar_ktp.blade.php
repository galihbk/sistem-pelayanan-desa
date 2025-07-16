@extends('layouts.guest')
@section('content')
    <div class="container-fluid bg-breadcrumb" style="overflow-x: hidden;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h1 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Layanan</h1>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary"><?= $title ?></li>
            </ol>
        </div>
    </div>
    <div class="row g-4 justify-content-center" style="overflow-x: hidden;">
        <div class="container-fluid contact py-5" style="overflow-x: hidden;">
            <div class="container py-5">
                <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style mb-4">
                        <h4 class="sub-title text-white px-3 mb-0">Form <?= $title ?></h4>
                    </div>
                    <p class="mb-0 text-black-50">Harap isi semua form yang ada dibawah ini untuk surat pengantar KTP!</p>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-lg-12 col-xl-12 contact-form wow fadeInLeft" data-wow-delay="0.1s">
                        <form id="form-ktp">
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            name="nik" id="nik" placeholder="Masukan NIK KTP">
                                        <label for="name">NIK KTP</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="nama" name="nama" placeholder="Nama" readonly>
                                        <label for="email">Nama</label>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent border border-white"
                                            id="phone" name="email" placeholder="Email Aktif">
                                        <label for="phone">Email</label>
                                    </div>
                                </div> --}}
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="project" name="nomor" placeholder="Masukan Nomor WA Aktif">
                                        <label for="project">Nomor WA</label>
                                    </div>
                                </div>
                                <p class="text-white my-0 py-0" style="font-size: 12px;">*Jika NIK terdaftar di sistem desa
                                    maka data akan otomatis terisi.</p>
                                <p class="text-white my-0 py-0" style="font-size: 12px;">*Nomor WA dan email untuk
                                    konfirmasi bahwa pengajuan.</p>
                                <div class="col-12">
                                    <button class="btn btn-light text-primary w-100 py-3">Ajukan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#nik').on('blur', function() {
                var nik = $(this).val();
                $.ajax({
                    url: '{{ route('home.cek-nik') }}',
                    type: 'POST',
                    data: {
                        nik: nik
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#nama').val(response.nama);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
            $('#form-ktp').submit(function(e) {
                e.preventDefault()
                var nik = $(this).val();
                if (nik != '') {
                    var form = $(this).serialize()
                    $.ajax({
                        url: '{{ route('home.upload-pengajuan', 'ktp') }}',
                        type: 'POST',
                        data: form,
                        success: function(data) {
                            if (data.status == 'success') {
                                alert(data.message)
                                location.reload();
                            } else {
                                alert(data.message)
                                location.reload();

                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    })
                } else {
                    alert('Form harus di isi semua');
                }
            })
        })
    </script>
@endsection
