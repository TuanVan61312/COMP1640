<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="homepage/fonts/icomoon/style.css">
    <link rel="stylesheet" href="homepage/fonts/flaticon/font/flaticon.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- <link rel="stylesheet" href="homepage/css/tiny-slider.css"> --}}
    <link rel="stylesheet" href="('homepage/css/tiny-slider.css')" />
    <link rel="stylesheet" href="homepage/css/aos.css">
    <link rel="stylesheet" href="homepage/css/glightbox.min.css">
    <link rel="stylesheet" href="homepage/css/style.css">

    <link rel="stylesheet" href="homepage/css/flatpickr.min.css">


    <title>Greenwich blog student</title>
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            {{-- <a href="{{ url('/') }}" class="logo m-0 float-start">CMS GREENWICH<span
                                    class="text-primary"></span></a> --}}
                                    <a class="logo m-0 float-start" href="{{ url('/') }}">Greenwich<sup>cms</sup></a>
                        </div>
                        <div class="col-8 text-center">
                            <form action="#" class="search-form d-inline-block d-lg-none">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bi-search"></span>
                            </form>

                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li>
                                    <a href="{{ route('contributions.store') }}">Contribution</a>
                                </li>
                                <li><a href="category.html">About</a></li>
                            </ul>
                        </div>

                        <div class="col-2 text-end d-flex align-items-center">
                            <!-- Đẩy phần search và dropdown menu sang cùng hàng sử dụng Flexbox -->
                            <form action="#" class="search-form d-none d-lg-inline-block me-2">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bi-search"></span>
                            </form>
                            <!-- Dropdown menu -->
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" style="color:aliceblue" aria-expanded="false">
                                    <i class="fas fa-user fa-fw" style="color:aliceblue"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </nav>
