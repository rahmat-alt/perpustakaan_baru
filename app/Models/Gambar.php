<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table       = 'gambars';
    protected $fillable    = ['judul', 'foto', 'penulis', 'stok', 'dipinjam', 'status'];
    public    $timestamps  = false;
}
