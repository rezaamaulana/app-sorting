<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simulasi Bubble Sort 1A</title>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        .container1A {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .alert1A {
            background-color: #e7f3ff;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        #infoIterasi1A {
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .rowAngka1A {
            display: flex;
            justify-content: center;
            margin-bottom: 12px;
        }

        .kotakAngka1A {
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            font-size: 20px;
            border: 2px solid black;
            background-color: #ffeb3b;
            margin: 5px;
            border-radius: 12px;
        }

        .kotakAngka1A.animKiri {
            animation: gerakKiri 0.4s forwards;
        }

        .kotakAngka1A.animKanan {
            animation: gerakKanan 0.4s forwards;
        }

        @keyframes gerakKiri {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-60px);
            }
        }

        @keyframes gerakKanan {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(60px);
            }
        }

        .tombolKontrol1A {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .tombolKontrol1A button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        #btnTukar1A {
            background-color: #007bff;
        }

        #btnSkip1A {
            background-color: #6c757d;
        }

        #btnUlang1A {
            background-color: #dc3545;
        }

        #status1A {
            margin-top: 15px;
            text-align: center;
            font-size: 16px;
        }

        .labelIterasi1A {
            animation: munculPelan 0.5s ease-in-out;
        }

        @keyframes munculPelan {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container1A">
        <div class="alert1A">
            <b>Petunjuk:</b> Klik tombol sesuai hasil perbandingan dua angka!
        </div>

        <div id="infoIterasi1A">Iterasi ke-1</div>
        <div id="zonaDeret1A"></div>

        <div class="tombolKontrol1A">
            <button id="btnTukar1A">Tukar</button>
            <button id="btnSkip1A">Tidak Ditukar</button>
            <button id="btnUlang1A">Reset</button>
        </div>

        <div id="status1A"></div>
    </div>

    <script>
        let urutanI1A = 0;
        let urutanJ1A = 0;
        const dataAwal1A = [7, 1, 5, 3, 6];
        let dataAktif1A = [...dataAwal1A];

        const zonaDeret1A = document.getElementById("zonaDeret1A");
        const btnTukar1A = document.getElementById("btnTukar1A");
        const btnSkip1A = document.getElementById("btnSkip1A");
        const btnUlang1A = document.getElementById("btnUlang1A");
        const status1A = document.getElementById("status1A");

        function buatLabelIterasi1A(nomor) {
            const label = document.createElement("div");
            label.className = "labelIterasi1A";
            label.innerText = `Iterasi ke-${nomor}`;
            label.style.fontWeight = "bold";
            label.style.textAlign = "center";
            label.style.marginBottom = "10px";
            label.style.color = "#333";
            zonaDeret1A.appendChild(label);
        }

        function tampilkanBaris1A(data, highlightIndex = null) {
            const baris = document.createElement("div");
            baris.className = "rowAngka1A";

            data.forEach((angka, index) => {
                const box = document.createElement("div");
                box.className = "kotakAngka1A";
                box.innerText = angka;

                if (highlightIndex !== null && (index === highlightIndex || index === highlightIndex + 1)) {
                    box.style.backgroundColor = "#90caf9";
                }

                if (urutanJ1A === data.length - 2 && index === data.length - 1) {
                    box.style.backgroundColor = "#90caf9";
                    box.style.fontWeight = "bold";
                }

                if (urutanI1A > 0 && index >= dataAktif1A.length - urutanI1A) {
                    box.style.backgroundColor = "#90ee90";
                    box.style.fontWeight = "bold";
                }

                baris.appendChild(box);
            });

            zonaDeret1A.appendChild(baris);
        }

        function updateTombol1A() {
            const kiri = dataAktif1A[urutanJ1A];
            const kanan = dataAktif1A[urutanJ1A + 1];

            if (urutanI1A >= dataAktif1A.length - 1) {
                status1A.innerText = "Pengurutan selesai! ✅";
            } else if (kiri < kanan) {
                status1A.innerHTML = `Bandingkan ${kiri} dan ${kanan}, apakah ditukar atau tidak`;
            } else {
                status1A.innerHTML = `Bandingkan ${kiri} dan ${kanan}, apakah ditukar atau tidak`;
            }
        }

        function lanjutIterasi1A() {
            urutanJ1A++;

            if (urutanJ1A >= dataAktif1A.length - 1 - urutanI1A) {
                urutanI1A++;
                urutanJ1A = 0;
                if (urutanI1A < dataAktif1A.length - 1) {
                    buatLabelIterasi1A(urutanI1A + 1);
                }
            }

            if (urutanI1A < dataAktif1A.length - 1) {
                tampilkanBaris1A(dataAktif1A, urutanJ1A);
                updateTombol1A();
            } else {
                tampilkanBaris1A(dataAktif1A);
                updateTombol1A();
                Swal.fire({
                    icon: 'success',
                    title: 'Selesai!',
                    text: 'Pengurutan selesai!',
                    confirmButtonText: 'Oke'
                });
            }
        }

        btnTukar1A.addEventListener("click", () => {
            if (urutanI1A >= dataAktif1A.length - 1) return;

            const kiri = dataAktif1A[urutanJ1A];
            const kanan = dataAktif1A[urutanJ1A + 1];

            if (kiri <= kanan) {
                Swal.fire({
                    icon: 'error',
                    title: 'Salah',
                    text: `${kiri} < ${kanan}, jadi tidak boleh ditukar.`,
                    confirmButtonText: 'Mengerti!'
                });
                return;
            }

            const boxBaris = zonaDeret1A.lastChild.querySelectorAll(".kotakAngka1A");
            const kiriBox = boxBaris[urutanJ1A];
            const kananBox = boxBaris[urutanJ1A + 1];

            kiriBox.classList.add("animKanan");
            kananBox.classList.add("animKiri");

            setTimeout(() => {
                const temp = dataAktif1A[urutanJ1A];
                dataAktif1A[urutanJ1A] = dataAktif1A[urutanJ1A + 1];
                dataAktif1A[urutanJ1A + 1] = temp;

                lanjutIterasi1A();
            }, 400);
        });

        btnSkip1A.addEventListener("click", () => {
            if (urutanI1A >= dataAktif1A.length - 1) return;

            const kiri = dataAktif1A[urutanJ1A];
            const kanan = dataAktif1A[urutanJ1A + 1];

            if (kiri > kanan) {
                Swal.fire({
                    icon: 'error',
                    title: 'Salah',
                    text: `${kiri} > ${kanan}, jadi harusnya ditukar.`,
                    confirmButtonText: 'Oke!'
                });
                return;
            }

            lanjutIterasi1A();
        });

        btnUlang1A.addEventListener("click", () => {
            dataAktif1A = [...dataAwal1A];
            urutanI1A = 0;
            urutanJ1A = 0;
            zonaDeret1A.innerHTML = "";
            status1A.innerText = "";
            tampilkanBaris1A(dataAktif1A, urutanJ1A);
            updateTombol1A();
        });

        // Mulai simulasi
        tampilkanBaris1A(dataAktif1A, urutanJ1A);
        updateTombol1A();
    </script>
</body>

</html>
