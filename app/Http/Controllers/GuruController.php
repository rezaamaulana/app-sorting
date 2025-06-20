<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GuruController extends Controller
{
    public function index()
    {
        $countStudents = User::where('role', 'siswa')->count();



        return view('guru.halamanGuru', compact('countStudents'));
    }
}
