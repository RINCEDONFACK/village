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
    <!-- À mettre dans le <head> si ce n'est pas encore fait -->
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
        /* Variables CSS pour la cohérence des couleurs */
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-glow: 0 8px 32px rgba(31, 38, 135, 0.37);
            --shadow-hover: 0 15px 35px rgba(31, 38, 135, 0.5);
        }

        /* Preloader amélioré */
        #preloader {
            background: var(--primary-gradient);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .animation-preloader {
            text-align: center;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top: 4px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 30px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .txt-loading {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .letters-loading {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            animation: bounce 1.5s ease-in-out infinite;
        }

        .letters-loading:nth-child(1) {
            animation-delay: 0.1s;
        }

        .letters-loading:nth-child(2) {
            animation-delay: 0.2s;
        }

        .letters-loading:nth-child(3) {
            animation-delay: 0.3s;
        }

        .letters-loading:nth-child(4) {
            animation-delay: 0.4s;
        }

        .letters-loading:nth-child(5) {
            animation-delay: 0.5s;
        }

        .letters-loading:nth-child(6) {
            animation-delay: 0.6s;
        }

        .letters-loading:nth-child(7) {
            animation-delay: 0.7s;
        }

        @keyframes bounce {

            0%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }
        }

        /* Header top moderne */
        .header-top-section {
            background: var(--dark-gradient);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--glass-border);
            padding: 12px 0;
            position: relative;
            overflow: hidden;
        }

        .header-top-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .header-top-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-list {
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .contact-list li {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .contact-list li:hover {
            transform: translateY(-2px);
            color: #4facfe;
        }

        .contact-list li i {
            width: 18px;
            height: 18px;
            background: var(--accent-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #fff;
            box-shadow: var(--shadow-glow);
        }

        .contact-list li a {
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .contact-list li a:hover {
            color: #4facfe;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .flag-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            padding: 8px 15px;
            border-radius: 25px;
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
        }

        .flag-wrap:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .social-icon {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .social-icon span {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
        }

        .social-icon a {
            width: 35px;
            height: 35px;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-icon a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--accent-gradient);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .social-icon a:hover::before {
            left: 0;
        }

        .social-icon a:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: var(--shadow-hover);
        }

        /* Header principal glassmorphism */
        .header-3 {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 999;
            transition: all 0.3s ease;
        }

        .header-3.sticky {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.2);
        }

        .plane-shape {
            position: absolute;
            top: 50%;
            right: 10%;
            transform: translateY(-50%);
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(-50%) translateX(0);
            }

            50% {
                transform: translateY(-50%) translateX(20px);
            }
        }

        .header-left {
            display: flex;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            position: relative;
        }

        .header-logo {
            position: relative;
            display: block;
            transition: all 0.3s ease;
        }

        .header-logo::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: var(--primary-gradient);
            border-radius: 20px;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: -1;
        }

        .header-logo:hover::before {
            opacity: 0.2;
        }

        .header-logo img {
            height: 70px;
            width: auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .header-logo:hover img {
            transform: scale(1.05) rotate(2deg);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        /* Navigation moderne */
        .main-menu nav ul {
            display: flex;
            align-items: center;
            gap: 0;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .main-menu nav ul li {
            position: relative;
        }

        .main-menu nav ul li>a {
            display: flex;
            align-items: center;
            padding: 20px 25px;
            color: #2c3e50;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .main-menu nav ul li>a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .main-menu nav ul li:hover>a::before,
        .main-menu nav ul li.active>a::before {
            left: 0;
        }

        .main-menu nav ul li:hover>a,
        .main-menu nav ul li.active>a {
            color: #fff;
            transform: translateY(-2px);
        }

        .main-menu nav ul li>a i {
            margin-left: 8px;
            transition: all 0.3s ease;
        }

        .main-menu nav ul li:hover>a i {
            transform: rotate(180deg);
        }

        /* Submenu moderne */
        .submenu {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 250px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            box-shadow: var(--shadow-glow);
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 1000;
            padding: 10px 0;
        }

        .main-menu nav ul li:hover .submenu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .submenu li {
            width: 100%;
        }

        .submenu li a {
            display: block;
            padding: 12px 25px;
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 2px 10px;
        }

        .submenu li a:hover {
            background: var(--primary-gradient);
            color: #fff;
            transform: translateX(10px);
        }

        /* Boutons et actions */
        .search-trigger {
            width: 50px;
            height: 50px;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c3e50;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .search-trigger::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--accent-gradient);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .search-trigger:hover::before {
            left: 0;
        }

        .search-trigger:hover {
            color: #fff;
            transform: scale(1.1);
            box-shadow: var(--shadow-hover);
        }

        .theme-btn {
            background: var(--primary-gradient);
            color: #fff;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow-glow);
            position: relative;
            overflow: hidden;
        }

        .theme-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--secondary-gradient);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .theme-btn:hover::before {
            left: 0;
        }

        .theme-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            color: #fff;
        }

        .theme-btn i {
            transition: all 0.3s ease;
        }

        .theme-btn:hover i {
            transform: translateX(5px);
        }

        .theme-btn.bg-white {
            background: #fff;
            color: #2c3e50;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .theme-btn.bg-white::before {
            background: var(--primary-gradient);
        }

        .theme-btn.bg-white:hover {
            color: #fff;
        }

        /* Hamburger moderne */
        .header__hamburger {
            cursor: pointer;
        }

        .sidebar__toggle {
            width: 50px;
            height: 50px;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c3e50;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .sidebar__toggle::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .sidebar__toggle:hover::before {
            left: 0;
        }

        .sidebar__toggle:hover {
            color: #fff;
            transform: scale(1.05);
            box-shadow: var(--shadow-glow);
        }

        /* Offcanvas amélioré */
        .offcanvas__info {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-left: 1px solid var(--glass-border);
        }

        .offcanvas__logo img {
            height: 60px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .offcanvas__contact ul li {
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .offcanvas__contact ul li:hover {
            background: rgba(255, 255, 255, 0.05);
            padding-left: 10px;
        }

        .offcanvas__contact-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            margin-right: 15px;
            box-shadow: var(--shadow-glow);
        }

        /* Responsive amélioré */
        @media (max-width: 991px) {
            .header-top-wrapper {
                flex-direction: column;
                gap: 15px;
            }

            .contact-list {
                gap: 20px;
            }

            .top-right {
                gap: 20px;
            }

            .main-menu {
                display: none;
            }
        }

        @media (max-width: 767px) {
            .contact-list {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .social-icon {
                justify-content: center;
            }

            .header-logo img {
                height: 50px;
            }
        }

        /* Animations d'entrée */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-3 {
            animation: fadeInUp 0.8s ease;
        }

        .main-menu nav ul li {
            animation: fadeInUp 0.8s ease;
            animation-fill-mode: both;
        }

        .main-menu nav ul li:nth-child(1) {
            animation-delay: 0.1s;
        }

        .main-menu nav ul li:nth-child(2) {
            animation-delay: 0.2s;
        }

        .main-menu nav ul li:nth-child(3) {
            animation-delay: 0.3s;
        }

        .main-menu nav ul li:nth-child(4) {
            animation-delay: 0.4s;
        }

        .main-menu nav ul li:nth-child(5) {
            animation-delay: 0.5s;
        }

        .main-menu nav ul li:nth-child(6) {
            animation-delay: 0.6s;
        }

        .main-menu nav ul li:nth-child(7) {
            animation-delay: 0.7s;
        }

        .main-menu nav ul li:nth-child(8) {
            animation-delay: 0.8s;
        }

        .main-menu nav ul li:nth-child(9) {
            animation-delay: 0.9s;
        }

        .main-menu nav ul li:nth-child(10) {
            animation-delay: 1.0s;
        }

        .main-menu nav ul li:nth-child(11) {
            animation-delay: 1.1s;
        }

        /* Effets de survol globaux */
        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="LA" class="letters-loading">
                    LA
                </span>
                <span data-text-preloader="MAI" class="letters-loading">
                    MAI
                </span>
                <span data-text-preloader="SON" class="letters-loading">
                    SON
                </span>
                <span data-text-preloader="DU" class="letters-loading">
                    DU
                </span>
                <span data-text-preloader="VI" class="letters-loading">
                    VI
                </span>
                <span data-text-preloader="LLA" class="letters-loading">
                    LLA
                </span>
                <span data-text-preloader="GE" class="letters-loading">
                    GE
                </span>
            </div>
            <p class="text-center" style="color: #fff; font-size: 16px; font-weight: 500;">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

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
                                                    <li><a href="pricing.html">Pricing</a></li>
                                                    <li><a href="faq.html">Faq's</a></li>
                                                    <li><a href="404.html">404 Page</a></li>
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

    <!-- JavaScript pour les effets interactifs -->
    <script>
        // Preloader
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                setTimeout(() => {
                    preloader.style.opacity = '0';
                    setTimeout(() => {
                        preloader.style.display = 'none';
                    }, 500);
                }, 1000);
            }
        });

        // Header sticky effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header-sticky');
            if (window.scrollY > 100) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        });

        // Mobile menu toggle
        const hamburger = document.querySelector('.sidebar__toggle');
        const offcanvas = document.querySelector('.fix-area');
        const overlay = document.querySelector('.offcanvas__overlay');
        const closeBtn = document.querySelector('.offcanvas__close button');

        if (hamburger) {
            hamburger.addEventListener('click', function() {
                offcanvas.classList.add('open');
                document.body.style.overflow = 'hidden';
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                offcanvas.classList.remove('open');
                document.body.style.overflow = 'auto';
            });
        }

        if (overlay) {
            overlay.addEventListener('click', function() {
                offcanvas.classList.remove('open');
                document.body.style.overflow = 'auto';
            });
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add parallax effect to plane shape
        window.addEventListener('scroll', function() {
            const plane = document.querySelector('.plane-shape');
            if (plane) {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                plane.style.transform = `translateY(${rate}px)`;
            }
        });

        // Add search functionality
        const searchTrigger = document.querySelector('.search-trigger');
        if (searchTrigger) {
            searchTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                // Add your search modal/dropdown logic here
                console.log('Search triggered');
            });
        }
    </script>

    <style>
        /* Styles additionnels pour les animations et interactions */
        .fix-area {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            z-index: 9999;
            transition: all 0.3s ease;
        }

        .fix-area.open {
            right: 0;
        }

        .offcanvas__info {
            position: absolute;
            right: 0;
            top: 0;
            width: 350px;
            height: 100%;
            padding: 30px;
            overflow-y: auto;
        }

        .offcanvas__overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .offcanvas__close button {
            background: var(--primary-gradient);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .offcanvas__close button:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-glow);
        }

        /* Améliorations pour le mobile menu */
        .mobile-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mobile-menu ul li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .mobile-menu ul li a {
            display: block;
            padding: 15px 0;
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .mobile-menu ul li a:hover {
            color: #667eea;
            padding-left: 10px;
        }

        /* Animation pour les éléments au scroll */
        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-50px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInFromRight {
            0% {
                transform: translateX(50px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .header-left {
            animation: slideInFromLeft 0.8s ease;
        }

        .header-right {
            animation: slideInFromRight 0.8s ease;
        }

        /* Micro-animations pour l'expérience utilisateur */
        .theme-btn {
            position: relative;
            overflow: hidden;
        }

        .theme-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .theme-btn:active::after {
            width: 300px;
            height: 300px;
        }

        /* Effet de typing pour le preloader */
        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }

        /* Responsive amélioré */
        @media (max-width: 1199px) {
            .main-menu nav ul li>a {
                padding: 20px 15px;
                font-size: 14px;
            }
        }

        @media (max-width: 991px) {
            .offcanvas__info {
                width: 300px;
            }

            .header-right>*:not(.header__hamburger) {
                display: none;
            }
        }

        @media (max-width: 575px) {
            .offcanvas__info {
                width: 280px;
            }

            .header-logo img {
                height: 45px;
            }

            .theme-btn {
                padding: 12px 20px;
                font-size: 13px;
            }
        }
    </style>
