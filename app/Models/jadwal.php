<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table       = 'jadwal';
    protected $fillable    = ['hari', 'jam', 'tutup', 'keterangan'];
    public    $timestamps  = true;
}
