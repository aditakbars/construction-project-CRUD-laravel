<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Aditz Construction</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/chartist/chartist.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    </head>
    <body>
        <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand brand-logo" href="index.html">
                <img src="{{ asset('images/logo.svg')}}" alt="logo" class="logo-dark" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
            <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome stallar dashboard!</h5>
            <ul class="navbar-nav navbar-nav-right ml-auto">
                <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle ml-2" src="{{ asset('images/faces/face8.jpg')}}" alt="Profile image"> <span class="font-weight-normal"> Henry Klein </span></a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="{{ asset('images/faces/face8.jpg')}}" alt="Profile image">
                    <p class="mb-1 mt-3">Allen Moreno</p>
                    <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
                    </div>
                </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

                <li class="nav-item nav-category">
                <span class="nav-link">Dashboard</span>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <span class="menu-title">Dashboard</span>
                    <i class="icon-screen-desktop menu-icon"></i>
                </a>
                </li>
                <li class="nav-item nav-category"><span class="nav-link">Halaman per Tabel</span></li>

                <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#klien" aria-expanded="false" aria-controls="klien">
                    <span class="menu-title">Klien</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
                <div class="collapse" id="klien">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('klien.index')}}">Daftar Klien</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('klien.trash')}}">Sampah</a></li>
                    </ul>
                </div>
                </li>


                <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#manager" aria-expanded="false" aria-controls="manager">
                    <span class="menu-title">Manager</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
                <div class="collapse" id="manager">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Daftar Manager</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Sampah</a></li>
                    </ul>
                </div>
                </li>


                <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#vendor" aria-expanded="false" aria-controls="vendor">
                    <span class="menu-title">Vendor</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
                <div class="collapse" id="vendor">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Daftar Vendor</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Sampah</a></li>
                    </ul>
                </div>
                </li>

            </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
            <div class="content-wrapper">
                
                @yield('content')
                
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendors/moment/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('vendors/chartist/chartist.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <!-- End custom js for this page -->
    </body>
</html>