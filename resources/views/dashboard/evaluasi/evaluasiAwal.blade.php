<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>EVALUASI</title>
    <link rel="stylesheet" href="{{ asset('css/styleKuis.css') }}">
</head>

<body>
    <header>
        <div class="font-header">SORTING EVALUASI</div>
        <span class="welcome-text me-3">Semangat Mengerjakan📝 {{ Auth::user()->nama }} ({{ Auth::user()->role }})</span>
    </header>

    <main>
        <h1>EVALUASI</h1>
        <div class="container">
            <div class="left-box">
                <div class="instruction-title">📁 Petunjuk</div>
                <div class="instructions">
                    <ol>
                        <li>Evaluasi ini terdiri dari 20 soal berupa pilihan ganda.</li>
                        <li>Masing-masing soal memiliki bobot poin sebanyak 5 poin.</li>
                        <li>Tekan <strong>"Mulai Evaluasi"</strong> jika Anda sudah siap.</li>
                        <li>Tekan salah satu pilihan jawaban yang dianggap benar.</li>
                        <li>Setelah semua pertanyaan selesai dijawab, tekan tombol <strong>"Selesai"</strong></li>
                    </ol>
                </div>
                <div class="button-group">
                    <button onclick="window.location.href='{{ url('/dashboard/bubble') }}'" class="back">Kembali Ke
                        Materi</button>
                    <button onclick="window.location.href='{{ url('/dashboard/evaluasi/evaluasi') }}'"
                        class="start">Mulai Evaluasi</button>
                </div>
            </div>

            <!--<div class="divider"></div>-->

            <!--<div class="right-box">
        <h3>DATA DIRI</h3>
        <div class="data-box">
          <p><strong>NISN</strong> : 123</p>
          <p><strong>NAMA</strong> : Muri</p>
          <p><strong>KELAS</strong> : IV</p>
          <div class="button-group">
            <button class="back">Kembali Ke Materi</button>
            <button class="start">Mulai Kuis</button>
          </div>
        </div>
      </div>-->
        </div>
    </main>
</body>

</html>
