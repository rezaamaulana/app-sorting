<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deret Bilangan</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        .container0 {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .alert {
            background-color: #e7f3ff;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        #infoIterasi0 {
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .number-row {
            display: flex;
            justify-content: center;
            margin-bottom: 12px;
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
            border-radius: 12px;
        }

        .number-box.highlight {
            background-color: #add8e6;
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
                transform: translateX(-60px);
            }
        }

        @keyframes swapRight {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(60px);
            }
        }

        .control-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .control-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .control-buttons button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        #btnTukar0 {
            background-color: #007bff;
        }

        #btnTidakTukar0 {
            background-color: #6c757d;
        }

        #btnReset0 {
            background-color: #dc3545;
        }

        #status0 {
            margin-top: 15px;
            text-align: center;
            font-size: 16px;
        }

        .iterasi-label {
            animation: fadeIn 0.5s ease-in-out;
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
    </style>
</head>

<body>
    <div class="container0">
        <div class="alert">
            <b>Perhatikan:</b> Petunjuk arahan di bawah deret bilangan dan ikuti sesuai instruksi!
        </div>

        <div id="infoIterasi0"></div>
        <div id="rowsContainer0"></div>

        <div class="control-buttons">
            <button id="btnTukar0">Tukar</button>
            <button id="btnTidakTukar0">Tidak Ditukar</button>
            <button id="btnReset0">Reset</button>
        </div>

        <div id="status0"></div>
    </div>

    <script>
        let i0 = 0;
        let j0 = 0;
        const initialData0 = [8, 2, 4, 3, 9];
        let currentData0 = [...initialData0];

        const rowsContainer0 = document.getElementById("rowsContainer0");
        const btnTukar0 = document.getElementById("btnTukar0");
        const btnTidakTukar0 = document.getElementById("btnTidakTukar0");
        const btnReset0 = document.getElementById("btnReset0");
        const status0 = document.getElementById("status0");

        function renderIterasiText(nomorIterasi0) {
            const textDiv = document.createElement("div");
            textDiv.className = "iterasi-label";
            textDiv.innerText = `Iterasi ke-${nomorIterasi0}`;
            textDiv.style.fontWeight = "bold";
            textDiv.style.textAlign = "center";
            textDiv.style.marginBottom = "10px";
            textDiv.style.color = "#333";
            rowsContainer0.appendChild(textDiv);
        }

        function updateInfoIterasi0() {
            const info = document.getElementById("infoIterasi0");
            if (i0 < currentData0.length - 1) {
                info.innerText = `Iterasi ke-${i0 + 1}`;
            } else {
                info.innerText = `Iterasi selesai ✅`;
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

                if (j0 === data.length - 2 && idx === data.length - 1) {
                    box.style.backgroundColor = "#87CEFA";
                    box.style.fontWeight = "bold";
                }

                if (i0 > 0 && idx >= currentData0.length - i0) {
                    box.style.backgroundColor = "#90ee90";
                    box.style.fontWeight = "bold";
                }

                row.appendChild(box);
            });

            rowsContainer0.appendChild(row);
        }

        function updateButtonState() {
            if (i0 >= currentData0.length - 1) {
                btnTukar0.disabled = true;
                btnTidakTukar0.disabled = true;
                status0.innerText = "Sorting selesai! ✅";
                return;
            }

            const kiri = currentData0[j0];
            const kanan = currentData0[j0 + 1];

            if (kiri < kanan) {
                btnTukar0.disabled = true;
                btnTidakTukar0.disabled = false;
                status0.innerHTML = `Bandingkan ${kiri} < ${kanan}, maka <b>tidak ditukar</b>`;
            } else {
                btnTukar0.disabled = false;
                btnTidakTukar0.disabled = true;
                status0.innerHTML = `Bandingkan ${kiri} > ${kanan}, maka <b>ditukar</b>`;
            }
        }

        function lanjutkanStep() {
            j0++;

            if (j0 >= currentData0.length - 1 - i0) {
                i0++;
                j0 = 0;
                if (i0 < currentData0.length - 1) {
                    renderIterasiText(i0 + 1);
                }
            }

            if (i0 < currentData0.length - 1) {
                renderRow(currentData0, j0);
                updateButtonState();
            } else {
                renderRow(currentData0);
                updateButtonState();
            }
        }

        btnTukar0.addEventListener("click", () => {
            const rowBoxes = rowsContainer0.lastChild.querySelectorAll(".number-box");
            const box1 = rowBoxes[j0];
            const box2 = rowBoxes[j0 + 1];

            box1.classList.add("swap-animate-right");
            box2.classList.add("swap-animate-left");

            setTimeout(() => {
                const temp = currentData0[j0];
                currentData0[j0] = currentData0[j0 + 1];
                currentData0[j0 + 1] = temp;

                lanjutkanStep();
            }, 400);
        });

        btnTidakTukar0.addEventListener("click", () => {
            lanjutkanStep();
        });

        btnReset0.addEventListener("click", () => {
            currentData0 = [...initialData0];
            i0 = 0;
            j0 = 0;
            rowsContainer0.innerHTML = "";
            status0.innerText = "";
            btnTukar0.disabled = false;
            btnTidakTukar0.disabled = false;
            renderRow(currentData0, j0);
            updateButtonState();
            updateInfoIterasi0();
        });

        // Start
        renderRow(currentData0, j0);
        updateButtonState();
        updateInfoIterasi0();
    </script>
</body>

</html>
