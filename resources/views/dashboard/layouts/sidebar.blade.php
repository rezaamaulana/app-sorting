@php

    function checkIslocker($kuis)
    {
        $user = Auth::User()->id;
        $check = App\Models\HasilUjian::where('user_id', $user)->where('materi', $kuis)->first();
        $kkm = App\Models\Kkm::where('materi', $kuis)->first();
        $kkmVal = $kkm == null ? 70 : $kkm->kkm;

        if ($check) {
            if ($check->nilai >= $kkmVal) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
@endphp

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-sidebar sidebar collapse">
    <div class="d-flex flex-column h-100">
        <!-- Sidebar Header -->
        <div class="sidebar-header text-center py-3">
            <h4 class="fw-bold text-white">Sorting App</h4>
        </div>

        <!-- Scrollable Sidebar Content -->
        <div class="flex-grow-1 overflow-auto px-2" style="max-height: calc(100vh - 80px);">
            <ul class="nav flex-column">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="fas fa-home me-2"></i> Sorting Dashboard
                    </a>
                </li>

                <!-- Bubble Sort -->

                <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center toggle-link"
                        data-bs-toggle="collapse" href="#bubbleSubmenu" role="button"
                        aria-expanded="{{ Request::is('dashboard/bubble*') ? 'true' : 'false' }}">
                        <span><i class="fas fa-arrow-right me-1"></i> Bubble Sort</span>
                        <span class="toggle-icon">{{ Request::is('dashboard/bubble*') ? '⏫' : '⏬' }}</span>
                    </a>
                    <div class="collapse ps-4 {{ Request::is('dashboard/bubble*') ? 'show' : '' }}" id="bubbleSubmenu">
                        <a class="nav-link text-white {{ Request::is('dashboard/bubble') ? 'active' : '' }}"
                            href="/dashboard/bubble">Penjelasan</a>
                        <a class="nav-link text-white {{ Request::is('dashboard/latihan/latihanBubble') ? 'active' : '' }}"
                            href="/dashboard/latihan/latihanBubble">Latihan</a>
                        <a class="nav-link text-white {{ Request::is('dashboard/kuis/kuisBubble') ? 'active' : '' }}"
                            href="/dashboard/kuis/kuisBubble">Kuis</a>
                    </div>
                </li>

                @if (checkIslocker('Kuis-Bubble-Sort'))
                    <!-- Insertion Sort -->
                    <li class="nav-item" id="insert">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center toggle-link"
                            data-bs-toggle="collapse" href="#insertionSubmenu" role="button"
                            aria-expanded="{{ Request::is('dashboard/insertion*') ? 'true' : 'false' }}">
                            <span><i class="fas fa-arrow-right me-1"></i> Insertion Sort</span>
                            <span class="toggle-icon">{{ Request::is('dashboard/insertion*') ? '⏫' : '⏬' }}</span>
                        </a>
                        <div class="collapse ps-4 {{ Request::is('dashboard/insertion*') ? 'show' : '' }}"
                            id="insertionSubmenu">
                            <a class="nav-link text-white {{ Request::is('dashboard/insertion') ? 'active' : '' }}"
                                id="coba1" href="/dashboard/insertion">Penjelasan</a>
                            <a class="nav-link text-white {{ Request::is('dashboard/latihan/latihanInsertion') ? 'active' : '' }}"
                                href="/dashboard/latihan/latihanInsertion">Latihan</a>
                            <a class="nav-link text-white {{ Request::is('dashboard/kuis/kuisInsertion') ? 'active' : '' }}"
                                href="/dashboard/kuis/kuisInsertion">Kuis</a>
                        </div>
                    </li>
                @endif

                @if (!checkIslocker('Kuis-Bubble-Sort'))
                    <li class="nav-item" id="insertKey">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center toggle-link"
                            data-bs-toggle="collapse" role="button">
                            <span><i class="fas fa-arrow-right me-1"></i> Insertion Sort</span>
                            <span class="toggle-icon">{{ Request::is('dashboard/insertion*') ? '🔒' : '🔒' }}</span>
                        </a>
                    </li>
                @endif

                @if (checkIslocker('Kuis-Insertion-Sort'))
                    <!-- Selection Sort -->
                    <li class="nav-item" id="selection">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center toggle-link"
                            data-bs-toggle="collapse" href="#selectionSubmenu" role="button"
                            aria-expanded="{{ Request::is('dashboard/selection*') ? 'true' : 'false' }}">
                            <span><i class="fas fa-arrow-right me-1"></i> Selection Sort</span>
                            <span class="toggle-icon">{{ Request::is('dashboard/selection*') ? '⏫' : '⏬' }}</span>
                        </a>
                        <div class="collapse ps-4 {{ Request::is('dashboard/selection*') ? 'show' : '' }}"
                            id="selectionSubmenu">
                            <a class="nav-link text-white {{ Request::is('dashboard/selection') ? 'active' : '' }}"
                                href="/dashboard/selection">Penjelasan</a>
                            <a class="nav-link text-white {{ Request::is('dashboard/latihan/latihanSelection') ? 'active' : '' }}"
                                href="/dashboard/latihan/latihanSelection">Latihan</a>
                            <a class="nav-link text-white {{ Request::is('dashboard/kuis/kuisSelection') ? 'active' : '' }}"
                                href="/dashboard/kuis/kuisSelection">Kuis</a>
                        </div>
                    </li>
                @endif


                @if (!checkIslocker('Kuis-Insertion-Sort'))
                    <li class="nav-item" id="selectionKey">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center toggle-link"
                            data-bs-toggle="collapse" role="button">
                            <span><i class="fas fa-arrow-right me-1"></i> Selection Sort</span>
                            <span class="toggle-icon">{{ Request::is('dashboard/insertion*') ? '🔒' : '🔒' }}</span>
                        </a>
                    </li>
                @endif

                @if (checkIslocker('Kuis-Selection-Sort'))
                    <!-- Evaluasi -->
                    <li class="nav-item" id="eval">
                        <a class="nav-link text-white {{ Request::is('dashboard/evaluasi/evaluasiAwal') ? 'active' : '' }}"
                            href="/dashboard/evaluasi/evaluasiAwal">
                            <i class="fas fa-chart-bar me-2"></i> Evaluasi
                        </a>
                    </li>
                @endif

                @if (!checkIslocker('Kuis-Selection-Sort'))
                    <li class="nav-item" id="evaluasiKey">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center toggle-link"
                            data-bs-toggle="collapse" role="button">
                            <span><i class="fas fa-chart-bar me-2"></i> Evaluasi</span>
                            <span class="toggle-icon">{{ Request::is('dashboard/insertion*') ? '🔒' : '🔒' }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- SCROLL & STYLE -->
<style>
    .bg-sidebar {
        background: linear-gradient(180deg, #403279, #2575fc);
        /* background: linear-gradient(180deg, #403279, rgb(37, 198, 252)); */
        color: #ffffff;
        height: 100vh;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 0 15px 15px 0;
    }

    .sidebar-header {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        margin: 0 10px 15px;
        margin-top: 40px;
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

    // function kunci() {
    //     let insert = document.getElementById("insert");
    //     let insertK = document.getElementById("insertKey");
    //     let selection = document.getElementById("selection");
    //     let selectionK = document.getElementById("selectionKey");
    //     let eval = document.getElementById("eval");
    //     let evaluasik = document.getElementById("evaluasiKey");
    //     let nilaiKuis1 = localStorage.getItem("nilaiKuis1");
    //     let nilaiKuis2 = localStorage.getItem("nilaiKuis2");
    //     let nilaiKuis3 = localStorage.getItem("nilaiKuis3");


    //     console.log(nilaiKuis1);

    //     if (nilaiKuis1 < 70) {
    //         insert.style.display = "none";
    //         insertK.style.display = "block";
    //     } else {
    //         insert.style.display = "block";
    //         insertK.style.display = "none";
    //     }

    //     if (nilaiKuis2 < 70) {
    //         selection.style.display = "none";
    //         selectionK.style.display = "block";
    //     } else {
    //         selection.style.display = "block";
    //         selectionK.style.display = "none";
    //     }

    //     if (nilaiKuis3 < 70) {
    //         eval.style.display = "none";
    //         evaluasik.style.display = "block";
    //     } else {
    //         eval.style.display = "block";
    //         evaluasik.style.display = "none";
    //     }

    // }

    // kunci();
</script>
