<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bubble Sort Iterasi 3</title>
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
    </style>
</head>

<body>
    <div class="container" id="bubbleContainerV6">
        <a>Selanjutnya bandingkan bilangan ketiga dan keempat, yaitu 4 dan 8. Antara bilangan ini 4 lebih kecil dari 8
            maka
            bilangan ini tidak diubah urutannya (2, 3, 4, 8, 9).
            <br><br>
        </a>

        <div id="bubbleIterasiV6" class="iterasi-label"></div>
        <div id="bubbleRowsV6"></div>

        <div class="control-buttons">
            <button id="btnTukarV6">Tukar</button>
            <button id="btnTidakTukarV6">Tidak Ditukar</button>
            <button id="btnResetV6" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="bubbleStatusV6" class="text-center mt-3"></div>
    </div>

    <script>
        function BubbleSortMiniV2() {
            let i6 = 0;
            let j6 = 2;
            const dataAwalV6 = [2, 3, 4, 8, 9];
            let dataSekarangV6 = [...dataAwalV6];

            const rowsContainer = document.getElementById("bubbleRowsV6");
            const btnTukar = document.getElementById("btnTukarV6");
            const btnTidakTukar = document.getElementById("btnTidakTukarV6");
            const btnReset = document.getElementById("btnResetV6");
            const status = document.getElementById("bubbleStatusV6");

            function renderIterasiText(n) {
                const textDiv = document.createElement("div");
                textDiv.className = "iterasi-label";
                textDiv.innerText = `Iterasi ke-${n}`;
                rowsContainer.appendChild(textDiv);
            }

            function updateInfoIterasi() {
                const info = document.getElementById("bubbleIterasiV6");
                info.innerText = `Iterasi ke-2`;
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

                    row.appendChild(box);
                });

                wrapper.appendChild(row);
                rowsContainer.appendChild(wrapper);
            }

            function updateButtonState() {
                const kiri = dataSekarangV6[j6];
                const kanan = dataSekarangV6[j6 + 1];

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
                const box1 = rowBoxes[j6];
                const box2 = rowBoxes[j6 + 1];

                const kiri = dataSekarangV6[j6];
                const kanan = dataSekarangV6[j6 + 1];

                box1.classList.add("swap-animate-right");
                box2.classList.add("swap-animate-left");

                setTimeout(() => {
                    const temp = dataSekarangV6[j6];
                    dataSekarangV6[j6] = dataSekarangV6[j6 + 1];
                    dataSekarangV6[j6 + 1] = temp;

                    box1.classList.remove("swap-animate-right");
                    box2.classList.remove("swap-animate-left");

                    renderRow(dataSekarangV6, null, "Hasil Pertukaran");

                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerHTML = `${temp} dan ${dataSekarangV6[j6]} sudah bertukar.`;
                }, 400);
            });

            btnTidakTukar.addEventListener("click", () => {
                renderRow(dataSekarangV6, null, "Hasil Pertukaran");
                btnTukar.disabled = true;
                btnTidakTukar.disabled = true;
                status.innerHTML = `${dataSekarangV6[j6]} dan ${dataSekarangV6[j6 + 1]} tidak ditukar.`;
            });

            btnReset.addEventListener("click", () => {
                dataSekarangV6 = [...dataAwalV6];
                i6 = 0;
                j6 = 2;
                rowsContainer.innerHTML = "";
                status.innerText = "";
                btnTukar.disabled = false;
                btnTidakTukar.disabled = false;
                renderRow(dataSekarangV6, j6);
                updateButtonState();
                updateInfoIterasi();
            });

            // Init
            renderRow(dataSekarangV6, j6);
            updateButtonState();
            updateInfoIterasi();
        }

        BubbleSortMiniV2();
    </script>
</body>

</html>
