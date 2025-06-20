<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deret Bilangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .alert {
            background-color: #e3f2fd;
            border-left: 5px solid #2196f3;
            padding: 10px 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .number-row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .number-box {
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            font-size: 20px;
            border: 2px solid black;
            background-color: #ffeb3b;
            margin: 5px;
            border-radius: 15px;
            transition: transform 0.4s;
        }

        .number-box.swap-animate-left {
            animation: swapLeft 0.4s forwards;
        }

        .number-box.swap-animate-right {
            animation: swapRight 0.4s forwards;
        }

        @keyframes swapLeft {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-62px);
            }
        }

        @keyframes swapRight {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(62px);
            }
        }

        .iterasi-label {
            animation: fadeIn 0.5s ease-in-out;
            font-weight: bold;
            text-align: center;
            margin: 15px 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .control-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .control-buttons button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .control-buttons button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        #status {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }

        .arrow-swap {
            position: absolute;
            font-size: 24px;
            color: #ff5722;
            user-select: none;
            animation: slideArrow 0.8s ease-in-out infinite alternate;
        }

        @keyframes slideArrow {
            0% {
                transform: translateX(-50%) translateX(-5px);
                opacity: 0.7;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translateX(-50%) translateX(5px);
                opacity: 0.7;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        Untuk pengurutan keseluruhannya sebagai berikut:
        <br><br>
        <div class="alert">
            💡 <b>Perhatikan:</b> Petunjuk Arahan Dibawah Deret Bilangan dan Ikuti Sesuai Instruksi!
        </div>

        <div id="infoIterasi" class="iterasi-label"></div>
        <div id="rowsContainer"></div>

        <div class="control-buttons">
            <button id="btnTukar">Tukar</button>
            <button id="btnTidakTukar">Tidak Ditukar</button>
            <button id="btnReset" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="status"></div>
    </div>

    <script>
        let i = 0;
        let j = 1;
        const initialData = [2, 8, 4, 3, 9];
        let currentData = [...initialData];

        const rowsContainer = document.getElementById("rowsContainer");
        const btnTukar = document.getElementById("btnTukar");
        const btnTidakTukar = document.getElementById("btnTidakTukar");
        const btnReset = document.getElementById("btnReset");
        const status = document.getElementById("status");

        function renderIterasiText(nomorIterasi) {
            const textDiv = document.createElement("div");
            textDiv.className = "iterasi-label";
            textDiv.innerText = `Iterasi ke-${nomorIterasi}`;
            rowsContainer.appendChild(textDiv);
        }

        function updateInfoIterasi() {
            const info = document.getElementById("infoIterasi");
            if (i < 1) {
                info.innerText = `Iterasi ke-${i + 1}`;
            } else {
                info.innerText = `Iterasi ke-1 selesai ⛔`;
            }
        }

        function renderRow(data, highlightIndex = null) {
            const row = document.createElement("div");
            row.className = "number-row";

            data.forEach((num, idx) => {
                const box = document.createElement("div");
                box.className = "number-box";
                box.innerText = num;

                if (highlightIndex !== null && (idx === highlightIndex || idx === highlightIndex + 1)) {
                    box.style.backgroundColor = "#add8e6";
                }

                row.appendChild(box);
            });

            rowsContainer.appendChild(row);
        }

        function updateButtonState() {
            if (i >= 1) {
                btnTukar.disabled = true;
                btnTidakTukar.disabled = true;
                status.innerText = "";
                return;
            }

            const kiri = currentData[j];
            const kanan = currentData[j + 1];

            if (kiri < kanan) {
                btnTukar.disabled = true;
                btnTidakTukar.disabled = false;
                status.innerHTML = `Sekarang bandingkan ${kiri} < ${kanan}, angka <b>tidak ditukar</b>`;
            } else {
                btnTukar.disabled = false;
                btnTidakTukar.disabled = true;
                status.innerHTML = `Sekarang bandingkan ${kiri} > ${kanan}, angka <b>ditukar</b>`;
            }
        }

        function lanjutkanStep() {
            j++;

            if (j >= currentData.length - 1 - i) {
                i++;
                j = 0;
                if (i < 1) {
                    renderIterasiText(i + 1);
                }
            }

            if (i < 1) {
                renderRow(currentData, j);
                updateButtonState();
            } else {
                renderRow(currentData);
                updateButtonState();
            }

            updateInfoIterasi();
        }

        btnTukar.addEventListener("click", () => {
            const row = rowsContainer.lastChild;
            const rowBoxes = row.querySelectorAll(".number-box");

            const box1 = rowBoxes[j];
            const box2 = rowBoxes[j + 1];

            box1.classList.add("swap-animate-right");
            box2.classList.add("swap-animate-left");

            setTimeout(() => {
                const temp = currentData[j];
                currentData[j] = currentData[j + 1];
                currentData[j + 1] = temp;

                box1.classList.remove("swap-animate-right");
                box2.classList.remove("swap-animate-left");

                renderRow(currentData);

                // HENTI ketika 8 dan 4 ditukar
                if (
                    (temp === 8 && currentData[j] === 4) ||
                    (temp === 4 && currentData[j] === 8)
                ) {
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = "Berhenti karena sudah menukar 8 dan 4";
                } else {
                    lanjutkanStep();
                }
            }, 400);
        });

        btnTidakTukar.addEventListener("click", () => {
            lanjutkanStep();
        });

        btnReset.addEventListener("click", () => {
            currentData = [...initialData];
            i = 0;
            j = 0;
            rowsContainer.innerHTML = "";
            status.innerText = "";
            btnTukar.disabled = false;
            btnTidakTukar.disabled = false;
            renderRow(currentData, j);
            updateButtonState();
            updateInfoIterasi();
        });

        // Start
        renderRow(currentData, j);
        updateButtonState();
        updateInfoIterasi();
    </script>
</body>

</html>
