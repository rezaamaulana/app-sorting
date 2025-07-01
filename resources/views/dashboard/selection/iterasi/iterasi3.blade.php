<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Deret Bilangan Modular - Iterasi 3</title>
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .container-3 {
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

        .row-3 {
            display: flex;
            justify-content: center;
            margin: 10px;
            position: relative;
        }

        .box-3 {
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

        .box-3:hover {
            background-color: #cce5ff;
        }

        .box-3.selected {
            background-color: #f8d775;
        }

        .box-3.sorted {
            background-color: #3cb371;
            color: white;
            font-weight: bold;
            cursor: default;
            pointer-events: none;
        }

        .iteration-label-3 {
            font-weight: bold;
            margin-top: 20px;
        }

        .disabled-3 {
            pointer-events: none;
            opacity: 0.5;
        }

        .btn3 {
            padding: 10px 15px;
            margin: 10px;
            border: none;
            color: white;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn3:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-reset-3 {
            background-color: #dc3545;
        }

        .button-row-3 {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .instruction-3 {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .explanation-3 {
            margin-top: 10px;
            padding: 10px;
            background-color: #f1f1f1;
            font-size: 14px;
            border-radius: 6px;
            max-width: 600px;
            text-align: center;
        }

        .divider-3 {
            width: 4px;
            background-color: grey;
            margin: 0 4px;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <div class="container-3" id="container-3">
        <a>Cari bilangan terkecil di bagian belum terurut (setelah angka 2):</a>
        <br>
        <div id="displayArea-3"></div>
        <div class="instruction-3" id="instructionText-3">
            Klik angka paling minimum untuk menukarnya ke posisi paling kiri dari bagian yang belum terurut!
        </div>
        <div class="button-row-3">
            <button class="btn3" id="btnTukar-3" disabled>Tukar</button>
            <button class="btn3 btn-reset-3" id="btnReset-3">Reset</button>
        </div>
        <div class="explanation-3" id="explanationArea-3"></div>
    </div>

    <script>
        function initSortingModule3(containerIdSuffix) {
            let initialData3 = [1, 2, 7, 3, 6];
            let data3 = [...initialData3];
            let currentIndex3 = 2;
            const maxIterations3 = 3;
            let selectedIndex3 = null;
            const sortedIndices3 = [0, 1];

            const displayArea3 = document.getElementById(`displayArea-${containerIdSuffix}`);
            const btnTukar3 = document.getElementById(`btnTukar-${containerIdSuffix}`);
            const btnReset3 = document.getElementById(`btnReset-${containerIdSuffix}`);
            const explanationArea3 = document.getElementById(`explanationArea-${containerIdSuffix}`);

            function renderRow3(arr, iteration, disableClick = false) {
                const wrapper = document.createElement("div");
                wrapper.style.marginBottom = "16px";

                const label = document.createElement("div");
                label.className = "iteration-label-3";

                if (iteration > maxIterations3) {
                    label.innerText = "Hasil pengurutan selesai ✅";
                } else {
                    label.innerText = `Iterasi ke-${iteration + 1}`;
                }

                const row = document.createElement("div");
                row.className = "row-3";
                if (disableClick) row.classList.add("disabled-3");

                arr.forEach((value, idx) => {
                    if (idx === currentIndex3 && currentIndex3 > 0) {
                        const divider = document.createElement("div");
                        divider.className = "divider-3";
                        row.appendChild(divider);
                    }

                    const box = document.createElement("div");
                    box.className = "box-3";
                    box.innerText = value;

                    if (sortedIndices3.includes(idx)) {
                        box.classList.add("sorted");
                    }

                    if (!disableClick && !sortedIndices3.includes(idx) && idx >= currentIndex3) {
                        box.addEventListener("click", () => {
                            const minIndex = findMinIndex3From(currentIndex3, data3);
                            if (idx !== minIndex) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops!',
                                    text: 'Ini bukan angka paling minimum, tolong perhatikan sekali lagi.',
                                    confirmButtonText: 'Oke'
                                });
                                return;
                            }
                            clearSelection3();
                            box.classList.add("selected");
                            selectedIndex3 = idx;
                            btnTukar3.disabled = false;
                        });
                    } else {
                        box.style.cursor = "default";
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(label);
                wrapper.appendChild(row);
                displayArea3.appendChild(wrapper);
            }

            function clearSelection3() {
                document.querySelectorAll(`#displayArea-${containerIdSuffix} .box-3`).forEach(box => box.classList.remove(
                    "selected"));
                selectedIndex3 = null;
            }

            function findMinIndex3From(start, arr) {
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

            function swapAndMarkSorted3() {
                if (selectedIndex3 == null) return;

                const rows = document.querySelectorAll(`#displayArea-${containerIdSuffix} .row-3`);
                const currentRow = rows[rows.length - 1];
                const boxes = currentRow.querySelectorAll(".box-3");

                const boxA = boxes[currentIndex3];
                const boxB = boxes[selectedIndex3];

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

                    [data3[currentIndex3], data3[selectedIndex3]] = [data3[selectedIndex3], data3[currentIndex3]];

                    explanationArea3.innerText =
                        `${data3[currentIndex3]} adalah angka paling minimum dari sisa deret, maka ditukar ke posisi kiri setelah 2 dari bagian yang belum terurut.`;

                    sortedIndices3.push(currentIndex3);
                    sortedIndices3.sort((a, b) => a - b);

                    currentIndex3++;

                    btnTukar3.disabled = true;
                    clearSelection3();

                    const isDone = currentIndex3 >= maxIterations3;
                    renderRow3(data3, currentIndex3 + (isDone ? 1 : 0), isDone);

                }, 500);
            }

            btnTukar3.addEventListener("click", swapAndMarkSorted3);

            btnReset3.addEventListener("click", () => {
                currentIndex3 = 2;
                data3 = [...initialData3];
                selectedIndex3 = null;
                sortedIndices3.length = 0;
                sortedIndices3.push(0, 1);
                displayArea3.innerHTML = "";
                explanationArea3.innerHTML = "";
                btnTukar3.disabled = true;
                renderRow3(data3, currentIndex3);
            });

            renderRow3(data3, currentIndex3);
        }

        initSortingModule3("3");
    </script>
</body>

</html>
