<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';
    protected $fillable = ['nomor_kk', 'dusun', 'rt', 'rw'];

    public function anggota()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'nomor_kk', 'nomor_kk');
    }
}
