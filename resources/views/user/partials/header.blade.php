<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{ env('APP_NAME') }}</title>
    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/home/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><b>Hyura Express</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item {{ request()->is('user/home') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('user.home') }}">Home</a></li>
                            @if (Auth::check() && Auth::user()->can('data_pengiriman'))
                                <li class="nav-item {{ request()->is('pengiriman') ? 'active' : '' }}"><a
                                        class="nav-link" href="{{ route('pengiriman.index') }}">Data Pengiriman</a>
                                </li>
                            @else
                                <li class="nav-item {{ request()->is('user') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ route('user') }}">Pengiriman</a></li>
                            @endif
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Kontak</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Tentang Kami</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Hubungi
                                            Kami</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                @if (Auth::check())
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" method="post">Log Out</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                @endif
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a>
                            </li>
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier"
                                        id="search"></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var menuItems = document.querySelectorAll('.navbar-nav .nav-item a');

            menuItems.forEach(function(item) {
                if (item.href === window.location.href) {
                    item.classList.add('active');
                }
            });
        });
    </script>


    <!-- End Header Area -->
