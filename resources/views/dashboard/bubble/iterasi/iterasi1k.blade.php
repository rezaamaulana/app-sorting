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

        .control-buttons1 {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .control-buttons1 button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .control-buttons1 button:disabled {
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
    <div class="container" id="bubbleSortMiniContainer">
        Untuk pengurutan keseluruhannya sebagai berikut:
        <br>
        <br>
        <div class="alert">
            💡 <b>Perhatikan:</b> Petunjuk Arahan Dibawah Deret Bilangan dan Ikuti Sesuai Instruksi!
        </div>

        <div id="bubbleMiniInfoIterasi" class="iterasi-label"></div>
        <div id="bubbleMiniRowsContainer"></div>

        <div class="control-buttons1">
            <button id="bubbleMiniBtnTukar">Tukar</button>
            <button id="bubbleMiniBtnTidakTukar">Tidak Ditukar</button>
            <button id="bubbleMiniBtnReset" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="bubbleMiniStatus" class="text-center mt-3"></div>
    </div>

    <script>
        (function BubbleSortMini() {
            let i = 0,
                j = 0;
            const initialData = [8, 2, 4, 3, 9];
            let currentData = [...initialData];

            const rowsContainer = document.getElementById("bubbleMiniRowsContainer");
            const btnTukar = document.getElementById("bubbleMiniBtnTukar");
            const btnTidakTukar = document.getElementById("bubbleMiniBtnTidakTukar");
            const btnReset = document.getElementById("bubbleMiniBtnReset");
            const status = document.getElementById("bubbleMiniStatus");

            function renderIterasiText(nomorIterasi) {
                const textDiv = document.createElement("div");
                textDiv.className = "iterasi-label";
                textDiv.innerText = `Iterasi ke-${nomorIterasi}`;
                rowsContainer.appendChild(textDiv);
            }

            function updateInfoIterasi() {
                const info = document.getElementById("bubbleMiniInfoIterasi");
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

                    if (i > 0 && idx >= currentData.length - i) {
                        box.style.backgroundColor = "#90ee90";
                        box.style.fontWeight = "bold";
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

                    if (i < 1) renderIterasiText(i + 1);
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
                const rowBoxes = rowsContainer.lastChild.querySelectorAll(".number-box");
                const box1 = rowBoxes[j];
                const box2 = rowBoxes[j + 1];

                box1.classList.add("swap-animate-right");
                box2.classList.add("swap-animate-left");

                setTimeout(() => {
                    const temp = currentData[j];
                    currentData[j] = currentData[j + 1];
                    currentData[j + 1] = temp;

                    lanjutkanStep();
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

            // Init
            renderRow(currentData, j);
            updateButtonState();
            updateInfoIterasi();
        })();
    </script>

</body>

</html>
