<?php

namespace App\Http\Controllers;


use App\Models\HasilUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function submit(Request $request)
    {
        $quiz = HasilUjian::where("user_id", Auth::User()->id)->where("materi", $request->materi)->first();
        
        if ($quiz) {
            $quiz->user_id = Auth::User()->id;
            $quiz->materi = $request->materi;
            $quiz->nilai = $request->nilai;
            $quiz->jawaban = json_encode($request->quiz);
            $quiz->waktu_mulai = Carbon::parse($request->waktu_mulai)->format('Y-m-d H:i:s');
            $quiz->waktu_selesai = Carbon::parse($request->waktu_selesai)->format('Y-m-d H:i:s');
            $quiz->status = $request->nilai >= 70 ? "lulus" : "tidak lulus";
            $quiz->save();
        } else {
            $quiz = new HasilUjian();
            $quiz->user_id = Auth::User()->id;
            $quiz->materi = $request->materi;
            $quiz->nilai = $request->nilai;
            $quiz->jawaban = json_encode($request->quiz);
            $quiz->waktu_mulai = Carbon::parse($request->waktu_mulai)->format('Y-m-d H:i:s');
            $quiz->waktu_selesai = Carbon::parse($request->waktu_selesai)->format('Y-m-d H:i:s');
            $quiz->status = $request->nilai >= 70 ? "lulus" : "tidak lulus";
            $quiz->save();
        }

        return response()->json($request->all());
    }
}
