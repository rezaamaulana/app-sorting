<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permainan OSI Layer - Konva.js</title>
    <script src="https://cdn.jsdelivr.net/npm/konva@8.4.3/konva.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            /* latar belakang coklat krem */
            color: #5d4037;
            /* teks coklat tua */
            background-image: url('images/log.png');
        }

        #container {
            background: #ffffff;
            width: 100vw;
            height: 100vh;
            display: block;
            background-image: url('images/log.png');
            background-size: 670px;
            

        }

        .info {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #fffaf3;
            color: #5d4037;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        #timer {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
            font-weight: bold;
        }

        #popup,
        #resultPopup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            border-radius: 12px;
            display: none;
            z-index: 2;
            width: 350px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .popup-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .popup-buttons button {
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            background-color: #8b5e57;
            color: white;
        }

        .center-buttons {
            background-color: #a9746e;
            color: white;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
            z-index: 1;
        }

        #resultImage {
            border: 2px solid #a9746e;
            width: 100%;
            margin-top: 10px;
            border-radius: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        #tutorialPopup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fffaf3;
            color: #5d4037;
            padding: 30px;
            box-shadow: 0 0 20px rgba(93, 64, 55, 0.3);
            border-radius: 12px;
            display: none;
            z-index: 3;
            width: 650px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .btn {
            background-color: #a9746e;
            /* coklat terang */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #8b5e57;
        }
    </style>
</head>

