<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tambah extends Model

{
    protected $table       = 'tambah';
    protected $fillable    = ['nama_peminjam', 'nomor_anggota', 'judul_buku', 'tanggal_dipinjam', 'tanggal_dikembalikan'];
    public    $timestamps  = false;
}
