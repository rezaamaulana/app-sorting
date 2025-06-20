<?php

namespace App\Helpers;


class selection
{

    protected static $questions = [

        // Soal no 1
        [
            "question" => "Diberikan array [8, 2, 5, 3, 9]. Apa hasil array iterasi pertama menggunakan selection sort?",
            "choice" => [
                "A" => "[2, 3, 5, 8, 9]",
                "B" => "[2, 8, 5, 3, 9]",
                "C" => "[3, 2, 5, 8, 9]",
                "D" => "[2, 5, 8, 3, 9]",
                //"E" => "Cabang matematika yang berhubungan dengan statistik dan probabilitas",
            ],
            "answer" => "B"


        ],

        // Soal no 2
        [
            "question" => "Diberikan array [12, 4, 7, 9, 5]. Apa hasil array iterasi kedua menggunakan selection sort?",
            "choice" => [
                "A" => "[4, 5, 7, 9, 12]",
                "B" => "[4, 7, 9, 12, 5]",
                "C" => "[4, 5, 12, 7, 9]",
                "D" => "[4, 7, 5, 9, 12]",
                //"E" => "Teknik pengelolaan data dalam sebuah jaringan local",
            ],
            "answer" => "C"


        ],

        // Soal no 3
        [
            "question" => "Diberikan array [14, 3, 9, 7, 11]. Apa hasil array iterasi pertama menggunakan selection sort?",
            "choice" => [
                "A" => "[3, 14, 9, 7, 11]",
                "B" => "[3, 9, 7, 11, 14]",
                "C" => "[3, 14, 9, 7, 11]",
                "D" => "[3, 7, 9, 14, 11]",
                //"E" => "Jarak fisik antara komputer dalam jaringan",
            ],
            "answer" => "A"


        ],

        // Soal no 4
        [
            "question" => "4.	Diberikan array [10, 4, 6, 8, 2]. Apa hasil array iterasi ketiga menggunakan selection sort?",
            "choice" => [
                "A" => "[2, 4, 6, 10, 8]",
                "B" => "[4, 6, 8, 2, 10]",
                "C" => "[2, 4, 6, 8, 10]",
                "D" => "[4, 6, 2, 8, 10]",
                //"E" => "Dalam topologi bus, jika salah satu node rusak, seluruh jaringan tetap berfungsi normal.",
            ],
            "answer" => "A"


        ],

        // Soal no 5
        [
            "question" => "Diberikan array [6, 1, 8, 3, 2]. Apa hasil akhir array berikut menggunakan selection sort?",
            "choice" => [
                "A" => "[1, 3, 8, 6, 2]",
                "B" => "[1, 6, 2, 3, 8]",
                "C" => "[1, 3, 6, 8, 2]",
                "D" => "[1, 2, 3, 6, 8]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "D"


        ],

        // Soal no 6
        [
            "question" => "Diberikan deret bilangan [5, 3, 8, 4, 6]. Apa hasil deret bilangan iterasi pertama menggunakan selection sort?",
            "choice" => [
                "A" => "[3, 5, 8, 4, 6]",
                "B" => "[3, 4, 8, 5, 6]",
                "C" => "[5, 3, 4, 6, 8]",
                "D" => "[3, 5, 6, 4, 8]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "A"


        ],

        // Soal no 7
        [
            "question" => "Deret bilangan [7, 2, 1, 6] diurutkan menggunakan selection sort. Apa hasil deret bilangan iterasi kedua?",
            "choice" => [
                "A" => "[1, 2, 7, 6]",
                "B" => "[1, 6, 7, 2]",
                "C" => "[1, 2, 7, 6]",
                "D" => "[1, 2, 6, 7]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "A"


        ],

        // Soal no 8
        [
            "question" => "Jelaskan bagaimana algoritma selection sort bekerja pada deret bilangan [13, 9, 5, 7, 8] hingga iterasi ketiga.",
            "choice" => [
                "A" => "Setiap elemen dibandingkan dengan elemen berikutnya, dan deret bilangan akan terlihat seperti [5, 9, 7, 8, 13] setelah iterasi ketiga.",
                "B" => "Elemen terkecil dipindahkan ke awal di setiap iterasi, dan deret bilangan akan terlihat seperti [5, 7, 8, 9, 13] setelah iterasi ketiga.",
                "C" => "Elemen terbesar dipindahkan ke akhir, dan deret bilangan akan terlihat seperti [5, 7, 8, 9, 13] setelah iterasi ketiga.",
                "D" => "Proses berulang tanpa penukaran, jadi deret bilangan tetap seperti [13, 9, 5, 7, 8] setelah iterasi ketiga.",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "B"


        ],

        // Soal no 9
        [
            "question" => "Pada algoritma selection sort, bagaimana cara elemen terkecil dipindahkan ke posisi yang benar pada iterasi pertama jika deret bilangan yang diberikan adalah [3, 6, 2, 8, 1]?",
            "choice" => [
                "A" => "Algoritma memilih elemen terkecil (2), menukarnya dengan elemen kedua (6), dan deret bilangan menjadi [3, 2, 6, 8, 1].",
                "B" => "Algoritma memilih elemen terkecil (1), menukarnya dengan elemen pertama (3), dan deret bilangan menjadi [1, 2, 6, 8, 3].",
                "C" => "Algoritma memilih elemen terkecil (2), menukarnya dengan elemen pertama (3), dan deret bilangan menjadi [2, 6, 3, 8, 1].",
                "D" => "Algoritma memilih elemen terkecil (1), menukarnya dengan elemen pertama (3), dan deret bilangan menjadi [1, 6, 2, 8, 3].",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "D"


        ],

        // Soal no 10
        [
            "question" => "Jelaskan bagaimana algoritma selection sort menyelesaikan pengurutan pada deret bilangan [12, 6, 3, 8, 10] setelah semua iterasi selesai.",
            "choice" => [
                "A" => "Algoritma hanya melakukan satu iterasi dan deret bilangan tetap tidak berubah, yaitu [12, 6, 3, 8, 10].",
                "B" => "Selection sort hanya menukarkan elemen terbesar di setiap iterasi, sehingga hasil akhir deret bilangan adalah [6, 3, 8, 10, 12].",
                "C" => "Selection sort menemukan elemen terkecil di setiap iterasi dan menukarnya dengan elemen yang ada di posisi yang benar, sehingga menghasilkan deret bilangan terurut [3, 6, 8, 10, 12].",
                "D" => "Setelah iterasi pertama, algoritma membalikkan urutan deret bilangan menjadi [10, 8, 3, 6, 12].",
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
