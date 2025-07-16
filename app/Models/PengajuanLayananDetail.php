<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanLayananDetail extends Model
{
    protected $table = 'pengajuan_layanan_detail';
    protected $fillable = ['pengajuan_id', 'nama', 'isi'];
}
