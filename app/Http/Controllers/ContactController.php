<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = DB::table('contact')->get();
        return view('user.contact-user.create-contact', ['contact' => $contact]);
    }
}
