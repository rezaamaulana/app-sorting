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
            to {
                transform: translateX(-62px);
            }
        }

        @keyframes swapRight {
            to {
                transform: translateX(62px);
            }
        }

        .iterasi-label {
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }

        .hasil-label {
            /* font-weight: bold; */
            text-align: center;
            margin: 5px 0;
            color: black;
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

        #bubbleStatusV3 {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container" id="bubbleContainerV3">
        <a>Bandingkan bilangan keempat dan kelima, yaitu 8 dan 9. Karena 8 lebih kecil dari 9, maka tidak ditukar.
            <br><br>
        </a>
        <div id="bubbleIterasiV3" class="iterasi-label"></div>
        <div id="bubbleRowsV3"></div>
        <div class="control-buttons">
            <button id="btnTukarV3">Tukar</button>
            <button id="btnTidakTukarV3">Tidak Ditukar</button>
            <button id="btnResetV3" style="background-color: #dc3545;">Reset</button>
        </div>
        <div id="bubbleStatusV3" class="text-center mt-3"></div>
    </div>

    <script>
        function BubbleSortMiniV3() {
            let i3 = 0;
            let j3 = 3;
            const dataAwalV3 = [2, 4, 3, 8, 9];
            let dataSekarangV3 = [...dataAwalV3];

            const rowsContainer = document.getElementById("bubbleRowsV3");
            const btnTukar = document.getElementById("btnTukarV3");
            const btnTidakTukar = document.getElementById("btnTidakTukarV3");
            const btnReset = document.getElementById("btnResetV3");
            const status = document.getElementById("bubbleStatusV3");
            const info = document.getElementById("bubbleIterasiV3");

            function updateInfoIterasi() {
                info.innerText = `Iterasi ke-${i3 + 1}`;
            }

            function renderLabel(text) {
                const label = document.createElement("div");
                label.className = "hasil-label";
                label.innerText = text;
                rowsContainer.appendChild(label);
            }

            function renderRow(data, highlight = null) {
                const row = document.createElement("div");
                row.className = "number-row";
                data.forEach((num, idx) => {
                    const box = document.createElement("div");
                    box.className = "number-box";
                    box.innerText = num;
                    if (highlight !== null && (idx === highlight || idx === highlight + 1)) {
                        box.style.backgroundColor = "#add8e6";
                    }
                    row.appendChild(box);
                });
                rowsContainer.appendChild(row);
            }

            function updateButtonState() {
                const kiri = dataSekarangV3[j3];
                const kanan = dataSekarangV3[j3 + 1];
                if (kiri < kanan) {
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = false;
                    status.innerHTML = `Bandingkan ${kiri} < ${kanan}, <b>tidak ditukar</b>`;
                } else {
                    btnTukar.disabled = false;
                    btnTidakTukar.disabled = true;
                    status.innerHTML = `Bandingkan ${kiri} > ${kanan}, <b>ditukar</b>`;
                }
            }

            btnTukar.addEventListener("click", () => {
                const rowBoxes = rowsContainer.lastChild.querySelectorAll(".number-box");
                const box1 = rowBoxes[j3];
                const box2 = rowBoxes[j3 + 1];
                box1.classList.add("swap-animate-right");
                box2.classList.add("swap-animate-left");

                setTimeout(() => {
                    const temp = dataSekarangV3[j3];
                    dataSekarangV3[j3] = dataSekarangV3[j3 + 1];
                    dataSekarangV3[j3 + 1] = temp;

                    box1.classList.remove("swap-animate-right");
                    box2.classList.remove("swap-animate-left");

                    renderLabel("Hasil Pertukaran");
                    renderRow(dataSekarangV3);
                    status.innerText =
                        `${dataSekarangV3[j3 + 1]} dan ${dataSekarangV3[j3]} sudah bertukar.`;

                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                }, 400);
            });

            btnTidakTukar.addEventListener("click", () => {
                renderLabel("Hasil Pertukaran");
                renderRow(dataSekarangV3);
                const kiri = dataSekarangV3[j3];
                const kanan = dataSekarangV3[j3 + 1];
                status.innerText = `${kiri} dan ${kanan} tidak ditukar.`;
                btnTukar.disabled = true;
                btnTidakTukar.disabled = true;
            });

            btnReset.addEventListener("click", () => {
                dataSekarangV3 = [...dataAwalV3];
                i3 = 0;
                j3 = 3;
                rowsContainer.innerHTML = "";
                status.innerText = "";
                btnTukar.disabled = false;
                btnTidakTukar.disabled = false;
                renderRow(dataSekarangV3, j3);
                updateButtonState();
                updateInfoIterasi();
            });

            // Init pertama
            renderRow(dataSekarangV3, j3);
            updateButtonState();
            updateInfoIterasi();
        }

        // Jalankan versi ini
        BubbleSortMiniV3();
    </script>
</body>

</html>
