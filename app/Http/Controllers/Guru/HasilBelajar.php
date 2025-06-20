<?php

namespace App\Http\Controllers\Guru;

use App\Models\Kkm;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HasilBelajar extends Controller
{
    public function HasilKuis(Request $request, $materi)
    {
        // Query untuk mengambil user beserta evaluasi berdasarkan materi
        $query = User::with([
            'evaluasi' => function ($query) use ($materi) {
                $query->where('materi', $materi);
            }
        ])->where('role', 'siswa'); // Hanya mengambil user dengan role siswa

        // Filter berdasarkan pencarian nama atau NIS
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kelas (A, B, C, D)
        if ($request->has('kelas') && $request->kelas != '') {
            $kelas = $request->kelas;
            $query->where('kelas', $kelas);
        }

        // Ambil hasil kuis
        $hasilKuis = $query->get();

        // Menghitung rata-rata, maksimum, dan minimum nilai
        $nilaiRata = $hasilKuis->avg(function ($item) {
            $evaluasi = $item->evaluasi->first(); // Mengambil hasil ujian pertama jika ada
            return $evaluasi ? $evaluasi->nilai : 0; // Ambil nilai atau 0 jika tidak ada
        });

        $nilaiMax = $hasilKuis->max(function ($item) {
            $evaluasi = $item->evaluasi->first();
            return $evaluasi ? $evaluasi->nilai : 0;
        });

        $nilaiMin = $hasilKuis->min(function ($item) {
            $evaluasi = $item->evaluasi->first();
            return $evaluasi ? $evaluasi->nilai : null;
        });

        // Ambil KKM dari tabel Kkm atau gunakan nilai default 70 jika tidak ada
        $kkm = \App\Models\Kkm::where('materi', $materi)->first();
        $kkm = $kkm ? $kkm->kkm : 70; // Ambil KKM atau 70 jika tidak ada

        // Menentukan kelulusan berdasarkan nilai dan KKM
        $hasilKuis->each(function ($item) use ($kkm) {
            $evaluasi = $item->evaluasi->first();
            $nilai = $evaluasi ? $evaluasi->nilai : 0;

            // Tentukan lulus atau tidak lulus berdasarkan KKM
            $item->kelulusan = $nilai >= $kkm ? 'lulus' : 'tidak lulus';
        });

        if ($request->has('status') && $request->status != '') {
            // lulus tidak lulus
            $status = $request->status;
            $hasilKuis = $hasilKuis->filter(function ($item) use ($status) {
                return $item->kelulusan == $status;
            });
        }

        // Kembalikan tampilan dengan data hasil kuis dan nilai agregat
        return view('guru.pages.hasilUjian.index', compact('hasilKuis', 'nilaiRata', 'nilaiMax', 'nilaiMin', 'kkm', 'materi'));
    }

    public function setKKM(Request $request, $materi)
    {
        // Validasi input KKM
        $validated = $request->validate([
            'kkm' => 'required|integer|min:0|max:100', // Pastikan KKM adalah nilai antara 0 dan 100
        ]);

        // Cek apakah sudah ada data KKM untuk materi ini
        $kkm = Kkm::where('materi', $materi)->first();

        // Jika KKM sudah ada, update nilai KKM, jika belum, buat baru
        if ($kkm) {
            $kkm->update([
                'kkm' => $validated['kkm'],
            ]);
        } else {
            Kkm::create([
                'materi' => $materi,
                'kkm' => $validated['kkm'],
            ]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'KKM berhasil diperbarui!');
    }
}
