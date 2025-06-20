<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Deret Bilangan Modular</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            justify-content: center;
            margin: 10px;
            position: relative;
        }

        .box {
            width: 50px;
            height: 50px;
            border: 2px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
            border-radius: 10px;
            background-color: #eee;
            cursor: pointer;
            transition: background 0.3s;
            position: relative;
        }

        .box:hover {
            background-color: #cce5ff;
        }

        .box.selected {
            background-color: #f8d775;
        }

        .box.sorted {
            background-color: #3cb371;
            color: white;
            font-weight: bold;
        }

        .iteration-label {
            font-weight: bold;
            margin-top: 20px;
        }

        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }

        .btn1 {
            padding: 10px 15px;
            margin: 10px;
            border: none;
            color: white;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn1:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-reset {
            background-color: #dc3545;
        }

        .button-row {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .instruction {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .explanation {
            margin-top: 10px;
            padding: 10px;
            background-color: #f1f1f1;
            font-size: 14px;
            border-radius: 6px;
            max-width: 600px;
            text-align: center;
        }

        .divider {
            width: 4px;
            background-color: grey;
            margin: 0 4px;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <div class="container" id="container-1">
        Cari bilangan terkecil di bagian belum terurut:
        <br>
        <div id="displayArea-1"></div>
        <div class="instruction" id="instructionText-1">
            Klik angka paling minimum untuk menukarnya ke posisi paling kiri!
        </div>
        <div class="button-row">
            <button class="btn1" id="btnTukar-1">Tukar</button>
            <button class="btn1 btn-reset" id="btnReset-1">Reset</button>
        </div>
        <div class="explanation" id="explanationArea-1"></div>
    </div>

    <script>
        function initSortingModule1(containerIdSuffix) {
            let initialData = [7, 3, 1, 2, 6];
            let data = [...initialData];
            let currentIndex = 0;
            let maxIterations = 1;
            let selectedIndex = null;
            const sortedIndices = [];

            const displayArea = document.getElementById(`displayArea-${containerIdSuffix}`);
            const btnTukar = document.getElementById(`btnTukar-${containerIdSuffix}`);
            const btnReset = document.getElementById(`btnReset-${containerIdSuffix}`);
            const explanationArea = document.getElementById(`explanationArea-${containerIdSuffix}`);

            function isValueSortedCorrectly(idx, arr) {
                const sorted = [...arr].sort((a, b) => a - b);
                return arr[idx] === sorted[idx];
            }

            function renderRow(arr, iteration, disableClick = false) {
                const wrapper = document.createElement("div");

                const label = document.createElement("div");
                label.className = "iteration-label";
                label.innerText = iteration <= maxIterations ? `Iterasi ke-${iteration}` : "Hasil pengurutan selesai ✅";

                const row = document.createElement("div");
                row.className = "row";
                if (disableClick) row.classList.add("disabled");

                arr.forEach((value, idx) => {
                    if (idx === currentIndex && currentIndex > 0) {
                        const divider = document.createElement("div");
                        divider.className = "divider";
                        row.appendChild(divider);
                    }

                    const box = document.createElement("div");
                    box.className = "box";
                    box.innerText = value;

                    if (sortedIndices.includes(idx) && isValueSortedCorrectly(idx, data) && value !== 3) {
                        box.classList.add("sorted");
                    }

                    if (!disableClick) {
                        box.addEventListener("click", () => {
                            const minIndex = findMinIndexFrom(currentIndex, data);
                            if (idx !== minIndex) {
                                alert("Ini bukan angka paling minimum, tolong perhatikan sekali lagi.");
                                return;
                            }

                            clearSelection();
                            box.classList.add("selected");
                            selectedIndex = idx;
                            btnTukar.disabled = false;
                        });
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(label);
                wrapper.appendChild(row);
                displayArea.appendChild(wrapper);
            }

            function clearSelection() {
                document.querySelectorAll(`#displayArea-${containerIdSuffix} .box`).forEach(box => box.classList.remove(
                    "selected"));
                selectedIndex = null;
            }

            function findMinIndexFrom(start, arr) {
                let min = arr[start];
                let minIdx = start;
                for (let i = start + 1; i < arr.length; i++) {
                    if (arr[i] < min) {
                        min = arr[i];
                        minIdx = i;
                    }
                }
                return minIdx;
            }

            function swapAndMarkSorted() {
                if (selectedIndex == null) return;

                const rows = document.querySelectorAll(`#displayArea-${containerIdSuffix} .row`);
                const currentRow = rows[rows.length - 1];
                const boxes = currentRow.querySelectorAll(".box");

                const boxA = boxes[currentIndex];
                const boxB = boxes[selectedIndex];

                const offsetA = boxA.offsetLeft;
                const offsetB = boxB.offsetLeft;
                const deltaX = offsetB - offsetA;

                boxA.style.transition = "transform 0.5s ease";
                boxB.style.transition = "transform 0.5s ease";
                boxA.style.transform = `translateX(${deltaX}px)`;
                boxB.style.transform = `translateX(${-deltaX}px)`;

                setTimeout(() => {
                    boxA.style.transition = "";
                    boxB.style.transition = "";
                    boxA.style.transform = "";
                    boxB.style.transform = "";

                    [data[currentIndex], data[selectedIndex]] = [data[selectedIndex], data[currentIndex]];

                    explanationArea.innerText =
                        `${data[currentIndex]} adalah angka paling minimum dari sisa deret, maka ditukar ke posisi paling kiri. Bagian yang sudah terurut digeser ke kiri sehingga 1 menjadi bagian yang sudah terurut. Dalam langkah ini, angka dipisah menggunakan garis yang menunjukkan bilangan yang sudah terurut.`;

                    sortedIndices.push(currentIndex);
                    currentIndex++;
                    btnTukar.disabled = true;
                    clearSelection();

                    const isDone = currentIndex >= maxIterations;
                    if (isDone) {
                        sortedIndices.push(currentIndex);
                        btnTukar.disabled = true;
                    }

                    renderRow(data, currentIndex + 1, isDone);
                }, 500);
            }

            btnTukar.addEventListener("click", swapAndMarkSorted);

            btnReset.addEventListener("click", () => {
                currentIndex = 0;
                data = [...initialData];
                selectedIndex = null;
                sortedIndices.length = 0;
                displayArea.innerHTML = "";
                explanationArea.innerHTML = "";
                btnTukar.disabled = true;
                renderRow(data, currentIndex + 1);
            });

            renderRow(data, currentIndex + 1);
        }

        // Inisialisasi
        initSortingModule1("1");
    </script>
</body>

</html>
