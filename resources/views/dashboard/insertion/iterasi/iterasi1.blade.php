<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Insertion Sort Iterasi 1 Saja</title>
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
        <a>Langkah pertama, bandingkan angka pertama dan kedua, yaitu 1 dan 6. Didapatkan 1 lebih kecil dari 6, maka
            urutan
            angka tersebut tetap (1,6). (1, 6, 2, 5, 4) menjadi (1, 6, 2, 5, 4)
        </a>
        <div id="displayAreaIterasi1"></div>

        <div class="instruction" id="instructionTextIterasi1">
            Klik tombol <b>Tukar</b> jika elemen kiri lebih besar dan ingin ditukar, atau klik <b>Tidak Ditukar</b>
            untuk lanjut jika sudah benar posisi.
        </div>

        <div class="button-row">
            <button id="btnTukarIterasi1" disabled>Tukar</button>
            <button id="btnTidakTukarIterasi1" disabled>Tidak Ditukar</button>
            <button id="btnResetIterasi1" class="btn-reset">Reset</button>
        </div>
    </div>

    <script>
        (function() {
            let Iterasi1_initialData = [1, 6, 2, 5, 4];
            let Iterasi1_data = [...Iterasi1_initialData];
            let Iterasi1_i = 1;
            let Iterasi1_j = Iterasi1_i;
            let Iterasi1_history = [];
            let Iterasi1_hasFinished = false;

            const Iterasi1_displayArea = document.getElementById("displayAreaIterasi1");
            const Iterasi1_btnTukar = document.getElementById("btnTukarIterasi1");
            const Iterasi1_btnTidakTukar = document.getElementById("btnTidakTukarIterasi1");
            const Iterasi1_btnReset = document.getElementById("btnResetIterasi1");
            const Iterasi1_instructionText = document.getElementById("instructionTextIterasi1");

            function Iterasi1_render() {
                Iterasi1_displayArea.innerHTML = "";

                if (Iterasi1_history.length > 0) {
                    Iterasi1_renderRow(Iterasi1_history[0].data, 1, false);
                }

                if (Iterasi1_hasFinished) {
                    Iterasi1_renderRow(Iterasi1_history[0].data, "Hasil Pengurutan Iterasi 1", false);
                    Iterasi1_instructionText.innerText = "";
                    Iterasi1_btnTukar.disabled = true;
                    Iterasi1_btnTidakTukar.disabled = true;
                    return;
                }

                if (Iterasi1_i > 1) {
                    Iterasi1_hasFinished = true;
                    Iterasi1_render();
                    return;
                }

                if (Iterasi1_i < Iterasi1_data.length) {
                    Iterasi1_renderRow(Iterasi1_data, Iterasi1_i, true, Iterasi1_j);
                }

                Iterasi1_updateButtons();
            }

            function Iterasi1_renderRow(arr, iteration, isActive = false, activeJ = null) {
                const wrapper = document.createElement("div");
                if (isActive) wrapper.classList.add("active-row");

                const label = document.createElement("div");
                label.className = "iteration-label";
                label.innerText = typeof iteration === "number" ? `Iterasi ke-${iteration}` : iteration;
                wrapper.appendChild(label);

                const row = document.createElement("div");
                row.className = "row";

                arr.forEach((val, idx) => {
                    const box = document.createElement("div");
                    box.className = "box";
                    box.innerText = val;

                    if (!isActive && idx === 0) {
                        box.classList.add("sorted");
                    }

                    if (isActive && activeJ !== null && (idx === activeJ || idx === activeJ - 1)) {
                        box.classList.add("selected");
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(row);
                Iterasi1_displayArea.appendChild(wrapper);
            }

            function Iterasi1_updateButtons() {
                if (Iterasi1_hasFinished || Iterasi1_i > 1) {
                    Iterasi1_btnTukar.disabled = true;
                    Iterasi1_btnTidakTukar.disabled = true;
                    return;
                }

                if (Iterasi1_j > 0 && Iterasi1_data[Iterasi1_j - 1] > Iterasi1_data[Iterasi1_j]) {
                    Iterasi1_btnTukar.disabled = false;
                    Iterasi1_btnTidakTukar.disabled = true;
                    Iterasi1_instructionText.innerText =
                        `Bandingkan ${Iterasi1_data[Iterasi1_j - 1]} > ${Iterasi1_data[Iterasi1_j]} → klik "Tukar" untuk tukar.`;
                } else {
                    Iterasi1_btnTukar.disabled = true;
                    Iterasi1_btnTidakTukar.disabled = false;
                    Iterasi1_instructionText.innerText =
                        `Bandingkan ${Iterasi1_data[Iterasi1_j - 1]} < ${Iterasi1_data[Iterasi1_j]} → klik "Tidak Ditukar" untuk lanjut.`;
                }
            }

            function Iterasi1_tukar() {
                if (Iterasi1_hasFinished || Iterasi1_i > 1) return;
                [Iterasi1_data[Iterasi1_j - 1], Iterasi1_data[Iterasi1_j]] = [Iterasi1_data[Iterasi1_j], Iterasi1_data[
                    Iterasi1_j - 1]];
                Iterasi1_j--;
                Iterasi1_render();
            }

            function Iterasi1_tidakTukar() {
                if (Iterasi1_hasFinished || Iterasi1_i > 1) return;
                Iterasi1_history.push({
                    data: [...Iterasi1_data]
                });
                Iterasi1_i++;
                Iterasi1_j = Iterasi1_i;
                Iterasi1_render();
            }

            Iterasi1_btnTukar.addEventListener("click", Iterasi1_tukar);
            Iterasi1_btnTidakTukar.addEventListener("click", Iterasi1_tidakTukar);
            Iterasi1_btnReset.addEventListener("click", () => {
                Iterasi1_data = [...Iterasi1_initialData];
                Iterasi1_i = 1;
                Iterasi1_j = Iterasi1_i;
                Iterasi1_history = [];
                Iterasi1_hasFinished = false;
                Iterasi1_render();
            });

            Iterasi1_render();
        })();
    </script>
</body>

</html>
