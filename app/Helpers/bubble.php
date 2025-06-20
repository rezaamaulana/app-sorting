<?php

namespace App\Helpers;


class bubble
{

    protected static $questions = [

        // Soal no 1
        [
            "question" => "Array berikut akan diurutkan menggunakan bubble sort: [10, 7, 12, 5]. Apa hasil array setelah iterasi pertama?",
            "choice" => [
                "A" => "[7, 10, 12, 5]",
                "B" => "[10, 7, 5, 12]",
                "C" => "[7, 10, 5, 12]",
                "D" => "[7, 5, 10, 12]",
                //"E" => "Cabang matematika yang berhubungan dengan statistik dan probabilitas",
            ],
            "answer" => "C"


        ],

        // Soal no 2
        [
            "question" => "Array [8, 3, 6, 2] sedang diurutkan menggunakan bubble sort. Apa hasil array setelah dua iterasi pertama?",
            "choice" => [
                "A" => "[3, 2, 6, 8]",
                "B" => "[3, 6, 2, 8]",
                "C" => "[2, 3, 6, 8]",
                "D" => "[8, 6, 3, 2]",
                //"E" => "Teknik pengelolaan data dalam sebuah jaringan local",
            ],
            "answer" => "B"


        ],

        // Soal no 3
        [
            "question" => "Diberikan array [4, 9, 7, 3, 5]. Apa hasil array iterasi pertama dari algoritma bubble sort?",
            "choice" => [
                "A" => "[4, 7, 3, 5, 9]",
                "B" => "[3, 4, 7, 5, 9]",
                "C" => "[4, 3, 5, 7, 9]",
                "D" => "[4, 5, 3, 7, 9]",
                //"E" => "Jarak fisik antara komputer dalam jaringan",
            ],
            "answer" => "A"


        ],

        // Soal no 4
        [
            "question" => "Array [20, 5, 15, 10] akan diurutkan menggunakan bubble sort. Apa hasil array setelah iterasi kedua?",
            "choice" => [
                "A" => "[5, 15, 10, 20]",
                "B" => "[5, 10, 15, 20]",
                "C" => "[20, 5, 15, 10]",
                "D" => "[5, 15, 20, 10]",
                //"E" => "Dalam topologi bus, jika salah satu node rusak, seluruh jaringan tetap berfungsi normal.",
            ],
            "answer" => "A"


        ],

        // Soal no 5
        [
            "question" => "Array [3, 2, 1] akan diurutkan menggunakan bubble sort. Setelah selesai, berapa jumlah total iterasi dan penukaran elemen yang dilakukan?",
            "choice" => [
                "A" => "2 iterasi, 3 penukaran",
                "B" => "3 iterasi, 3 penukaran",
                "C" => "2 iterasi, 2 penukaran",
                "D" => "3 iterasi, 2 penukaran",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "B"


        ],

        // Soal no 6
        [
            "question" => "Deret bilangan [9, 4, 6, 1] diurutkan menggunakan bubble sort. Apa hasil deret bilangan iterasi pertama?",
            "choice" => [
                "A" => "[4, 6, 1, 9]",
                "B" => "[4, 6, 9, 1]",
                "C" => "[9, 6, 4, 1]",
                "D" => "[4, 9, 6, 1]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "A"


        ],

        // Soal no 7
        [
            "question" => "Setelah bubble sort selesai dijalankan pada deret bilangan [5, 1, 4, 2, 8], berapa jumlah total iterasi yang dilakukan?",
            "choice" => [
                "A" => "5 iterasi",
                "B" => "4 iterasi",
                "C" => "3 iterasi",
                "D" => "2 iterasi",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "B"


        ],

        // Soal no 8
        [
            "question" => "Dalam proses bubble sort, elemen manakah yang pasti sudah berada di posisi akhirnya setelah setiap iterasi?",
            "choice" => [
                "A" => "Elemen terkecil",
                "B" => "Elemen tengah",
                "C" => "Elemen terbesar",
                "D" => "Elemen acak",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "C"


        ],

        // Soal no 9
        [
            "question" => "Pada algoritma bubble sort, kapan proses pengurutan bisa dihentikan lebih awal dari jumlah iterasi maksimal?",
            "choice" => [
                "A" => "Jika sudah tidak ada elemen yang ditukar dalam satu iterasi",
                "B" => "Jika elemen terkecil sudah berada di awal",
                "C" => "Jika jumlah elemen genap",
                "D" => "Jika elemen terbesar sudah di akhir",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "A"


        ],

        // Soal no 10
        [
            "question" => "Dalam algoritma bubble sort, bagaimana cara kerja proses pengurutan tiap iterasi?",
            "choice" => [
                "A" => "Setiap elemen dibandingkan dengan semua elemen lain",
                "B" => "Elemen terakhir dibandingkan dengan elemen pertama saja",
                "C" => "Elemen-elemen saling bertukar jika tidak dalam urutan yang benar, dari kiri ke kanan",
                "D" => "Seluruh deret bilangan diacak ulang setiap kali",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "C"


        ],
    ];

    static public function getQuestion()
    {
        return self::$questions;
    }
}
