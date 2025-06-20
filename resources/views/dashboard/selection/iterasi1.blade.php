<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>deret bilangan</title>
    <style>
        .container {
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

        .alertv1 {
            background-color: #e7f3ff;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .row {
            display: flex;
            justify-content: center;
            margin: 10px;
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
            /* transition: transform 0.5s ease; */
            position: relative;
        }

        .box:hover {
            background-color: #cce5ff;
        }

        .box.selected {
            background-color: #f8d775;
            /* kuning */
        }

        .box.sorted {
            background-color: #3cb371;
            /* hijau stabil */
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

        .btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-reset {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            margin: 10px;

            /* merah */
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
    </style>
</head>

<body>

    {{-- <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> <b>Perhatikan</b> Petunjuk Arahan Dibawah Deret Bilangan dan Ikuti
        Sesuai Instruksi!!
    </div> --}}
    <div class="container">
        <div class="alertv1">
            <b>Perhatikan:</b> Klik angka paling minimum untuk menukarnya ke posisi paling kiri!
        </div>
        <div id="displayArea"></div>

        <div class="instruction" id="instructionText">
            Klik angka paling minimum untuk menukarnya ke posisi paling kiri!
        </div>

        <div class="button-row">
            <button class="btn1" id="btnTukar">Tukar</button>
            <button class="btn1 btn-reset" id="btnReset">Reset</button>
        </div>
    </div>

    <script>
        let initialData = [7, 3, 1, 2, 6];
        let data = [...initialData];
        let currentIndex = 0;
        let maxIterations = 4;
        let selectedIndex = null;
        const sortedIndices = [];

        const displayArea = document.getElementById("displayArea");
        const btnTukar = document.getElementById("btnTukar");
        const btnReset = document.getElementById("btnReset");

        function renderRow(arr, iteration, disableClick = false) {
            const wrapper = document.createElement("div");

            const label = document.createElement("div");
            label.className = "iteration-label";
            label.innerText = iteration <= maxIterations ? `Iterasi ke-${iteration}` : "Hasil pengurutan selesai ✅";

            const row = document.createElement("div");
            row.className = "row";
            if (disableClick) row.classList.add("disabled");

            arr.forEach((value, idx) => {
                const box = document.createElement("div");
                box.className = "box";
                box.innerText = value;

                if (sortedIndices.includes(idx)) {
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
            document.querySelectorAll(".box").forEach(box => box.classList.remove("selected"));
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

            const rows = document.querySelectorAll(".row");
            const currentRow = rows[rows.length - 1]; // baris terakhir = baris aktif
            const boxes = currentRow.querySelectorAll(".box");

            const boxA = boxes[currentIndex];
            const boxB = boxes[selectedIndex];

            // Hitung selisih posisi horizontal
            const offsetA = boxA.offsetLeft;
            const offsetB = boxB.offsetLeft;
            const deltaX = offsetB - offsetA;

            // Aktifkan animasi
            boxA.style.transition = "transform 0.5s ease";
            boxB.style.transition = "transform 0.5s ease";
            boxA.style.transform = `translateX(${deltaX}px)`;
            boxB.style.transform = `translateX(${-deltaX}px)`;

            // Setelah animasi selesai
            setTimeout(() => {
                // Reset transform visual
                boxA.style.transition = "";
                boxB.style.transition = "";
                boxA.style.transform = "";
                boxB.style.transform = "";

                // Tukar data di array
                [data[currentIndex], data[selectedIndex]] = [data[selectedIndex], data[currentIndex]];

                // Tandai elemen saat ini sebagai sudah diurutkan
                sortedIndices.push(currentIndex);
                currentIndex++;
                btnTukar.disabled = true;
                clearSelection();

                const isDone = currentIndex >= maxIterations;
                if (isDone) sortedIndices.push(currentIndex); // tandai terakhir

                renderRow(data, currentIndex + 1, isDone);
            }, 500);
        }



        btnTukar.addEventListener("click", () => {
            swapAndMarkSorted();
        });

        btnReset.addEventListener("click", () => {
            currentIndex = 0;
            data = [...initialData];
            selectedIndex = null;
            sortedIndices.length = 0;
            displayArea.innerHTML = "";
            btnTukar.disabled = true;
            renderRow(data, currentIndex + 1);
        });

        // Initial render
        renderRow(data, currentIndex + 1);
    </script>
</body>

</html>
