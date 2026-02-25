<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table       = 'contact';
    protected $fillable    = ['phone_number', 'email_address', 'street_address', 'website_url'];
    public    $timestamps  = false;
}
