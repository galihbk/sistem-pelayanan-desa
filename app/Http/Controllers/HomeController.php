<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLayanan;
use App\Models\PengajuanLayananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $messages = [
            'nik.required' => 'NIK tidak boleh Kosong.',
            'nama.required' => 'Nama tidak boleh Kosong.',
            'nomor.required' => 'Nomor tidak boleh Kosong.',
            // SIK
            'maksud_keramaian.required' => 'Maksud Keramaian tidak boleh Kosong.',
            'tanggal_penyelenggaraan.required' => 'Tanggal Penyelenggaraan tidak boleh Kosong.',
            'jenis_hiburan.required' => 'Jenis Hiburan tidak boleh Kosong.',
            'jumlah_undangan.required' => 'Jumlah Undangan tidak boleh Kosong.',
            'tempat_penyelenggaraan.required' => 'Tempat Penyelenggaraan tidak boleh Kosong.',
            // SIK
            // SKDU
            'nama_perusahaan.required' => 'Nama Perusahaan tidak boleh Kosong.',
            'nama_pemilik.required' => 'Nama Pemilik Perusahaan tidak boleh Kosong.',
            'alamat_perusahaan.required' => 'Alamat Perusahaan tidak boleh Kosong.',
            'status_perusahaan.required' => 'Status Perusahaan tidak boleh Kosong.',
            'jumlah_karyawan.required' => 'Jumlah Karyawan tidak boleh Kosong.',
            'luas_tempat_usaha.required' => 'Luas Tempat Usaha tidak boleh Kosong.',
            'waktu_usaha.required' => 'Waktu Usaha tidak boleh Kosong.',
            // SKDU
            // SKU
            'keperluan.required' => 'Keperluan tidak boleh Kosong.',
            'keterangan_lain.required' => 'Keterangan Lain tidak boleh Kosong.',
            // SKU
            // SKUS
            'jenis_usaha.required' => 'Jenis Usaha tidak boleh Kosong.',
            'keperluan_surat.required' => 'Keperluan Surat tidak boleh Kosong.',
            // SKUS
            // SKUS
            'keperluan_skck.required' => 'Keperluan SKCK tidak boleh Kosong.'
            // SKUS
        ];
        $rules = [
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
        ];
        if ($jenis == 'sktm') {
        } else if ($jenis == 'sik') {
            $rules['maksud_keramaian'] = 'required|string|max:255';
            $rules['tanggal_penyelenggaraan'] = 'required';
            $rules['jenis_hiburan'] = 'required|string|max:255';
            $rules['jumlah_undangan'] = 'required|string|max:255';
            $rules['tempat_penyelenggaraan'] = 'required|string|max:255';
        } else if ($jenis == 'sku') {
            $rules['keperluan'] = 'required|string|max:255';
        }else if ($jenis == 'skck') {
            $rules['keperluan_skck'] = 'required|string|max:255';
        } else if ($jenis == 'skke') {
        } else if ($jenis == 'skk') {
        } else if ($jenis == 'skdu') {
            $rules['nama_perusahaan'] = 'required|string|max:255';
            $rules['nama_pemilik'] = 'required|string|max:255';
            $rules['alamat_perusahaan'] = 'required|string|max:255';
            $rules['status_perusahaan'] = 'required|string|max:255';
            $rules['jumlah_karyawan'] = 'required|string|max:255';
            $rules['luas_tempat_usaha'] = 'required|string|max:255';
            $rules['waktu_usaha'] = 'required|string|max:255';
        } else if ($jenis == 'skdtt') {
        } else if ($jenis == 'skus') {
            $rules['jenis_usaha'] = 'required|string|max:255';
            $rules['keperluan_surat'] = 'required|string|max:255';
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Jenis Pengajuan Tidak Tersedia']);
        }
        $validated = $request->validate($rules, $messages);
        $penduduk = DB::table('anggota_keluarga')->where('nik', $validated)->first();
        if(!$penduduk){
            return response()->json(['errors' => [
                'nik' => 'NIK tidak ditemukan'
            ], 'message' => 'NIK tidak ditemukan'])->setStatusCode(422);
        }
        $existing = PengajuanLayanan::where(['nik' => $validated['nik'], 'status' => 'pending','jenis_pengajuan' => $jenis])->first();
        if (!$existing) {
            $pengajuan = PengajuanLayanan::create([
                'jenis_pengajuan' => $jenis,
                'nik' => $validated['nik'],
                'nomor_wa' => $request->post('nomor'),
            ]);
            if ($pengajuan) {
                foreach($validated as $key => $val){
                    if(!in_array($key,['nik','nomor','nama'])){
                        PengajuanLayananDetail::create([
                            'pengajuan_id' => $pengajuan->id,
                            'nama' => $key,
                            'isi' => $val
                        ]);
                    }
                }
                return response()->json(['status' => 'success', 'message' => 'Pengajuan berhasil disimpan, tunggu konfirmasi selanjutnya melalui pesan WA atau email']);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Pengajuan gagal disimpan, silahkan ulangi lagi']);
            }
        }
        return response()->json(['status' => 'failed', 'message' => 'Anda sudah melakukan pengajuan sebelumnya']);
    }
}
