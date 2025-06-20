<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Latihan Bubble Sort Interaktif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-header {
            background: linear-gradient(180deg, #403279, #2575fc);
            border-bottom: 2px solid #2f63ff;
            border-radius: 0 0 16px 16px;
        }

        .header-title {
            background: rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-header a {
            color: white;
            transition: transform 0.2s ease;
        }

        .custom-header a:hover {
            transform: scale(1.1);
        }

        .drop-zone {
            border: 2px dashed #ccc;
            border-radius: 10px;
            min-height: 80px;
            padding: 10px;
            text-align: center;
            background-color: #f8f9fa;
        }

        .draggable {
            cursor: move;
        }

        img.sort-image {
            max-width: 150px;
            margin: 5px;
        }

        tbody td {
            vertical-align: middle;
        }

        h5 {
            background: linear-gradient(to right, #2575fc, #8cb0ff);
            color: white;
            font-size: 1.1rem;
            padding: 8px;
            border-radius: 8px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <!-- HEADER -->
    <div class="custom-header d-flex justify-content-between align-items-center px-4 py-3 shadow-sm">
        <div class="header-title px-4 py-2">
            🎯 Latihan Bubble Sort
        </div>
    </div>

    <!-- MODAL FEEDBACK -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4">
                <h5 class="modal-title mb-3" id="modalTitle"></h5>
                <div id="modalMessage" class="mb-3"></div>
                <div id="modalButtons"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="container-soal">
                <section id="soal-1">
                    <x-soal-latihan :nomor="1" gambarSoal="img/bubble/latihan/soal1/soal1.png" :gambarIterasi="[
                        'iterasi1' => 'img/bubble/latihan/soal1/iterasi1.png',
                        'iterasi2' => 'img/bubble/latihan/soal1/iterasi2.png',
                        'iterasi3' => 'img/bubble/latihan/soal1/iterasi3.png',
                    ]"
                        :jawabanbenar="[
                            1 => 'iterasi1',
                            2 => 'iterasi2',
                            3 => 'iterasi3',
                        ]" />
                </section>
                <section id="soal-2">
                    <x-soal-latihan :nomor="2" gambarSoal="img/bubble/latihan/soal2/soal2.png" :gambarIterasi="[
                        'iterasi3' => 'img/bubble/latihan/soal2/iterasi3.png',
                        'iterasi1' => 'img/bubble/latihan/soal2/iterasi1.png',
                        'iterasi2' => 'img/bubble/latihan/soal2/iterasi2.png',
                    ]"
                        :jawabanbenar="[
                            1 => 'iterasi1',
                            2 => 'iterasi2',
                            3 => 'iterasi3',
                        ]" />
                </section>
                <section id="soal-3">
                    <x-soal-latihan :nomor="3" gambarSoal="img/bubble/latihan/soal3/soal3.png" :gambarIterasi="[
                        'iterasi2' => 'img/bubble/latihan/soal3/iterasi2.png',
                        'iterasi1' => 'img/bubble/latihan/soal3/iterasi1.png',
                        'iterasi3' => 'img/bubble/latihan/soal3/iterasi3.png',
                    ]"
                        :jawabanbenar="[
                            1 => 'iterasi1',
                            2 => 'iterasi2',
                            3 => 'iterasi3',
                        ]" />
                </section>
            </div>
            <div class="col-md-3">
                <div class="card  card-body rounded-0" style="margin:2px; position: sticky; top: 0; z-index: 999;">
                    <h4 class="mx-2 mb-2">Soal <span id="pages-show">1</span> / <span id="el-total"></span></h4>
                    <div class="m-auto d-flex justify-content-center align-items-center flex-wrap" id="container-nomer">

                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-secondary rounded-0" id="btn-left"><i
                                class="bi bi-arrow-90deg-left"></i></button>
                        <button class="btn btn-primary w-100 rounded-0" disabled id="btn-selesai">Selesai</button>
                        <button class="btn btn-secondary rounded-0" id="btn-right"><i
                                class="bi bi-arrow-90deg-right"></i></button>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade st" id="finishModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Latihan Selesai</h5>
                    <button type="button" class="btn-close" data-bs-backdrop="static" data-bs-keyboard="false"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h1 id="nilai" style="font-size:5rem; font-weight: bold; color: #3275ff;">

                        </h1>
                    </div>
                    <table class="table">
                        <tr>
                            <td>Jumlah Benar</td>
                            <td id="trueAns"></td>
                        </tr>
                        <tr>
                            <td>Jumlah Salah</td>
                            <td id="falseAns"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.href='{{ url('/dashboard/bubble') }}'"
                        class="back btn btn-secondary">Kembali
                        Ke Materi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        let totalSoal = 5;

        let jawabanBenar = 0;
        let jawabanSiswa = [];
        const numberContainer = document.getElementById('container-nomer')
        const soalContainer = document.getElementById('container-soal')
        const elTotal = document.getElementById('el-total')
        const finishBtn = document.getElementById('btn-selesai')

        const finishModal = document.getElementById('finishModal')
        const trueAns = document.getElementById('trueAns');
        const falseAns = document.getElementById('falseAns');
        const nilai = document.getElementById('nilai');

        const btnLeft = document.getElementById('btn-left');
        const btnRight = document.getElementById('btn-right');


        const populatedNumber = () => {
            totalSoal = soalContainer.children.length
            elTotal.innerHTML = totalSoal;
            let renderP = ``;
            let nomorAktif = parseInt(document.getElementById('pages-show').textContent);
            for (let index = 0; index < totalSoal; index++) {
                const nomor = index + 1;
                const isAnswered = jawabanSiswa[nomor] !== undefined;

                renderP += `
                    <button
                        class="btn-nomor btn btn-outline-${isAnswered ? 'success' : 'primary'} m-2 btn-nav ${nomorAktif == nomor ? 'rounded-pill' : 'rounded-0' } position-relative"
                        data-soal="${nomor}">
                        ${nomor}
                        ${isAnswered ? '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">✓</span>' : ''}
                    </button>`;
            }
            numberContainer.innerHTML = renderP;

            document.querySelectorAll(".btn-nomor").forEach((btn) => {
                btn.addEventListener("click", function() {
                    const nomor = this.dataset.soal;
                    console.log(nomor);
                    for (let i = 1; i <= totalSoal; i++) {
                        let section = document.getElementById(`soal-${i}`);
                        if (section) {
                            section.classList.add('d-none');
                        }
                    }
                    let aktif = document.getElementById(`soal-${nomor}`);
                    if (aktif) {
                        aktif.classList.remove('d-none');
                        document.getElementById('pages-show').textContent = nomor;
                    }
                });
            });
        }

        populatedNumber();

        tampilkanSoal(1);

        function setJawabanBenar(nomer, jawaban) {
            jawabanSiswa[nomer] = jawaban;
            console.log(jawabanSiswa);
            populatedNumber();
            checkIsAllAnswered();
        }

        btnLeft.addEventListener('click', function() {
            let nomorAktif = parseInt(document.getElementById('pages-show').textContent);
            if (nomorAktif > 1) {
                nomorAktif--;
                tampilkanSoal(nomorAktif);
            }
        });

        btnRight.addEventListener('click', function() {
            let nomorAktif = parseInt(document.getElementById('pages-show').textContent);
            if (nomorAktif < totalSoal) {
                nomorAktif++;
                tampilkanSoal(nomorAktif);
            }
        });

        // arrow press
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
                event.preventDefault(); // Mencegah scroll halaman
            }
            if (event.key === 'ArrowLeft') {
                btnLeft.click();
            } else if (event.key === 'ArrowRight') {
                btnRight.click();
            }
        });



        finishBtn.addEventListener('click', function() {
            let jawabanBenar = 0;
            let jawabanSalah = 0;
            for (let i = 1; i <= totalSoal; i++) {
                if (jawabanSiswa[i] !== undefined) {
                    if (jawabanSiswa[i]) {
                        jawabanBenar++;
                    } else {
                        jawabanSalah++;
                    }
                }
            }

            console.log(jawabanBenar, jawabanSalah);
            trueAns.textContent = jawabanBenar;
            falseAns.textContent = jawabanSalah;
            nilai.textContent = `${ (jawabanBenar / totalSoal * 100).toFixed(1)}%`;


            const modal = new bootstrap.Modal(document.getElementById('finishModal'));
            modal.show();
        })


        function tampilkanSoal(nomor) {
            console.log(nomor)
            for (let i = 1; i <= totalSoal; i++) {
                let section = document.getElementById(`soal-${i}`);
                if (section) {
                    section.classList.add('d-none');
                }
            }
            let aktif = document.getElementById(`soal-${nomor}`);
            if (aktif) {
                aktif.classList.remove('d-none');
                document.getElementById('pages-show').textContent = nomor;
            }
            window.scrollTo(0, 0);

            populatedNumber();
        }

        function checkIsAllAnswered() {
            if (jawabanSiswa.length > totalSoal) {
                finishBtn.disabled = false;
            } else {
                finishBtn.disabled = true;
            }
        }

        function deleteJawaban(nomer) {
            if (jawabanSiswa[nomer]) {
                delete jawabanSiswa[nomer];
                populatedNumber();
            }
        }

        // Contoh pemanggilan (kamu bisa panggil ini setelah user nyusun gambar dengan benar)
        // simpanJawaban(1, true);
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
