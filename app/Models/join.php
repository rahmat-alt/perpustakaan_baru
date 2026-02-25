<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class join extends Model
{
    protected $table       = 'join';
    protected $fillable    = ['nama_anggota', 'alamat', 'email', 'no_telp'];
    public    $timestamps  = false;
}
