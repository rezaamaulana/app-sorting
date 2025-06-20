<?php

namespace App\Http\Controllers;

use App\Models\Kkm;
use App\Helpers\evaluasi;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    //Halaman Awal Evaluasi
    public function index()
    {
        return view('dashboard.evaluasi.evaluasiAwal');
    }

    //Halaman Isi Evaluasi
    public function startQuiz()
    {
        $durasiEvaluasi = 20;
        $soalQuiz = evaluasi::getQuestion();
        $endtime = date("Y-m-d H:i:s", strtotime("+$durasiEvaluasi minutes"));
        $materi = "Evaluasi";
        $kkm = Kkm::where('materi', $materi)->first();
        $kkmValue = $kkm ? $kkm->kkm : 70; // Ambil KKM atau 70 jika tidak ada
        return view("dashboard.evaluasi.evaluasi", compact("soalQuiz", "materi", "durasiEvaluasi","kkmValue"));
    }
    public function submit() {}
}
