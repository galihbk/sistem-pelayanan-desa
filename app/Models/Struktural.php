<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struktural extends Model
{
    protected $table = 'struktural';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
