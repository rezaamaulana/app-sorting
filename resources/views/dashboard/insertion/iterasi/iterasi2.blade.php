<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Insertion Sort - Iterasi 2</title>
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
        <a>Pada iterasi ini kita mengambil angka ketiga, yaitu 2. Kita akan membandingkan 2 dan 6. Apakah 2 lebih kecil
            dari 6?
            Karena iya, kita akan menukar 2 dengan 6. Lalu kita akan membandingkan lagi dengan angka sebelumnya, yaitu
            1.
            Apakah 1 lebih kecil dari 2? Karena 2 tidak lebih kecil dari 1, maka 2 sudah berada pada posisi yang benar.
            <br>Maka urutannya berubah. (1, 6, 2, 5, 4) menjadi (1, 2, 6, 5, 4)
        </a>
        <div id="displayAreaIterasi2"></div>

        <div class="instruction" id="instructionTextIterasi2">
            Klik <b>Tukar</b> jika elemen kiri lebih besar dan ingin ditukar, atau <b>Tidak Ditukar</b> jika posisi
            sudah benar.
        </div>

        <div class="button-row">
            <button id="btnTukarIterasi2" disabled>Tukar</button>
            <button id="btnTidakTukarIterasi2" disabled>Tidak Ditukar</button>
            <button id="btnResetIterasi2" class="btn-reset">Reset</button>
        </div>
    </div>

    <script>
        (function() {
            let Iterasi2_initialData = [1, 6, 2, 5, 4];
            let Iterasi2_data = [...Iterasi2_initialData];
            let Iterasi2_i = 2;
            let Iterasi2_j = Iterasi2_i;
            let Iterasi2_beforeSwap = null;
            let Iterasi2_hasFinished = false;

            const Iterasi2_displayArea = document.getElementById("displayAreaIterasi2");
            const Iterasi2_btnTukar = document.getElementById("btnTukarIterasi2");
            const Iterasi2_btnTidakTukar = document.getElementById("btnTidakTukarIterasi2");
            const Iterasi2_btnReset = document.getElementById("btnResetIterasi2");
            const Iterasi2_instructionText = document.getElementById("instructionTextIterasi2");

            function Iterasi2_render() {
                Iterasi2_displayArea.innerHTML = "";

                if (Iterasi2_beforeSwap) {
                    Iterasi2_renderRow(Iterasi2_beforeSwap, "Iterasi ke-2", false);
                }

                if (Iterasi2_hasFinished) {
                    Iterasi2_renderRow(Iterasi2_data, "Hasil Pengurutan Iterasi 2", false);
                    Iterasi2_instructionText.innerText = "";
                    Iterasi2_btnTukar.disabled = true;
                    Iterasi2_btnTidakTukar.disabled = true;
                    return;
                }

                if (Iterasi2_i < Iterasi2_data.length) {
                    Iterasi2_renderRow(Iterasi2_data, `Iterasi ke-${Iterasi2_i}`, true, Iterasi2_j);
                }

                Iterasi2_updateButtons();
            }

            function Iterasi2_renderRow(arr, labelText, isActive = false, activeJ = null) {
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

                    if (!isActive && labelText === "Iterasi ke-2") {
                        if (idx <= Iterasi2_i - 1 && idx !== Iterasi2_j) {
                            box.classList.add("sorted");
                        }
                    } else if (!isActive && idx <= Iterasi2_i - 1) {
                        box.classList.add("sorted");
                    } else if (isActive && idx < Iterasi2_i && (activeJ === null || (idx !== activeJ && idx !==
                            activeJ - 1))) {
                        box.classList.add("sorted");
                    }

                    if (isActive && activeJ !== null && (idx === activeJ || idx === activeJ - 1)) {
                        box.classList.add("selected");
                    }

                    row.appendChild(box);
                });

                wrapper.appendChild(row);
                Iterasi2_displayArea.appendChild(wrapper);
            }

            function Iterasi2_updateButtons() {
                if (Iterasi2_hasFinished) return;

                if (Iterasi2_j > 0 && Iterasi2_data[Iterasi2_j - 1] > Iterasi2_data[Iterasi2_j]) {
                    Iterasi2_btnTukar.disabled = false;
                    Iterasi2_btnTidakTukar.disabled = true;
                    Iterasi2_instructionText.innerText =
                        `Bandingkan ${Iterasi2_data[Iterasi2_j - 1]} > ${Iterasi2_data[Iterasi2_j]} → klik "Tukar"`;
                } else {
                    Iterasi2_btnTukar.disabled = true;
                    Iterasi2_btnTidakTukar.disabled = false;
                    Iterasi2_instructionText.innerText =
                        `Bandingkan ${Iterasi2_data[Iterasi2_j - 1]} <= ${Iterasi2_data[Iterasi2_j]} → klik "Tidak Ditukar"`;
                }
            }

            function Iterasi2_tukar() {
                if (Iterasi2_hasFinished) return;

                Iterasi2_beforeSwap = [...Iterasi2_data];

                const boxElements = Iterasi2_displayArea.querySelectorAll(".active-row .box");
                const boxA = boxElements[Iterasi2_j - 1];
                const boxB = boxElements[Iterasi2_j];

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

                    [Iterasi2_data[Iterasi2_j - 1], Iterasi2_data[Iterasi2_j]] = [Iterasi2_data[Iterasi2_j],
                        Iterasi2_data[Iterasi2_j - 1]
                    ];
                    Iterasi2_j--;

                    Iterasi2_render();
                }, 500);
            }

            function Iterasi2_tidakTukar() {
                if (Iterasi2_hasFinished) return;
                if (!Iterasi2_beforeSwap) {
                    Iterasi2_beforeSwap = [...Iterasi2_data];
                }
                Iterasi2_hasFinished = true;
                Iterasi2_render();
            }

            Iterasi2_btnTukar.addEventListener("click", Iterasi2_tukar);
            Iterasi2_btnTidakTukar.addEventListener("click", Iterasi2_tidakTukar);
            Iterasi2_btnReset.addEventListener("click", () => {
                Iterasi2_data = [...Iterasi2_initialData];
                Iterasi2_i = 2;
                Iterasi2_j = Iterasi2_i;
                Iterasi2_beforeSwap = null;
                Iterasi2_hasFinished = false;
                Iterasi2_render();
            });

            Iterasi2_render();
        })();
    </script>
</body>

</html>
