<?php

namespace App\Http\Controllers;

use App\Models\Kkm;
use App\Helpers\selection;
use Illuminate\Http\Request;

class SelectionSortController extends Controller
{
    //Halaman Selection
    public function index()
    {
        return view('dashboard.selection.selection');
    }

    //Halaman Awal kuis
    public function kuis()
    {
        return view('dashboard.kuis.kuisSelection');
    }

    //Halaman Awal Latihan
    public function latihan()
    {
        return view('dashboard.latihan.latihanSelection');
    }

    // Halaman Isi Latihan
    public function isiLatihan()
    {
        return view('dashboard.latihan.isiLatihanSelection');
    }

    // //Halaman Awal Latihan
    // public function iterasi()
    // {
    //     return view('dashboard.selection.iterasi1');
    // }

    //Halaman Isi Kuis
    public function startQuiz()
    {
        $durasiEvaluasi = 20;
        $soalQuiz = selection::getQuestion();
        $endtime = date("Y-m-d H:i:s", strtotime("+$durasiEvaluasi minutes"));
        $materi = "Kuis-Selection-Sort";
        $kkm = Kkm::where('materi', $materi)->first();
        $kkmValue = $kkm ? $kkm->kkm : 70; // Ambil KKM atau 70 jika tidak ada
        return view("dashboard.kuis.IsiKuisSelection", compact("soalQuiz", "materi", "durasiEvaluasi", "kkmValue"));
    }
    public function submit() {}
}
