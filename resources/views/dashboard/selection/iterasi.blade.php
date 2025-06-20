<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deret Bilangan</title>
    <style>
        .number-box.selected-box {
            background-color: #ffc107;
            font-weight: bold;
            border: 2px solid #ff9800;
        }


        .number-box.swap-animate-left {
            animation: swapLeft 0.4s forwards;
        }

        .number-box.swap-animate-right {
            animation: swapRight 0.4s forwards;
        }

        @keyframes swapLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-60px);
            }

            /* arah ke kiri */
        }

        @keyframes swapRight {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(60px);
            }

            /* arah ke kanan */
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

        .number-box {
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            font-size: 20px;
            border: 2px solid black;
            background-color: #ffeb3b;
            margin: 5px;
            border-radius: 50px;
        }

        .number-row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .control-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        #status {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body class="bg-light p-4 text-center">

    <h4 class="mb-4">Simulasi Bubble Sort - Pertukaran Validasi</h4>
    <h5>Pilihlah angka paling kecil</h5>

    <p id="infoIterasi" style="font-weight: bold; margin-bottom: 10px;"></p>

    <div id="rowsContainer"></div>

    <div class="control-buttons">
        <button id="btnTukar" class="btn btn-danger">Tukar</button>
        <!-- <button id="btnTidakTukar" class="btn btn-secondary">Tidak Ditukar</button> -->
        <button id="btnReset" class="btn btn-primary">Reset</button>
    </div>

    <div id="status" class="text-center mt-3"></div>

    <script>
        let i = 0;
        const initialData = [7, 3, 1, 2, 6];
        let currentData = [...initialData];
        let selectedIndex = null;

        const rowsContainer = document.getElementById("rowsContainer");
        const btnTukar = document.getElementById("btnTukar");
        const btnReset = document.getElementById("btnReset");
        const status = document.getElementById("status");
        const info = document.getElementById("infoIterasi");

        function renderIterasiSection(nomorIterasi, data, highlightIdx = null) {
            const section = document.createElement("div");
            section.className = "iterasi-section";
            section.style.marginBottom = "15px";

            const label = document.createElement("div");
            label.className = "iterasi-label";
            label.innerText = `Iterasi ke-${nomorIterasi}`;
            label.style.fontWeight = "bold";
            label.style.margin = "10px 0";
            label.style.color = "#333";

            const row = document.createElement("div");
            row.className = "number-row";

            data.forEach((num, idx) => {
                const box = document.createElement("div");
                box.className = "number-box";
                box.innerText = num;

                if (idx === highlightIdx) {
                    box.classList.add("selected-box");
                }

                if (idx < i) {
                    box.style.backgroundColor = "#90ee90"; // hijau
                    box.style.fontWeight = "bold";
                }

                if (idx >= i) {
                    box.style.cursor = "pointer";
                    box.addEventListener("click", () => selectBox(idx));
                }

                row.appendChild(box);
            });

            section.appendChild(label);
            section.appendChild(row);
            rowsContainer.appendChild(section);
        }


        function updateInfoIterasi() {
            if (i < currentData.length - 1) {
                info.innerText = `Iterasi ke-${i + 1}`;
            } else {
                info.innerText = `Iterasi selesai ✅`;
            }
            const allGreen = i >= currentData.length - 1;
            if (allGreen) {
                info.innerText = `Iterasi selesai ✅`;
            }
        }

        function selectBox(idx) {
            if (idx < i) return;

            selectedIndex = idx;
            // renderRow/currentRow langsung render dengan highlight
            renderIterasiSection(i + 1, currentData, selectedIndex);
            btnTukar.disabled = false;
        }


        function lanjutkanStep() {
            const minValue = Math.min(...currentData.slice(i));

            if (currentData[selectedIndex] !== minValue) {
                alert(`Bukan nilai terkecil! Seharusnya pilih ${minValue}`);
                selectedIndex = null;
                btnTukar.disabled = true;
                return;
            }

            // Tukar nilai dulu
            [currentData[i], currentData[selectedIndex]] = [currentData[selectedIndex], currentData[i]];

            selectedIndex = null;
            btnTukar.disabled = true;

            // Tampilkan urutan baru (setelah swap)
            renderIterasiSection(i + 1, currentData);

            // Tambahkan warna hijau langsung ke elemen i pada baris terakhir yang baru saja ditambahkan
            const lastRow = document.querySelector(".iterasi-section:last-child .number-row");
            const boxes = lastRow.querySelectorAll(".number-box");
            if (boxes[i]) {
                boxes[i].style.backgroundColor = "#90ee90";
                boxes[i].style.fontWeight = "bold";
            }

            i++;

            if (i < currentData.length) {
                updateInfoIterasi();
            } else {
                info.innerText = `Iterasi selesai ✅`;

                const done = document.createElement("div");
                done.innerText = "Urutan selesai ✅";
                done.style.fontWeight = "bold";
                done.style.marginTop = "10px";
                done.style.marginBottom = "10px";
                done.style.color = "green";
                rowsContainer.appendChild(done);
            }
        }

        btnTukar.addEventListener("click", () => {
            lanjutkanStep();
        });

        btnReset.addEventListener("click", () => {
            currentData = [...initialData];
            i = 0;
            selectedIndex = null;
            rowsContainer.innerHTML = "";
            status.innerText = "";
            btnTukar.disabled = true;
            renderIterasiSection(1, currentData);
            updateInfoIterasi();
        });


        // Start
        renderIterasiSection(1, currentData);
        updateInfoIterasi();
    </script>




</body>

</html>
