<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendudukExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return ['No', 'NIK', 'Nama','Tempat Lahir','Tanggal Lahir','Jenis Kelamin','Agama','Pendidikan','Pekerjaan','Status Kawin','Hubungan Dalam Keluarga','Kewarganegaraan','Nama Ayah','Nama Ibu','No KK'];
    }
    public function collection()
    {
        return DB::table('anggota_keluarga')
            ->select(
                DB::raw('ROW_NUMBER() OVER (ORDER BY nik) AS row_num'),
                'nik',
                'nama_lengkap',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'agama',
                'pendidikan',
                'pekerjaan',
                'status_perkawinan',
                'hubungan_dalam_keluarga',
                'kewarganegaraan',
                'nama_ayah',
                'nama_ibu',
                'nomor_kk',
            )->get();
    }
}
