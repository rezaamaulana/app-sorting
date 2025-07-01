<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Deret Bilangan - Sort1</title>
    <style>
        .sort1_container {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial;
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .sort1_alert {
            background-color: #e7f3ff;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .sort1_row {
            display: flex;
            justify-content: center;
            margin: 10px;
        }

        .sort1_box {
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

        .sort1_box:hover {
            background-color: #cce5ff;
        }

        .sort1_box.selected {
            background-color: #f8d775;
        }

        .sort1_box.sorted {
            background-color: #3cb371;
            color: white;
            font-weight: bold;
        }

        .sort1_iteration-label {
            font-weight: bold;
            margin-top: 20px;
        }

        .sort1_disabled {
            pointer-events: none;
            opacity: 0.5;
        }

        .sort1_btn {
            padding: 10px 15px;
            margin: 10px;
            border: none;
            color: white;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .sort1_btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .sort1_btn-reset {
            background-color: #dc3545;
        }

        .sort1_button-row {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .sort1_instruction {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 8px;
        }
    </style>

    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="sort1_container" id="sort1_container">
        <div class="sort1_alert">
            <b>Pertunjuk:</b> Klik angka paling minimum untuk menukarnya ke posisi paling kiri!
        </div>
        <div id="sort1_displayArea"></div>

        <div class="sort1_button-row">
            <button class="sort1_btn" id="sort1_btnTukar">Tukar</button>
            <button class="sort1_btn sort1_btn-reset" id="sort1_btnReset">Reset</button>
        </div>
    </div>

    <script>
        (function() {
            const sort1_initialData = [6, 7, 9, 3, 1];
            let sort1_data = [...sort1_initialData];
            let sort1_currentIndex = 0;
            let sort1_maxIterations = 4;
            let sort1_selectedIndex = null;
            const sort1_sortedIndices = [];

            const container = document.getElementById("sort1_container");
            const displayArea = container.querySelector("#sort1_displayArea");
            const btnTukar = container.querySelector("#sort1_btnTukar");
            const btnReset = container.querySelector("#sort1_btnReset");

            function sort1_renderRow(arr, iteration, disableClick = false) {
                const wrapper = document.createElement("div");

                const label = document.createElement("div");
                label.className = "sort1_iteration-label";
                label.innerText = iteration <= sort1_maxIterations ?
                    `Iterasi ke-${iteration}` :
                    "Hasil pengurutan selesai ✅";

                const row = document.createElement("div");
                row.className = "sort1_row";
                if (disableClick) row.classList.add("sort1_disabled");

                arr.forEach((value, idx) => {
                    const box = document.createElement("div");
                    box.className = "sort1_box";
                    box.innerText = value;

                    if (sort1_sortedIndices.includes(idx)) {
                        box.classList.add("sorted");
                    }

                    if (!disableClick) {
                        box.addEventListener("click", () => {
                            const minIndex = sort1_findMinIndexFrom(sort1_currentIndex, sort1_data);
                            if (idx !== minIndex) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Ups!',
                                    text: 'Ini bukan angka paling minimum, tolong perhatikan sekali lagi.',
                                    confirmButtonText: 'Oke, mengerti!'
                                });
                                return;
                            }

                            sort1_clearSelection();
                            box.classList.add("selected");
                            sort1_selectedIndex = idx;
                            btnTukar.disabled = false;
                        });
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(label);
                wrapper.appendChild(row);
                displayArea.appendChild(wrapper);
            }

            function sort1_clearSelection() {
                container.querySelectorAll(".sort1_box").forEach(box => box.classList.remove("selected"));
                sort1_selectedIndex = null;
            }

            function sort1_findMinIndexFrom(start, arr) {
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

            function sort1_swapAndMarkSorted() {
                if (sort1_selectedIndex == null) return;

                const rows = container.querySelectorAll(".sort1_row");
                const currentRow = rows[rows.length - 1];
                const boxes = currentRow.querySelectorAll(".sort1_box");

                const boxA = boxes[sort1_currentIndex];
                const boxB = boxes[sort1_selectedIndex];

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

                    [sort1_data[sort1_currentIndex], sort1_data[sort1_selectedIndex]] = [sort1_data[
                        sort1_selectedIndex], sort1_data[sort1_currentIndex]];

                    sort1_sortedIndices.push(sort1_currentIndex);
                    sort1_currentIndex++;
                    btnTukar.disabled = true;
                    sort1_clearSelection();

                    const isDone = sort1_currentIndex >= sort1_maxIterations;
                    if (isDone) sort1_sortedIndices.push(sort1_currentIndex);

                    sort1_renderRow(sort1_data, sort1_currentIndex + 1, isDone);
                }, 500);
            }

            btnTukar.addEventListener("click", sort1_swapAndMarkSorted);

            btnReset.addEventListener("click", () => {
                sort1_currentIndex = 0;
                sort1_data = [...sort1_initialData];
                sort1_selectedIndex = null;
                sort1_sortedIndices.length = 0;
                displayArea.innerHTML = "";
                btnTukar.disabled = true;
                sort1_renderRow(sort1_data, sort1_currentIndex + 1);
            });

            sort1_renderRow(sort1_data, sort1_currentIndex + 1);
        })();
    </script>
</body>

</html>
