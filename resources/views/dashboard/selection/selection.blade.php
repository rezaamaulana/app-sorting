@extends('dashboard.layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/stylePenjelasan.css') }}">

    <div class="data-box1">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary"><i>Selection Sort</i></h2>
        </div>
        @include('dashboard.panggil.tujuan3')

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📝 1. Apa Itu <i>Selection Sort?</i></h4>
        </div>

        <!-- GIF animasi bubble sort -->
        {{-- <div class="text-center my-3">
            <img src="{{ asset('img/gift/SelectionSort1.gif') }}" alt="Animasi Bubble Sort" class="gif-bubble-sort">
        </div> --}}

        <p style="text-indent: 20px; text-align: justify;"><i>Selection sort</i> merupakan algoritma pengurutan yang juga
            cukup
            sederhana, dengan algoritma mencari (menyeleksi) bilangan terkecil/terbesar (bergantung pada urut naik atau
            turun) dari daftar bilangan yang belum terurut dan meletakkannya dalam daftar bilangan baru yang dijaga
            keterurutannya. Algoritma ini membagi daftar bilangan menjadi dua bagian, yaitu bagian terurut dan bagian yang
            belum terurut. Bagian yang terurut di sebelah kiri dan bagian yang belum terurut di sebelah kanan. Awalnya,
            semua elemen bilangan dalam daftar ialah bagian yang belum terurut, dan bagian yang terurut kosong.

        <div class="list">
            <p>Berikut langkah-langkah yang terdapat pada algoritma <i>selection sort</i>.
            <ol>
                <li>Cari bilangan terkecil yang ada pada bagian belum terurut.</li>
                <li>Tukar bilangan tersebut dengan bilangan pertama bagian belum terurut, lalu masukkan ke bagian terurut.
                </li>
                <li>Ulangi langkah 1 dan 2 sampai bagian yang belum terurut habis.</li>
            </ol>
        </div>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">💡 2. Langkah-Langkah Iterasi Dalam Selection Sort</h4>
        </div>
        <p style="text-indent: 20px; text-align: justify;">Terdapat sebuah deret bilangan tidak terurut pada gambar
            dibawah ini. Gunakan algoritma <i>selection sort</i> untuk mengurutkan bilangan ini dari terkecil ke terbesar.
            <img src="{{ asset('img/selection/selection.png') }}" class="img">
        </p>

        <h5 class="fw-bold">Berikut untuk memahami Langkah-langkah iterasi <i>selection sort</i> dibawah ini:<br><br>1.
            Proses
            Iterasi Pertama</h5>
        {{-- <p style="text-align: justify;">Cari bilangan terkecil di bagian belum terurut: ditemukan 1 sebagai bilangan
            terkecil. --}}
        @include('dashboard.selection.iterasi.iterasi1')
        {{-- <img src="{{ asset('img/selection/2.png') }}" class="img">
            <img src="{{ asset('img/selection/3.png') }}" class="img"><br>
            bilangan 1 dengan bilangan pertama bagian belum terurut.
            Geser batas bagian yang sudah terurut ke kiri sehingga 1 menjadi bagian yang sudah terurut. Dalam ilustrasi ini,
            angka dipisah menggunakan garis yang menunjukkan bilangan yang sudah terurut.
        </p> --}}

        <h5><b>2. Proses Iterasi Kedua</b></h5>
        {{-- <p style="text-align: justify;">Cari bilangan terkecil di bagian belum terurut, ditemukan angka 2 sebagai bilangan
            terkecil. --}}
        @include('dashboard.selection.iterasi.iterasi2')
        {{-- <img src="{{ asset('img/selection/3.png') }}" class="img">
            <img src="{{ asset('img/selection/4.png') }}" class="img"><br>
            Tukar bilangan 2 dengan bilangan pertama bagian belum terurut.
            Geser batas bagian yang sudah terurut ke kanan sehingga 2 menjadi bagian yang sudah terurut.
        </p> --}}

        <h5><b>3. Proses Iterasi Ketiga</b></h5>
        {{-- <p style="text-align: justify;">Cari bilangan terkecil di bagian belum terurut, ditemukan angka 3 sebagai bilangan
            terkecil. --}}
        @include('dashboard.selection.iterasi.iterasi3')
        {{-- <img src="{{ asset('img/selection/4.png') }}" class="img">
            <img src="{{ asset('img/selection/5.png') }}" class="img"><br>
            Tukar bilangan 3 dengan bilangan pertama bagian belum terurut,
            yaitu 7. Geser batas bagian yang sudah terurut ke kanan, sehingga 3 menjadi bagian yang sudah terurut.
        </p> --}}

        <h5><b>4. Proses Iterasi Keempat</b></h5>
        {{-- <p style="text-align: justify;">Cari bilangan terkecil di bagian belum terurut, ditemukan angka 6 sebagai bilangan
            terkecil. --}}
        @include('dashboard.selection.iterasi.iterasi4')
        {{-- <img src="{{ asset('img/selection/5.png') }}" class="img">
            <img src="{{ asset('img/selection/6.png') }}" class="img"><br>
            Tukar bilangan 6 dengan bilangan pertama bagian belum terurut. Di
            bagian akhir, karena data tinggal dua, setelah proses penukaran, algoritma telah diselesaikan.
        </p> --}}
        <h5><b>Hasil Pengurutan <i>Selection Sort</i></b></h5>
        @include('dashboard.selection.iterasi1')

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📒3. Mari Mencoba!</h4>
        </div>
        @include('dashboard.selection.mencoba')


        <h5><b>Studi Kasus <i>Selection Sort</i></b></h5>
        <p><i>Selection Sort</i> melakukan pengurutan dengan cara memilih elemen terkecil dari seluruh daftar dan
            menempatkannya di
            posisi awal. Setelah itu, proses pemilihan dilanjutkan pada sisa data yang belum terurut. Menariknya, baik pada
            kondisi terbaik maupun kondisi terburuk, algoritma ini tetap melakukan jumlah pengecekan yang sama terhadap
            seluruh elemen. Hal ini karena <i>Selection Sort</i> selalu mencari elemen terkecil tanpa melihat apakah data
            sudah
            urut atau belum. Meskipun algoritma ini jarang melakukan pertukaran, proses pencariannya membutuhkan waktu yang
            tetap, sehingga waktu eksekusinya relatif stabil meskipun tidak tergolong cepat.
        <div class="list">
            Kasus Terbaik <i>(Best Case)</i>:
            <ol>
                <li>Kamu diminta untuk memilih siswa yang memiliki tinggi badan paling pendek untuk berdiri di posisi paling
                    depan dalam barisan.</li>
                <li>Meskipun siswa-siswa tersebut sebenarnya sudah berdiri sesuai urutan tinggi badan, kamu tetap harus
                    mengukur tinggi mereka satu per satu untuk memastikan urutannya benar.</li>
                <li>Jadi, tetap memerlukan waktu meskipun barisan sudah terlihat rapi.</li>
            </ol>
            Kasus Terburuk <i>(Worst Case)</i>:
            <ol>
                <li>Urutan siswa dalam barisan benar-benar acak.</li>
                <li>Kamu harus mengukur tinggi semua siswa untuk menemukan yang paling pendek, lalu menukarnya dengan siswa
                    yang berada di posisi paling depan.</li>
                <li>Proses ini diulangi terus-menerus hingga seluruh siswa tersusun sesuai urutan tinggi.</li>
            </ol>


        </div>

        <footer>
            &copy; {{ date('Y') }} Sorting App - Media Interaktif.
        </footer>

        <style>
            .gif-bubble-sort {
                max-width: 400px;
                width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
        </style>
    @endsection
