<?php

namespace App\Http\Controllers;

use App\Helpers\bubble;
use App\Models\Kkm;
use Illuminate\Http\Request;

class BubbleSortController extends Controller
{
    // Halaman Bubble
    public function index()
    {
        return view('dashboard.bubble.bubble');
    }

    //Halaman Awal Kuis
    public function kuis()
    {
        $materi = 'Kuis-Bubble-Sort';
        $kkm = Kkm::where('materi', $materi)->first();
        $kkmValue = $kkm ? $kkm->kkm : 70; // Ambil KKM atau 70 jika tidak ada
        return view('dashboard.kuis.kuisBubble', compact('kkmValue'));
    }

    //Halaman Awal Latihan
    public function latihan()
    {
        return view('dashboard.latihan.latihanBubble');
    }

    //Halaman
    public function coba()
    {
        return view('dashboard.bubble.coba');
    }

    //Isi Latihan
    public function isiLatihan()
    {
        $soalQuiz = bubble::getQuestion();
        $materi = 'latihan-Bubble-Sort';
        $kkm = Kkm::where('materi', $materi)->first();
        $kkmValue = $kkm ? $kkm->kkm : 70; // Ambil KKM atau 70 jika tidak ada
        return view("dashboard.latihan.IsiLatihanBubble", compact("soalQuiz", "materi", "kkmValue"));
    }

    //Halaman Isi Kuis
    public function startQuiz()
    {
        $durasiEvaluasi = 20;
        $soalQuiz = bubble::getQuestion();
        $endtime = date("Y-m-d H:i:s", strtotime("+$durasiEvaluasi minutes"));
        $materi = 'Kuis-Bubble-Sort';
        $kkm = Kkm::where('materi', $materi)->first();
        $kkmValue = $kkm ? $kkm->kkm : 70; // Ambil KKM atau 70 jika tidak ada
        return view("dashboard.kuis.IsiKuisBubble", compact("soalQuiz", "materi", "durasiEvaluasi", 'kkmValue'));
    }
    public function submit() {}
}
