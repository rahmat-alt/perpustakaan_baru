<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hero extends Model
{
    protected $table       = 'hero';
    protected $fillable    = ['pre_title', 'judul', 'deskripsi'];
    public    $timestamps  = false;
}
