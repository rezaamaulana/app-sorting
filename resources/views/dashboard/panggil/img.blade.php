<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Animation</title>
    <style>
        .container1 {
            display: flex;
            gap: 35px;
            justify-content: center;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .box {
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            position: relative;
            transition: transform 0.5s ease;
        }

        .img1 {
            width: 250px;
            height: 250px;
            border-radius: 5px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin: 20px;
        }

        .sort-button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        .sort-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container1">
        <div class="box" id="box1"><img class="img1" src="{{ asset('img/kartu/1.png') }}" alt="Image 1"></div>
        <div class="box" id="box2"><img class="img1" src="{{ asset('img/kartu/2.png') }}" alt="Image 2">
        </div>
        <div class="box" id="box3"><img class="img1" src="{{ asset('img/kartu/4.png') }}" alt="Image 3">
        </div>
        <div class="box" id="box4"><img class="img1" src="{{ asset('img/kartu/3.png') }}" alt="Image 4">
        </div>
        <div class="box" id="box5"><img class="img1" src="{{ asset('img/kartu/5.png') }}" alt="Image 5">
        </div>
    </div>

    <div class="button-container">
        <button class="sort-button" onclick="sort()">Tukar 5 dan 4</button>
    </div>

    <script>
        function sort() {
            const box3 = document.getElementById('box3');
            const box4 = document.getElementById('box4');

            const rect3 = box3.getBoundingClientRect();
            const rect4 = box4.getBoundingClientRect();

            const offsetX = rect4.left - rect3.left;

            // Terapkan transform sementara
            box3.style.transform = `translateX(${offsetX}px)`;
            box4.style.transform = `translateX(${-offsetX}px)`;

            // Setelah animasi selesai, tukar isi dan reset transform
            setTimeout(() => {
                // Simpan isi HTML
                const temp = box3.innerHTML;
                box3.innerHTML = box4.innerHTML;
                box4.innerHTML = temp;

                // Reset transform (tanpa animasi)
                box3.style.transition = 'none';
                box4.style.transition = 'none';
                box3.style.transform = 'none';
                box4.style.transform = 'none';

                // Paksa reflow agar browser mengenali perubahan transition
                void box3.offsetWidth;

                // Kembalikan transition
                box3.style.transition = 'transform 0.5s ease';
                box4.style.transition = 'transform 0.5s ease';

            }, 500); // Waktu harus sama dengan durasi animasi
        }
    </script>

</body>

</html>
