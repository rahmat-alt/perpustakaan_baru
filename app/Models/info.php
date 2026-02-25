<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    protected $table       = 'info';
    protected $fillable    = ['phone_number', 'email', 'address', 'website'];
    public    $timestamps  = true;
}
