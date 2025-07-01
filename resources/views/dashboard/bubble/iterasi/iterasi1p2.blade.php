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
    <!-- bubble-sort-mini-v2.html -->
    <div class="container" id="bubbleContainerV2">
        <a>Selanjutnya bandingkan bilangan kedua dan ketiga, yaitu 8 dan 4. Didapatkan 8 lebih
            besar dari 4 maka urutannya
            diubah kebilangan kedua (2, <b>4, 8,</b> 3, 9).
            <br><br>
        </a>

        <div id="bubbleIterasiV2" class="iterasi-label"></div>
        <div id="bubbleRowsV2"></div>

        <div class="control-buttons">
            <button id="btnTukarV2">Tukar</button>
            <button id="btnTidakTukarV2">Tidak Ditukar</button>
            <button id="btnResetV2" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="bubbleStatusV2" class="text-center mt-3"></div>
    </div>

    <script>
        function BubbleSortMiniV2() {
            let i2 = 0;
            let j2 = 1;
            const dataAwalV2 = [2, 8, 4, 3, 9];
            let dataSekarangV2 = [...dataAwalV2];

            const container = document.getElementById("bubbleContainerV2");
            const rowsContainer = document.getElementById("bubbleRowsV2");
            const btnTukar = document.getElementById("btnTukarV2");
            const btnTidakTukar = document.getElementById("btnTidakTukarV2");
            const btnReset = document.getElementById("btnResetV2");
            const status = document.getElementById("bubbleStatusV2");

            function renderIterasiText(n) {
                const textDiv = document.createElement("div");
                textDiv.className = "iterasi-label";
                textDiv.innerText = `Iterasi ke-${n}`;
                rowsContainer.appendChild(textDiv);
            }

            function updateInfoIterasi() {
                const info = document.getElementById("bubbleIterasiV2");
                if (i2 < 1) {
                    info.innerText = `Iterasi ke-${i2 + 1}`;
                } else {
                    info.innerText = `Iterasi ke-1 selesai ⛔`;
                }
            }

            function renderRow(data, highlight = null, label = "") {
                const wrapper = document.createElement("div");

                if (label) {
                    const labelDiv = document.createElement("div");
                    labelDiv.style.textAlign = "center";
                    labelDiv.style.marginBottom = "6px";
                    labelDiv.style.fontSize = "14px";
                    labelDiv.style.color = "black";
                    labelDiv.innerHTML = label;
                    wrapper.appendChild(labelDiv);
                }

                const row = document.createElement("div");
                row.className = "number-row";

                data.forEach((num, idx) => {
                    const box = document.createElement("div");
                    box.className = "number-box";
                    box.innerText = num;

                    if (highlight !== null && (idx === highlight || idx === highlight + 1)) {
                        box.style.backgroundColor = "#add8e6";
                    }

                    if (label === "Hasil Pertukaran") {
                        // box.style.backgroundColor = "#b9fbc0"; // Warna khusus hasil
                        // box.style.fontWeight = "bold";
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(row);
                rowsContainer.appendChild(wrapper);
            }

            function updateButtonState() {
                if (i2 >= 1) {
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = "";
                    return;
                }

                const kiri = dataSekarangV2[j2];
                const kanan = dataSekarangV2[j2 + 1];

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
                j2++;
                if (j2 >= dataSekarangV2.length - 1 - i2) {
                    i2++;
                    j2 = 0;
                    if (i2 < 1) renderIterasiText(i2 + 1);
                }

                if (i2 < 1) {
                    renderRow(dataSekarangV2, j2);
                } else {
                    renderRow(dataSekarangV2, null, "Hasil Pertukaran");
                }

                updateButtonState();
                updateInfoIterasi();
            }

            btnTukar.addEventListener("click", () => {
                const rowBoxes = rowsContainer.lastChild.querySelectorAll(".number-box");
                const box1 = rowBoxes[j2];
                const box2 = rowBoxes[j2 + 1];

                box1.classList.add("swap-animate-right");
                box2.classList.add("swap-animate-left");

                setTimeout(() => {
                    const temp = dataSekarangV2[j2];
                    dataSekarangV2[j2] = dataSekarangV2[j2 + 1];
                    dataSekarangV2[j2 + 1] = temp;

                    box1.classList.remove("swap-animate-right");
                    box2.classList.remove("swap-animate-left");

                    renderRow(dataSekarangV2, null, "Hasil Pertukaran");

                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = `${temp} dan ${dataSekarangV2[j2]} sudah bertukar.`;
                }, 400);
            });

            btnTidakTukar.addEventListener("click", lanjutStep);

            btnReset.addEventListener("click", () => {
                dataSekarangV2 = [...dataAwalV2];
                i2 = 0;
                j2 = 1;
                rowsContainer.innerHTML = "";
                status.innerText = "";
                btnTukar.disabled = false;
                btnTidakTukar.disabled = false;
                renderRow(dataSekarangV2, j2);
                updateButtonState();
                updateInfoIterasi();
            });

            // Init
            renderRow(dataSekarangV2, j2);
            updateButtonState();
            updateInfoIterasi();
        }

        // Jalankan script versi ini
        BubbleSortMiniV2();
    </script>


</body>

</html>
