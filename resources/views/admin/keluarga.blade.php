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
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalAddManualKK">
                                <i class="bx bx-plus"></i> Tambah Data
                            </a>

                            <div class="ms-auto">
                                <a href="{{ route('export_excell/kk') }}" target="_blank" class="btn btn-sm btn-info"><i
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
                        <table id="datatable-kk" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Aksi</th>
                                    <th>Nomor KK</th>
                                    <th>NIK</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>Dusun</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAddManualKK" tabindex="-1" aria-labelledby="modalAddManualKKLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('kk.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddManualKKLabel">Tambah Kartu Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nkk" class="form-label">Nomor Kartu Keluarga (NKK)</label>
                            <input type="text" name="nkk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="dusun" class="form-label">Dusun</label>
                            <input type="text" name="dusun" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="rt" class="form-label">RT</label>
                            <input type="text" name="rt" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="rw" class="form-label">RW</label>
                            <input type="text" name="rw" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modalEditManualKK" tabindex="-1" aria-labelledby="modalEditManualKKLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('kk.store') }}" id="formEditKK" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditManualKKLabel">Edit Kartu Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nkk_edit" class="form-label">Nomor Kartu Keluarga (NKK)</label>
                            <input type="text" name="nkk_edit" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="dusun_edit" class="form-label">Dusun</label>
                            <input type="text" name="dusun_edit" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="rt_edit" class="form-label">RT</label>
                            <input type="text" name="rt_edit" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="rw_edit" class="form-label">RW</label>
                            <input type="text" name="rw_edit" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modalDeleteManualKK" tabindex="-1" aria-labelledby="modalDeleteManualKKLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('kk.store') }}" id="formDeleteKK" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Kartu Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nkk_delete" class="form-label">Nomor Kartu Keluarga (NKK)</label>
                            <input type="text" name="nkk_delete" class="form-control" readonly>
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
            $('#datatable-kk').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('kk.data') }}',
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
                        data: 'nomor_kk',
                        name: 'nomor_kk'
                    },
                    {
                        data: 'nik_kepala',
                        name: 'ak.nik'
                    },
                    {
                        data: 'nama_kepala',
                        name: 'ak.nama_lengkap'
                    },
                    {
                        data: 'dusun',
                        name: 'dusun'
                    },
                    {
                        data: 'rt',
                        name: 'rt'
                    },
                    {
                        data: 'rw',
                        name: 'rw'
                    }
                ]
            });
            $('#datatable-kk').on('click', '.editData', function() {
                var id = $(this).data('id')
                var formData = new FormData()
                formData.append('_token','{{csrf_token()}}')
                $.ajax({
                    type: "POST",
                    url: "{{route('kk.detail','__id')}}".replace('__id',id),
                    data: formData,
                    cache : false,
                    processData: false,
                    contentType: false,
                    success: function(res){
                        $('#formEditKK').prop('action',"{{route('kk.edit','__id')}}".replace('__id',id))
                        $('#formEditKK').find('[name=nkk_edit]').val(res.nomor_kk)
                        $('#formEditKK').find('[name=dusun_edit]').val(res.dusun)
                        $('#formEditKK').find('[name=rt_edit]').val(res.rt)
                        $('#formEditKK').find('[name=rw_edit]').val(res.rw)
                        $('#modalEditManualKK').modal('show')
                    }
                });
            })
            $('#datatable-kk').on('click', '.deleteData', function() {
                var id = $(this).data('id')
                var formData = new FormData()
                formData.append('_token','{{csrf_token()}}')
                $.ajax({
                    type: "POST",
                    url: "{{route('kk.detail','__id')}}".replace('__id',id),
                    data: formData,
                    cache : false,
                    processData: false,
                    contentType: false,
                    success: function(res){
                        $('#formDeleteKK').prop('action',"{{route('kk.delete','__id')}}".replace('__id',id))
                        $('#formDeleteKK').find('[name=nkk_delete]').val(res.nomor_kk)
                        $('#modalDeleteManualKK').modal('show')
                    }
                });
            })
            $('#modalEditManualKK').on('hidden.bs.modal',function(){
                $('#formEditKK').prop('action',"{{route('kk.edit','__id')}}")
            })
            $('#modalDeleteManualKK').on('hidden.bs.modal',function(){
                $('#formDeleteKK').prop('action',"{{route('kk.delete','__id')}}")
            })
        });
    </script>
@endsection
