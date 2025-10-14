<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="theme-color" content="#4A90E2">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="mobile-web-app-capable" content="yes">

    <title>{{ __('maisonduvillage.site_title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('logo.jpg') }}?v={{ time() }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('logo.jpg') }}?v={{ time() }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}?v={{ time() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <style>
        /* ===== RESET & BASE STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            scroll-behavior: smooth;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            overflow-x: hidden;
            width: 100%;
            position: relative;
            line-height: 1.6;
        }

        body, html {
            max-width: 100vw;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* ===== HEADER STYLES ===== */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
            width: 100%;
        }

        /* ===== LOGO ===== */
        .logo {
            flex-shrink: 0;
        }

        .logo a {
            display: block;
            min-height: auto;
            min-width: auto;
        }

        .logo img {
            height: 60px;
            width: auto;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.05);
        }

        /* ===== NAV RIGHT CONTAINER ===== */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        /* ===== NAVIGATION MENU ===== */
        .menu {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            list-style: none;
        }

        .menu a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            white-space: nowrap;
            position: relative;
            padding: 0.5rem 0;
            min-height: auto;
            min-width: auto;
        }

        .menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #007bff;
            transition: width 0.3s ease;
        }

        .menu a:hover {
            color: #007bff;
        }

        .menu a:hover::after {
            width: 100%;
        }

        /* ===== LANGUAGE SWITCHER ===== */
        .language-switcher {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex-shrink: 0;
        }

        .language-switcher a {
            padding: 0.5rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            text-decoration: none;
            color: #555;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            min-height: auto;
            min-width: auto;
        }

        .language-switcher a:hover {
            background: #f5f5f5;
            border-color: #007bff;
            color: #007bff;
            transform: translateY(-2px);
        }

        .language-switcher a.active {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        /* ===== HAMBURGER BUTTON ===== */
        .hamburger {
            display: none;
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            color: #333;
            transition: color 0.3s ease;
            min-height: 44px;
            min-width: 44px;
        }

        .hamburger:hover {
            color: #007bff;
        }

        /* ===== FOOTER STYLES ===== */
        .footer-section {
            width: 100%;
            overflow: hidden;
        }

        .footer-widgets-wrapper {
            padding: 60px 0 40px;
        }

        .footer-widgets-wrapper .container {
            max-width: 1400px;
            padding: 0 2rem;
        }

        .single-footer-widget {
            margin-bottom: 30px;
        }

        .widget-head h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .footer-content p {
            font-size: 0.95rem;
            line-height: 1.8;
            color: #666;
        }

        .social-icon {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .social-icon a {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f0f0f0;
            transition: all 0.3s ease;
            color: #333;
            min-height: auto;
            min-width: auto;
        }

        .social-icon a:hover {
            background: #007bff;
            color: #fff;
            transform: translateY(-3px);
        }

        .list-area {
            list-style: none;
            padding: 0;
        }

        .list-area li {
            margin-bottom: 12px;
        }

        .list-area a {
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            min-height: auto;
            min-width: auto;
        }

        .list-area a:hover {
            color: #007bff;
            padding-left: 5px;
        }

        .list-area i {
            font-size: 0.7rem;
        }

        .footer-input {
            display: flex;
            margin-top: 15px;
            max-width: 100%;
        }

        .footer-input input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px 0 0 6px;
            font-size: 0.9rem;
            min-width: 0;
            transition: border-color 0.3s ease;
        }

        .footer-input input:focus {
            outline: none;
            border-color: #007bff;
        }

        .newsletter-btn {
            padding: 12px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            min-height: 44px;
            min-width: 44px;
        }

        .newsletter-btn:hover {
            background: #0056b3;
        }

        .footer-bottom {
            padding: 25px 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .footer-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between !important;
            align-items: center;
        }

        .footer-logo div {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #007bff;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.2);
        }

        .footer-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .footer-wrapper p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }

        /* ===== SCROLL TO TOP BUTTON ===== */
        #scrollUp {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #007bff;
            color: #fff;
            border-radius: 50%;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4);
            transition: all 0.3s ease;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
        }

        #scrollUp.show {
            opacity: 1;
            visibility: visible;
        }

        #scrollUp:hover {
            background: #0056b3;
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.5);
        }

        /* ===== CONTAINER SYSTEM ===== */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* ===== RESPONSIVE BREAKPOINTS ===== */

        /* Large Desktop (1200px+) */
        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        /* Desktop (992px - 1199px) */
        @media (min-width: 992px) and (max-width: 1199px) {
            .container {
                max-width: 960px;
            }

            .nav-container {
                padding: 0 1.5rem;
            }

            .menu {
                gap: 1.2rem;
            }

            .menu a {
                font-size: 0.9rem;
            }
        }

        /* Tablet (768px - 991px) */
        @media (max-width: 991px) {
            .container {
                max-width: 720px;
            }

            .nav-container {
                padding: 0 1.5rem;
                height: 70px;
            }

            .logo img {
                height: 50px;
            }

            .nav-right {
                gap: 1rem;
            }

            .hamburger {
                display: flex;
            }

            .menu {
                display: none;
                flex-direction: column;
                align-items: stretch;
                background: #fff;
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                padding: 0;
                border-top: 1px solid #e0e0e0;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                max-height: calc(100vh - 70px);
                overflow-y: auto;
                gap: 0;
            }

            .menu.show {
                display: flex;
            }

            .menu a {
                width: 100%;
                padding: 15px 20px;
                border-bottom: 1px solid #f0f0f0;
                font-size: 1rem;
            }

            .menu a::after {
                display: none;
            }

            .menu a:hover {
                background: #f8f9fa;
            }

            .language-switcher {
                gap: 0.4rem;
            }

            .language-switcher a {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }

            .footer-widgets-wrapper {
                padding: 50px 0 30px;
            }

            .widget-head h3 {
                font-size: 1.2rem;
            }
        }

        /* Mobile Large (576px - 767px) */
        @media (max-width: 767px) {
            .container {
                max-width: 540px;
            }

            .nav-container {
                padding: 0 1rem;
                height: 65px;
            }

            .logo img {
                height: 45px;
            }

            .menu {
                top: 65px;
                max-height: calc(100vh - 65px);
            }

            .footer-widgets-wrapper {
                padding: 40px 0 25px;
            }

            .widget-head h3 {
                font-size: 1.1rem;
            }

            .footer-content p,
            .list-area a {
                font-size: 0.85rem;
            }

            .footer-input {
                flex-direction: row;
            }

            .footer-wrapper {
                flex-direction: column;
                align-items: center;
                text-align: center;
                justify-content: center !important;
            }

            .footer-logo {
                margin-bottom: 15px;
            }

            #scrollUp {
                width: 45px;
                height: 45px;
                bottom: 25px;
                right: 25px;
            }
        }

        /* Mobile Small (< 576px) */
        @media (max-width: 575px) {
            .container {
                max-width: 100%;
                padding: 0 15px;
            }
        }

        /* Mobile Extra Small (< 480px) */
        @media (max-width: 480px) {
            .nav-container {
                padding: 0 0.75rem;
                height: 60px;
            }

            .logo img {
                height: 40px;
            }

            .nav-right {
                gap: 0.75rem;
            }

            .hamburger {
                font-size: 20px;
                padding: 6px;
            }

            .menu {
                top: 60px;
                max-height: calc(100vh - 60px);
            }

            .menu a {
                padding: 12px 15px;
                font-size: 0.95rem;
            }

            .language-switcher a {
                padding: 0.35rem 0.7rem;
                font-size: 0.75rem;
            }

            .footer-widgets-wrapper {
                padding: 30px 0 20px;
            }

            .widget-head h3 {
                font-size: 1rem;
            }

            .footer-content p,
            .list-area a {
                font-size: 0.8rem;
            }

            .social-icon a {
                width: 38px;
                height: 38px;
                font-size: 0.9rem;
            }

            .footer-logo div {
                width: 50px;
                height: 50px;
                border-width: 2px;
            }

            .footer-wrapper p {
                font-size: 0.8rem;
            }

            .footer-input input {
                font-size: 0.85rem;
                padding: 10px 12px;
            }

            .newsletter-btn {
                padding: 10px 15px;
            }

            #scrollUp {
                width: 40px;
                height: 40px;
                bottom: 20px;
                right: 20px;
                font-size: 0.9rem;
            }
        }

        /* Touch Friendly - Minimum tap target size */
        @media (hover: none) and (pointer: coarse) {
            a, button {
                min-height: 44px;
                min-width: 44px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .menu a {
                min-height: 48px;
                padding: 15px 20px;
            }
        }

        /* Landscape Mode - Mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .nav-container {
                height: 55px;
            }

            .logo img {
                height: 35px;
            }

            .menu {
                top: 55px;
                max-height: calc(100vh - 55px);
            }

            .menu a {
                padding: 10px 15px;
            }
        }
    </style>

    @include('laravelpwa::meta')
</head>

<body>
    <header>
        <div class="nav-container">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="Village House Logo" />
                </a>
            </div>

            <div class="nav-right">
                <!-- Navigation Menu -->
                <nav id="nav-menu" class="menu" role="navigation" aria-label="Main Navigation">
                    <a href="{{ route('accueil.index') }}">Home</a>
                    <a href="{{ route('propos.index') }}">About</a>
                    <a href="{{ route('services') }}">Services</a>
                    <a href="{{ route('cultures.index') }}">Culture</a>
                    <a href="{{ route('women.index') }}">Women</a>
                    <a href="{{ route('site.informatique.index') }}">IT</a>
                    <a href="#">Youth Festival</a>
                    <a href="{{ route('blog.index') }}">News</a>
                    <a href="{{ route('projects.index') }}">Projects</a>
                    <a href="{{ route('equipe.index') }}">Team</a>
                    <a href="{{ route('produits.index') }}">Traditional Products</a>
                    <a href="{{ route('contacter.index') }}">Contact</a>
                </nav>

                <!-- Language Switcher -->
                <div class="language-switcher">
                    <a href="{{ route('lang.switch', 'fr') }}"
                        class="{{ app()->getLocale() == 'fr' ? 'active' : '' }}"
                        title="Switch to French">
                        🇫🇷 FR
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="{{ app()->getLocale() == 'en' ? 'active' : '' }}"
                        title="Switch to English">
                        🇬🇧 EN
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="hamburger" onclick="toggleMenu()" aria-label="Toggle Navigation Menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer-section footer-bg">
        <div class="footer-shape-4">
            <img src="assets/img/footer-shape-4.png" alt="shape-img">
        </div>
        <div class="shape-2">
            <img src="assets/img/footer-shape-3.png" alt="shape-img">
        </div>
        <div class="footer-widgets-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>About Us</h3>
                            </div>
                            <div class="footer-content">
                                <p>Village House is committed to promoting culture, empowering women, and fostering community development through various initiatives.</p>
                                <div class="social-icon d-flex align-items-center">
                                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Quick Links</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="{{ route('accueil.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('propos.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cultures.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Culture
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('women.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Women
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blog.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        News
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-footer-widget style-margin">
                            <div class="widget-head">
                                <h3>Services</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="{{ route('site.informatique.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        IT Services
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('projects.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Projects
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('equipe.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Team
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Youth Festival
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contacter.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="single-footer-widget style-margin">
                            <div class="widget-head">
                                <h3>Newsletter</h3>
                            </div>
                            <div class="footer-content">
                                <p>Subscribe to our newsletter to receive the latest news and updates.</p>
                                <div class="footer-input">
                                    <input type="email" id="email2" placeholder="Enter your email">
                                    <button class="newsletter-btn" type="submit" aria-label="Subscribe to Newsletter">
                                        <i class="fab fa-telegram-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom style-3">
            <div class="container">
                <div class="footer-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo Avatar -->
                    <div class="footer-logo wow fadeInLeft" data-wow-delay=".3s">
                        <a href="{{ route('accueil.index') }}" class="d-flex align-items-center">
                            <div>
                                <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="Village House Logo">
                            </div>
                        </a>
                    </div>

                    <!-- Copyright Text -->
                    <p class="wow fadeInRight color-2" data-wow-delay=".5s">
                        © {{ date('Y') }} <a href="{{ route('accueil.index') }}">Village House</a>. All rights reserved.
                    </p>
                </div>
            </div>

            <!-- Scroll to Top Button -->
            <a href="#" id="scrollUp" class="scroll-icon" aria-label="Scroll to Top">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        function toggleMenu() {
            const menu = document.getElementById('nav-menu');
            const hamburger = document.querySelector('.hamburger i');
            menu.classList.toggle('show');

            // Change hamburger icon
            if (menu.classList.contains('show')) {
                hamburger.classList.remove('fa-bars');
                hamburger.classList.add('fa-times');
            } else {
                hamburger.classList.remove('fa-times');
                hamburger.classList.add('fa-bars');
            }
        }

        // Close menu when clicking on a link
        document.querySelectorAll('.menu a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    const menu = document.getElementById('nav-menu');
                    const hamburger = document.querySelector('.hamburger i');
                    menu.classList.remove('show');
                    hamburger.classList.remove('fa-times');
                    hamburger.classList.add('fa-bars');
                }
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            const menu = document.getElementById('nav-menu');
            const hamburger = document.querySelector('.hamburger');
            const hamburgerIcon = document.querySelector('.hamburger i');

            if (window.innerWidth <= 991 &&
                !menu.contains(e.target) &&
                !hamburger.contains(e.target) &&
                menu.classList.contains('show')) {
                menu.classList.remove('show');
                hamburgerIcon.classList.remove('fa-times');
                hamburgerIcon.classList.add('fa-bars');
            }
        });

        // Show/hide scroll to top button
        window.addEventListener('scroll', () => {
            const scrollBtn = document.getElementById('scrollUp');
            if (window.pageYOffset > 300) {
                scrollBtn.classList.add('show');
            } else {
                scrollBtn.classList.remove('show');
            }
        });

        // Smooth scroll to top
        document.getElementById('scrollUp').addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('✅ Service Worker registered:', registration.scope);
                    })
                    .catch(error => {
                        console.log('❌ Service Worker registration failed:', error);
                    });
            });
        }

        // Prevent horizontal scroll on touch devices
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const menu = document.getElementById('nav-menu');
            const hamburgerIcon = document.querySelector('.hamburger i');

            // Swipe left to close menu
            if (touchStartX - touchEndX > 50 && menu.classList.contains('show')) {
                menu.classList.remove('show');
                hamburgerIcon.classList.remove('fa-times');
                hamburgerIcon.classList.add('fa-bars');
            }
        }

        // Handle resize events
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                const menu = document.getElementById('nav-menu');
                const hamburgerIcon = document.querySelector('.hamburger i');

                // Close mobile menu if screen becomes larger
                if (window.innerWidth > 991 && menu.classList.contains('show')) {
                    menu.classList.remove('show');
                    hamburgerIcon.classList.remove('fa-times');
                    hamburgerIcon.classList.add('fa-bars');
                }
            }, 250);
        });

        // Newsletter form handling (optional enhancement)
        const newsletterBtn = document.querySelector('.newsletter-btn');
        if (newsletterBtn) {
            newsletterBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const emailInput = document.getElementById('email2');
                const email = emailInput.value.trim();

                if (email && validateEmail(email)) {
                    // Add your newsletter subscription logic here
                    console.log('Newsletter subscription for:', email);
                    alert('Thank you for subscribing to our newsletter!');
                    emailInput.value = '';
                } else {
                    alert('Please enter a valid email address.');
                }
            });
        }

        // Email validation helper
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Accessibility: Close menu with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const menu = document.getElementById('nav-menu');
                const hamburgerIcon = document.querySelector('.hamburger i');

                if (menu.classList.contains('show')) {
                    menu.classList.remove('show');
                    hamburgerIcon.classList.remove('fa-times');
                    hamburgerIcon.classList.add('fa-bars');
                }
            }
        });

        // Lazy loading images (optional enhancement)
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            observer.unobserve(img);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    </script>

    <!--<< All JS Plugins >>-->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
