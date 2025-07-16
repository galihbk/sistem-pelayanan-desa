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
                        <h4 class="sub-title text-white px-3 mb-0">Form Pengajuan <?= $title ?></h4>
                    </div>
                    <p class="mb-0 text-black-50">Harap isi semua form yang ada dibawah ini untuk surat <?= $title ?>!</p>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-lg-12 col-xl-12 contact-form wow fadeInLeft" data-wow-delay="0.1s">
                        <form id="form-ktp">
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            name="nik" id="nik" placeholder="Masukan NIK KTP">
                                        <label for="nik">NIK KTP</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="nama" name="nama" placeholder="Nama" readonly>
                                        <label for="nama">Nama</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan">
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="nama_pemilik" name="nama_pemilik" placeholder="Nama Pemilik">
                                        <label for="nama_pemilik">Nama Pemilik</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Alamat Perusahaan">
                                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="status_perusahaan" name="status_perusahaan" placeholder="Status Perusahaan">
                                        <label for="status_perusahaan">Status Perusahaan</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="jumlah_karyawan" name="jumlah_karyawan" placeholder="Jumlah Karyawan">
                                        <label for="jumlah_karyawan">Jumlah Karyawan</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="luas_tempat_usaha" name="luas_tempat_usaha" placeholder="Luas Tempat Usaha">
                                        <label for="luas_tempat_usaha">Luas Tempat Usaha</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white"
                                            id="waktu_usaha" name="waktu_usaha" placeholder="Waktu Usaha">
                                        <label for="waktu_usaha">Waktu Usaha</label>
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
                                            id="nomor" name="nomor" placeholder="Masukan Nomor WA Aktif">
                                        <label for="nomor">Nomor WA</label>
                                    </div>
                                </div>
                                <p class="text-white my-0 py-0" style="font-size: 12px;">*Jika NIK terdaftar di sistem
                                    desa
                                    maka data akan otomatis terisi.</p>
                                <p class="text-white my-0 py-0" style="font-size: 12px;">*Nomor WA untuk
                                    konfirmasi pengajuan surat.</p>
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                var form = $(this).serialize()
                var formArray = $(this).serializeArray();
                $.ajax({
                    url: '{{ route('home.upload-pengajuan', 'skdu') }}',
                    type: 'POST',
                    data: form,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(xhr){
                        formArray.map((el) => {
                            $('[name='+el.name+']').removeClass('is-invalid')
                            $('[name='+el.name+']').parent().find('.invalid-feedback').remove()
                        })
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            alert(data.message)
                            location.reload();
                        } else {
                            alert(data.message)
                            // location.reload();

                        }
                    },
                    error: function(res) {
                        if(res.status == 422){
                            alert('Formulir Gagal diproses, Silahkan Cek Formulir Anda.');
                            if('responseJSON' in res){
                                var json = res.responseJSON
                                var keys = Object.keys(json.errors)
                                keys.map((key) => {
                                    $('[name='+key+']').addClass('is-invalid')
                                    $('[name='+key+']').parent().append('<div class="invalid-feedback">'+json.errors[key]+'</div>')
                                })
                            }
                        }else{
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    }
                })
            })
        })
    </script>
@endsection
