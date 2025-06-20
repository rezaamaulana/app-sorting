<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Sort Animation</title>
    <style>
        .highlight {
            background-color: yellow;
            /* Sorot saat dibandingkan */
        }

        .sorted {
            background-color: blue;
            /* Sorot elemen terurut */
        }

        .array-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 20px;
        }

        .array-element {
            padding: 10px;
            font-size: 20px;
            border: 1px solid black;
            width: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="array5" class="array-container"></div>
    <script>
        const originalArray = [8, 2, 4, 3, 9];
        const delay5 = ms => new Promise(resolve => setTimeout(resolve, ms));

        async function bubbleSort(arr) {
            let n = arr.length;
            for (let i = 0; i < n - 1; i++) {
                for (let j = 0; j < n - i - 1; j++) {
                    renderArray5(arr, j, j + 1, false, n - i - 1); // Sorot elemen yang dibandingkan
                    await delay5(1000);

                    if (arr[j] > arr[j + 1]) {
                        [arr[j], arr[j + 1]] = [arr[j + 1], arr[j]]; // Swap
                        renderArray5(arr, j, j + 1, true, n - i - 1); // Sorot jika ada penukaran
                        await delay5(1000);
                    }
                }
                renderArray5(arr, null, null, false, n - i - 1); // Soroti elemen yang sudah terurut
            }
            renderArray5(arr, null, null, false, 0); // Soroti seluruh array setelah terurut
            await delay5(2000); // Tampilkan hasil selama 2 detik
        }

        function renderArray5(arr, highlightIndex1 = null, highlightIndex2 = null, swapped = false, sortedIndex = null) {
            let container = document.getElementById('array5');
            container.innerHTML = ''; // Bersihkan tampilan array sebelumnya
            arr.forEach((num, index) => {
                let div = document.createElement('div');
                div.className = 'array-element';
                div.textContent = num;

                if (sortedIndex !== null && index >= sortedIndex) {
                    div.classList.add('sorted'); // Soroti elemen yang sudah terurut
                } else if (index === highlightIndex1 || index === highlightIndex2) {
                    div.classList.add('highlight'); // Sorot elemen yang sedang dibandingkan
                }

                container.appendChild(div);
            });
        }

        async function startAnimation() {
            while (true) {
                let arr = [...originalArray]; // Reset array ke kondisi awal
                await bubbleSort(arr); // Jalankan animasi bubble sort
            }
        }

        startAnimation(); // Mulai animasi secara terus-menerus
    </script>
</body>

</html>