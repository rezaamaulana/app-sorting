@extends('dashboard.layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/stylePenjelasan.css') }}">

    <div class="data-box1">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary"><i>Bubble Sort</i></h2>
        </div>
        @include('dashboard.panggil.tujuan1')

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📝 1. Apa Itu <i>Bubble Sort?</i></h4>
        </div>

        <!-- GIF animasi bubble sort -->
        {{-- <div class="text-center my-3">
            <img src="{{ asset('img/gift/BubbleSort1.gif') }}" alt="Animasi Bubble Sort" class="gif-bubble-sort">
        </div> --}}

        <p><i>Bubble Sort</i> adalah metode pengurutan data dengan cara melakukan penukaran data dari data pertama dengan
            data di
            sebelahnya secara terus menerus sampai bisa dipastikan dalam suatu iterasi tertentu tidak ada lagi perubahan
            atau penukaran. Algoritma ini menggunakan perbandingan dalam operasi antar elemennya.<br><br>

            Algoritma <i>Bubble Sort</i> adalah algoritma pengurutan paling dasar serta memiliki metode pengurutan paling
            sederhana
            daripada algoritma pengurutan yang lain. Proses pencarian solusi dilakukan secara langsung ke
            intinya yaitu membandingkan elemen-elemen. Algoritma <i>Bubble Sort</i> merupakan proses pengurutan yang
            secara berangsur-angsur memindahkan data ke posisi yang tepat. Karena itulah algoritma ini dinamakan
            <i>“Bubble”</i>
            atau yang jika diterjemahkan ke dalam Bahasa Indonesia artinya gelembung. Fungsi algoritma ini adalah untuk
            mengurutkan data dari yang terkecil ke yang terbesar <mark><i>(Ascending)</i></mark> atau sebaliknya
            <mark><i>(Descending)</i></mark>.
        </p>

        <div class="list">
            <p>Berikut langkah-langkah yang harus diperhatikan pada metode <i>Bubble Sort</i>.
            <ol>
                <li>Jumlah iterasi sama dengan banyaknya bilangan dikurang 1. </li>
                <li>Di setiap iterasi, jumlah pertukaran bilangannya sama dengan jumlah banyaknya bilangan.</li>
                <li>Dalam algoritma <i>Bubble Sort</i>, meskipun deretan bilangan tersebut sudah terurut, proses
                    <i>sorting</i> akan tetap
                    dilakukan.
                </li>
                <li>Tidak ada perbedaan cara yang berarti untuk teknik algoritma <i>Bubble Sort Ascending</i> dan
                    <i>Descending</i>.
                </li>
            </ol>
        </div>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">💡 2. Langkah-Langkah Iterasi dalam <i>Bubble Sort</i>
            </h4>
        </div>

        <p>Terdapat sebuah deret bilangan seperti gambar dibawah ini. Gunakan algoritma <i>bubble sort</i> untuk mengurutkan
            bilangan ini dari terbesar ke terkecil.
            <img src="{{ asset('img/bubble/1.png') }}" class="img">
        </p>
        <h5 class="fw-bold">Berikut untuk memahami Langkah-langkah iterasi <i>bubble sort</i> dibawah ini: <br><br> 1.
            Proses
            Iterasi Pertama</h5>
        @include('dashboard/bubble/iterasi/iterasi1p1')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi1p1.png') }}" class="img"><br> --}}
        @include('dashboard/bubble/iterasi/iterasi1p2')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi1p2.png') }}" class="img"><br> --}}
        @include('dashboard/bubble/iterasi/iterasi1p3')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi1p3.png') }}" class="img"><br> --}}
        @include('dashboard/bubble/iterasi/iterasi1p4')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi1p4.png') }}" class="img"><br> --}}
        {{-- @include('dashboard/bubble/iterasi/iterasi1k') --}}
        {{-- <img src="{{ asset('img/bubble/2.png') }}" class="img"> --}}

        <h5><b>2. Proses Iterasi Kedua</b></h5>
        @include('dashboard/bubble/iterasi/iterasi2p1')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi2p1.png') }}" class="img"><br> --}}
        @include('dashboard/bubble/iterasi/iterasi2p2')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi2p2.png') }}" class="img"><br> --}}
        @include('dashboard/bubble/iterasi/iterasi2p3')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi2p3.png') }}" class="img"><br> --}}
        {{-- Untuk pengurutan keseluruhannya sebagai berikut:
        @include('dashboard/bubble/iterasi/iterasi2k') --}}
        {{-- <img src="{{ asset('img/bubble/3.png') }}" class="img"> --}}


        <h5><b>3. Proses Iterasi Ketiga</b></h5>
        @include('dashboard/bubble/iterasi/iterasi3p1')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi3p1.png') }}" class="img"><br> --}}
        @include('dashboard/bubble/iterasi/iterasi3p2')
        {{-- <img src="{{ asset('img/bubble/materi/iterasi3p2.png') }}" class="img"><br> --}}
        {{-- Untuk pengurutan keseluruhannya sebagai berikut:
        <img src="{{ asset('img/bubble/4.png') }}" class="img"> --}}


        <h5><b>4. Proses Iterasi Keempat</b></h5>
        @include('dashboard/bubble/iterasi/iterasi4p1')
        {{-- <img src="{{ asset('img/bubble/5.png') }}" class="img"> --}}

        <h5><b>Hasil Pengurutan <i>Bubble Sort</i></b></h5>
        @include('dashboard.bubble.iterasi')


        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📒3. Mari Mencoba!</h4>
        </div>
        @include('dashboard.bubble.mencoba')


        <h5><b>Studi Kasus <i>Bubble Sort</i></b></h5>
        <p>Pada algoritma <i>Bubble Sort</i>, proses pengurutan dilakukan dengan membandingkan dua elemen yang berdampingan,
            lalu
            menukarnya jika urutannya salah. Proses ini diulang berkali-kali hingga seluruh data berada dalam urutan yang
            benar. Dalam kondisi terbaik <i>(best case)</i>, yaitu saat data sudah dalam keadaan terurut, algoritma ini
            hanya
            melakukan satu kali pengecekan tanpa melakukan pertukaran, sehingga sangat cepat. Namun, pada kondisi terburuk
            <i>(worst case)</i>, ketika data berada dalam urutan terbalik, algoritma ini harus melakukan banyak pertukaran
            dari
            awal hingga akhir, sehingga proses menjadi jauh lebih lama.

        <div class="list">
            Kasus Terbaik <i>(Best Case)</i>:
            <ol>
                <li>Bayangkan kamu sedang membantu guru menyusun buku-buku di rak berdasarkan tinggi badan buku, dari yang
                    paling pendek hingga yang paling tinggi.</li>
                <li>Ternyata, semua buku sudah tersusun rapi sesuai urutan yang diinginkan.</li>
                <li>Kamu hanya perlu memeriksa satu per satu dari kiri ke kanan tanpa perlu menukar posisi buku apa pun.
                </li>
            </ol>
            Kasus Terburuk <i>(Worst Case)</i>:
            <ol>
                <li>Sekarang bayangkan buku-buku tersebut justru disusun dari yang paling tinggi hingga yang paling pendek.
                </li>
                <li>Kamu harus memeriksa satu per satu, lalu memindahkan buku berkali-kali agar tersusun dari yang paling
                    pendek ke yang paling tinggi.</li>
                <li>Jadi, proses ini memerlukan waktu yang cukup lama.</li>
            </ol>
        </div>



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
