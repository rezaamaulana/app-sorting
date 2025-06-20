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
            <b>Petunjuk:</b> Klik tombol sesuai hasil perbandingan dua angka!
        </div>
        <div id="insertionSort1_displayArea"></div>

        <div class="instruction" id="insertionSort1_instructionText">
            Klik tombol <b>Tukar</b> jika elemen kiri lebih besar dan ingin ditukar, atau klik <b>Tidak Ditukar</b>
            untuk lanjut jika sudah benar posisi.
        </div>

        <div class="button-row">
            <button id="insertionSort1_btnTukar">Tukar</button>
            <button id="insertionSort1_btnTidakTukar">Tidak Ditukar</button>
            <button id="insertionSort1_btnReset" class="btn-reset">Reset</button>
        </div>
    </div>

    <script>
        (function() {
            const initialData = [5, 7, 1, 3, 9];
            let data = [...initialData];
            let i = 1; // elemen yang sedang disisipkan
            let j = 1; // indeks perbandingan ke kiri
            const displayArea = document.getElementById("insertionSort1_displayArea");
            const btnTukar = document.getElementById("insertionSort1_btnTukar");
            const btnTidakTukar = document.getElementById("insertionSort1_btnTidakTukar");
            const btnReset = document.getElementById("insertionSort1_btnReset");
            const instructionText = document.getElementById("insertionSort1_instructionText");
            let history = [];

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
                label.innerText = iteration <= initialData.length - 1 ? `Iterasi ke-${iteration}` :
                    "Pengurutan selesai ✅";
                wrapper.appendChild(label);

                const row = document.createElement("div");
                row.className = "row";

                arr.forEach((val, idx) => {
                    const box = document.createElement("div");
                    box.className = "box";
                    box.innerText = val;

                    if (idx < iteration) {
                        box.classList.add("sorted");
                    }

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

                // Semua tombol selalu aktif (kecuali saat selesai)
                btnTukar.disabled = false;
                btnTidakTukar.disabled = false;

                if (j < 1) j = 1;
                if (j >= data.length) {
                    instructionText.innerText = "Lanjut ke iterasi berikutnya.";
                    return;
                }

                if (data[j - 1] > data[j]) {
                    instructionText.innerText = `Bandingkan ${data[j - 1]} dan ${data[j]} → apakah ditukar atau tidak`;
                } else {
                    instructionText.innerText =
                        `Bandingkan ${data[j - 1]} dan ${data[j]} → apakah ditukar atau tidak`;
                }
            }

            function tukar() {
                if (!(j > 0 && data[j - 1] > data[j])) {
                    alert(`Salah! Angka ${data[j - 1]} tidak lebih besar dari ${data[j]}, jadi tidak ditukar.`);
                    return;
                }
                [data[j - 1], data[j]] = [data[j], data[j - 1]];
                j--;
                render();
            }

            function tidakTukar() {
                if (j > 0 && data[j - 1] > data[j]) {
                    alert(`Salah! Angka ${data[j - 1]} lebih besar dari ${data[j]}, jadi harus ditukar.`);
                    return;
                }
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
        })();
    </script>
</body>

</html>
