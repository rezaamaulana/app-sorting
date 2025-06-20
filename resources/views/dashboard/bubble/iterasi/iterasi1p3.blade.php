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
    <div class="container" id="bubbleContainerV1">
        Selanjutnya bandingkan bilangan ketiga dan keempat, yaitu 8 dan 3. Diantara bilangan tersebut 8
        lebih besar dari 3 maka urutan bilangan akan diubah (2, 4, <b>3, 8,</b> 9).
        <br><br>

        <div id="bubbleIterasiV1" class="iterasi-label"></div>
        <div id="bubbleRowsV1"></div>

        <div class="control-buttons">
            <button id="btnTukarV1">Tukar</button>
            <button id="btnTidakTukarV1">Tidak Ditukar</button>
            <button id="btnResetV1" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="bubbleStatusV1" class="text-center mt-3"></div>
    </div>

    <script>
        function BubbleSortMiniV2() {
            let i1 = 0;
            let j1 = 2;
            const dataAwalV1 = [2, 4, 8, 3, 9];
            let dataSekarangV1 = [...dataAwalV1];

            const container = document.getElementById("bubbleContainerV1");
            const rowsContainer = document.getElementById("bubbleRowsV1");
            const btnTukar = document.getElementById("btnTukarV1");
            const btnTidakTukar = document.getElementById("btnTidakTukarV1");
            const btnReset = document.getElementById("btnResetV1");
            const status = document.getElementById("bubbleStatusV1");

            function renderIterasiText(n) {
                const textDiv = document.createElement("div");
                textDiv.className = "iterasi-label";
                textDiv.innerText = `Iterasi ke-${n}`;
                rowsContainer.appendChild(textDiv);
            }

            function updateInfoIterasi() {
                const info = document.getElementById("bubbleIterasiV1");
                if (i1 < 1) {
                    info.innerText = `Iterasi ke-${i1 + 1}`;
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
                        // box.style.backgroundColor = "#b9fbc0";
                        // box.style.fontWeight = "bold";
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(row);
                rowsContainer.appendChild(wrapper);
            }

            function updateButtonState() {
                if (i1 >= 1) {
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = "";
                    return;
                }

                const kiri = dataSekarangV1[j1];
                const kanan = dataSekarangV1[j1 + 1];

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
                j1++;
                if (j1 >= dataSekarangV1.length - 1 - i1) {
                    i1++;
                    j1 = 0;
                    if (i1 < 1) renderIterasiText(i1 + 1);
                }

                if (i1 < 1) {
                    renderRow(dataSekarangV1, j1);
                } else {
                    renderRow(dataSekarangV1);
                }

                updateButtonState();
                updateInfoIterasi();
            }

            btnTukar.addEventListener("click", () => {
                const rowBoxes = rowsContainer.lastChild.querySelectorAll(".number-box");
                const box1 = rowBoxes[j1];
                const box2 = rowBoxes[j1 + 1];

                box1.classList.add("swap-animate-right");
                box2.classList.add("swap-animate-left");

                setTimeout(() => {
                    const temp = dataSekarangV1[j1];
                    dataSekarangV1[j1] = dataSekarangV1[j1 + 1];
                    dataSekarangV1[j1 + 1] = temp;

                    box1.classList.remove("swap-animate-right");
                    box2.classList.remove("swap-animate-left");

                    // Tampilkan hasil pertukaran dengan label
                    renderRow(dataSekarangV1, null, "Hasil Pertukaran");

                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = `${temp} dan ${dataSekarangV1[j1]} sudah bertukar.`;
                }, 400);
            });

            btnTidakTukar.addEventListener("click", lanjutStep);

            btnReset.addEventListener("click", () => {
                dataSekarangV1 = [...dataAwalV1];
                i1 = 0;
                j1 = 2;
                rowsContainer.innerHTML = "";
                status.innerText = "";
                btnTukar.disabled = false;
                btnTidakTukar.disabled = false;
                renderRow(dataSekarangV1, j1);
                updateButtonState();
                updateInfoIterasi();
            });

            // Init
            renderRow(dataSekarangV1, j1);
            updateButtonState();
            updateInfoIterasi();
        }

        // Jalankan script
        BubbleSortMiniV2();
    </script>


</body>

</html>
