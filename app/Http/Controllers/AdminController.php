<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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

    public function tambahData($jenis = '')
    {
        $kk = DB::table('kartu_keluarga')->count();
        $view = $jenis === '1' ? 'admin.tambah-data-keluarga' : 'admin.tambah-data-penduduk';
        return view($view, ['title' => 'Tambah Data Kartu Keluarga', 'kk' => $kk]);
    }

    public function prosesAdd(Request $request, $jenis = '')
    {

        if ($jenis === 'kk') {
            $validator = Validator::make($request->all(), [
                'file' => 'required|file|mimes:xlsx|max:2048',
            ], [
                'file.required' => 'File data kartu keluarga harus diupload',
                'file.max' => 'Maksimal file 2Mb',
                'file.mimes' => 'File harus berupa file Excel (*.xlsx)',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => $validator->errors()]);
            }

            $file = $request->file('file');
            $filename = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/excel', $filename);

            $reader = new Xlsx();
            $spreadsheet = $reader->load(storage_path('app/' . $path));
            $rows = $spreadsheet->getActiveSheet()->toArray();

            $successCount = 0;
            foreach (array_slice($rows, 1) as $row) {
                if (DB::table('kartu_keluarga')->where('nomor_kk', $row[0])->doesntExist()) {
                    DB::table('kartu_keluarga')->insert([
                        'nomor_kk' => $row[0],
                        'dusun' => $row[1],
                        'rt' => $row[2],
                        'rw' => $row[3],
                    ]);
                    $successCount++;
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Data berhasil ditambahkan', 'jumlah_data' => $successCount]);
        }

        // Tambahan untuk jenis penduduk, informasi, dll bisa dilanjutkan serupa
    }

    public function getKK()
    {
        if (!Session::has('username')) {
            return redirect('admin-panel');
        }
        $kk = DB::table('kartu_keluarga')->get();
        return view('admin.table.table_kk', ['kk' => $kk]);
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
