<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    protected $table       = 'card';
    protected $fillable    = ['nama', 'judul', 'deskripsi', 'gambar'];
    public    $timestamps  = false;
}
