<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    protected $table       = 'form';
    protected $fillable    = ['name', 'email', 'subject', 'message'];
    public    $timestamps  = false;
}
