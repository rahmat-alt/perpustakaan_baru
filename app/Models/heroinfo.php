<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class heroinfo extends Model
{
    protected $table       = 'heroinfo';
    protected $fillable    = ['pre_title', 'judul', 'deskripsi', 'pre_title', 'judul', 'deskripsi'];
    public    $timestamps  = false;
}
