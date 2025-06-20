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
        Pada iterasi ini kita mengambil angka keempat, yaitu 5. Lalu, bandingkan dengan angka sebelumnya
        yaitu 6. Didapatkan bahwa 6 lebih besar dari 5 maka angka tersebut ditukar. Lalu, kita akan membandingkan
        lagi dengan angka sebelumnya, yaitu 2. Apakah 2 lebih kecil dari 5? Karena 5 tidak lebih kecil dari 2, maka 5
        sudah berada pada posisi yang benar, yaitu sebelum 2 dan setelah 6. Maka urutannya berubah (1, 2, 6, 5, 4)
        menjadi
        (1, 2, 5, 6, 4)
        <div id="displayAreaIterasi3"></div>

        <div class="instruction" id="instructionTextIterasi3">
            Klik <b>Tukar</b> jika elemen kiri lebih besar dan ingin ditukar, atau <b>Tidak Ditukar</b> jika posisi
            sudah benar.
        </div>

        <div class="button-row">
            <button id="btnTukarIterasi3" disabled>Tukar</button>
            <button id="btnTidakTukarIterasi3" disabled>Tidak Ditukar</button>
            <button id="btnResetIterasi3" class="btn-reset">Reset</button>
        </div>
    </div>

    <script>
        (function() {
            let Iterasi3_initialData = [1, 2, 6, 5, 4];
            let Iterasi3_data = [...Iterasi3_initialData];
            let Iterasi3_i = 3;
            let Iterasi3_j = Iterasi3_i;
            let Iterasi3_beforeSwap = null;
            let Iterasi3_hasFinished = false;

            const Iterasi3_displayArea = document.getElementById("displayAreaIterasi3");
            const Iterasi3_btnTukar = document.getElementById("btnTukarIterasi3");
            const Iterasi3_btnTidakTukar = document.getElementById("btnTidakTukarIterasi3");
            const Iterasi3_btnReset = document.getElementById("btnResetIterasi3");
            const Iterasi3_instructionText = document.getElementById("instructionTextIterasi3");

            function Iterasi3_render() {
                Iterasi3_displayArea.innerHTML = "";

                // Tampilkan data sebelum tukar, jika sudah ada
                if (Iterasi3_beforeSwap) {
                    Iterasi3_renderRow(Iterasi3_beforeSwap, "Iterasi ke-3", false);
                }

                if (Iterasi3_hasFinished) {
                    Iterasi3_renderRow(Iterasi3_data, "Hasil Pengurutan Iterasi 3", false);
                    Iterasi3_instructionText.innerText = "";
                    Iterasi3_btnTukar.disabled = true;
                    Iterasi3_btnTidakTukar.disabled = true;
                    return;
                }

                if (Iterasi3_i < Iterasi3_data.length) {
                    Iterasi3_renderRow(Iterasi3_data, `Iterasi ke-${Iterasi3_i}`, true, Iterasi3_j);
                }

                Iterasi3_updateButtons();
            }

            function Iterasi3_renderRow(arr, labelText, isActive = false, activeJ = null) {
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

                    // Tandai angka yang sudah terurut di baris "Sebelum Ditukar"
                    if (!isActive && labelText === "Iterasi ke-3") {
                        if (idx <= Iterasi3_i - 1 && idx !== Iterasi3_j - 0) {
                            box.classList.add("sorted");
                        }
                    } else if (!isActive && idx <= Iterasi3_i - 1) {
                        box.classList.add("sorted");
                    } else if (isActive && idx < Iterasi3_i && (activeJ === null || (idx !== activeJ && idx !==
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
                Iterasi3_displayArea.appendChild(wrapper);
            }

            function Iterasi3_updateButtons() {
                if (Iterasi3_hasFinished) return;

                if (Iterasi3_j > 0 && Iterasi3_data[Iterasi3_j - 1] > Iterasi3_data[Iterasi3_j]) {
                    Iterasi3_btnTukar.disabled = false;
                    Iterasi3_btnTidakTukar.disabled = true;
                    Iterasi3_instructionText.innerText =
                        `Bandingkan ${Iterasi3_data[Iterasi3_j - 1]} > ${Iterasi3_data[Iterasi3_j]} → klik "Tukar"`;
                } else {
                    Iterasi3_btnTukar.disabled = true;
                    Iterasi3_btnTidakTukar.disabled = false;
                    Iterasi3_instructionText.innerText =
                        `Bandingkan ${Iterasi3_data[Iterasi3_j - 1]} <= ${Iterasi3_data[Iterasi3_j]} → klik "Tidak Ditukar"`;
                }
            }

            function Iterasi3_tukar() {
                if (Iterasi3_hasFinished) return;
                Iterasi3_beforeSwap = [...Iterasi3_data];

                [Iterasi3_data[Iterasi3_j - 1], Iterasi3_data[Iterasi3_j]] = [Iterasi3_data[Iterasi3_j], Iterasi3_data[
                    Iterasi3_j - 1]];
                Iterasi3_j--;
                Iterasi3_render();
            }

            function Iterasi3_tidakTukar() {
                if (Iterasi3_hasFinished) return;
                if (!Iterasi3_beforeSwap) {
                    Iterasi3_beforeSwap = [...Iterasi3_data];
                }
                Iterasi3_hasFinished = true;
                Iterasi3_render();
            }

            Iterasi3_btnTukar.addEventListener("click", Iterasi3_tukar);
            Iterasi3_btnTidakTukar.addEventListener("click", Iterasi3_tidakTukar);
            Iterasi3_btnReset.addEventListener("click", () => {
                Iterasi3_data = [...Iterasi3_initialData];
                Iterasi3_i = 3;
                Iterasi3_j = Iterasi3_i;
                Iterasi3_beforeSwap = null;
                Iterasi3_hasFinished = false;
                Iterasi3_render();
            });

            Iterasi3_render();
        })();
    </script>
</body>

</html>
