<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kuis Bubble Sort</title>
    <link rel="stylesheet" href="{{ asset('css/styleKuis.css') }}">
</head>

<body>
    <header>
        <div class="font-header">Bubble Sort</div>
        <span class="welcome-text me-3">{{ Auth::user()->nama }} ({{ Auth::user()->role }})</span>
    </header>

    <main>
        <h1>KUIS BUBBLE SORT</h1>
        <div class="container">
            <div class="left-box">
                <div class="instruction-title">📁 Petunjuk</div>
                <div class="instructions">
                    <ol>
                        <li>Kuis ini terdiri dari 10 soal berupa pilihan ganda.</li>
                        <li>Masing-masing soal memiliki bobot poin sebanyak 10 poin.</li>
                        <li>Tekan <strong>"Mulai Kuis"</strong> jika Anda sudah siap.</li>
                        <li>Tekan salah satu pilihan jawaban yang dianggap benar.</li>
                        <li>Setelah semua pertanyaan selesai dijawab, tekan tombol <strong>"Selesai"</strong></li>
                        <li>Hasil kuis akan ditampilkan setelah Anda menyelesaikan semua pertanyaan.</li>
                        <li>KKM (Kriteria Ketuntasan Minimal) untuk kuis ini adalah {{ $kkmValue }}.</li>
                    </ol>
                </div>
                <div class="button-group">
                    <button onclick="window.location.href='{{ url('/dashboard/bubble') }}'" class="back">Kembali Ke
                        Materi</button>
                    <button onclick="window.location.href='{{ url('/dashboard/kuis/IsiKuisBubble') }}'"
                        class="start">Mulai Kuis</button>
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
