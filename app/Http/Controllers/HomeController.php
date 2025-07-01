<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function beranda()
    {
        return view('beranda.beranda');
    }

    public function cptp()
    {
        return view('dashboard.panggil.cptp');
    }
}
