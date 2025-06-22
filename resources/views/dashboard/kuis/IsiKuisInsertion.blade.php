<!doctype html>
<html lang="en">
@php
    $materi = 'Kuis-Insertion-Sort';
@endphp

<head>

    <style>
        body {
            background-color: #fdf6f0;
            /* coklat muda keputihan */
            color: #4b2e1e;
            /* teks coklat tua */
        }

        .navbar,
        .card-header,
        .btn-primary,
        .modal-header {
            background: linear-gradient(180deg, #403279, #2575fc);
            border-color: #000000;
            color: #fff;
        }

        .btn-outline-primary {
            color: #8b5e3c;
            border-color: #8b5e3c;
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:focus {
            background-color: #8b5e3c;
            color: #fff;
        }

        .card {
            background-color: #fffaf5;
            border-color: #e0c9b4;
        }

        .badge.bg-success {
            background-color: blue !important;
            /* badge jawaban */
        }

        .btn-primary {
            background-color: #8b5e3c;
            border-color: #8b5e3c;
        }

        .btn-primary:hover {
            background-color: #744d2e;
            border-color: #744d2e;
        }

        .alert-success {
            background-color: #e4d1ba;
            color: #3f2b1c;
            border-color: #cbb294;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-color: #f5c2c7;
        }

        /* Warna coklat terang */
        :root {
            --coklat-terang: #d2b48c;
            --coklat-tua: #8b5e3c;
        }

        /* Tombol pilihan jawaban (misalnya btn-outline-primary) */
        .btn-outline-primary {
            border-color: blue;
            color: blue;
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:active,
        .btn-outline-primary:focus,
        .btn-outline-primary.active {
            background-color: blue;
            color: white;
            border-color: blue;
        }

        /* Tombol jawaban yang aktif (misalnya jawaban yang sedang dipilih) */
        .btn-primary,
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: blue !important;
            border-color: blue !important;
        }

        /* Nomor soal di panel kanan */
        .button-nomor-soal {
            border: 2px solid blue;
            color: blue;
            background-color: white;
        }

        .button-nomor-soal.active {
            background-color: blue;
            color: white;
            border-color: blue;
        }

        .ket {
            width: 25px;
            height: 25px;
            border-radius: 4px;
            border: 1px solid #aaa;
        }

        .ket-belum {
            background-color: white;
            border: 2px solid blue;
        }

        .ket-sudah {
            background-color: blue;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuis Insertion Sort</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet">
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <nav class="navbar text-white sticky-top">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <h4> {{ implode(' ', explode('-', $materi)) }}</h4>
            </a>
            <div class="d-flex align-items-stretch justify-content-start ">
                <h2 class="m-0"><span class="badge text-bg-warning me-3" id="waktu-durasi">20:00</span></h2>
                <button id="stop_test" class="btn btn-danger  rounded-2"><i class="bi bi-stop-circle-fill"></i> Hentikan
                    Kuis
                </button>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <h1 class="float-end mb-5"></h1>

            <div class="col-md-9">
                @php
                    $no = 1;
                    $label = ['A', 'C', 'B', 'D'];
                @endphp
                @foreach ($soalQuiz as $key => $value)
                    <div class="section d-none" id="section-{{ $no }}">
                        <div class="card mb-2">
                            <h5 class="card-header">Soal {{ $no }}</h5>
                            <div class="card-body">
                                <p style="font-size:20px;">{!! $value['question'] !!}</p>
                            </div>
                            <div class="card-footer bg-white p-4">
                                <h5 class="mb-3">Pilihan Jawaban</h5>
                                <div class="row">
                                    @foreach ($value['choice'] as $option => $key)
                                        <div class="col-md-6 d-flex justify-content-start mb-2 align-items-baseline">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" id="{{ $no . '-' . $option }}"
                                                    name="{{ $no }}" autocomplete="off"
                                                    value="{{ $option }}">
                                                <label class="btn btn-outline-primary"
                                                    for="{{ $no . '-' . $option }}">{{ $option }}</label><br>
                                            </div>
                                            <label class="ms-3"
                                                for="{{ $no . '-' . $option }}">{!! $key !!}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php
                            $no++;
                        @endphp
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="card  card-body rounded-0">
                    <h4 class="mx-2 mb-2">Soal <span id="pages-show">1</span> / {{ count($soalQuiz) }}</h4>
                    <div class="m-auto d-flex justify-content-center align-items-center flex-wrap">

                        @php $no = 1; @endphp
                        @for ($i = 0; $i < count($soalQuiz); $i++)
                            @if ($i > 8)
                                <button class="btn btn-outline-primary m-2 btn-nav rounded-0 position-relative"
                                    id="num-{{ $no }}">{{ $no }}
                                    <span id="let-{{ $no++ }}"
                                        class="d-none position-absolute top-0 start-100 translate-middle badge rounded-2 bg-success">
                                        A </span>
                                </button>
                            @else
                                <button class="btn btn-outline-primary m-2 btn-nav rounded-0 position-relative"
                                    id="num-{{ $no }}">0{{ $no }}
                                    <span id="let-{{ $no++ }}"
                                        class="d-none position-absolute top-0 start-100 translate-middle badge rounded-2 bg-success">
                                        A </span>
                                </button>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="card shadow keterangan mt-4 pb-4">
                    <div class="card-body">
                        <h5 class="mb-3">Keterangan:</h5>
                        <div class="row mb-2">
                            <div class="col-sm-2">
                                <div class="ket ket-belum"></div>
                            </div>
                            <h6 class="col">= Belum dijawab</h6>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="ket ket-sudah"></div>
                            </div>
                            <h6 class="col">= Sudah dijawab</h6>
                        </div>
                        <h6 class="mt-4 text-center">Setelah semua soal sudah terjawab, tekan tombol "Selesai"</h6>
                    </div>
                </div>
                <div class="m-auto d-flex justify-content-between align-items-center mt-2">
                    <button class="btn btn-primary me-1 rounded-0" id="prev" onclick="prevButton()"><i
                            class='bx bx-chevron-left me-2'></i> Sebelumnya
                    </button>
                    <button class="btn btn-primary rounded-0" id="next" onclick="nextButton()"> Selanjutnya <i
                            class='bx bx-chevron-right ms-2'></i></button>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                    <button class="btn btn-primary rounded-0 btn-block flex-fill" id="btn-submit">Selesai</button>
                </div>
            </div>

            <div class="modal fade" id="hasil-quiz" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hasil {{ implode(' ', explode('-', $materi)) }}</h5>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button> --}}
                        </div>
                        <div class="modal-body" id="modal-hasil">


                        </div>
                    </div>

                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js"></script>

            <script>
                const materi = "{{ $materi }}"
                const durasiView = document.getElementById('waktu-durasi');
                const pagesShow = document.getElementById('pages-show');
                const quiz = @json($soalQuiz);
                const stopTest = document.getElementById('stop_test');

                const quizModal = new bootstrap.Modal(document.getElementById('hasil-quiz'));

                const total = quiz.length;
                let currentPage = 1;
                let benar = 0;
                let salah = 0;
                let tidak_dijawab = 0
                let nilai = 0
                let answer = [];
                let startTime = "{{ session('startTime') }}";
                let endTime = "{{ session('endtime') }}";
                let remainingDuration = Math.floor((new Date(endTime).getTime() - Date.now()) / 1000);
                if (isNaN(remainingDuration) || remainingDuration <= 0) {
                    remainingDuration = 60 * 20; // mundur 20 menit
                }
                const submitBtn = document.getElementById('btn-submit');

                startTimer(remainingDuration, durasiView);

                stopTest.addEventListener("click", () => {
                    swal.fire({
                        title: "Apakah anda yakin menghentikan Ujian?",
                        text: "Ujian akan dihentikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hentikan!",
                        cancelButtonText: "Tidak, Batalkan",
                    }).then((willSubmit) => {
                        if (willSubmit) {
                            window.location.href = "/dashboard/insertion"
                        }
                    });
                })

                function startTimer(duration, display) {
                    let timer = duration,
                        minutes, seconds;
                    const interval = setInterval(function() {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        display.textContent = minutes + ":" + seconds;

                        if (--timer < 0) {
                            clearInterval(interval); // stop the timer
                            submit(); // secara otomatis submit kuis
                        }

                    }, 1000);
                }

                submitBtn.addEventListener('click', function() {
                    swal.fire({
                        title: "Apakah anda yakin?",
                        text: "Periksa kembali jawaban anda sebelum mengakhiri Kuis!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, selesai!",
                        cancelButtonText: "Tidak, kembali",
                    }).then((willSubmit) => {
                        if (willSubmit) {
                            submit();
                        }
                    });
                });


                const btnNav = document.querySelectorAll('.btn-nav');
                btnNav.forEach(btn => {
                    btn.addEventListener('click', function() {
                        currentPage = parseInt(this.innerHTML);
                        refreshPage();
                    });
                });

                const radioButtons = document.querySelectorAll('input[type="radio"]');
                radioButtons.forEach(radio => {
                    radio.addEventListener('change', function() {
                        answer[currentPage - 1] = this.value;

                        document.getElementById('let-' + currentPage).classList.remove('d-none');
                        document.getElementById('let-' + currentPage).innerHTML = this.value;
                    });
                });


                start();

                function start() {
                    refreshPage();
                }

                function nextButton() {
                    if (currentPage == total) {
                        return;
                    }
                    currentPage += 1;
                    refreshPage();
                }

                function prevButton() {
                    if (currentPage == 1) {
                        return;
                    }
                    currentPage -= 1;
                    refreshPage();
                }

                function submit() {
                    let submitTime = new Date();
                    let data = [];
                    benar = 0;
                    salah = 0;
                    nilai = 0
                    for (let i = 1; i <= quiz.length; i++) {
                        const answer = document.querySelector(`input[name="${i}"]:checked`);
                        if (answer) {
                            temp = {};
                            temp.question = i;
                            temp.answer = answer.value;
                            temp.benar = quiz[i - 1].answer == answer.value;
                            if (temp.benar) {
                                benar += 1;
                            } else {
                                salah += 1
                            }
                            data.push(temp);
                        } else {
                            tidak_dijawab += 1;
                        }
                    }

                    nilai = Math.floor((benar * 100) / quiz.length)
                    console.log(nilai, benar, salah, tidak_dijawab)
                    waktu_pengerjaan = Math.floor((submitTime - startTime) / 1000);
                    if (nilai > 70) {
                        localStorage.setItem("nilaiKuis2", nilai);
                    }
                    document.getElementById("modal-hasil").innerHTML = `
            <h1 id="hasil-quiz-nilai" class="text-center" style="font-size:80px;">${nilai}</h1>
            <table class="table text-center" >
                <thead>
                    <tr>
                        <th scope="col">Benar</th>
                        <th scope="col">Salah</th>
                        <th scope="col">tidak_dijawab</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="benar">${benar}</td>
                        <td id="salah">${salah}</td>
                        <td id="salah">${tidak_dijawab}</td>
                    </tr>
                </tbody>
            </table>

        </div>
            `
                    if (nilai >= {{ $kkmValue }}) {
                        document.getElementById("hasil-quiz-nilai").classList.add("text-success")
                        document.getElementById("hasil-quiz-nilai").classList.remove("text-danger")
                        document.getElementById("modal-hasil").innerHTML += `
                    <div class="alert alert-success" role="alert">
                        <i class='bx bx-error me-2'></i><box-icon name='error'></box-icon> Selamat anda lulus! )
                    </div>
        `
                    } else {
                        document.getElementById("hasil-quiz-nilai").classList.add("text-danger")
                        document.getElementById("hasil-quiz-nilai").classList.remove("text-success")
                        document.getElementById("modal-hasil").innerHTML += `
                    <div class="alert alert-danger" role="alert">
                        <i class='bx bx-error me-2'></i><box-icon name='error'></box-icon> Maaf anda tidak lulus!)
                    </div>
                            `
                    }

                    let footer = `<div class="d-flex justify-content-between align-items-center">`
                    footer += `<a href="/dashboard/insertion"  class="btn btn-secondary">Kembali ke Materi!</a>`
                    if (nilai >= {{ $kkmValue }}) {
                        footer += `  <a href="/dashboard/selection"  class="btn btn-primary">Materi Selanjutnya!</a>`
                    }
                    document.getElementById("modal-hasil").innerHTML += footer + `</div>`


                    storeEval({
                        data,
                        waktu_pengerjaan: Math.floor(3600 - remainingDuration),
                        nilai
                    })



                    quizModal.show();
                }

                function refreshPage() {
                    pagesShow.innerHTML = currentPage;
                    hideAll();
                    document.getElementById('section-' + currentPage).classList.remove('d-none');
                    document.getElementById('num-' + currentPage).classList.add('btn-primary');
                    document.getElementById('num-' + currentPage).classList.add('text-light');
                }

                function hideAll() {
                    for (let i = 1; i <= total; i++) {
                        document.getElementById('section-' + i).classList.add('d-none');

                        document.getElementById('num-' + i).classList.remove('btn-primary');
                        document.getElementById('num-' + i).classList.remove('text-light');
                    }
                }

                async function storeEval(data) {
                    try {
                        const response = await axios.post("{{ route('kuis.submit') }}", {
                            materi: "{{ $materi }}",
                            quiz: data,
                            nilai: nilai,
                            waktu_mulai: startTime,
                            waktu_selesai: endTime,
                            _csrf: "{{ csrf_token() }}"
                        })

                        if (response.status == 200) {

                            console.log(response.data)
                        }
                    } catch (error) {
                        console.log("error" + error)
                    }
                }
            </script>
</body>

</html>
