<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Insertion Sort - Iterasi 2</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            justify-content: center;
            margin: 10px;
        }

        .box {
            width: 50px;
            height: 50px;
            border: 2px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
            border-radius: 10px;
            background-color: #eee;
            cursor: default;
            position: relative;
            transition: background 0.3s, transform 0.5s ease;
        }

        .box.selected {
            background-color: #f8d775;
        }

        .box.sorted {
            background-color: #3cb371;
            color: white;
            font-weight: bold;
        }

        .iteration-label {
            font-weight: bold;
            margin-top: 20px;
        }

        .button-row {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            gap: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            color: white;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-reset {
            background-color: #dc3545;
        }

        .instruction {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 8px;
            text-align: center;
            width: 450px;
        }

        .active-row .box.selected {
            background-color: #f8d775 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        Pada iterasi ini, kita mengambil angka kelima, yaitu 4. Lalu bandingkan 6 dan 4, didapatkan bahwa 6 lebih besar
        dari 4 maka
        angka tersebut akan ditukar. Selanjutnya, kita akan membandingkan dengan angka
        sebelumnya, bandingkan 4 dan 5. Apakah 4 lebih kecil dari 5? Karena iya, kita akan menukar 5 dengan 4. Setelah
        itu, kita akan mengecek dengan
        angka sebelumnya lagi, yaitu 2. Apakah 4 lebih kecil dari 2? Karena 4 tidak lebih kecil dari 2, maka 4 sudah
        pada posisi benar, yaitu setelah 2 dan sebelum 5. Maka urutannya berubah (1, 2, 5, 6, 4) menjadi (1, 2, 4, 5, 6)
        <div id="displayAreaIterasi4"></div>

        <div class="instruction" id="instructionTextIterasi4">
            Klik <b>Tukar</b> jika elemen kiri lebih besar dan ingin ditukar, atau <b>Tidak Ditukar</b> jika posisi
            sudah benar.
        </div>

        <div class="button-row">
            <button id="btnTukarIterasi4" disabled>Tukar</button>
            <button id="btnTidakTukarIterasi4" disabled>Tidak Ditukar</button>
            <button id="btnResetIterasi4" class="btn-reset">Reset</button>
        </div>
    </div>

    <script>
        (function() {
            let Iterasi4_initialData = [1, 2, 5, 6, 4];
            let Iterasi4_data = [...Iterasi4_initialData];
            let Iterasi4_i = 4;
            let Iterasi4_j = Iterasi4_i;
            let Iterasi4_beforeSwap = null;
            let Iterasi4_hasFinished = false;

            const Iterasi4_displayArea = document.getElementById("displayAreaIterasi4");
            const Iterasi4_btnTukar = document.getElementById("btnTukarIterasi4");
            const Iterasi4_btnTidakTukar = document.getElementById("btnTidakTukarIterasi4");
            const Iterasi4_btnReset = document.getElementById("btnResetIterasi4");
            const Iterasi4_instructionText = document.getElementById("instructionTextIterasi4");

            function Iterasi4_render() {
                Iterasi4_displayArea.innerHTML = "";

                // Tampilkan data sebelum tukar, jika sudah ada
                if (Iterasi4_beforeSwap) {
                    Iterasi4_renderRow(Iterasi4_beforeSwap, "Iterasi ke-4", false);
                }

                if (Iterasi4_hasFinished) {
                    Iterasi4_renderRow(Iterasi4_data, "Hasil Pengurutan Iterasi 4", false);
                    Iterasi4_instructionText.innerText = "";
                    Iterasi4_btnTukar.disabled = true;
                    Iterasi4_btnTidakTukar.disabled = true;
                    return;
                }

                if (Iterasi4_i < Iterasi4_data.length) {
                    Iterasi4_renderRow(Iterasi4_data, `Iterasi ke-${Iterasi4_i}`, true, Iterasi4_j);
                }

                Iterasi4_updateButtons();
            }

            function Iterasi4_renderRow(arr, labelText, isActive = false, activeJ = null) {
                const wrapper = document.createElement("div");
                if (isActive) wrapper.classList.add("active-row");

                const label = document.createElement("div");
                label.className = "iteration-label";
                label.innerText = labelText;
                wrapper.appendChild(label);

                const row = document.createElement("div");
                row.className = "row";

                arr.forEach((val, idx) => {
                    const box = document.createElement("div");
                    box.className = "box";
                    box.innerText = val;

                    if (!isActive && labelText === "Iterasi ke-4") {
                        // Tandai elemen yang sudah terurut (sebelum posisi j)
                        if (idx < Iterasi4_j) {
                            box.classList.add("sorted");
                        }
                        // Tambahan: beri warna hijau untuk angka 5 di baris sebelum ditukar
                        if (val === 5) {
                            box.classList.add("sorted");
                        }


                    } else if (!isActive && idx <= Iterasi4_i - 1) {
                        box.classList.add("sorted");
                    } else if (isActive && idx < Iterasi4_i && (activeJ === null || (idx !== activeJ && idx !==
                            activeJ - 1))) {
                        box.classList.add("sorted");
                    }

                    // Tandai angka yang sedang dibandingkan
                    if (isActive && activeJ !== null && (idx === activeJ || idx === activeJ - 1)) {
                        box.classList.add("selected");
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(row);
                Iterasi4_displayArea.appendChild(wrapper);
            }

            function Iterasi4_updateButtons() {
                if (Iterasi4_hasFinished) return;

                if (Iterasi4_j > 0 && Iterasi4_data[Iterasi4_j - 1] > Iterasi4_data[Iterasi4_j]) {
                    Iterasi4_btnTukar.disabled = false;
                    Iterasi4_btnTidakTukar.disabled = true;
                    Iterasi4_instructionText.innerText =
                        `Bandingkan ${Iterasi4_data[Iterasi4_j - 1]} > ${Iterasi4_data[Iterasi4_j]} → klik "Tukar"`;
                } else {
                    Iterasi4_btnTukar.disabled = true;
                    Iterasi4_btnTidakTukar.disabled = false;
                    Iterasi4_instructionText.innerText =
                        `Bandingkan ${Iterasi4_data[Iterasi4_j - 1]} <= ${Iterasi4_data[Iterasi4_j]} → klik "Tidak Ditukar"`;
                }
            }

            function Iterasi4_tukar() {
                if (Iterasi4_hasFinished) return;

                // Simpan data sebelum swap hanya jika belum disimpan
                if (!Iterasi4_beforeSwap) {
                    Iterasi4_beforeSwap = [...Iterasi4_data];
                }

                // Tukar elemen
                [Iterasi4_data[Iterasi4_j - 1], Iterasi4_data[Iterasi4_j]] = [Iterasi4_data[Iterasi4_j], Iterasi4_data[
                    Iterasi4_j - 1]];

                Iterasi4_j--;

                Iterasi4_render();
            }

            function Iterasi4_tidakTukar() {
                if (Iterasi4_hasFinished) return;

                if (!Iterasi4_beforeSwap) {
                    Iterasi4_beforeSwap = [...Iterasi4_data];
                }

                Iterasi4_hasFinished = true;
                Iterasi4_render();
            }

            Iterasi4_btnTukar.addEventListener("click", Iterasi4_tukar);
            Iterasi4_btnTidakTukar.addEventListener("click", Iterasi4_tidakTukar);
            Iterasi4_btnReset.addEventListener("click", () => {
                Iterasi4_data = [...Iterasi4_initialData];
                Iterasi4_i = 4;
                Iterasi4_j = Iterasi4_i;
                Iterasi4_beforeSwap = null;
                Iterasi4_hasFinished = false;
                Iterasi4_render();
            });

            Iterasi4_render();
        })();
    </script>
</body>

</html>
