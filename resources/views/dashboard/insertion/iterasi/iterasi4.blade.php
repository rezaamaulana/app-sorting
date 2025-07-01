<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Insertion Sort - Iterasi 4</title>
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
        <a>Pada iterasi ini, kita mengambil angka kelima, yaitu 4. Lalu bandingkan 6 dan 4, didapatkan bahwa 6 lebih
            besar
            dari 4 maka angka tersebut akan ditukar. Selanjutnya, kita akan membandingkan dengan angka sebelumnya,
            bandingkan 4 dan 5. Apakah 4 lebih kecil dari 5? Karena iya, kita akan menukar 5 dengan 4. Setelah itu, kita
            akan mengecek dengan angka sebelumnya lagi, yaitu 2. Apakah 4 lebih kecil dari 2? Karena 4 tidak lebih kecil
            dari 2, maka 4 sudah
            pada posisi benar, yaitu setelah 2 dan sebelum 5. Maka urutannya berubah (1, 2, 5, 6, 4) menjadi (1, 2, 4,
            5, 6)
        </a>
        <div id="displayAreaIterasi4"></div>

        <div class="instruction" id="instructionTextIterasi4">
            Klik <b>Tukar</b> jika elemen kiri lebih besar dan ingin ditukar, atau <b>Tidak Ditukar</b> jika posisi
            sudah benar.
        </div>

        <div class="button-row">
            <button id="btnTukarIterasi4" disabled>Tukar</button>
            <button id="btnTidakTukarIterasi4" disabled>Tidak Ditukar</button>
            <button id="btnResetIterasi4" class="btn-reset">Reset</button>
        </div>
    </div>

    <script>
        (function() {
            let dataAwal = [1, 2, 5, 6, 4];
            let data = [...dataAwal];
            let i = 4;
            let j = i;
            let beforeSwap = null;
            let sudahSelesai = false;

            const displayArea = document.getElementById("displayAreaIterasi4");
            const btnTukar = document.getElementById("btnTukarIterasi4");
            const btnTidakTukar = document.getElementById("btnTidakTukarIterasi4");
            const btnReset = document.getElementById("btnResetIterasi4");
            const instructionText = document.getElementById("instructionTextIterasi4");

            function render() {
                displayArea.innerHTML = "";

                if (beforeSwap) {
                    renderRow(beforeSwap, "Iterasi ke-4", false);
                }

                if (sudahSelesai) {
                    renderRow(data, "Hasil Pengurutan Iterasi 4", false);
                    instructionText.innerText = "";
                    btnTukar.disabled = true;
                    btnTidakTukar.disabled = true;
                    return;
                }

                renderRow(data, `Iterasi ke-${i}`, true, j);
                updateButtons();
            }

            function renderRow(arr, labelText, isActive = false, activeJ = null) {
                const wrapper = document.createElement("div");
                if (isActive) wrapper.classList.add("active-row");

                const label = document.createElement("div");
                label.className = "iteration-label";
                label.innerText = labelText;
                wrapper.appendChild(label);

                const row = document.createElement("div");
                row.className = "row";

                arr.forEach((val, idx) => {
                    const box = document.createElement("div");
                    box.className = "box";
                    box.innerText = val;

                    if (!isActive && labelText === "Iterasi ke-4" && idx < j) {
                        box.classList.add("sorted");
                    } else if (!isActive && idx <= i - 1) {
                        box.classList.add("sorted");
                    } else if (isActive && idx < i && (activeJ === null || (idx !== activeJ && idx !== activeJ -
                            1))) {
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
                if (sudahSelesai) return;

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
                if (sudahSelesai) return;

                if (!beforeSwap) {
                    beforeSwap = [...data];
                }

                const boxElements = displayArea.querySelectorAll(".active-row .box");
                const boxA = boxElements[j - 1];
                const boxB = boxElements[j];

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
                if (sudahSelesai) return;
                if (!beforeSwap) beforeSwap = [...data];
                sudahSelesai = true;
                render();
            }

            btnTukar.addEventListener("click", tukar);
            btnTidakTukar.addEventListener("click", tidakTukar);
            btnReset.addEventListener("click", () => {
                data = [...dataAwal];
                i = 4;
                j = i;
                beforeSwap = null;
                sudahSelesai = false;
                render();
            });

            render();
        })();
    </script>
</body>

</html>
