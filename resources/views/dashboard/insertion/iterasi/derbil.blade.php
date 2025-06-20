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
            margin: 20px;
        }
        .box {
            width: 100px; /* Menyesuaikan ukuran box dengan gambar */
            height: 100px; /* Menyesuaikan ukuran box dengan gambar */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }
        .img1 {
            width: 250px; /* Mengatur lebar gambar agar sesuai dengan box */
            height: 250px; /* Mengatur tinggi gambar agar sesuai dengan box */
            border-radius: 5px; /* Menjaga sudut agar sama dengan box */
        }
        .button-container {
            display: flex;
            justify-content: center; /* Memusatkan tombol secara horizontal */
            margin: 20px; /* Menambahkan margin atas dan bawah */
        }
        .sort-button {
            padding: 10px 20px; /* Menambahkan padding untuk tombol */
            font-size: 16px; /* Mengatur ukuran font tombol */
            border: none; /* Menghilangkan border default */
            border-radius: 5px; /* Menjaga sudut tombol agar melengkung */
            background-color: #007BFF; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            cursor: pointer; /* Menunjukkan bahwa tombol dapat diklik */
        }
        .sort-button:hover {
            background-color: #0056b3; /* Mengubah warna saat hover */
        }
    </style>
</head>
<body>

    <div class="container1">
        <div class="box" id="box1"><img class="img1" src="{{ asset('img/kartu/1.png') }}" alt="Image 1"></div>
        <div class="box" id="box2"><img class="img1" src="{{ asset('img/kartu/2.png') }}" alt="Image 2"></div>
        <div class="box" id="box3"><img class="img1" src="{{ asset('img/kartu/4.png') }}" alt="Image 3"></div>
        <div class="box" id="box4"><img class="img1" src="{{ asset('img/kartu/3.png') }}" alt="Image 4"></div>
        <div class="box" id="box5"><img class="img1" src="{{ asset('img/kartu/5.png') }}" alt="Image 5"></div>
    </div>

    <div class="button-container">
        <button class="sort-button" onclick="sort()">Tukar 5 dan 4</button>
    </div>

<script>
    function sort() {
        const box3 = document.getElementById('box3');
        const box4 = document.getElementById('box4');

        // Swap values between box3 and box4
        let temp = box3.innerHTML; // Gunakan innerHTML untuk menyimpan konten HTML (termasuk gambar)
        box3.innerHTML = box4.innerHTML;
        box4.innerHTML = temp;
    }
</script>

</body>
</html>
