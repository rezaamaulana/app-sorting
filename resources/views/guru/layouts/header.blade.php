<header class="navbar navbar-dark sticky-top bg-header flex-md-nowrap p-0 shadow">
    <div class="d-flex align-items-center flex-grow-1 px-3">
        <img class="logo me-2" src="{{ asset('img/logo3.png') }}" height="60px" alt="Logo">
        <a class="navbar-brand fs-5 fw-bold text-uppercase" href="#">Sorting |</a>
        <span class="welcome-text me-3"> {{ Auth::user()->nama }} ({{ Auth::user()->role }})</span>
    </div>
    <div class="d-flex align-items-center">
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm" style="margin-right: 20px">Keluar</a>
        <button class="navbar-toggler d-md-none collapsed ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>

<style>
    /* Header Background - Disamakan dengan Sidebar */
    .bg-header {
        background: linear-gradient(180deg, #403279, #2575fc);
        color: white;
        border-bottom: 2px solid #2f63ff;
        border-radius: 0 0 16px 16px;
        padding: 10px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Logo */
    /* .logo {
        border-radius: 10px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    } */

    /* Navbar Brand */
    .navbar-brand {
        color: white;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
        letter-spacing: 0.15em;
        font-size: 1.3rem;
    }

    /* Welcome Text */
    .welcome-text {
        font-size: 1.1rem;
        font-weight: 500;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    /* Buttons */
    .btn {
        font-size: 1rem;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-light {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        border: none;
    }

    .btn-light:hover {
        background: rgba(255, 255, 255, 0.5);
        color: black;
    }

    .btn-danger {
        background: #ff4d4d;
        color: white;
    }

    .btn-danger:hover {
        background: #e60000;
    }

    /* Navbar Toggler */
    .navbar-toggler {
        border: 1px solid rgba(255, 255, 255, 0.8);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
        background-color: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }

    /* Responsive Layout */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.1rem;
        }

        .logo {
            height: 40px;
        }

        .welcome-text {
            display: none;
        }

        .btn {
            font-size: 0.8rem;
            padding: 5px 10px;
        }
    }
</style>
