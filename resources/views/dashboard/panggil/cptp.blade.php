<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Pembelajaran</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Light Theme CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: lightgray;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            background: linear-gradient(180deg, #403279, #2575fc);
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }

        .nav-tabs {
            border-bottom: 2px solid #dee2e6;
        }

        .nav-tabs .nav-link {
            border: none;
            border-radius: 10px 10px 0 0;
            margin-right: 5px;
            padding: 10px 20px;
            background-color: #f1f1f1;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            background-color: #e0e0e0;
            color: #000;
        }

        .nav-tabs .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            font-weight: bold;
        }

        .tab-content {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 10px 10px;
            padding: 25px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .table {
            color: #333;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        h4 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            display: inline-block;
            padding-bottom: 4px;
        }

        .bord,
        .bordU2 {
            background-color: #efefef;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #0d6efd;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }

        .content {
            padding: 10px;
            font-size: 16px;
        }

        .content ul {
            margin: 10px 0;
        }

        .content ul li {
            margin: 5px 0;
        }
    </style>
</head>

<body>

    <div class="container mt-4 mb-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link bg-danger text-white" href="/dashboard"><i
                        class="fa-solid fa-arrow-left"></i></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" id="nav-petunjuk-tab" data-bs-toggle="tab" data-bs-target="#nav-petunjuk"
                    role="tab" aria-controls="nav-petunjuk" aria-selected="false">TP & CP</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" id="nav-dafus-tab" data-bs-toggle="tab" data-bs-target="#nav-dafus" role="tab"
                    aria-controls="nav-dafus" aria-selected="false">Capaian Pembelajaran</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" role="tab"
                    aria-controls="nav-info" aria-selected="true">Informasi Aplikasi</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="nav-info" class="tab-pane fade">
                <div class="row">
                    <div class="col">
                        <div class="bord">
                            <h4>Info Media</h4>
                            <p>Media Pembelajaran ini dibuat untuk memenuhi syarat dalam menyelesaikan program strata-1
                                Pendidikan Komputer dengan judul <em>"PENGEMBANGAN MEDIA PEMBELAJARAN INTERAKTIF
                                    BERBASIS WEB PADA MATERI PENGURUTAN(SORTING) DENGAN METODE TUTORIAL"</em>.</p>
                        </div>

                        <div class="bord">
                            <h4>Info Author</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>Reza Maulana</td>
                                        </tr>
                                        <tr>
                                            <td>NIM</td>
                                            <td>2010131310012</td>
                                        </tr>
                                        <tr>
                                            <td>Dosen Pembimbing Utama</td>
                                            <td>Dr. Harja Santana Purba, M.Kom.</td>
                                        </tr>
                                        <tr>
                                            <td>Dosen Pembimbing Pendamping</td>
                                            <td>Muhammad Hifdzi Adini, S.Kom., M.T.</td>
                                        </tr>
                                        <tr>
                                            <td>Program Studi</td>
                                            <td>Pendidikan Komputer</td>
                                        </tr>
                                        <tr>
                                            <td>Fakultas</td>
                                            <td>Keguruan dan Ilmu Pendidikan</td>
                                        </tr>
                                        <tr>
                                            <td>Instansi</td>
                                            <td>Universitas Lambung Mangkurat</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>2010131310012@mhs.ulm.ac.id</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div id="nav-dafus" class="tab-pane fade">
                <div class="bord">
                    <h4>Daftar Pustaka</h4>
                    <ol>
                        <li>Tortora, G. J., & Derrickson, B. (2009). <em>Principles of anatomy and physiology</em> (12th
                            ed.). John Wiley & Sons, Inc.</li>
                        <li>Silverthorn, D. U. (2010). <em>Human physiology: An integrated approach</em>. Pearson
                            Education, Inc.</li>
                    </ol>
                </div>
            </div> --}}

            <div id="nav-petunjuk" class="tab-pane fade show active">
                <div class="bord">
                    <h4>Tujuan Pembelajaran</h4>
                    <div class="content">
                        <ul>
                            <li>Siswa memahami beberapa algoritma proses sorting.</li>
                            <li>Siswa mampu menerapkan strategi algoritmik untuk menemukan cara yang paling efisien
                                dalam proses sorting.</li>
                        </ul>
                    </div>
                </div>
                <div class="bord">
                    <h4>Capaian Pembelajaran</h4>
                    <div class="content">
                        <p>Pada akhir fase E, peserta didik mampu menerapkan strategi algoritmik standar untuk
                            menghasilkan beberapa solusi persoalan dengan data diskrit bervolume tidak kecil pada
                            kehidupan sehari-hari maupun implementasinya dalam program komputer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
