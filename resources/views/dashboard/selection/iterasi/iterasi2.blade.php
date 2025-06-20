<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Deret Bilangan Modular - Iterasi 2</title>
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
            cursor: default;
            pointer-events: none;
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

        .divider2 {
            width: 4px;
            background-color: grey;
            margin: 0 4px;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <div class="container" id="container-2">
        Cari bilangan terkecil di bagian belum terurut (setelah angka 1):
        <br>
        <div id="displayArea-2"></div>
        <div class="instruction" id="instructionText-2">
            Klik angka paling minimum untuk menukarnya ke posisi paling kiri dari bagian yang belum terurut!
        </div>
        <div class="button-row">
            <button class="btn1" id="btnTukar-2" disabled>Tukar</button>
            <button class="btn1 btn-reset" id="btnReset-2">Reset</button>
        </div>
        <div class="explanation" id="explanationArea-2"></div>
    </div>

    <script>
        function initSortingModule2(containerIdSuffix) {
            let initialData = [1, 3, 7, 2, 6];
            let data = [...initialData];
            let currentIndex = 1;
            const maxIterations = 2;
            let selectedIndex = null;
            const sortedIndices = [0];

            const displayArea = document.getElementById(`displayArea-${containerIdSuffix}`);
            const btnTukar = document.getElementById(`btnTukar-${containerIdSuffix}`);
            const btnReset = document.getElementById(`btnReset-${containerIdSuffix}`);
            const explanationArea = document.getElementById(`explanationArea-${containerIdSuffix}`);

            function renderRow(arr, iteration, disableClick = false) {
                const wrapper = document.createElement("div");
                wrapper.style.marginBottom = "16px";

                const label = document.createElement("div");
                label.className = "iteration-label";

                if (iteration > maxIterations) {
                    label.innerText = "Hasil pengurutan selesai ✅";
                } else {
                    label.innerText = `Iterasi ke-${iteration + 1}`;
                }

                const row = document.createElement("div");
                row.className = "row";
                if (disableClick) row.classList.add("disabled");

                arr.forEach((value, idx) => {
                    if (idx === currentIndex && currentIndex > 0) {
                        const divider2 = document.createElement("div");
                        divider2.className = "divider2";
                        row.appendChild(divider2);
                    }

                    const box = document.createElement("div");
                    box.className = "box";
                    box.innerText = value;

                    if (sortedIndices.includes(idx)) {
                        box.classList.add("sorted");
                    }

                    if (!disableClick && !sortedIndices.includes(idx) && idx >= currentIndex) {
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
                    } else {
                        box.style.cursor = "default";
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
                        `${data[currentIndex]} adalah angka paling minimum dari sisa deret, maka ditukar ke posisi kiri setelah 1 dari bagian yang belum terurut.`;

                    sortedIndices.push(currentIndex);
                    sortedIndices.sort((a, b) => a - b);

                    currentIndex++;

                    btnTukar.disabled = true;
                    clearSelection();

                    const isDone = currentIndex >= maxIterations;
                    renderRow(data, currentIndex + (isDone ? 1 : 0), isDone);

                }, 500);
            }

            btnTukar.addEventListener("click", swapAndMarkSorted);

            btnReset.addEventListener("click", () => {
                currentIndex = 1;
                data = [...initialData];
                selectedIndex = null;
                sortedIndices.length = 0;
                sortedIndices.push(0);
                displayArea.innerHTML = "";
                explanationArea.innerHTML = "";
                btnTukar.disabled = true;
                renderRow(data, currentIndex);
            });

            renderRow(data, currentIndex);
        }

        initSortingModule2("2");
    </script>
</body>

</html>