<body>
    <div class="info">
        <button class="btn" onclick="resetGame()">Reset</button>
        <button class="btn" onclick="toggleMusic()" id="musicBtn">🎵</button>
        <button class="btn" onclick="checkAnswers()">Cek Jawaban</button>
    </div>
    <div id="timer">02:00</div>

    <div id="popup">
        <h3>Petunjuk Permainan</h3>
        <p>Klik salah satu kotak protokol di sebelah kanan, lalu klik layer OSI yang sesuai di sebelah kiri.</p>
        <img src="images/benet.jpg" width="100%" alt="Gambar OSI">
        <div class="popup-buttons">
            <button class="btn" onclick="closePopup()">Mulai</button>
            <button class="btn" onclick="showTutorial()">Tutorial</button>
        </div>
    </div>

    <div id="tutorialPopup">
        <h3 style="text-align: center;">Cara Bermain</h3>
        <video id="tutorialVideo" width="100%" controls loop>
            <source src="video/tutorial.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        <div class="popup-buttons">
            <button class="btn" onclick="closeTutorial()">Tutup</button>
        </div>
    </div>


    <div id="resultPopup">
        <h3>Hasil Permainan</h3>
        <p id="scoreSummary"></p>
        <img id="resultImage" src="" alt="Hasil">
        <div class="popup-buttons">
            <button onclick="location.reload(true)">Coba Lagi</button>
            <button onclick="previous()">Kembali</button>
            <button onclick="next()">Selanjutnya</button>
        </div>
    </div>

    <div class="center-buttons">
        <button class="btn" onclick="previous()">Kembali</button>
        <button class="btn" onclick="next()">Selanjutnya</button>
    </div>

    <div id="container"></div>

    <audio id="correctSound" src="https://www.soundjay.com/button/sounds/button-3.mp3" preload="auto"></audio>
    <audio id="wrongSound" src="https://www.soundjay.com/button/sounds/button-10.mp3" preload="auto"></audio>
    <audio id="popupSound" src="https://www.soundjay.com/misc/sounds/bell-ringing-05.mp3" preload="auto"></audio>
    <audio id="bgMusic" src="https://www.bensound.com/bensound-music/bensound-sunny.mp3" preload="auto" loop></audio>

    <script>
        const width = window.innerWidth;
        const height = window.innerHeight;
        const stage = new Konva.Stage({
            container: 'container',
            width: width,
            height: height
        });
        const layer = new Konva.Layer();
        stage.add(layer);

        const timerElement = document.getElementById('timer');
        let timer = 120; // 2 minutes in seconds
        function startTimer() {
            const interval = setInterval(() => {
                const minutes = Math.floor(timer / 60).toString().padStart(2, '0');
                const seconds = (timer % 60).toString().padStart(2, '0');
                timerElement.textContent = `Sisa Waktu : ${minutes}:${seconds}`;
                if (timer === 0) {
                    clearInterval(interval);
                    checkAnswers();
                }
                timer--;
            }, 1000);
        }

        const protokol = [{
                text: 'HTTP, FTP, DNS, Telnet',
                id: 'application'
            },
            {
                text: 'SSL, TLS',
                id: 'presentation'
            },
            {
                text: 'NetBIOS, PPTP',
                id: 'session'
            },
            {
                text: 'TCP, UDP',
                id: 'transport'
            },
            {
                text: 'IP, ARP, ICMP, IPSec',
                id: 'network'
            },
            {
                text: 'PPP, ATM, Ethernet',
                id: 'data-link'
            },
            {
                text: 'Ethernet, USB, Bluetooth IEEE802.11',
                id: 'physical'
            },
        ];

        const layersOSI = ['Application', 'Presentation', 'Session', 'Transport', 'Network', 'Data-Link', 'Physical'];
        let score = 0;
        let correctCount = 0;
        let wrongCount = 0;
        let arrows = [];
        let connections = [];
        let protokolBoxes = [];
        let layerBoxes = {};
        let activeArrow = null;
        let currentSource = null;

        const correctSound = document.getElementById('correctSound');
        const wrongSound = document.getElementById('wrongSound');
        const bgMusic = document.getElementById('bgMusic');
        const popupSound = document.getElementById('popupSound');
        const musicBtn = document.getElementById('musicBtn');

        function toggleMusic() {
            if (bgMusic.paused) {
                bgMusic.play();
                musicBtn.innerHTML = '🎵';
            } else {
                bgMusic.pause();
                musicBtn.innerHTML = '🔇';
            }
        }

        function resetGame() {
            score = 0;
            correctCount = 0;
            wrongCount = 0;
            timer = 120;
            layer.destroyChildren();
            arrows = [];
            connections = [];
            protokolBoxes = [];
            layerBoxes = {};
            activeArrow = null;
            currentSource = null;
            initGame();
            startTimer();
        }

        function initGame() {
            protokol.forEach((p, i) => {
                const y = 100 + i * 70;
                const group = new Konva.Group({
                    x: width - 450,
                    y: y,
                    id: p.id
                });
                const box = new Konva.Rect({
                    width: 270,
                    height: 50,
                    fill: '#333',
                    cornerRadius: 10
                });
                const label = new Konva.Text({
                    text: p.text,
                    fontSize: 14,
                    padding: 10,
                    fill: 'white',
                    width: 270,
                    align: 'center'
                });
                group.add(box);
                group.add(label);
                layer.add(group);
                protokolBoxes.push(group);

                group.on('click', () => {
                    if (activeArrow) activeArrow.destroy();
                    currentSource = group;
                    const pos = group.getAbsolutePosition();
                    activeArrow = new Konva.Arrow({
                        points: [pos.x, pos.y + 25, pos.x, pos.y + 25],
                        pointerLength: 10,
                        pointerWidth: 10,
                        fill: 'blue',
                        stroke: 'blue',
                        strokeWidth: 2
                    });
                    layer.add(activeArrow);

                    stage.on('mousemove.draw', (e) => {
                        const mousePos = stage.getPointerPosition();
                        const points = activeArrow.points();
                        activeArrow.points([points[0], points[1], mousePos.x, mousePos.y]);
                        layer.batchDraw();
                    });

                    stage.on('click.draw', (e) => {
                        const pointer = stage.getPointerPosition();
                        let targetId = null;
                        for (const [id, rect] of Object.entries(layerBoxes)) {
                            if (Konva.Util.haveIntersection(rect.getClientRect(), {
                                    x: pointer.x,
                                    y: pointer.y,
                                    width: 1,
                                    height: 1
                                })) {
                                targetId = id;
                                break;
                            }
                        }
                        if (!targetId) return;

                        const sourceId = currentSource.id();
                        stage.off('mousemove.draw');
                        stage.off('click.draw');
                        activeArrow.destroy();

                        const start = currentSource.getAbsolutePosition();
                        const end = layerBoxes[targetId].getAbsolutePosition();
                        const boxWidth = 150; // atau sesuaikan dengan ukuran sebenarnya
                        const boxHeight = 50; // atau sesuaikan

                        const arrow = new Konva.Arrow({
                            points: [
                                start.x + boxWidth / 2, start.y + boxHeight / 2,
                                end.x + boxWidth / 2, end.y + boxHeight / 2
                            ],
                            pointerLength: 10,
                            pointerWidth: 10,
                            fill: 'blue',
                            stroke: 'blue',
                            strokeWidth: 2
                        });

                        layer.add(arrow);
                        layer.draw();
                        connections.push({
                            source: sourceId,
                            target: targetId
                        });
                        arrows.push(arrow);
                        currentSource.off('click');
                    });
                });
            });

            layersOSI.forEach((l, i) => {
                const id = l.toLowerCase();
                const y = 100 + i * 70;
                const group = new Konva.Group({
                    x: 250,
                    y: y
                });
                const box = new Konva.Rect({
                    width: 200,
                    height: 50,
                    fill: '#fff',
                    stroke: 'black',
                    cornerRadius: 10
                });
                const label = new Konva.Text({
                    text: l,
                    fontSize: 14,
                    width: 200,
                    align: 'center',
                    y: 15,
                    fill: 'black'
                });
                group.add(box);
                group.add(label);
                layer.add(group);
                layerBoxes[id] = box;
            });
            layer.draw();
        }

        function checkAnswers() {
            correctCount = 0;
            wrongCount = 0;
            connections.forEach(pair => {
                if (pair.source === pair.target) correctCount++;
                else wrongCount++;
            });
            score = (correctCount * 14.3).toFixed(1);
            const pass = score >= 60;
            document.getElementById('scoreSummary').innerHTML =
                `Jawaban Benar: ${correctCount}<br>` +
                `Jawaban Salah: ${wrongCount}<br>` +
                `Skor Akhir: ${score}<br>` +
                (pass ? '<b style="color:green">LULUS</b>' : '<b style="color:red">ULANGI</b>');

            const resultImage = document.getElementById('resultImage');
            resultImage.src = pass ? "https://cdn-icons-png.flaticon.com/512/190/190411.png" :
                "https://cdn-icons-png.flaticon.com/512/1828/1828665.png";

            document.getElementById('resultPopup').style.display = 'block';
            popupSound.play();
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            resetGame();
        }

        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        function previous() {
            window.location.href = '/model-osi';
        }

        function next() {
            window.location.href = '/materi';
        }


        showPopup();
        bgMusic.volume = 0.2;
        bgMusic.play();

        function showTutorial() {
            document.getElementById('tutorialPopup').style.display = 'block';
            document.getElementById('tutorialVideo').play();
        }

        function closeTutorial() {
            const video = document.getElementById('tutorialVideo');
            video.pause();
            video.currentTime = 0;
            document.getElementById('tutorialPopup').style.display = 'none';
        }
    </script>
</body>

</html>
