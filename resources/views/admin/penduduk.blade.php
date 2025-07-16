@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <h5 class="mb-0 text-uppercase"><?= $title ?></h5>
            <hr>
            <div class="col">
                <div class="card border-start border-0 border-3 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddAnggota"
                                    class="btn btn-sm btn-primary">
                                    <i class="bx bx-plus"></i> Tambah Penduduk
                                </a>
                            </div>

                            <div class="ms-auto">
                                <a href="{{ route('export_excell/penduduk') }}" target="_blank" class="btn btn-sm btn-info"><i
                                        class="fas fa-file-csv"></i> Export Excell</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Validasi Gagal!</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="tabel-anggota">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Status Kawin</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAddAnggota" tabindex="-1" aria-labelledby="modalAddAnggotaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="form-add-anggota" action="{{ route('penduduk.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddAnggotaLabel">Tambah Anggota Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" onclick="this.showPicker()">
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Agama</label>
                            <select name="agama" class="form-control" required>
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pendidikan</label>
                            <input type="text" name="pendidikan" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-control" required>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Hubungan dalam Keluarga</label>
                            <select name="hubungan_dalam_keluarga" class="form-control" required>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Kewarganegaraan</label>
                            <select name="kewarganegaraan" class="form-control" required>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Nomor KK</label>
                            <input type="text" name="nomor_kk" id="nomor_kk" class="form-control" required
                                autocomplete="off">
                            <div class="list-group" id="kk-list" style="position:absolute; z-index:999;"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modalEditAnggota" tabindex="-1" aria-labelledby="modalEditAnggotaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="form-edit-anggota" action="{{ route('penduduk.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditAnggotaLabel">Edit Anggota Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label>NIK</label>
                            <input type="text" name="nik_edit" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap_edit" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir_edit" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir_edit" class="form-control" onclick="this.showPicker()">
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin_edit" class="form-control" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Agama</label>
                            <select name="agama_edit" class="form-control" required>
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Pendidikan</label>
                            <input type="text" name="pendidikan_edit" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan_edit" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan_edit" class="form-control" required>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Hubungan dalam Keluarga</label>
                            <select name="hubungan_dalam_keluarga_edit" class="form-control" required>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Kewarganegaraan</label>
                            <select name="kewarganegaraan_edit" class="form-control" required>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah_edit" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Nama Ibu</label>
                            <input type="text" name="nama_ibu_edit" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Nomor KK</label>
                            <input type="text" name="nomor_kk_edit" id="nomor_kk" class="form-control" required
                                autocomplete="off">
                            <div class="list-group" id="kk-list_edit" style="position:absolute; z-index:999;"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modalDeletePenduduk" tabindex="-1" aria-labelledby="modalDeletePendudukLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('penduduk.store') }}" id="formDeletePenduduk" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Penduduk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nik_delete" class="form-label">NIK</label>
                            <input type="text" name="nik_delete" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama_delete" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_delete" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#nomor_kk').keyup(function() {
                console.log('test')
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "{{ route('kk.autocomplete') }}",
                        method: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#kk-list').fadeIn();
                            $('#kk-list').html(data);
                        }
                    });
                } else {
                    $('#kk-list').fadeOut();
                }
            });
            $('#nomor_kk_edit').keyup(function() {
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "{{ route('kk.autocomplete') }}",
                        method: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#kk-list_edit').fadeIn();
                            $('#kk-list_edit').html(data);
                        }
                    });
                } else {
                    $('#kk-list_edit').fadeOut();
                }
            });

            $(document).on('click', '.kk-item', function() {
                $('#nomor_kk').val($(this).text());
                $('#kk-list').fadeOut();
                $('#nomor_kk_edit').val($(this).text());
                $('#kk-list_edit').fadeOut();
            });
            $('#tabel-anggota').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('penduduk.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'pendidikan',
                        name: 'pendidikan'
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan'
                    },
                    {
                        data: 'status_perkawinan',
                        name: 'status_perkawinan'
                    },

                ]
            });
            $('#tabel-anggota').on('click', '.editData', function() {
                var id = $(this).data('id')
                var formData = new FormData()
                formData.append('_token','{{csrf_token()}}')
                $.ajax({
                    type: "POST",
                    url: "{{route('penduduk.detail','__id')}}".replace('__id',id),
                    data: formData,
                    cache : false,
                    processData: false,
                    contentType: false,
                    success: function(res){
                        console.log(res)
                        $('#form-edit-anggota').prop('action',"{{route('penduduk.edit','__id')}}".replace('__id',id))
                        $('#form-edit-anggota').find('[name=nik_edit]').val(res.nik)
                        $('#form-edit-anggota').find('[name=nama_lengkap_edit]').val(res.nama_lengkap)
                        $('#form-edit-anggota').find('[name=tanggal_lahir_edit]').val(res.tanggal_lahir)
                        $('#form-edit-anggota').find('[name=tempat_lahir_edit]').val(res.tempat_lahir)
                        $('#form-edit-anggota').find('[name=jenis_kelamin_edit]').val(res.jenis_kelamin)
                        $('#form-edit-anggota').find('[name=agama_edit]').val(res.agama)
                        $('#form-edit-anggota').find('[name=pendidikan_edit]').val(res.pendidikan)
                        $('#form-edit-anggota').find('[name=pekerjaan_edit]').val(res.pekerjaan)
                        $('#form-edit-anggota').find('[name=status_perkawinan_edit]').val(res.status_perkawinan)
                        $('#form-edit-anggota').find('[name=hubungan_dalam_keluarga_edit]').val(res.hubungan_dalam_keluarga)
                        $('#form-edit-anggota').find('[name=kewarganegaraan_edit]').val(res.kewarganegaraan)
                        $('#form-edit-anggota').find('[name=nama_ayah_edit]').val(res.nama_ayah)
                        $('#form-edit-anggota').find('[name=nama_ibu_edit]').val(res.nama_ibu)
                        $('#form-edit-anggota').find('[name=nomor_kk_edit]').val(res.nomor_kk)
                        $('#modalEditAnggota').modal('show')
                    }
                });
            })
            $('#modalEditAnggota').on('hidden.bs.modal',function(){
                $('#form-edit-anggota').prop('action',"{{route('penduduk.edit','__id')}}")
            })
            $('#tabel-anggota').on('click', '.deleteData', function() {
                var id = $(this).data('id')
                var formData = new FormData()
                formData.append('_token','{{csrf_token()}}')
                $.ajax({
                    type: "POST",
                    url: "{{route('penduduk.detail','__id')}}".replace('__id',id),
                    data: formData,
                    cache : false,
                    processData: false,
                    contentType: false,
                    success: function(res){
                        $('#formDeletePenduduk').prop('action',"{{route('penduduk.delete','__id')}}".replace('__id',id))
                        $('#formDeletePenduduk').find('[name=nik_delete]').val(res.nik)
                        $('#formDeletePenduduk').find('[name=nama_delete]').val(res.nama_lengkap)
                        $('#modalDeletePenduduk').modal('show')
                    }
                });
            })
        });
    </script>
@endsection
