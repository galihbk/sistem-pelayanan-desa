<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\AnggotaKeluarga;
use Illuminate\Validation\Rule;

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
    function detailKK($id) {
        $kk = DB::table('kartu_keluarga')->find($id);
        return response()->json($kk);
    }
    function detailPenduduk($id) {
        $penduduk = DB::table('anggota_keluarga')->find($id);
        return response()->json($penduduk);
    }
    public function storeKK(Request $request)
    {
        $request->validate([
            'nkk' => 'required|numeric|unique:kartu_keluarga,nomor_kk',
            'dusun' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string'
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
    public function editKK(Request $request,$id)
    {
        $kk = DB::table('kartu_keluarga')->find($id);
        $request->validate([
            'nkk_edit' => ["required","numeric",Rule::unique('kartu_keluarga', 'nomor_kk')->ignore($id)],
            'dusun_edit' => 'required|string',
            'rt_edit' => 'required|string',
            'rw_edit' => 'required|string',
        ]);
        DB::table('kartu_keluarga')->where(['id' => $id])->update([
            'nomor_kk' => $request->nkk_edit,
            'dusun' => $request->dusun_edit,
            'rt' => $request->rt_edit,
            'rw' => $request->rw_edit,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data Kartu Keluarga berhasil diubah.');
    }
    public function deleteKK(Request $request,$id)
    {
        $kk = DB::table('kartu_keluarga')->find($id);
        DB::table('kartu_keluarga')->delete($id);

        return redirect()->back()->with('success', 'Data Kartu Keluarga berhasil dihapus.');
    }
    public function storePenduduk(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:anggota_keluarga,nik|max:20',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_kk' => 'required|exists:kartu_keluarga,nomor_kk',
            'tanggal_lahir' => 'nullable|date',
            // Tambahan validasi lainnya sesuai kebutuhan
        ]);

        try {
            // Simpan data anggota keluarga
            AnggotaKeluarga::create([
                'nomor_kk' => $request->nomor_kk,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pendidikan' => $request->pendidikan,
                'pekerjaan' => $request->pekerjaan,
                'status_perkawinan' => $request->status_perkawinan,
                'hubungan_dalam_keluarga' => $request->hubungan_dalam_keluarga,
                'kewarganegaraan' => $request->kewarganegaraan,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
            ]);

            return redirect()->back()->with('success', 'Anggota keluarga berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
    public function editPenduduk(Request $request,$id)
    {
        $penduduk = DB::table('anggota_keluarga')->find($id);
        // Validasi input
        $request->validate([
            'nik_edit' => ["required",'max:20',Rule::unique('anggota_keluarga', 'nik')->ignore($id)],
            'nama_lengkap_edit' => 'required|string|max:255',
            'jenis_kelamin_edit' => 'required|in:L,P',
            'nomor_kk_edit' => 'required|exists:kartu_keluarga,nomor_kk',
            'tanggal_lahir_edit' => 'nullable|date',
            // Tambahan validasi lainnya sesuai kebutuhan
        ]);

        try {
            // Simpan data anggota keluarga
            AnggotaKeluarga::where(['id' => $id])->update([
                'nomor_kk' => $request->nomor_kk_edit,
                'nik' => $request->nik_edit,
                'nama_lengkap' => $request->nama_lengkap_edit,
                'tempat_lahir' => $request->tempat_lahir_edit,
                'tanggal_lahir' => $request->tanggal_lahir_edit,
                'jenis_kelamin' => $request->jenis_kelamin_edit,
                'agama' => $request->agama_edit,
                'pendidikan' => $request->pendidikan_edit,
                'pekerjaan' => $request->pekerjaan_edit,
                'status_perkawinan' => $request->status_perkawinan_edit,
                'hubungan_dalam_keluarga' => $request->hubungan_dalam_keluarga_edit,
                'kewarganegaraan' => $request->kewarganegaraan_edit,
                'nama_ayah' => $request->nama_ayah_edit,
                'nama_ibu' => $request->nama_ibu_edit,
            ]);

            return redirect()->back()->with('success', 'Anggota keluarga berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
    public function deletePenduduk(Request $request,$id)
    {
        $penduduk = DB::table('anggota_keluarga')->find($id);
        DB::table('anggota_keluarga')->delete($id);

        return redirect()->back()->with('success', 'Data Penduduk berhasil dihapus.');
    }
    public function autocomplete(Request $request)
    {
        $search = $request->get('query');

        $data = DB::table('kartu_keluarga')
            ->where('nomor_kk', 'LIKE', "%{$search}%")
            ->limit(10)
            ->pluck('nomor_kk');

        $output = '';
        foreach ($data as $nkk) {
            $output .= '<a href="#" class="list-group-item list-group-item-action kk-item">' . $nkk . '</a>';
        }

        return response($output);
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
                return '<a href="#" class="btn btn-sm btn-warning editData" data-id="'.$row->id.'"><span class="bx bx-edit"></span></a>
                <a href="#" class="btn btn-sm btn-danger deleteData" data-id="'.$row->id.'"><span class="bx bx-trash"></span></a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function getDataPenduduk(Request $request)
    {
        if ($request->ajax()) {
            $data = AnggotaKeluarga::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jenis_kelamin', function ($row) {
                    return $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
                })
                ->editColumn('tanggal_lahir', function ($row) {
                    return $row->tanggal_lahir ? date('d-m-Y', strtotime($row->tanggal_lahir)) : '-';
                })
                ->editColumn('nik', function ($row) {
                    return $row->nik ?? '-';
                })
                ->editColumn('nama_lengkap', function ($row) {
                    return $row->nama_lengkap ?? '-';
                })
                ->addColumn('aksi', function ($row) {
                    return '<a href="#" class="btn btn-sm btn-warning editData" data-id="'.$row->id.'"><span class="bx bx-edit"></span></a>
                <a href="#" class="btn btn-sm btn-danger deleteData" data-id="'.$row->id.'"><span class="bx bx-trash"></span></a>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function penduduk_autocomplete(Request $request)
    {
        $search = $request->get('query');

        $data = DB::table('anggota_keluarga')
            ->where('nik', 'LIKE', "%{$search}%")
            ->limit(10)->get();

        $output = '';
        foreach ($data as $p) {
            $output .= '<a href="#" class="list-group-item list-group-item-action kk-item">' . $p->nik . ' - '.$p->nama_lengkap.'</a>';
        }

        return response($output);
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
