<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    protected $table       = 'gambars';
    protected $fillable    = ['judul', 'foto', 'penulis'];
    public    $timestamps  = false;
}
