<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboard1controller extends Controller
{
    public function dashboard(){
        return view('Halaman.dashboard');
    }
}
