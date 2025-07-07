<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', ['title' => 'Dashboard']);
    }

    public function keluarga()
    {
        $kk = DB::table('kartu_keluarga')->count();
        return view('admin.keluarga', ['title' => 'Data Kartu Keluarga', 'kk' => $kk]);
    }
    public function penduduk()
    {
        $penduduk = DB::table('anggota_keluarga')->count();
        return view('admin.penduduk', ['title' => 'Data Penduduk', 'penduduk' => $penduduk]);
    }

    public function storeKK(Request $request)
    {
        $request->validate([
            'nkk' => 'required|numeric|unique:kartu_keluarga,nomor_kk',
            'dusun' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
        ]);
        DB::table('kartu_keluarga')->insert([
            'nomor_kk' => $request->nkk,
            'dusun' => $request->dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data Kartu Keluarga berhasil ditambahkan.');
    }

    public function getDataKK()
    {
        $data = DB::table('kartu_keluarga as kk')
            ->leftJoin('anggota_keluarga as ak', function ($join) {
                $join->on('kk.nomor_kk', '=', 'ak.nomor_kk')
                    ->where('ak.hubungan_dalam_keluarga', '=', 'Kepala Keluarga');
            })
            ->select(
                'kk.id',
                'kk.nomor_kk',
                'kk.dusun',
                'kk.rt',
                'kk.rw',
                'ak.nik as nik_kepala',
                'ak.nama_lengkap as nama_kepala'
            );
        // dd($data);
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('nik_kepala', function ($row) {
                return $row->nik_kepala ?? '-';
            })
            ->editColumn('nama_kepala', function ($row) {
                return $row->nama_kepala ?? '-';
            })
            ->addColumn('aksi', function ($row) {
                return '<a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Hapus</a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function getPenduduk()
    {
        if (!Session::has('username')) {
            return redirect('admin-panel');
        }
        $penduduk = DB::table('anggota_keluarga')->get();
        return view('admin.table.table_penduduk', ['penduduk' => $penduduk]);
    }


    public function pengantarKTP()
    {
        return view('admin.pengantar-ktp', ['title' => 'Pengajuan Pengantar KTP']);
    }

    public function getPengajuan($jenis)
    {
        if ($jenis === 'ktp') {
            $pengajuan = DB::table('pengajuan_layanan')->get();
            return view('admin.table.table_pengajuan_ktp', ['pengajuan' => $pengajuan]);
        }
    }
}
