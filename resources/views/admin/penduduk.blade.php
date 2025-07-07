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
                                    <th>NKK</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
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
                        name: 'nik_kepala'
                    },
                    {
                        data: 'nama_kepala',
                        name: 'nama_kepala'
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
        });
    </script>
@endsection
