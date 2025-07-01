@extends('dashboard.layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/stylePenjelasan.css') }}">

    <div class="data-box1">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary"><i>Insertion Sort</i></h2>
        </div>
        @include('dashboard.panggil.tujuan2')

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📝 1. Apa Itu <i>Insertion Sort?</i></h4>
        </div>

        <!-- GIF animasi bubble sort -->
        {{-- <div class="text-center my-3">
            <img src="{{ asset('img/gift/InsertionSort1.gif') }}" alt="Animasi Bubble Sort" class="gif-bubble-sort">
        </div> --}}

        <p><i>Insertion Sort</i> adalah salah satu algoritma yang digunakan untuk permasalahan pengurutan dalam list (daftar
            objek). Sesuai namanya, <i>insertion sort</i> mengurutkan sebuah list dengan cara menyisipkan elemen satu per
            satu
            sesuai dengan urutan besar kecilnya elemen hingga semua elemen menjadi list yang terurut. Misalnya, dalam kasus
            mengurutkan elemen list dari yang terkecil hingga terbesar <mark><i>(ascending)</i></mark>, tahap pertama ialah
            kita akan
            membaca
            suatu elemen dengan elemen yang berdekatan. Apabila elemen yang berdekatan dengan elemen saat ini lebih kecil,
            elemen yang lebih kecil akan ditukar dengan elemen yang lebih besar dan dibandingkan kembali dengan
            elemen-elemen sebelumnya yang sudah terurut. Apabila elemen saat ini sudah lebih besar dari elemen sebelumnya,
            iterasi berhenti. Hal ini dijalankan satu per satu hingga semua list menjadi terurut.</p>

        <div class="list">
            <p>Berikut langkah-langkah yang harus diperhatikan pada metode <i>Insertion Sort</i>.
            <ol>
                <li>Mulai dari elemen kedua (indeks 1), lakukan pengulangan melalui seluruh array atau daftar data yang akan
                    diurutkan. </li>
                <li>Bandingkan elemen saat ini dengan elemen sebelumnya.</li>
                <li>Jika elemen saat ini lebih kecil dari elemen sebelumnya, pindahkan elemen tersebut ke posisi yang tepat
                    dalam array dengan cara memindahkan elemen - elemen yang lebih besar satu posisi ke kanan.</li>
                <li>Setelah memindahkan elemen, masukkan elemen yang sedang dibandingkan ke posisi yang tepat.</li>
                <li>Ulangi langkah-langkah 2-4 untuk setiap elemen dalam array atau daftar data.</li>
                <li>Setelah pengulangan selesai, array atau daftar data akan terurut.</li>
            </ol>
        </div>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">💡 2. Langkah-Langkah Iterasi Dalam <i>Insertion
                    Sort</i></h4>
        </div>
        <p>Terdapat sebuah deret bilangan seperti gambar dibawah ini. Gunakan
            algoritma <i>insertion sort</i> untuk mengurutkan bilangan ini dari terkecil ke terbesar.
            <img src="{{ asset('img/insertion/insertion.png') }}" class="img">
        </p>

        <h5 class="fw-bold">Berikut untuk memahami Langkah-langkah iterasi <i>insertion sort</i> dibawah ini: <br><br>1.
            Proses
            Iterasi Pertama</h5>
        {{-- <p>Langkah pertama, tinjau bilangan kedua, bandingkan bilangan pertama dan kedua, yaitu 1 dan 6. Didapatkan 1 lebih
            kecil dari 6, maka urutan bilangan tersebut tetap (1,6). (1, 6, 2, 5, 4) menjadi (1, 6, 2, 5, 4) --}}
        @include('dashboard.insertion.iterasi.iterasi1')
        {{-- <img src="{{ asset('img/insertion/materi/1.png') }}" class="img">
        </p> --}}

        <h5><b>2. Proses Iterasi Kedua</b></h5>
        {{-- <p>Pada iterasi selanjutnya, kita mengambil bilangan ketiga, yaitu 2. Lalu bandingkan dengan bilangan sebelumnya.
            Kita akan membandingkan 2 dan 6. Apakah 2 lebih kecil dari 6? Karena iya, kita akan menukar 2 dengan 6. Lalu, kita akan membandingkan lagi dengan
            bilangan sebelumnya, yaitu 1. Apakah 1 lebih kecil dari 2? Karena 2 tidak lebih kecil dari 1, maka 2 sudah
            berada pada posisi yang benar, yaitu sebelum 6 dan setelah 1.
            <br>Maka urutannya berubah. (1, 6, 2, 5, 4) menjadi (1, 2, 6, 5, 4) --}}
        @include('dashboard.insertion.iterasi.iterasi2')
        {{-- <img src="{{ asset('img/insertion/materi/2.png') }}" class="img">
        </p> --}}

        <h5><b>3. Proses Iterasi Ketiga</b></h5>
        {{-- <p>Pada iterasi selanjutnya, kita mengambil bilangan keempat, yaitu 5. Lalu, bandingkan dengan bilangan sebelumnya
            yaitu 6. Didapatkan bahwa 6 lebih besar dari 5 maka bilangan tersebut ditukar. Lalu, kita akan membandingkan
            lagi dengan bilangan sebelumnya, yaitu 2. Apakah 2 lebih kecil dari 5? Karena 5 tidak lebih kecil dari 2, maka 5
            sudah berada pada posisi yang benar, yaitu sebelum 2 dan setelah 6. Proses memindahkan 5 di antara 2 dan 6 ini
            biasa disebut penyisipan (insertion) sehingga nama algoritma ini disebut insertion sort. (1, 2, 6, 5, 4) menjadi
            (1, 2, 5, 6, 4) --}}
        @include('dashboard.insertion.iterasi.iterasi3')
        {{-- <img src="{{ asset('img/insertion/materi/3.png') }}" class="img">
        </p> --}}

        <h5><b>4. Proses Iterasi Keempat</b></h5>
        {{-- <p>Pada iterasi selanjutnya, kita mengambil bilangan kelima, yaitu 4. Didapatkan bahwa 6 lebih besar dari 4 maka
            bilangan tersebut akan ditukar. Oleh karena itu, selanjutnya, kita akan membandingkan dengan bilangan-bilangan
            sebelumnya, lalu menukarnya apabila bilangan tersebut lebih besar. Pertama, kita akan membandingkan 4 dan 5.
            Apakah 4 lebih kecil dari 5? Karena iya, kita akan menukar 5 dengan 4. Setelah itu, kita akan mengecek dengan
            bilangan sebelumnya lagi, yaitu 2. Apakah 4 lebih kecil dari 2? Karena 4 tidak lebih kecil dari 2, maka 4 sudah
            pada posisi seharusnya, yaitu setelah 2 dan sebelum 5. Terjadi lagi proses penyisipan 5 dadu di antara 2 dan 5.
            (1, 2, 5, 6, 4) menjadi (1, 2, 4, 5, 6) --}}
        @include('dashboard.insertion.iterasi.iterasi4')
        {{-- <img src="{{ asset('img/insertion/materi/4.png') }}" class="img">
        </p> --}}

        <h5><b>Hasil Pengurutan <i>insertion Sort</i></b></h5>
        @include('dashboard.insertion.iterasi1')

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📒3. Mari Mencoba!</h4>
        </div>
        @include('dashboard.insertion.mencoba')


        <h5><b>Studi Kasus <i>Insertion Sort</i></b></h5>
        <p><i>Insertion Sort</i> bekerja dengan cara mengambil satu elemen dari daftar, lalu menyisipkannya ke posisi yang
            sesuai
            di bagian yang sudah terurut sebelumnya. Jika data sudah hampir terurut, maka proses penyisipan ini berlangsung
            sangat cepat inilah yang disebut sebagai <i>best case</i>. Namun, jika data awalnya dalam urutan terbalik, maka
            setiap elemen yang diambil harus digeser melewati banyak elemen lain untuk bisa masuk ke tempat yang tepat
            kondisi inilah yang disebut sebagai <i>worst case</i>.
        <div class="list">
            Kasus Terbaik <i>(Best Case)</i>:
            <ol>
                <li>Kamu memiliki tumpukan kartu nama yang sudah terurut dari <b>A</b> sampai <b>E</b>.</li>
                <li>Ketika ingin menambahkan satu kartu baru <b>F</b>, kamu cukup menyelipkannya di bagian belakang.</li>
                <li>Kamu tidak perlu mengatur ulang kartu-kartu lainnya karena semuanya sudah tersusun dengan rapi.</li>
                <li>Proses penambahan kartu jadi lebih cepat dan efisien.</li>
            </ol>
            Kasus Terburuk <i>(Worst Case)</i>:
            <ol>
                <li>Sekarang bayangkan kamu punya tumpukan kartu acak dari <b>A</b> sampai <b>E</b>.</li>
                <li>Setiap kali ingin menyisipkan kartu baru <b>F</b> di posisi yang tepat, kamu harus menggeser satu per
                    satu kartu sebelumnya agar kartu tersebut bisa masuk di tempat yang sesuai.</li>
                <li>Proses ini lebih rumit dan membutuhkan waktu lebih lama.</li>



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
