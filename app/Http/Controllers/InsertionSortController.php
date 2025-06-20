<?php

namespace App\Http\Controllers;

use App\Models\Kkm;
use App\Helpers\insertion;
use Illuminate\Http\Request;

class InsertionSortController extends Controller
{
    //Halaman Insertion
    public function index()
    {
        return view('dashboard.insertion.insertion');
    }

    //Halaman Awal Kuis
    public function kuis()
    {
        return view('dashboard.kuis.kuisInsertion');
    }

    //Halaman Awal Latihan
    public function latihan()
    {
        return view('dashboard.latihan.latihanInsertion');
    }

    // Halaman Isi Latihan
    public function isiLatihan()
    {
        return view('dashboard.latihan.isiLatihanInsertion');
    }

    //Halaman Isi Kuis
    public function startQuiz()
    {
        $durasiEvaluasi = 20;
        $soalQuiz = insertion::getQuestion();
        $endtime = date("Y-m-d H:i:s", strtotime("+$durasiEvaluasi minutes"));
        $materi = "Kuis-Insertion-Sort";
        $kkm = Kkm::where('materi', $materi)->first();
        $kkmValue = $kkm ? $kkm->kkm : 70; // Ambil KKM atau 70 jika tidak ada
        return view("dashboard.kuis.IsiKuisInsertion", compact("soalQuiz", "materi", "durasiEvaluasi", "kkmValue"));
    }
    public function submit() {}
}
