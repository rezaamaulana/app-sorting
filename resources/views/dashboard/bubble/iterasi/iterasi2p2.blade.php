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
    <div class="container" id="bubbleContainerV5">
        Selanjutnya kita bandingkan bilangan kedua dan ketiga, yaitu 4 dan 3. Diantara bilangan tersebut 4 lebih besar
        dari 3 maka urutannya diubah (2, <b>3, 4,</b> 8, 9).
        <br><br>

        <div id="bubbleIterasiV5" class="iterasi-label"></div>
        <div id="bubbleRowsV5"></div>

        <div class="control-buttons">
            <button id="btnTukarV5">Tukar</button>
            <button id="btnTidakTukarV5">Tidak Ditukar</button>
            <button id="btnResetV5" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="bubbleStatusV5" class="text-center mt-3"></div>
    </div>

    <script>
        function BubbleSortMiniV2() {
            let i5 = 0;
            let j5 = 1;
            const dataAwalV5 = [2, 4, 3, 8, 9];
            let dataSekarangV5 = [...dataAwalV5];

            const rowsContainer = document.getElementById("bubbleRowsV5");
            const btnTukar = document.getElementById("btnTukarV5");
            const btnTidakTukar = document.getElementById("btnTidakTukarV5");
            const btnReset = document.getElementById("btnResetV5");
            const status = document.getElementById("bubbleStatusV5");
            const infoIterasi = document.getElementById("bubbleIterasiV5");

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

            function updateInfoIterasi() {
                if (i5 < 1) {
                    infoIterasi.innerText = `Iterasi ke-${i5 + 2}`;
                } else {
                    infoIterasi.innerText = `Iterasi ke-1 selesai ⛔`;
                }
            }

            function updateButtonState() {
                if (i5 >= 1) {
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = "";
                    return;
                }

                const kiri = dataSekarangV5[j5];
                const kanan = dataSekarangV5[j5 + 1];

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
                j5++;
                if (j5 >= dataSekarangV5.length - 1 - i5) {
                    i5++;
                    j5 = 0;
                }

                if (i5 < 1) {
                    renderRow(dataSekarangV5, j5);
                } else {
                    renderRow(dataSekarangV5, null, "Hasil Pertukaran");
                }

                updateButtonState();
                updateInfoIterasi();
            }

            btnTukar.addEventListener("click", () => {
                const rowBoxes = rowsContainer.lastChild.querySelectorAll(".number-box");
                const box1 = rowBoxes[j5];
                const box2 = rowBoxes[j5 + 1];

                box1.classList.add("swap-animate-right");
                box2.classList.add("swap-animate-left");

                setTimeout(() => {
                    const temp = dataSekarangV5[j5];
                    dataSekarangV5[j5] = dataSekarangV5[j5 + 1];
                    dataSekarangV5[j5 + 1] = temp;

                    box1.classList.remove("swap-animate-right");
                    box2.classList.remove("swap-animate-left");

                    renderRow(dataSekarangV5, null, "Hasil Pertukaran");

                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    status.innerText = `${temp} dan ${dataSekarangV5[j5]} sudah bertukar.`;
                }, 400);
            });

            btnTidakTukar.addEventListener("click", lanjutStep);

            btnReset.addEventListener("click", () => {
                dataSekarangV5 = [...dataAwalV5];
                i5 = 0;
                j5 = 1;
                rowsContainer.innerHTML = "";
                status.innerText = "";
                btnTukar.disabled = false;
                btnTidakTukar.disabled = false;
                renderRow(dataSekarangV5, j5);
                updateButtonState();
                updateInfoIterasi();
            });

            // Inisialisasi pertama
            renderRow(dataSekarangV5, j5);
            updateButtonState();
            updateInfoIterasi();
        }

        BubbleSortMiniV2();
    </script>
</body>

</html>
