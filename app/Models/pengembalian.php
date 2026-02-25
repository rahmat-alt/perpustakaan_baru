<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    protected $table      = 'pengembalian';
    protected $fillable   = ['no_anggota', 'judul_buku', 'tanggal_pengembalian'];
    public    $timestamps = false;
}
