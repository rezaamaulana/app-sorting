<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visual Sort</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        .frame {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .notice {
            background-color: #e3f2fd;
            border-left: 5px solid #2196f3;
            padding: 10px 15px;
            margin-bottom: 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .deret {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .kotak {
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            margin: 5px;
            background: #ffeb3b;
            border: 2px solid black;
            border-radius: 12px;
            font-size: 18px;
            transition: transform 0.4s;
        }

        .kotak.geser-kiri {
            animation: goLeft 0.4s forwards;
        }

        .kotak.geser-kanan {
            animation: goRight 0.4s forwards;
        }

        @keyframes goLeft {
            to {
                transform: translateX(-62px);
            }
        }

        @keyframes goRight {
            to {
                transform: translateX(62px);
            }
        }

        .judul-iterasi {
            text-align: center;
            font-weight: bold;
            margin: 12px 0;
        }

        .kontrol {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .kontrol button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        .kontrol button:disabled {
            background-color: #ccc;
        }

        #msg {
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="frame">
        Langkah pertama, tinjau bilangan kedua, bandingkan bilangan pertama dan kedua, yaitu 8 dan 2. Antara bilangan
        tersebut 8 yang lebih besar dari 2 maka urutannya diubah menjadi (<b>2, 8,</b> 4, 3, 9).
        <br><br>

        <div id="iterasiInfo" class="judul-iterasi"></div>
        <div id="barisAngka"></div>

        <div class="kontrol">
            <button id="gantiBtn">Tukar</button>
            <button id="lewatiBtn">Lewati</button>
            <button id="ulangBtn" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="msg"></div>
    </div>

    <script>
        let langkah = 0;
        let pointer = 0;
        const dataAwal = [8, 2, 4, 3, 9];
        let dataAktif = [...dataAwal];

        const barisAngka = document.getElementById("barisAngka");
        const gantiBtn = document.getElementById("gantiBtn");
        const lewatiBtn = document.getElementById("lewatiBtn");
        const ulangBtn = document.getElementById("ulangBtn");
        const msg = document.getElementById("msg");
        const iterasiInfo = document.getElementById("iterasiInfo");

        function tampilIterasi(nomor) {
            iterasiInfo.textContent = langkah < 1 ? `Iterasi ke-${nomor}` : `Iterasi ke-1 selesai ⛔`;
        }

        function tampilkanDeret(data, sorot = null, label = "") {
            const wrapper = document.createElement("div");

            // Tambahkan label jika ada
            if (label) {
                const info = document.createElement("div");
                info.style.textAlign = "center";
                info.style.marginBottom = "6px";
                info.style.fontSize = "14px";
                info.style.color = "black";
                info.innerHTML = label;
                wrapper.appendChild(info);
            }

            const baris = document.createElement("div");
            baris.className = "deret";

            data.forEach((angka, idx) => {
                const el = document.createElement("div");
                el.className = "kotak";
                el.textContent = angka;

                if (sorot !== null && (idx === sorot || idx === sorot + 1)) {
                    el.style.backgroundColor = "#cfeafe";
                }

                if (langkah > 0 && idx >= data.length - langkah) {
                    el.style.backgroundColor = "#b9fbc0";
                    el.style.fontWeight = "bold";
                }

                baris.appendChild(el);
            });

            wrapper.appendChild(baris);
            barisAngka.appendChild(wrapper);
        }

        function updateStatus() {
            if (langkah >= 1) {
                gantiBtn.disabled = true;
                lewatiBtn.disabled = true;
                msg.innerText = "";
                return;
            }

            const kiri = dataAktif[pointer];
            const kanan = dataAktif[pointer + 1];

            if (kiri < kanan) {
                gantiBtn.disabled = true;
                lewatiBtn.disabled = false;
                msg.innerHTML = `Bandingkan ${kiri} < ${kanan}, jadi <b>tidak ditukar</b>`;
            } else {
                gantiBtn.disabled = false;
                lewatiBtn.disabled = true;
                msg.innerHTML = `Bandingkan ${kiri} > ${kanan}, jadi <b>ditukar</b>`;
            }
        }

        function prosesSelanjutnya() {
            pointer++;
            if (pointer >= dataAktif.length - 1 - langkah) {
                langkah++;
                pointer = 0;
            }

            if (langkah < 1) {
                tampilkanDeret(dataAktif, pointer);
                updateStatus();
            } else {
                tampilkanDeret(dataAktif);
                updateStatus();
            }

            tampilIterasi(langkah + 1);
        }

        gantiBtn.addEventListener("click", () => {
            const kotak2 = barisAngka.lastChild.querySelectorAll(".kotak");

            const satu = kotak2[pointer];
            const dua = kotak2[pointer + 1];

            satu.classList.add("geser-kanan");
            dua.classList.add("geser-kiri");

            setTimeout(() => {
                let temp = dataAktif[pointer];
                dataAktif[pointer] = dataAktif[pointer + 1];
                dataAktif[pointer + 1] = temp;

                satu.classList.remove("geser-kanan");
                dua.classList.remove("geser-kiri");

                tampilkanDeret(dataAktif, null, "Hasil pertukaran");

                gantiBtn.disabled = true;
                lewatiBtn.disabled = true;
                msg.textContent = `${temp} dan ${dataAktif[pointer]} sudah bertukar.`;
            }, 400);
        });

        lewatiBtn.addEventListener("click", () => {
            prosesSelanjutnya();
        });

        ulangBtn.addEventListener("click", () => {
            dataAktif = [...dataAwal];
            langkah = 0;
            pointer = 0;
            barisAngka.innerHTML = "";
            msg.innerText = "";
            gantiBtn.disabled = false;
            lewatiBtn.disabled = false;
            tampilkanDeret(dataAktif, pointer);
            updateStatus();
            tampilIterasi(langkah + 1);
        });

        // Inisialisasi pertama
        tampilkanDeret(dataAktif, pointer);
        updateStatus();
        tampilIterasi(langkah + 1);
    </script>
</body>

</html>
