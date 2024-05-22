<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | KostRush</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link href="{{ asset('/asset/vendor/fonts/boxicons.css') }}" rel="stylesheet">
    <!-- Core CSS -->
    <link href="{{ asset('/asset/vendor/css/core.css') }}" rel="stylesheet" class="template-customizer-core-css" />
    <link href="{{ asset('/asset/vendor/css/theme-default.css') }}" rel="stylesheet"
        class="template-customizer-theme-css" />

    <link href="{{ asset('/asset/css/demo.css') }}" rel="stylesheet">

    <!-- Vendors CSS -->
    <link href="{{ asset('/asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('/asset/vendor/libs/apex-charts/apex-charts.css') }}" rel="stylesheet">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/asset/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/asset/vendor/js/config.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo" style="height: 110px">
                    <a href="index.html" class="app-brand-link">
                        <img style="height: 120px; margin-left: -20px;" src="{{ asset('/asset/img/logo.jpeg') }}"
                            alt="KostRush">
                    </a>
                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ Request::is('home/*') || Request::is('home') ? 'active' : '' }}">
                        <a href="{{ url('home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Beranda</div>
                        </a>
                    </li>
                    <!-- Dashboard -->
                    <li class="menu-item {{ Request::is('kost/*') || Request::is('kost') ? 'active' : '' }}">
                        <a href="{{ url('kost') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-building-house"></i>
                            <div data-i18n="Analytics">Data Kost</div>
                        </a>
                    </li>
                    <!-- Dashboard -->
                    <li class="menu-item {{ Request::is('kamar/*') || Request::is('kamar') ? 'active' : '' }}">
                        <a href="{{ url('kamar') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-bed"></i>
                            <div data-i18n="Analytics">Data kamar</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('penghuni/*') || Request::is('penghuni') ? 'active' : '' }}">
                        <a href="{{ url('penghuni') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div data-i18n="Analytics">Data Penghuni</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-calculator"></i>
                            <div data-i18n="Layouts">Transaksi</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item" :class="{ 'active': isActive('/transaksi-baru') }">
                                <a href="{{ url('transaksi-baru') }}" class="menu-link">
                                    <div data-i18n="Transaksi Baru">Transaksi Baru</div>
                                </a>
                            </li>
                            <li class="menu-item" :class="{ 'active': isActive('/transaksi-proses') }">
                                <a href="{{ url('transaksi-proses') }}" class="menu-link">
                                    <div data-i18n="Transaksi Diproses">Transaksi Diproses</div>
                                </a>
                            </li>
                            <li class="menu-item" :class="{ 'active': isActive('/riwayat-transaksi') }">
                                <a href="{{ url('riwayat-transaksi') }}" class="menu-link">
                                    <div data-i18n="Riwayat Transaksi">Riwayat Transaksi</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar">
                                        <img src="{{ asset('/asset/img/avatars/ava.jpg') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="{{ asset('/asset/img/avatars/ava.jpg') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">{{ Auth::user()->role }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profil') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="get">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-log-out me-2"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                @yield('content')
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            &copy; 2024 Kelompok 4. All Rights Reserved.
                        </div>
                        {{-- <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4"
                                target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                                Themes</a>

                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                target="_blank" class="footer-link me-4">Support</a>
                        </div> --}}
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('/asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


    <script src="{{ asset('/asset/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <script src="{{ asset('/asset/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('/asset/js/main.js') }}"></script>

    <!-- Page JS -->

    <script src="{{ asset('/asset/js/dashboards-analytics.js') }}"></script>

    <script>
        methods: {
            isActive(url) {
                return window.location.pathname === url;
            }
        }
    </script>
</body>

</html>
