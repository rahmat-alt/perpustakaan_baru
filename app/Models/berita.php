<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $table       = 'berita';
    protected $fillable    = ['judul', 'slug', 'penulis', 'berita', 'gambar', 'kategori', 'status'];
    public    $timestamps  = false;
}
