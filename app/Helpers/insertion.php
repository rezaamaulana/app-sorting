<?php

namespace App\Helpers;


class insertion
{

    protected static $questions = [

        // Soal no 1
        [
            "question" => "Diberikan array [5, 2, 9, 1, 6]. Apa hasil array setelah iterasi pertama menggunakan insertion sort?",
            "choice" => [
                "A" => "[2, 5, 9, 1, 6]",
                "B" => "[5, 2, 9, 1, 6]",
                "C" => "[2, 5, 9, 1, 6]",
                "D" => "[2, 5, 1, 9, 6]",
                //"E" => "Cabang matematika yang berhubungan dengan statistik dan probabilitas",
            ],
            "answer" => "A"


        ],

        // Soal no 2
        [
            "question" => "Diberikan array [8, 3, 5, 1]. Apa hasil array setelah iterasi kedua menggunakan insertion sort?",
            "choice" => [
                "A" => "[3, 5, 1, 8]",
                "B" => "[3, 8, 5, 1]",
                "C" => "[3, 5, 8, 1]",
                "D" => "[1, 3, 5, 8]",
                //"E" => "Teknik pengelolaan data dalam sebuah jaringan local",
            ],
            "answer" => "C"


        ],

        // Soal no 3
        [
            "question" => "Diberikan array [12, 7, 9, 3, 5]. Apa hasil array setelah iterasi pertama menggunakan insertion sort?",
            "choice" => [
                "A" => "[12, 7, 9, 3, 5]",
                "B" => "[7, 12, 9, 3, 5]",
                "C" => "[7, 9, 12, 3, 5]",
                "D" => "[7, 12, 3, 9, 5]",
                //"E" => "Jarak fisik antara komputer dalam jaringan",
            ],
            "answer" => "B"


        ],

        // Soal no 4
        [
            "question" => "Array [7, 3, 1, 9, 5] diurutkan menggunakan insertion sort. Apa hasil array setelah iterasi ketiga?",
            "choice" => [
                "A" => "[1, 3, 5, 7, 9]",
                "B" => "[1, 3, 5, 7, 9]",
                "C" => "[3, 5, 7, 9, 1]",
                "D" => "[1, 3, 7, 9, 5]",
                //"E" => "Dalam topologi bus, jika salah satu node rusak, seluruh jaringan tetap berfungsi normal.",
            ],
            "answer" => "D"


        ],

        // Soal no 5
        [
            "question" => "Diberikan array [10, 4, 6, 3]. Apa hasil array iterasi kedua menggunakan insertion sort?",
            "choice" => [
                "A" => "[4, 6, 10, 3]",
                "B" => "[3, 4, 6, 10]",
                "C" => "[6, 3, 10, 4]",
                "D" => "[3, 4, 6, 10]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "A"


        ],

        // Soal no 6
        [
            "question" => "Deret bilangan [9, 5, 2, 7] diurutkan dengan insertion sort. Apa isi deret bilangan iterasi pertama?",
            "choice" => [
                "A" => "[5, 9, 2, 7]",
                "B" => "[2, 5, 9, 7]",
                "C" => "[5, 9, 2, 7]",
                "D" => "[2, 9, 5, 7]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "A"


        ],

        // Soal no 7
        [
            "question" => "Apa iterasi ke 3 insertion sort pada deret bilangan [6, 4, 8, 1, 3], hasil deret bilangannya adalah:",
            "choice" => [
                "A" => "[1, 3, 4, 6, 8]",
                "B" => "[1, 4, 6, 8, 3]",
                "C" => "[4, 6, 8, 3, 1]",
                "D" => "[4, 6, 8, 1, 3]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "B"


        ],

        // Soal no 8
        [
            "question" => "Diberikan deret bilangan [3, 1, 4, 2], berapa total iterasi yang dilakukan dalam insertion sort untuk menyelesaikan pengurutan?",
            "choice" => [
                "A" => "2 iterasi",
                "B" => "3 iterasi",
                "C" => "4 iterasi",
                "D" => "5 iterasi",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "B"


        ],

        // Soal no 9
        [
            "question" => "Dalam algoritma insertion sort, bagaimana cara elemen baru dimasukkan ke dalam sub-deret bilangan yang sudah terurut?",
            "choice" => [
                "A" => "Dicari posisi dengan binary search lalu disisipkan",
                "B" => "Dibandingkan dari awal sampai menemukan posisi yang tepat lalu digeser",
                "C" => "Ditambahkan ke akhir lalu diurut ulang",
                "D" => "Diganti nilainya dengan elemen terkecil",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "B"


        ],

        // Soal no 10
        [
            "question" => "Apa yang terjadi jika insertion sort digunakan untuk mengurutkan deret bilangan yang sudah terurut dengan benar?",
            "choice" => [
                "A" => "Waktu proses menjadi sangat lama",
                "B" => "Tidak terjadi penukaran dan proses berjalan sangat cepat",
                "C" => "Algoritma gagal karena tidak menemukan elemen yang salah",
                "D" => "Semua elemen akan dibalik urutannya",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "A"


        ],
    ];

    static public function getQuestion()
    {
        return self::$questions;
    }
}
