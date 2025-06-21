<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Insertion Sort Interaktif dengan Riwayat Iterasi</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial;
        }

        .alert {
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
            cursor: default;
            position: relative;
            transition: background 0.3s, transform 0.5s ease;
        }

        .box.selected {
            background-color: #f8d775;
        }

        .box.sorted {
            background-color: #3cb371;
            color: white;
            font-weight: bold;
        }

        .box.moving {
            z-index: 10;
            transition: transform 0.5s ease;
        }

        .iteration-label {
            font-weight: bold;
            margin-top: 20px;
        }

        .button-row {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            gap: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            color: white;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-reset {
            background-color: #dc3545;
        }

        .instruction {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 8px;
            text-align: center;
            width: 450px;
        }

        .active-row .box.selected {
            background-color: #f8d775 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="alert">
            <b>Perhatikan</b> petunjuk arahan di bawah deret bilangan dan ikuti sesuai instruksi!
        </div>
        <div id="displayArea"></div>

        <div class="instruction" id="instructionText">
            Klik tombol <b>Tukar</b> jika elemen kiri lebih besar dan ingin ditukar, atau klik <b>Tidak Ditukar</b>
            untuk lanjut jika sudah benar posisi.
        </div>

        <div class="button-row">
            <button id="btnTukar" disabled>Tukar</button>
            <button id="btnTidakTukar" disabled>Tidak Ditukar</button>
            <button id="btnReset" class="btn-reset">Reset</button>
        </div>
    </div>

    <script>
        let initialData = [1, 6, 2, 5, 4];
        let data = [...initialData];
        let i = 1;
        let j = i;
        let history = [];

        const displayArea = document.getElementById("displayArea");
        const btnTukar = document.getElementById("btnTukar");
        const btnTidakTukar = document.getElementById("btnTidakTukar");
        const btnReset = document.getElementById("btnReset");
        const instructionText = document.getElementById("instructionText");

        function render() {
            displayArea.innerHTML = "";
            history.forEach((snapshot, idx) => {
                renderRow(snapshot.data, idx + 1, false);
            });

            if (i < data.length) {
                renderRow(data, i, true, j);
            } else {
                renderRow(data, i, false);
                instructionText.innerText = "Pengurutan selesai ✅";
                btnTukar.disabled = true;
                btnTidakTukar.disabled = true;
                return;
            }

            updateButtons();
        }

        function renderRow(arr, iteration, isActive = false, activeJ = null) {
            const wrapper = document.createElement("div");
            if (isActive) wrapper.classList.add("active-row");

            const label = document.createElement("div");
            label.className = "iteration-label";
            label.innerText = iteration <= initialData.length - 1 ?
                `Iterasi ke-${iteration}` :
                "Pengurutan selesai ✅";
            wrapper.appendChild(label);

            const row = document.createElement("div");
            row.className = "row";

            arr.forEach((val, idx) => {
                const box = document.createElement("div");
                box.className = "box";
                box.innerText = val;

                if (idx < iteration) box.classList.add("sorted");

                if (isActive && activeJ !== null && (idx === activeJ || idx === activeJ - 1)) {
                    box.classList.add("selected");
                }

                row.appendChild(box);
            });

            wrapper.appendChild(row);
            displayArea.appendChild(wrapper);
        }

        function updateButtons() {
            if (i >= data.length) {
                btnTukar.disabled = true;
                btnTidakTukar.disabled = true;
                instructionText.innerText = "Pengurutan selesai ✅";
                return;
            }

            if (j > 0 && data[j - 1] > data[j]) {
                btnTukar.disabled = false;
                btnTidakTukar.disabled = true;
                instructionText.innerText = `Bandingkan ${data[j - 1]} > ${data[j]} → klik "Tukar"`;
            } else {
                btnTukar.disabled = true;
                btnTidakTukar.disabled = false;
                instructionText.innerText = `Bandingkan ${data[j - 1]} <= ${data[j]} → klik "Tidak Ditukar"`;
            }
        }

        function tukar() {
            const activeRow = displayArea.querySelector(".active-row .row");
            if (!activeRow) return;

            const boxA = activeRow.children[j - 1];
            const boxB = activeRow.children[j];
            const rectA = boxA.getBoundingClientRect();
            const rectB = boxB.getBoundingClientRect();
            const offsetX = rectB.left - rectA.left;

            boxA.classList.add("moving");
            boxB.classList.add("moving");
            boxA.style.transform = `translateX(${offsetX}px)`;
            boxB.style.transform = `translateX(-${offsetX}px)`;

            setTimeout(() => {
                boxA.classList.remove("moving");
                boxB.classList.remove("moving");
                boxA.style.transform = "";
                boxB.style.transform = "";

                [data[j - 1], data[j]] = [data[j], data[j - 1]];
                j--;
                render();
            }, 500);
        }

        function tidakTukar() {
            history.push({
                data: [...data]
            });
            i++;
            j = i;
            render();
        }

        btnTukar.addEventListener("click", tukar);
        btnTidakTukar.addEventListener("click", tidakTukar);
        btnReset.addEventListener("click", () => {
            data = [...initialData];
            i = 1;
            j = i;
            history = [];
            render();
        });

        render();
    </script>
</body>

</html>
