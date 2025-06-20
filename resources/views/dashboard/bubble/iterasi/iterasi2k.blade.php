<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Deret Bilangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .alert {
            background-color: #e3f2fd;
            border-left: 5px solid #2196f3;
            padding: 10px 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .number-row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .number-box {
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            font-size: 20px;
            border: 2px solid black;
            background-color: #ffeb3b;
            margin: 5px;
            border-radius: 15px;
            transition: transform 0.4s;
        }

        .number-box.animate-swap-left {
            animation: moveLeft 0.4s forwards;
        }

        .number-box.animate-swap-right {
            animation: moveRight 0.4s forwards;
        }

        @keyframes moveLeft {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-62px);
            }
        }

        @keyframes moveRight {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(62px);
            }
        }

        .iteration-label {
            animation: fadeIn 0.5s ease-in-out;
            font-weight: bold;
            text-align: center;
            margin: 15px 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .controls {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .controls button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .controls button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        #statusText {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container" id="bubbleSortApp">
        Untuk pengurutan keseluruhannya sebagai berikut:
        <br /><br />
        <div class="alert">
            💡 <b>Perhatikan:</b> Petunjuk Arahan Dibawah Deret Bilangan dan Ikuti Sesuai Instruksi!
        </div>

        <div id="iterationInfo" class="iteration-label"></div>
        <div id="numbersDisplay"></div>

        <div class="controls">
            <button id="btnSwap">Tukar</button>
            <button id="btnNoSwap">Tidak Ditukar</button>
            <button id="btnReset" style="background-color: #dc3545;">Reset</button>
        </div>

        <div id="statusText"></div>
    </div>

    <script>
        (() => {
            const startingArray = [2, 4, 3, 8, 9];
            let arrayState = [...startingArray];
            let iteration = 0;
            let index = 0;
            let fixedAfterSwap = false;

            const displayContainer = document.getElementById('numbersDisplay');
            const iterationLabel = document.getElementById('iterationInfo');
            const statusLabel = document.getElementById('statusText');
            const btnSwap = document.getElementById('btnSwap');
            const btnNoSwap = document.getElementById('btnNoSwap');
            const btnReset = document.getElementById('btnReset');

            function showIteration(num) {
                iterationLabel.textContent = `Iterasi ke-${num}`;
            }

            function renderNumbers(arr, highlightIdx = null) {
                displayContainer.innerHTML = '';
                const row = document.createElement('div');
                row.className = 'number-row';

                arr.forEach((num, idx) => {
                    const box = document.createElement('div');
                    box.className = 'number-box';
                    box.textContent = num;

                    if (highlightIdx !== null && (idx === highlightIdx || idx === highlightIdx + 1)) {
                        box.style.backgroundColor = '#add8e6';
                    }

                    if (num === 9) {
                        box.style.backgroundColor = '#90ee90';
                        box.style.fontWeight = 'bold';
                    }

                    if (fixedAfterSwap && num === 8) {
                        box.style.backgroundColor = '#90ee90';
                        box.style.fontWeight = 'bold';
                    }

                    row.appendChild(box);
                });

                displayContainer.appendChild(row);
            }

            function updateButtons() {
                const leftNum = arrayState[index];
                const rightNum = arrayState[index + 1];

                // Nonaktifkan semua jika perbandingan sudah selesai
                if (index >= arrayState.length - 1) {
                    btnSwap.disabled = true;
                    btnNoSwap.disabled = true;
                    statusLabel.textContent = 'Perbandingan selesai';
                    return;
                }

                // Jika 9 terlibat, lewati
                if (rightNum === 9) {
                    btnSwap.disabled = true;
                    btnNoSwap.disabled = true;
                    statusLabel.textContent = 'Angka 9 sudah tetap dan tidak bisa ditukar';
                    return;
                }

                if (leftNum < rightNum) {
                    btnSwap.disabled = true;
                    btnNoSwap.disabled = false;
                    statusLabel.innerHTML = `Bandingkan ${leftNum} &lt; ${rightNum}, angka <b>tidak ditukar</b>`;
                } else {
                    btnSwap.disabled = false;
                    btnNoSwap.disabled = true;
                    statusLabel.innerHTML = `Bandingkan ${leftNum} &gt; ${rightNum}, angka <b>ditukar</b>`;
                }
            }

            function nextStep() {
                index++;
                renderNumbers(arrayState, index);
                updateButtons();
                showIteration(iteration + 1);

                if (fixedAfterSwap && !document.getElementById('fixedNote')) {
                    const note = document.createElement('div');
                    note.id = 'fixedNote';
                    note.style.textAlign = 'center';
                    note.style.marginTop = '10px';
                    note.style.fontSize = '15px';
                    note.innerHTML = '🔒 Angka <b>8</b> telah dianggap tetap setelah pertukaran dengan angka 4.';
                    iterationLabel.parentNode.insertBefore(note, statusLabel);
                }
            }

            btnSwap.addEventListener('click', () => {
                const currentRowBoxes = displayContainer.lastChild.querySelectorAll('.number-box');
                const boxLeft = currentRowBoxes[index];
                const boxRight = currentRowBoxes[index + 1];

                const leftVal = arrayState[index];
                const rightVal = arrayState[index + 1];

                boxLeft.classList.add('animate-swap-right');
                boxRight.classList.add('animate-swap-left');

                setTimeout(() => {
                    arrayState[index] = rightVal;
                    arrayState[index + 1] = leftVal;

                    if ((leftVal === 4 && rightVal === 8) || (leftVal === 8 && rightVal === 4)) {
                        fixedAfterSwap = true;
                    }

                    nextStep();
                }, 400);
            });

            btnNoSwap.addEventListener('click', () => {
                nextStep();
            });

            btnReset.addEventListener('click', () => {
                arrayState = [...startingArray];
                iteration = 0;
                index = 0;
                fixedAfterSwap = false;
                document.getElementById('fixedNote')?.remove();
                displayContainer.innerHTML = '';
                statusLabel.textContent = '';
                btnSwap.disabled = false;
                btnNoSwap.disabled = false;
                renderNumbers(arrayState, index);
                updateButtons();
                showIteration(iteration + 1);
            });

            // Inisialisasi awal
            renderNumbers(arrayState, index);
            updateButtons();
            showIteration(iteration + 1);
        })();
    </script>
</body>

</html>
