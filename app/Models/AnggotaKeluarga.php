<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    protected $table = 'anggota_keluarga';
    protected $fillable = [
        'nomor_kk',
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
        'nama_ibu'
    ];

    public function kk()
    {
        return $this->belongsTo(KartuKeluarga::class, 'nomor_kk', 'nomor_kk');
    }
}
