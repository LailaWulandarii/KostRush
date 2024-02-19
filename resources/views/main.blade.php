<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KostRush Nganjuk</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/asset/images/logo.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('/asset/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('/asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/asset/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <form method="POST" action="/profile">
        @csrf

    </form>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{ asset('/asset/images/logo.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('/asset/images/logo.png') }}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('/asset/images/logo.png') }}" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>

                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profil</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu active" id="menu">
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <ion-icon name="home"></ion-icon><span class="nav-text">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="login.blade" aria-expanded="false">
                            <ion-icon name="albums"></ion-icon><span class="nav-text">Data Kost</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <ion-icon name="bed"></ion-icon><span class="nav-text">Data Kamar</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <ion-icon name="people"></ion-icon><span class="nav-text">Daftar Penghuni</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('/asset/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('/asset/js/custom.min.js') }}"></script>
    <script src="{{ asset('/asset/js/settings.js') }}"></script>
    <script src="{{ asset('/asset/js/gleek.js') }}"></script>
    <script src="{{ asset('/asset/js/styleSwitcher.js') }}"></script>

    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Chartjs -->
    <script src="{{ asset('/asset/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('/asset/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('/asset/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('/asset/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('/asset/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('/asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('/asset/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/asset/js/plugins-init/chartjs-init.js') }}"></script>

    <script src="{{ asset('/asset/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/asset/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/asset/js/datatable-init/datatable-basic.min.js') }}"></script>

    <script src="{{ asset('/asset/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/asset/js/plugins-init/chartjs-init.js') }}"></script>
    <script src="{{ asset('/asset/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/flot/js/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('/asset/plugins/flot/js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('/asset/plugins/flot/js/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/asset/plugins/flot/js/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('/asset/plugins/flot/js/jquery.flot.init.js') }}"></script>

    <script src="{{ asset('/asset/js/dashboard/dashboard-1.js') }}"></script>

</body>

</html>
