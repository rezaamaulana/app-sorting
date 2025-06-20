@extends('dashboard.layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/stylePenjelasan.css') }}">

    <div class="data-box1">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary">Bubble Sort</h2>
        </div>
        @include('dashboard.panggil.tujuan1')

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📝 1. Apa Itu Bubble Sort?</h4>
        </div>

        <!-- GIF animasi bubble sort -->
        {{-- <div class="text-center my-3">
            <img src="{{ asset('img/gift/BubbleSort1.gif') }}" alt="Animasi Bubble Sort" class="gif-bubble-sort">
        </div> --}}

        <p>Bubble Sort adalah metode pengurutan data dengan cara melakukan penukaran data dari data pertama dengan data di
            sebelahnya secara terus menerus sampai bisa dipastikan dalam suatu iterasi tertentu tidak ada lagi perubahan
            atau penukaran. Algoritma ini menggunakan perbandingan dalam operasi antar elemennya.<br><br>

            Algoritma Bubble Sort adalah algoritma pengurutan paling dasar serta memiliki metode pengurutan paling sederhana
            daripada algoritma pengurutan yang lain. Proses pencarian solusi dilakukan secara brute force, langsung ke
            intinya yaitu membandingkan elemen-elemen dalam tabel. Algoritma Bubble Sort merupakan proses pengurutan yang
            secara berangsur-angsur memindahkan data ke posisi yang tepat. Karena itulah algoritma ini dinamakan “Bubble”
            atau yang jika diterjemahkan ke dalam Bahasa Indonesia artinya gelembung. Fungsi algoritma ini adalah untuk
            mengurutkan data dari yang terkecil ke yang terbesar (Ascending) atau sebaliknya (Descending).</p>

        <div class="list">
            <p>Berikut langkah-langkah yang harus diperhatikan pada metode Bubble Sort.
            <ol>
                <li>Jumlah iterasi sama dengan banyaknya bilangan dikurang 1. </li>
                <li>Di setiap iterasi, jumlah pertukaran bilangannya sama dengan jumlah banyaknya bilangan.</li>
                <li>Dalam algoritma Bubble Sort, meskipun deretan bilangan tersebut sudah terurut, proses sorting akan tetap
                    dilakukan.</li>
                <li>Tidak ada perbedaan cara yang berarti untuk teknik algoritma Bubble Sort Ascending dan Descending.</li>
            </ol>
        </div>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">💡 2. Langkah-Langkah Iterasi dalam Bubble Sort</h4>
        </div>

        <p>Terdapat sebuah deret bilangan seperti gambar dibawah ini. Gunakan algoritma bubble sort untuk mengurutkan
            bilangan ini dari terbesar ke terkecil.
            <img src="{{ asset('img/bubble/1.png') }}" class="img">
        </p>
        <h5 class="fw-bold">Berikut untuk memahami Langkah-langkah iterasi bubble sort dibawah ini: <br><br> 1. Proses
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

        <h5><b>Hasil Pengurutan Bubble Sort</b></h5>
        @include('dashboard.bubble.iterasi')


        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h4 class="fw-bold border-start border-4 border-warning">📒3. Mari Mencoba!</h4>
        </div>
        @include('dashboard.bubble.mencoba')

    </div>


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
