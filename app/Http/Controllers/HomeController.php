<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'penduduk' => DB::table('anggota_keluarga')->count(),
            'kk' => DB::table('kartu_keluarga')->count(),
            'perempuan' => DB::table('anggota_keluarga')->where('jenis_kelamin', 'P')->count(),
            'laki' => DB::table('anggota_keluarga')->where('jenis_kelamin', 'L')->count(),
            'struktural' => DB::table('struktural')->get(),
        ];

        return view('welcome', $data);
    }

    public function tentang()
    {
        return view('landing-page.profile.tentang', [
            'title' => 'Tentang Desa Penyarang',
            'page_of' => 'Tentang',
        ]);
    }

    public function sejarah()
    {
        return view('landing-page.profile.sejarah', [
            'title' => 'Sejarah Desa Penyarang',
            'page_of' => 'Sejarah',
        ]);
    }


    public function pengantarKTP()
    {
        return view('landing-page.profile.pengantar_ktp', [
            'title' => 'Pengajuan Surat Pengantar KTP',
            'page_of' => 'Surat Pengantar KTP',
        ]);
    }

    public function cekNIK(Request $request)
    {
        $nik = $request->post('nik');
        $penduduk = DB::table('anggota_keluarga')->where('nik', $nik)->first();

        if ($penduduk) {
            $tgl_lahir = Carbon::parse($penduduk->tanggal_lahir);
            $umur = Carbon::now()->diffInYears($tgl_lahir);

            if ($umur >= 17) {
                return response()->json(['status' => 'success', 'nama' => $penduduk->nama_lengkap]);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Anda belum 17 tahun']);
            }
        }

        return response()->json(['status' => 'failed', 'message' => 'Data penduduk dengan NIK tersebut tidak ada']);
    }

    public function uploadPengajuan(Request $request, $jenis = '')
    {
        $nik = $request->post('nik');
        $existing = DB::table('pengajuan_layanan')->where(['nik' => $nik, 'jenis_pengajuan' => $jenis])->first();

        if (!$existing) {
            $insert = DB::table('pengajuan_layanan')->insert([
                'jenis_pengajuan' => $jenis,
                'nik' => $nik,
                'nomor_wa' => $request->post('nomor'),
                'email' => $request->post('email'),
            ]);

            if ($insert) {
                return response()->json(['status' => 'success', 'message' => 'Pengajuan berhasil disimpan, tunggu konfirmasi selanjutnya melalui pesan WA atau email']);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Pengajuan gagal disimpan, silahkan ulangi lagi']);
            }
        }

        return response()->json(['status' => 'failed', 'message' => 'Anda sudah melakukan pengajuan sebelumnya']);
    }

    public function statistik()
    {
        return view('landing-page.profile.statistik', [
            'title' => 'Statistik Desa Penyarang',
            'page_of' => 'Statistik',
        ]);
    }
}
