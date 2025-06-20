<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Latihan Insertion Sort</title>
    <link rel="stylesheet" href="{{ asset('css/styleLatihan.css') }}">
</head>

<body>
    <header>
        <div class="font-header">Insertion Sort</div>
        <span class="welcome-text me-3">{{ Auth::user()->nama }} ({{ Auth::user()->role }})</span>
    </header>

    <main>
        <h1>LATIHAN INSERTION SORT</h1>
        <div class="container">
            <div class="left-box">
                <h3>💡Petunjuk Latihan</h3>
                <div class="data-box">
                    <ol>
                        <li>Kamu akan diberikan sebuah deret bilangan dengan angka yang telah ditentukan.</li>
                        <li>Tugas kamu adalah mengurutkan semua angka itu secara berurutan lewat beberapa iterasi.</li>
                        <li>Untuk mengurutkannya, kamu harus melakukan serangkaian pertukaran insertion sort yang telah
                            dipelajari.</li>
                        <li>Setelah itu, kamu diminta mencocokkan deret bilangan dengan iterasi yang sudah disediakan,
                            kira-kira deret bilangan itu iterasi keberapa?</li>
                        <li>Kamu mulai dari iterasi pertama, terus lanjut ke iterasi kedua, ketiga, dan seterusnya
                            sampai selesai.</li>
                    </ol>
                </div>
            </div>

            <div class="divider"></div>

            <div class="right-box">
                <div class="instruction-title">📁 Petunjuk</div>
                <div class="instructions">
                    <ol>
                        <li>Latihan ini terdiri dari 3 soal berupa mengurutkan secara manual.</li>
                        <!--<li>Masing-masing soal memiliki bobot poin sebanyak 20 poin.</li>-->
                        <li>Tekan <strong>"Mulai Latihan"</strong> jika anda sudah siap.</li>
                        <!--<li>Tekan salah satu pilihan jawaban yang dianggap benar.</li>-->
                        <li>Setelah semua pengurutan selesai kerjakan, tekan tombol <strong>"Selesai"</strong></li>
                    </ol>
                    <div class="button-group">
                        <button onclick="window.location.href='{{ url('/dashboard/insertion') }}'"
                            class="back">Kembali Ke Materi</button>
                        <button onclick="window.location.href='{{ url('/dashboard/latihan/isiLatihanInsertion') }}'"
                            class="start">Mulai
                            Latihan</button>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>
