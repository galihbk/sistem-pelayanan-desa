<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSktm;
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
        return view('home.tentang', [
            'title' => 'Tentang Desa Penyarang',
            'page_of' => 'Tentang',
        ]);
    }

    public function sktm()
    {
        return view('home.sktm', [
            'title' => 'Surat Keterangan Tidak Mampu',
            'page_of' => 'Layanan',
        ]);
    }
    public function skdtt()
    {
        return view('home.skdtt', [
            'title' => 'Surat Keterangan Domisili Tempat Tinggal',
            'page_of' => 'Layanan',
        ]);
    }
    public function skdu()
    {
        return view('home.skdu', [
            'title' => 'Surat Keterangan Domisili Usaha',
            'page_of' => 'Layanan',
        ]);
    }
    public function sku()
    {
        return view('home.sku', [
            'title' => 'Surat Keterangan Umum',
            'page_of' => 'Layanan',
        ]);
    }
    public function skus()
    {
        return view('home.skus', [
            'title' => 'Surat Keterangan Usaha',
            'page_of' => 'Layanan',
        ]);
    }
    public function skk()
    {
        return view('home.skk', [
            'title' => 'Surat Keterangan Kelahiran',
            'page_of' => 'Layanan',
        ]);
    }
    public function skke()
    {
        return view('home.skke', [
            'title' => 'Surat Keterangan Kematian',
            'page_of' => 'Layanan',
        ]);
    }
    public function skck()
    {
        return view('home.skck', [
            'title' => 'Surat Pengantar Catatan Kepolisian',
            'page_of' => 'Layanan',
        ]);
    }
    public function sik()
    {
        return view('home.sik', [
            'title' => 'Surat Ijin Keramaian',
            'page_of' => 'Layanan',
        ]);
    }

    public function pengantarKTP()
    {
        return view('home.pengantar_ktp', [
            'title' => 'Pengajuan Surat Pengantar KTP',
            'page_of' => 'Surat Pengantar KTP',
        ]);
    }

    public function cekNIK(Request $request)
    {
        $nik = $request->post('nik');
        $penduduk = DB::table('anggota_keluarga')->where('nik', $nik)->first();
        // dd($penduduk->tanggal_lahir);
        if ($penduduk) {
            $tgl_lahir = Carbon::parse($penduduk->tanggal_lahir)->timezone('Asia/Jakarta');
            $umur = $tgl_lahir->diffInYears(Carbon::now('Asia/Jakarta'));
            // dd($tgl_lahir);
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
        if ($jenis == 'sktm') {
            $nik = $request->post('nik');
            $existing = PengajuanSktm::where(['nik' => $nik, 'status' => 0])->first();

            if (!$existing) {
                $insert = PengajuanSktm::create([
                    'nik' => $nik,
                    'wa' => $request->post('nomor'),
                ]);
                if ($insert) {
                    return response()->json(['status' => 'success', 'message' => 'Pengajuan berhasil disimpan, tunggu konfirmasi selanjutnya melalui pesan WA atau email']);
                } else {
                    return response()->json(['status' => 'failed', 'message' => 'Pengajuan gagal disimpan, silahkan ulangi lagi']);
                }
            }
            return response()->json(['status' => 'failed', 'message' => 'Anda sudah melakukan pengajuan sebelumnya']);
        }else if($jenis == 'sik'){
        }else if($jenis == 'skck'){
        }else if($jenis == 'skke'){
        }else if($jenis == 'skk'){
        }else if($jenis == 'skdu'){
        }else if($jenis == 'skdtt'){
        }else if($jenis == 'skus')}
            }
    }
}
