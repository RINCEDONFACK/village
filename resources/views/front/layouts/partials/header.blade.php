<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="gramentheme">
    <meta name="description" content="Infotek - IT Solution & Technology HTML Template">
    <!-- ======== Page title ============ -->
    <title>La maison du village</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.jpg') }}">
<!-- À mettre dans le <head> si ce n’est pas encore fait -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">


    <style>
        .header-left {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            /* Couleur de fond si nécessaire */
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .header-logo img {
            height: 60px;
            /* Ajuste la hauteur selon tes besoins */
            width: auto;
            border-radius: 8px;
            /* Coins arrondis pour un look plus doux */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Légère ombre pour la profondeur */
            transition: transform 0.3s ease;
        }

        .header-logo img:hover {
            transform: scale(1.05);
            /* Zoom léger au survol */
        }
    </style>
</head>

<body>

    <header>

        <div id="header-sticky" class="header-3">
            <div class="plane-shape">
                <img src="assets/img/plane.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="header-left">
                            <div class="logo">
                                <a href="index.html" class="header-logo">
                                    <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="Logo du site">
                                </a>
                            </div>
                        </div>

                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="has-dropdown active menu-thumb">
                                                <a href="{{ route('accueil.index') }}">
                                                    Home
                                                </a>

                                            </li>


                                            <li>
                                                <a href="{{ route('propos.index') }}">About</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('cultures.index') }}">Culture</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('women.index') }}">Women_Empowerment</a>
                                            </li>


                                            <li>
                                                <a href="">Holiday camp</a>
                                            </li>


                                            <li>
                                                <a href="">Youth Day</a>
                                            </li>

                                            <li><a href="{{ route('blog.index') }}">Actulites</a></li>

                                            <li>
                                                <a href="news.html">
                                                    Services
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="service.html">Services</a></li>
                                                    <li><a href="service-carousel.html">Service Carousel</a></li>
                                                    <li><a href="service-details.html">Service Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="news.html">
                                                    Pages
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li class="has-dropdown">
                                                        <a href="project.html">
                                                            Projects
                                                            <i class="fas fa-angle-down"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="{{ route('projects.index') }}">Projet</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-dropdown">
                                                        <a href="team.html">
                                                            Equipe
                                                            <i class="fas fa-angle-down"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="{{ route('equipe.index') }}">Notre Equipe</a>
                                                            </li>

                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                           
                                            <li>
                                                <a href="{{ route('contacter.index') }}">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
