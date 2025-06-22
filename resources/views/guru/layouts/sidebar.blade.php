<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-sidebar sidebar collapse">
    <div class="d-flex flex-column h-100">
        <!-- Sidebar Header -->
        <div class="sidebar-header text-center py-3">
            <h4 class="fw-bold text-white">Sorting App</h4>
        </div>

        <!-- Scrollable Sidebar Content -->
        <div class="flex-grow-1 overflow-auto px-2 mt-2" style="max-height: calc(100vh - 80px);">
            <ul class="nav flex-column mt-2">

                <!-- Siswa -->
                {{-- <li class="nav-item">
                    <a class="nav-link text-white  {{ Route::is('guru.dashboard') ? 'active' : '' }}"
                        href="{{ route('guru.dashboard') }}">
                        <i class="fa-solid fa-user me-2"></i> Dashboard
                    </a>
                </li> --}}

                <!-- Hasil Belajar -->
                <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center toggle-link"
                        data-bs-toggle="collapse" href="#bubbleSubmenu" role="button"
                        aria-expanded="{{ Request::is('guru/hasil-belajar/*') ? 'true' : 'false' }}">
                        <span><i class="fas fa-sort-numeric-down me-2"></i>Hasil Belajar</span>
                        <span class="toggle-icon">{{ Request::is('guru/hasil-belajar/*') ? '⏫' : '⏬' }}</span>
                    </a>
                    <div class="collapse ps-4 {{ Request::is('guru/hasil-belajar/*') ? 'show' : '' }}"
                        id="bubbleSubmenu">
                        <a class="nav-link text-white {{ Request::routeIs('guru.hasil.belajar') && Request::segment(3) == 'Kuis-Bubble-Sort' ? 'active' : '' }}"
                            href="{{ route('guru.hasil.belajar', 'Kuis-Bubble-Sort') }}">Kuis Bubble Sort</a>

                        <a class="nav-link text-white {{ Request::routeIs('guru.hasil.belajar') && Request::segment(3) == 'Kuis-Insertion-Sort' ? 'active' : '' }}"
                            href="{{ route('guru.hasil.belajar', 'Kuis-Insertion-Sort') }}">Kuis Insertion Sort</a>

                        <a class="nav-link text-white {{ Request::routeIs('guru.hasil.belajar') && Request::segment(3) == 'Kuis-Selection-Sort' ? 'active' : '' }}"
                            href="{{ route('guru.hasil.belajar', 'Kuis-Selection-Sort') }}">Kuis Selection Sort</a>

                        <a class="nav-link text-white {{ Request::routeIs('guru.hasil.belajar') && Request::segment(3) == 'Evaluasi' ? 'active' : '' }}"
                            href="{{ route('guru.hasil.belajar', 'Evaluasi') }}">Evaluasi</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white  {{ Route::is('guru.user.index') ? 'active' : '' }}"
                        href="{{ route('guru.user.index') }}">
                        <i class="fa-solid fa-user me-2"></i> Pengguna
                    </a>
                </li>

                <!-- Atur KKM -->
                {{-- <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('dashboard/evaluasi/evaluasiAwal') ? 'active' : '' }}"
                        href="/dashboard/evaluasi/evaluasiAwal">
                        <i class="fas fa-chart-bar me-2"></i> Atur KKM
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>

<!-- SCROLL & STYLE -->
<style>
    .bg-sidebar {
        background: linear-gradient(180deg, #403279, #2575fc);
        color: #ffffff;
        height: 100vh;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 0 15px 15px 0;
    }

    .sidebar-header {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        margin: 0 10px 15px;
        margin-top: 30px;
    }

    .nav-link {
        color: #ffffff !important;
        font-size: 1rem;
        font-weight: 500;
        padding: 12px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.08);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
    }

    .nav-link.active {
        background: rgba(255, 255, 255, 0.4);
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
    }

    .nav-link i {
        font-size: 1.3rem;
        vertical-align: middle;
        color: #ffffff;
        transition: transform 0.3s ease;
    }

    .nav-link:hover i {
        transform: rotate(10deg);
    }

    .toggle-icon {
        font-size: 1.2rem;
    }

    /* Scrollbar Styling */
    .overflow-auto::-webkit-scrollbar {
        width: 6px;
    }

    .overflow-auto::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
    }

    .overflow-auto::-webkit-scrollbar-thumb:hover {
        background-color: rgba(255, 255, 255, 0.5);
    }

    @media (max-width: 768px) {
        .bg-sidebar {
            height: auto;
        }

        .nav-link {
            font-size: 0.9rem;
        }
    }
</style>

<!-- TOGGLE ICON SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggles = document.querySelectorAll(".toggle-link");

        toggles.forEach(toggle => {
            toggle.addEventListener("click", function() {
                const icon = this.querySelector(".toggle-icon");
                const targetId = this.getAttribute("href");
                const target = document.querySelector(targetId);

                setTimeout(() => {
                    if (target.classList.contains("show")) {
                        icon.textContent = "⏫";
                    } else {
                        icon.textContent = "⏬";
                    }
                }, 250);
            });
        });
    });
</script>
