<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting App</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6fc;
            color: #333;
        }

        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            padding: 15px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(180deg, #403279, #2575fc);
            color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 18px;
        }

        .logo img {
            width: 40px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #1976d2;
        }

        .hero {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 140px 60px 60px;
        }

        .hero-image {
            max-width: 50%;
        }

        .hero-image img {
            max-width: 75%;
            width: 75%;
        }

        .hero-text {
            max-width: 45%;
            margin-right: 50px;
        }

        .hero-text h1 {
            font-size: 56px;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #1976d2;
        }

        .hero-text p {
            font-size: 18px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .cta-button {
            padding: 14px 30px;
            background-color: #1976d2;
            color: #fff;
            border-radius: 10px;
            font-size: 16px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(25, 118, 210, 0.3);
            transition: 0.3s;
        }

        .cta-button:hover {
            background-color: #125ca0;
            transform: scale(1.05);
        }

        .features {
            padding: 60px;
            text-align: center;
            background-color: #fff;
        }

        .features h2 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #333;
        }

        .features-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .feature-box {
            background: #f0f4ff;
            padding: 30px;
            border-radius: 16px;
            width: 250px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .feature-box h3 {
            font-size: 20px;
            color: #1976d2;
            margin-bottom: 10px;
        }

        .feature-box p {
            font-size: 14px;
            color: #555;
        }

        footer {
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #888;
            background-color: #f4f6fc;
            border-top: 1px solid #e0e0e0;
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 120px 20px 40px;
            }

            .hero-image {
                order: 2;
                max-width: 100%;
                margin-bottom: 20px;
            }

            .hero-text {
                order: 1;
                max-width: 100%;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .features-grid {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <img src="img/logo3.png" alt="Logo">
            <span>SORTING APP</span>
        </div>
        <ul class="nav-links">
            <li><a href="/login">Login</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-image">
            <img src="img/ilustrasi.png" alt="Ilustrasi Sorting">
        </div>
        <div class="hero-text">
            <h1>Ayo Belajar sorting!</h1>
            <p>Sorting App adalah media interaktif untuk memahami algoritma pengurutan seperti Bubble Sort, Insertion
                Sort, dan Selection Sort secara visual dan menyenangkan.</p>
            <a href="/login" class="cta-button">Mulai Belajar</a>
        </div>
    </section>

    <footer>
        &copy; <?= date('Y') ?> Sorting App - Belajar Jadi Mudah & Menyenangkan.
    </footer>

</body>

</html>
