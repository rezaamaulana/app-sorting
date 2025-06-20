<!DOCTYPE html>
<html lang="id">

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

        .deret-container {
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

        .btnTukar {
            background-color: #007bff;
        }

        .btnTidakTukar {
            background-color: #6c757d;
        }

        .btnReset {
            background-color: #dc3545;
        }

        .status {
            margin-top: 15px;
            text-align: center;
            font-size: 16px;
        }

        .iterasi-label {
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
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

    {{-- <!-- Container 1 -->
    <div id="deret-1" class="deret-container"></div> --}}

    <!-- Container 2 -->
    <div id="deret-2" class="deret-container"></div>

    <script>
        function initDeretBilangan(targetId, data) {
            let i = 0,
                j = 0;
            const container = document.getElementById(targetId);
            const initialData = [...data];
            let currentData = [...data];

            container.innerHTML = `
        <div class="alert"><b>Petunjuk:</b> Klik tombol sesuai hasil perbandingan dua angka!</div>
        <div class="info"></div>
        <div class="rows"></div>
        <div class="control-buttons">
          <button class="btnTukar">Tukar</button>
          <button class="btnTidakTukar">Tidak Ditukar</button>
          <button class="btnReset">Reset</button>
        </div>
        <div class="status"></div>
      `;

            const info = container.querySelector(".info");
            const rowsContainer = container.querySelector(".rows");
            const status = container.querySelector(".status");
            const btnTukar = container.querySelector(".btnTukar");
            const btnTidakTukar = container.querySelector(".btnTidakTukar");
            const btnReset = container.querySelector(".btnReset");

            function renderIterasiLabel(n) {
                const label = document.createElement("div");
                label.className = "iterasi-label";
                label.innerText = `Iterasi ke-${n}`;
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
                    if (i > 0 && idx >= data.length - i) {
                        box.style.backgroundColor = "#90ee90";
                        box.style.fontWeight = "bold";
                    }
                    row.appendChild(box);
                });
                rowsContainer.appendChild(row);
            }

            function updateInfo() {
                // info.innerText = i < currentData.length - 1 ? `Iterasi ke-${i + 1}` : "Iterasi selesai ✅";
            }

            function updateStatus() {
                const kiri = currentData[j];
                const kanan = currentData[j + 1];
                status.innerHTML = `Bandingkan ${kiri} dan ${kanan} apakah ditukar atau tidak`;
            }

            function nextStep() {
                j++;
                if (j >= currentData.length - 1 - i) {
                    i++;
                    j = 0;
                    if (i < currentData.length - 1) renderIterasiLabel(i + 1);
                }
                if (i < currentData.length - 1) {
                    renderRow(currentData, j);
                    updateInfo();
                    updateStatus();
                } else {
                    renderRow(currentData);
                    updateInfo();
                    status.innerText = "Sorting selesai! ✅";
                }
            }

            btnTukar.addEventListener("click", () => {
                const kiri = currentData[j];
                const kanan = currentData[j + 1];
                if (kiri < kanan) {
                    alert(`Salah! ${kiri} < ${kanan}, jadi tidak boleh ditukar.`);
                    return;
                }
                const boxes = rowsContainer.lastChild.querySelectorAll(".number-box");
                boxes[j].classList.add("swap-animate-right");
                boxes[j + 1].classList.add("swap-animate-left");
                setTimeout(() => {
                    [currentData[j], currentData[j + 1]] = [currentData[j + 1], currentData[j]];
                    nextStep();
                }, 400);
            });

            btnTidakTukar.addEventListener("click", () => {
                const kiri = currentData[j];
                const kanan = currentData[j + 1];
                if (kiri > kanan) {
                    alert(`Salah! ${kiri} > ${kanan}, jadi harusnya ditukar.`);
                    return;
                }
                nextStep();
            });

            btnReset.addEventListener("click", () => {
                currentData = [...initialData];
                i = 0;
                j = 0;
                rowsContainer.innerHTML = "";
                status.innerText = "";
                info.innerText = "";
                renderIterasiLabel(1);
                renderRow(currentData, j);
                updateInfo();
                updateStatus();
            });

            // Mulai
            renderIterasiLabel(1);
            renderRow(currentData, j);
            updateInfo();
            updateStatus();
        }

        // Panggil fungsi dua kali tanpa konflik
        // initDeretBilangan("deret-1", [8, 4, 2, 3, 9]);
        initDeretBilangan("deret-2", [5, 1, 6, 7, 0]);
    </script>

</body>

</html>
