<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanLayanan extends Model
{
    protected $table = 'pengajuan_layanan';
    protected $fillable = ['jenis_pengajuan', 'nik', 'nomor_wa','status'];

    public function penduduk()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'nik', 'nik');
    }

    public function details()
    {
        return $this->hasMany(PengajuanLayananDetail::class, 'pengajuan_id', 'id');
    }
}
