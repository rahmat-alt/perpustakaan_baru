<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gambar;

class DashboardController extends Controller
{
    public function dashboard()
    {

        return view('/user.dashboard-user.dashboard-user');
    }
}
