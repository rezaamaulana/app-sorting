<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Deret Bilangan Modular - Iterasi 4</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .container-4 {
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

        .row-4 {
            display: flex;
            justify-content: center;
            margin: 10px;
            position: relative;
        }

        .box-4 {
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

        .box-4:hover {
            background-color: #cce5ff;
        }

        .box-4.selected {
            background-color: #f8d775;
        }

        .box-4.sorted {
            background-color: #3cb371;
            color: white;
            font-weight: bold;
            cursor: default;
            pointer-events: none;
        }

        .iteration-label-4 {
            font-weight: bold;
            margin-top: 20px;
        }

        .disabled-4 {
            pointer-events: none;
            opacity: 0.5;
        }

        .btn4 {
            padding: 10px 15px;
            margin: 10px;
            border: none;
            color: white;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn4:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-reset-4 {
            background-color: #dc3545;
        }

        .button-row-4 {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .instruction-4 {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .explanation-4 {
            margin-top: 10px;
            padding: 10px;
            background-color: #f1f1f1;
            font-size: 14px;
            border-radius: 6px;
            max-width: 600px;
            text-align: center;
        }

        .divider-4 {
            width: 4px;
            background-color: grey;
            margin: 0 4px;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <div class="container-4" id="container-4">
        <a>Cari bilangan terkecil di bagian belum terurut (setelah angka 3):</a>
        <br>
        <div id="displayArea-4"></div>
        <div class="instruction-4" id="instructionText-4">
            Klik angka paling minimum untuk menukarnya ke posisi paling kiri dari bagian yang belum terurut!
        </div>
        <div class="button-row-4">
            <button class="btn4" id="btnTukar-4" disabled>Tukar</button>
            <button class="btn4 btn-reset-4" id="btnReset-4">Reset</button>
        </div>
        <div class="explanation-4" id="explanationArea-4"></div>
    </div>

    <script>
        function initSortingModule4(id) {
            let initialData = [1, 2, 3, 7, 6];
            let data = [...initialData];
            let currentIndex = 3;
            const maxIterations = 4;
            let selectedIndex = null;
            const sortedIndices = [0, 1, 2];

            const displayArea = document.getElementById(`displayArea-${id}`);
            const btnTukar = document.getElementById(`btnTukar-${id}`);
            const btnReset = document.getElementById(`btnReset-${id}`);
            const explanationArea = document.getElementById(`explanationArea-${id}`);

            function renderRow(arr, iteration, disableClick = false) {
                const wrapper = document.createElement("div");
                wrapper.style.marginBottom = "16px";

                const label = document.createElement("div");
                label.className = `iteration-label-${id}`;
                label.innerText = iteration > maxIterations ?
                    "Hasil pengurutan selesai ✅" :
                    `Iterasi ke-${iteration + 1}`;

                const row = document.createElement("div");
                row.className = `row-${id}`;
                if (disableClick) row.classList.add(`disabled-${id}`);

                arr.forEach((value, idx) => {
                    if (idx === currentIndex && currentIndex > 0) {
                        const divider = document.createElement("div");
                        divider.className = `divider-${id}`;
                        row.appendChild(divider);
                    }

                    const box = document.createElement("div");
                    box.className = `box-${id}`;
                    box.innerText = value;

                    if (sortedIndices.includes(idx)) {
                        box.classList.add("sorted");
                    }

                    if (!disableClick && !sortedIndices.includes(idx) && idx >= currentIndex) {
                        box.addEventListener("click", () => {
                            const minIndex = findMinIndexFrom(currentIndex, data);
                            if (idx !== minIndex) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops!',
                                    text: 'Ini bukan angka paling minimum, tolong perhatikan sekali lagi.',
                                    confirmButtonText: 'Oke'
                                });
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
                document.querySelectorAll(`#displayArea-${id} .box-${id}`).forEach(box =>
                    box.classList.remove("selected")
                );
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

                const rows = document.querySelectorAll(`#displayArea-${id} .row-${id}`);
                const currentRow = rows[rows.length - 1];
                const boxes = currentRow.querySelectorAll(`.box-${id}`);

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
                        `${data[currentIndex]} adalah angka paling minimum dari sisa deret, maka ditukar ke posisi kiri setelah 3 dari bagian yang belum terurut.`;

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
                currentIndex = 3;
                data = [...initialData];
                selectedIndex = null;
                sortedIndices.length = 0;
                sortedIndices.push(0, 1, 2);
                displayArea.innerHTML = "";
                explanationArea.innerHTML = "";
                btnTukar.disabled = true;
                renderRow(data, currentIndex);
            });

            renderRow(data, currentIndex);
        }

        initSortingModule4("4");
    </script>
</body>

</html>
