<?php

namespace App\Helpers;


class evaluasi
{

    protected static $questions = [

        // Soal no 1
        [
            "question" => "Apa yang dilakukan oleh algoritma Bubble Sort?",
            "choice" => [
                "A" => "Menyisipkan elemen pada posisi yang tepat",
                "B" => "Membandingkan dan menukar elemen yang bersebelahan",
                "C" => "Cabang matematika yang berhubungan dengan tata ruang yang tidak berubah dalam deformasi dwikontinu",
                "D" => "Membagi array menjadi dua bagian",
                //"E" => "Cabang matematika yang berhubungan dengan statistik dan probabilitas",
            ],
            "answer" => "B"


        ],

        // Soal no 2
        [
            "question" => "Apa tujuan dari Insertion Sort?  ",
            "choice" => [
                "A" => "Memilih elemen terbesar dan menukarnya dengan elemen pertama",
                "B" => "Mengurutkan array dengan menyisipkan elemen satu persatu",
                "C" => "Memilih pivot dari array",
                "D" => "Menggabungkan dua sub-array yang terurut",
                //"E" => "Teknik pengelolaan data dalam sebuah jaringan local",
            ],
            "answer" => "B"


        ],

        // Soal no 3
        [
            "question" => "Langkah pertama pada Selection Sort adalah: ",
            "choice" => [
                "A" => "Memilih elemen pertama sebagai pivot",
                "B" => "Membandingkan elemen bersebelahan",
                "C" => "Mencari elemen terkecil dari bagian belum terurut",
                "D" => "Menyisipkan elemen di posisi yang benar",
                //"E" => "Jarak fisik antara komputer dalam jaringan",
            ],
            "answer" => "C"


        ],

        // Soal no 4
        [
            "question" => "Pada array [5, 3, 6, 2, 1],  iterasi berapakah mendekati array [3, 2, 1, 5, 6] menggunakan bubble sort?",
            "choice" => [
                "A" => "Iterasi 3",
                "B" => "Iterasi 2",
                "C" => "Iterasi 5",
                "D" => "Iterasi 1",
                //"E" => "Dalam topologi bus, jika salah satu node rusak, seluruh jaringan tetap berfungsi normal.",
            ],
            "answer" => "B"


        ],

        // Soal no 5
        [
            "question" => "Iterasi ke-3 menggunakan insertion sort pada array [7, 3, 5, 2, 1] adalah?",
            "choice" => [
                "A" => "[1, 2, 3, 5, 7]",
                "B" => "[2, 3, 5, 7, 1]",
                "C" => "[3, 5, 7, 2, 1]",
                "D" => "[3, 7, 5, 2, 1]",
                //"E" => "Bentuk jaringan topologi star menyerupai lingkaran, dengan setiap komputer terhubung ke dua komputer lainnya.",
            ],
            "answer" => "B"


        ],

        // Soal no 6
        [
            "question" => "Apa perbedaan utama antara Selection Sort dan Bubble Sort?",
            "choice" => [
                "A" => "Selection Sort mencari elemen terkecil, sedangkan Bubble Sort menukar elemen bersebelahan",
                "B" => "Bubble Sort bekerja lebih cepat dibandingkan Selection Sort",
                "C" => "Selection Sort membandingkan elemen dengan elemen pivot",
                "D" => "Selection Sort tidak memerlukan perbandingan antara elemen-elemen",
                //"E" => "Model yang berfungsi untuk mengelola perangkat lunak dalam jaringan komputer.",
            ],
            "answer" => "A"


        ],

        // Soal no 7
        [
            "question" => "Apa yang terjadi jika elemen pada Bubble Sort sudah terurut pada iterasi awal?",
            "choice" => [
                "A" => "Algoritma berhenti",
                "B" => "Algoritma tetap melanjutkan hingga iterasi selesai",
                "C" => "Elemen-elemen akan dipindahkan ke bagian kanan",
                "D" => "Algoritma memilih elemen baru untuk diurutkan",
                //"E" => "Menjaga kestabilan daya listrik dalam jaringan komputer.",
            ],
            "answer" => "B"


        ],

        // Soal no 8
        [
            "question" => "Pada algoritma Insertion Sort, elemen dibandingkan dengan:",
            "choice" => [
                "A" => "Elemen sebelah kanannya",
                "B" => "Elemen paling besar dalam array",
                "C" => "Elemen sebelah kirinya yang sudah terurut",
                "D" => "Pivot yang telah dipilih",
                //"E" => "Menangani manajemen bandwidth dalam jaringan.",
            ],
            "answer" => "C"


        ],

        // Soal no 9
        [
            "question" => "Algoritma pengurutan mana yang paling efisien jika data sudah hampir terurut?",
            "choice" => [
                "A" => "Bubble Sort",
                "B" => "Insertion Sort",
                "C" => "Merge Sort",
                "D" => "Quick Sort",
                //"E" => "Application, Presentation, Transport, Network, Data Link, Session, Physical",
            ],
            "answer" => "B"


        ],

        // Soal no 10
        [
            "question" => "Pada array [8, 6, 4, 5, 3], iterasi berapakah mendekati array [3, 4, 5, 6, 8] menggunakan selection sort?",
            "choice" => [
                "A" => "Iterasi 2",
                "B" => "Iterasi 3",
                "C" => "Iterasi 4",
                "D" => "Iterasi 5",
                //"E" => "Membaca dan menulis data dari dan ke jalur komunikasi.",
            ],
            "answer" => "D"


        ],

        // Soal no 11
        [
            "question" => "Pada array [4, 2, 6, 3, 1], hasil dari iterasi pertama bubble sort adalah?",
            "choice" => [
                "A" => "[2, 4, 3, 1, 6]",
                "B" => "[4, 2, 6, 3, 1]",
                "C" => "[4, 3, 1, 2, 6]",
                "D" => "[2, 6, 3, 1, 4]",
                //"E" => "Protokol yang digunakan untuk mengatur transmisi suara dalam telepon.",
            ],
            "answer" => "A"


        ],

        // Soal no 12
        [
            "question" => "Berapa jumlah total iterasi yang dibutuhkan untuk menyelesaikan array [7, 5, 3, 1] dengan bubble sort?",
            "choice" => [
                "A" => "3 Iterasi",
                "B" => "6 Iterasi",
                "C" => "4 Iterasi",
                "D" => "5 Iterasi",
                //"E" => "Tidak pernah dikembangkan",
            ],
            "answer" => "C"


        ],

        // Soal no 13
        [
            "question" => "Pada array [8, 4, 6, 2, 1], setelah iterasi kedua, bagaimana urutan array menggunakan bubble sort?",
            "choice" => [
                "A" => "[4, 6, 2, 1, 8]",
                "B" => "[6, 4, 1, 2, 8]",
                "C" => "[4, 6, 2, 1, 8]",
                "D" => "[4, 2, 6, 1, 8]",
                //"E" => "Kinerja yang lebih tinggi dibandingkan protokol jaringan lainnya",
            ],
            "answer" => "C"


        ],

        // Soal no 14
        [
            "question" => "Apa langkah utama yang dilakukan dalam bubble sort?",
            "choice" => [
                "A" => "Membandingkan setiap elemen dengan elemen lainnya",
                "B" => "Membandingkan dua elemen berurutan dan menukar jika perlu",
                "C" => "Memasukkan elemen ke posisi yang tepat",
                "D" => "Membagi array menjadi dua bagian",
                //"E" => "Menambahkan informasi untuk error checking pada paket-paket data.",
            ],
            "answer" => "B"


        ],

        // Soal no 15
        [
            "question" => 'Dalam bubble sort, mengapa disebut "bubble"?',
            "choice" => [
                "A" => "Karena elemen terbesar akan mengapung ke atas seperti gelembung",
                "B" => "Karena elemen disusun secara acak",
                "C" => "Karena array dibagi menjadi gelembung kecil",
                "D" => "Karena elemen kecil selalu berada di posisi tengah",
                //"E" => "Menyediakan antarmuka pengguna aplikasi.",
            ],
            "answer" => "A"


        ],

        // Soal no 16
        [
            "question" => "Pada array [9, 5, 7, 3, 1], iterasi ke-3 menggunakan insertion sort menghasilkan?",
            "choice" => [
                "A" => "[5, 7, 9, 1, 3]",
                "B" => "[5, 7, 9, 3, 1]",
                "C" => "[3, 5, 7, 9, 1]",
                "D" => "[3, 1, 7, 9, 5]",
                //"E" => "Access Point",
            ],
            "answer" => "B"


        ],

        // Soal no 17
        [
            "question" => "Array awal adalah [8, 2, 4, 1]. Setelah iterasi kedua menggunakan insertion sort, urutan array adalah?",
            "choice" => [
                "A" => "[2, 8, 4, 1]",
                "B" => "[2, 4, 8, 1]",
                "C" => "[1, 4, 8, 2]",
                "D" => "[8, 4, 1, 2]",
                //"E" => "Switch",
            ],
            "answer" => "A"


        ],

        // Soal no 18
        [
            "question" => "Insertion sort sering digunakan pada kasus:",
            "choice" => [
                "A" => "Array berukuran kecil",
                "B" => "Array berisi data acak besar",
                "C" => "Array yang selalu diurutkan secara menurun",
                "D" => "Array dengan elemen yang duplikat",
                //"E" => "Repeater",
            ],
            "answer" => "A"


        ],

        // Soal no 19
        [
            "question" => "Pada array [6, 3, 7, 2, 5], iterasi pertama selection sort menghasilkan?",
            "choice" => [
                "A" => "[2, 3, 6, 7, 5]",
                "B" => "[2, 3, 7, 6, 5]",
                "C" => "[6, 3, 7, 2, 5]",
                "D" => "[3, 6, 7, 2, 5]",
                //"E" => "Kabel Power",
            ],
            "answer" => "B"


        ],

        // Soal no 20
        [
            "question" => "Apa yang dilakukan selection sort di setiap iterasi?",
            "choice" => [
                "A" => "Membandingkan elemen-elemen secara berurutan",
                "B" => "Mencari elemen terbesar dan menukarnya ke posisi akhir",
                "C" => "Mencari elemen terkecil dan menukarnya ke posisi awal",
                "D" => "Menukar elemen berdasarkan indeks tertentu",
                //"E" => "Access Point",
            ],
            "answer" => "C"


        ]
    ];

    static public function getQuestion()
    {
        return self::$questions;
    }
}
