<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-sidebar sidebar collapse">
    <div class="position-sticky pt-3">
        <div class="sidebar-header text-center py-3">
            <h4 class="fw-bold text-white">Sorting App</h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <i class="fas fa-home me-2"></i> Sorting Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard/bubble') ? 'active' : '' }}" href="/dashboard/bubble">
                    <i class="fas fa-sort-numeric-down me-2"></i> Bubble Sort
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard/insertion') ? 'active' : '' }}" href="/dashboard/insertion">
                    <i class="fas fa-arrow-right me-2"></i> Insertion Sort
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard/selection') ? 'active' : '' }}" href="/dashboard/selection">
                    <i class="fas fa-hand-pointer me-2"></i> Selection Sort
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard/evaluasi') ? 'active' : '' }}" href="/dashboard/evaluasi">
                    <i class="fas fa-chart-bar me-2"></i> Evaluasi
                </a>
            </li>
        </ul>
    </div>
</nav>

<style>
    /* Sidebar background */
    .bg-sidebar {
        background: linear-gradient(180deg, #403279, #2575fc);
        color: #ffffff;
        height: 100vh;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 0 15px 15px 0;
    }
    
    /* Sidebar header */
    .sidebar-header {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        margin: 0 10px 15px;
    }
    
    /* Sidebar navigation links */
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
        color: #ffffff !important;
        transform: scale(1.08);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
    }
    
    .nav-link.active {
        background: rgba(255, 255, 255, 0.4);
        color: #ffffff !important;
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
    }
    
    /* Icons styling */
    .nav-link i {
        font-size: 1.3rem;
        vertical-align: middle;
        color: #ffffff;
        transition: transform 0.3s ease;
    }
    
    .nav-link:hover i {
        transform: rotate(10deg);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .bg-sidebar {
            height: auto;
        }
        .nav-link {
            font-size: 0.9rem;
        }
    }
</style>