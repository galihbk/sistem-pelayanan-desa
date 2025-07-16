<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KKExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return ['No', 'Nomor KK', 'NIK Kepala','Nama Kepala','Dusun','RT','RW'];
    }
    public function collection()
    {
        return DB::table('kartu_keluarga as kk')
            ->leftJoin('anggota_keluarga as ak', function ($join) {
                $join->on('kk.nomor_kk', '=', 'ak.nomor_kk')
                    ->where('ak.hubungan_dalam_keluarga', '=', 'Kepala Keluarga');
            })
            ->select(
                DB::raw('ROW_NUMBER() OVER (ORDER BY kk.nomor_kk) AS row_num'),
                'kk.nomor_kk',
                'ak.nik as nik_kepala',
                'ak.nama_lengkap as nama_kepala',
                'kk.dusun',
                'kk.rt',
                'kk.rw',
            )->get();
    }
}
