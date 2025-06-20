@extends('dashboard.layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('css/stylePenjelasan.css') }}">

    <div class="data-box1">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border rounded shadow-lg bg-light">
            <h2 class="fw-bold px-3 py-2 border-start border-4 border-primary">Pengurutan(Sorting)</h2>
        </div>

        <p>Pengurutan (sorting) adalah proses untuk menyusun atau mengurutkan
            elemen-elemen dalam suatu koleksi data (seperti array, daftar, atau lainnya) dalam urutan tertentu, misalnya
            urutan menaik (ascending) atau menurun (descending).
            <br><br>
            Saat merapikan sesuatu, misalnya koleksi buku, kita menyusun buku
            tersebut dengan menggunakan suatu aturan. Misalnya, jika kita memiliki koleksi buku cerita berseri, kemungkinan
            besar kita akan menyusunnya secara berurut dari volume pertama hingga volume yang terbaru. Atau, ketika sedang
            berbaris, kita diminta untuk membentuk barisan berdasarkan tinggi badan. Hal-hal tersebut merupakan sebuah
            proses pengurutan atau sorting. Proses pengurutan akan menjadi bagian yang tidak terpisahkan dari program
            komputer atau aplikasi yang sering kita gunakan. Pada aktivitas ini, kita akan melihat bagaimana proses
            pengurutan dapat dilakukan dengan menggunakan berbagai strategi.
            <br><br>Pelajarilah strateginya! <br><br>
            Pengurutan merupakan suatu permasalahan klasik pada komputasi yang
            dilakukan untuk mengatur agar suatu kelompok benda, objek, atau entitas diletakkan mengikuti aturan tertentu.
            Urutan yang paling sederhana misalnya mengurutkan angka secara terurut menaik atau menurun.
            <br><br>
            Biasanya, masalah pengurutan terdiri atas sekumpulan objek yang
            disusun secara acak yang harus diurutkan. Setelah itu, secara sistematis, posisi objek diperbaiki dengan
            melakukan pertukaran posisi dua buah objek. Hal ini dilakukan secara terus-menerus hingga semua posisi objek
            benar.

            <br><br>Misal, kita memperoleh 5 buah kartu acak berikut:


            @include('dashboard.panggil.img')
        <p>Kita dapat membuat angka tersebut terurut menaik dengan melakukan
            satu kali pertukaran, yaitu dengan menukar kartu 5 dengan kartu 4. Terdapat 2 langkah penting dalam melakukan
            sebuah pengurutan. Langkah pertama ialah melakukan pembandingan. Untuk melakukan pengurutan, dipastikan ada dua
            buah nilai yang dibandingkan. Pembandingan ini akan menghasilkan bilangan yang lebih besar dari, lebih kecil
            dari, atau memiliki nilai sama dengan sebuah bilangan lainnya. Langkah kedua ialah melakukan penempatan bilangan
            setelah melakukan pembandingan. Penempatan bilangan ini dilakukan setelah didapatkan bilangan lebih besar atau
            lebih kecil (bergantung pada pengurutan yang digunakan).

            <br><br>Terdapat beberapa teknik (algoritma) untuk melakukan pengurutan
            seperti bubble sort, insertion sort, dan selection sort. Pada materi ini, hanya akan diberikan penjelasan untuk
            setiap tiga teknik ialah sebagai berikut.

        </p>
    </div>
@endsection
