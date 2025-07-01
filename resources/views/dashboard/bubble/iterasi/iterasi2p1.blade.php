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

        .hasil-label {
            text-align: center;
            margin: 5px 0;
            color: black;
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
    </style>
</head>

<body>
    <div class="container" id="bubbleContainerV4">
        <a>Pada iterasi selanjutnya, kita akan mengambil bilangan pertama dan kedua lagi, yaitu 2 dan 4. Antara kedua
            bilangan ini 2 lebih kecil dari 4 maka urutan bilangan tersebut tidak diubah (<b>2, 4,</b> 3, 8, 9).
            <br><br>
        </a>

        <div id="bubbleIterasiV4" class="iterasi-label"></div>
        <div id="bubbleRowsV4"></div>

        <div class="control-buttons">
            <button id="btnTukarV4">Tukar</button>
            <button id="btnTidakTukarV4">Tidak Ditukar</button>
            <button id="btnResetV4" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="bubbleStatusV4" class="text-center mt-3"></div>
    </div>

    <script>
        function BubbleSortMiniV2() {
            let i4 = 0;
            let j4 = 0;
            const dataAwalV4 = [2, 4, 3, 8, 9];
            let dataSekarangV4 = [...dataAwalV4];

            const rowsContainer = document.getElementById("bubbleRowsV4");
            const btnTukar = document.getElementById("btnTukarV4");
            const btnTidakTukar = document.getElementById("btnTidakTukarV4");
            const btnReset = document.getElementById("btnResetV4");
            const status = document.getElementById("bubbleStatusV4");
            const info = document.getElementById("bubbleIterasiV4");

            function renderIterasiText(n) {
                const textDiv = document.createElement("div");
                textDiv.className = "iterasi-label";
                textDiv.innerText = `Iterasi ke-${n}`;
                rowsContainer.appendChild(textDiv);
            }

            function renderLabel(text) {
                const label = document.createElement("div");
                label.className = "hasil-label";
                label.innerText = text;
                rowsContainer.appendChild(label);
            }

            function updateInfoIterasi() {
                if (i4 < 1) {
                    info.innerText = `Iterasi ke-${i4 + 2}`;
                } else {
                    info.innerText = `Iterasi ke-1`;
                }
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
                if (i4 >= 1) {
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = "";
                    return;
                }

                const kiri = dataSekarangV4[j4];
                const kanan = dataSekarangV4[j4 + 1];

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

            function lanjutStep() {
                j4++;
                if (j4 >= dataSekarangV4.length - 1 - i4) {
                    i4++;
                    j4 = 0;
                    if (i4 < 1) renderIterasiText(i4 + 1);
                }

                if (i4 < 1) {
                    renderRow(dataSekarangV4, j4);
                } else {
                    renderRow(dataSekarangV4);
                }

                updateButtonState();
                updateInfoIterasi();
            }

            btnTukar.addEventListener("click", () => {
                const rowBoxes = rowsContainer.lastChild.querySelectorAll(".number-box");
                const box1 = rowBoxes[j4];
                const box2 = rowBoxes[j4 + 1];

                const kiri = dataSekarangV4[j4];
                const kanan = dataSekarangV4[j4 + 1];

                box1.classList.add("swap-animate-right");
                box2.classList.add("swap-animate-left");

                const isTukar2dan4 = (kiri === 2 && kanan === 4) || (kiri === 4 && kanan === 2);

                setTimeout(() => {
                    const temp = dataSekarangV4[j4];
                    dataSekarangV4[j4] = dataSekarangV4[j4 + 1];
                    dataSekarangV4[j4 + 1] = temp;

                    box1.classList.remove("swap-animate-right");
                    box2.classList.remove("swap-animate-left");

                    renderLabel("Hasil Pertukaran");
                    renderRow(dataSekarangV4);
                    status.innerHTML =
                        `${dataSekarangV4[j4 + 1]} dan ${dataSekarangV4[j4]} sudah bertukar.`;

                    if (isTukar2dan4) {
                        btnTukar.disabled = true;
                        btnTidakTukar.disabled = true;
                        status.innerHTML = "<b>Pertukaran 2 dan 4 terjadi. Proses dihentikan.</b>";
                    } else {
                        lanjutStep();
                    }
                }, 400);
            });

            btnTidakTukar.addEventListener("click", () => {
                const kiri = dataSekarangV4[j4];
                const kanan = dataSekarangV4[j4 + 1];

                renderLabel("Hasil Pertukaran");
                renderRow(dataSekarangV4);

                if ((kiri === 2 && kanan === 4)) {
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerHTML = `2 dan 4 tidak ditukar karena 2 < 4`;
                    return;
                }

                lanjutStep();
            });

            btnReset.addEventListener("click", () => {
                dataSekarangV4 = [...dataAwalV4];
                i4 = 0;
                j4 = 0;
                rowsContainer.innerHTML = "";
                status.innerText = "";
                btnTukar.disabled = false;
                btnTidakTukar.disabled = false;
                renderRow(dataSekarangV4, j4);
                updateButtonState();
                updateInfoIterasi();
            });

            // Init
            renderRow(dataSekarangV4, j4);
            updateButtonState();
            updateInfoIterasi();
        }

        BubbleSortMiniV2();
    </script>
</body>

</html>
