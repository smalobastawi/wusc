<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Custom styles to ensure Bootstrap and Tailwind work together */
        .sidebar {
            width: 16rem;
            transition: transform 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: absolute;
                z-index: 1000;
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .flex.h-screen {
                flex-direction: column;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .overlay.active {
                display: block;
            }
        }

        /* Ensure proper spacing with Bootstrap */
        .bootstrap-override a {
            border: none !important;
            transition: all 0.2s ease;
        }

        .bootstrap-override a:hover {
            transform: translateX(5px);
        }

        .nav-icon {
            width: 20px;
            margin-right: 12px;
            text-align: center;
        }

        .toggle-btn {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1001;
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #4b5563;
        }

        @media (max-width: 768px) {
            .toggle-btn {
                display: block;
            }
        }

        .close-btn {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1001;
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #4b5563;
        }

        @media (max-width: 768px) {
            .close-btn {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar bg-white dark:bg-gray-800 shadow-lg">
            <button class="close-btn" id="closeSidebar">
                <i class="bi bi-x-lg"></i>
            </button>
            <div class="p-4 p-md-5">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </h2>
            </div>
            <nav class="mt-4 mt-md-6 bootstrap-override">
                <a href="{{ route('dashboard.budget') }}"
                    class="d-flex align-items-center px-4 px-md-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-decoration-none {{ request()->routeIs('dashboard.budget') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <i class="bi bi-cash-stack nav-icon"></i>
                    Budget Information
                </a>
                <a href="{{ route('dashboard.activities') }}"
                    class="d-flex align-items-center px-4 px-md-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-decoration-none {{ request()->routeIs('dashboard.activities') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <i class="bi bi-clipboard-check nav-icon"></i>
                    Project Activities
                </a>
                <a href="{{ route('dashboard.budget-vs-actuals') }}"
                    class="d-flex align-items-center px-4 px-md-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-decoration-none {{ request()->routeIs('dashboard.budget-vs-actuals') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <i class="bi bi-graph-up-arrow nav-icon"></i>
                    Budget vs Actuals
                </a>
                <a href="{{ route('dashboard.milestones') }}"
                    class="d-flex align-items-center px-4 px-md-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-decoration-none {{ request()->routeIs('dashboard.milestones') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <i class="bi bi-calendar-check nav-icon"></i>
                    Projects & Timeline
                </a>
            </nav>
        </div>

        <!-- Overlay for mobile -->
        <div class="overlay" id="overlay"></div>

        <!-- Main Content -->
        <div class="flex-1 d-flex flex-column">
            <header class="bg-white dark:bg-gray-800 shadow-sm p-4 p-md-5 position-relative">
                <button class="toggle-btn" id="toggleSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">@yield('title', 'Dashboard')</h1>
            </header>
            <main class="flex-1 p-4 p-md-5 overflow-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleSidebar');
            const closeBtn = document.getElementById('closeSidebar');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('overlay');

            // Toggle sidebar on button click
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent scrolling when sidebar is open
            });

            // Close sidebar on close button click
            closeBtn.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = ''; // Restore scrolling
            });

            // Close sidebar when clicking on overlay
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = ''; // Restore scrolling
            });

            // Close sidebar when clicking on a navigation link (on mobile)
            const navLinks = document.querySelectorAll('.bootstrap-override a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('active');
                        overlay.classList.remove('active');
                        document.body.style.overflow = ''; // Restore scrolling
                    }
                });
            });
        });
    </script>
</body>

</html>
