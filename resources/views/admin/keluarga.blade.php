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
                                <a href="{{ route('export_excell/kk') }}" target="_blank" class="btn btn-sm btn-info"><i
                                        class="fas fa-file-csv"></i> Export Excell</a>
                            </div>
                            <div class="me-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalImportExcellKK"
                                    class="btn btn-sm btn-warning"><i class="fas fa-file-csv"></i> Import Excell</a>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ asset('assets/document/excel/template-kartu-keluarga.xlsx') }}" target="_blank"
                                    class="btn btn-sm btn-primary"><i class="bx bx-download"></i> Template
                                    Import</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Aksi</th>
                                    <th>NKK</th>
                                    <th>NIK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Anggota Keluarga</th>
                                </tr>
                            </thead>
                            <tbody id="show-kk">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalImportExcellKK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-add-kk">
                        <div class="mb-3">
                            <label for="nkk" class="form-label">Data Kartu Keluarga (.xlsx)</label>
                            <input type="file" class="form-control" id="file" name="file"
                                accept="application/xlsx">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
