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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            overflow-x: hidden;
            width: 100%;
            position: relative;
        }

        /* Header responsive */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            width: 100%;
        }

        .logo img {
            height: 50px;
            width: auto;
            border-radius: 8px;
            display: block;
        }

        .menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .menu a {
            text-decoration: none;
            color: #222;
            font-weight: 600;
            transition: color 0.3s ease;
            white-space: nowrap;
            font-size: 0.95rem;
        }

        .menu a:hover {
            color: #007bff;
        }

        /* Language Switcher */
        .language-switcher {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-left: 15px;
        }

        .language-switcher a {
            padding: 6px 12px;
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
        }

        .language-switcher a.active {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .hamburger {
            display: none;
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            color: #222;
        }

        /* Menu mobile */
        @media (max-width: 991px) {
            .menu {
                display: none;
                flex-direction: column;
                align-items: flex-start;
                background: #fff;
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                padding: 20px;
                border-top: 1px solid #ddd;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-height: calc(100vh - 70px);
                overflow-y: auto;
                gap: 0;
            }

            .menu a {
                width: 100%;
                padding: 15px 10px;
                border-bottom: 1px solid #f0f0f0;
                font-size: 1rem;
            }

            .menu.show {
                display: flex;
            }

            .hamburger {
                display: block;
            }

            .language-switcher {
                margin-left: 10px;
                gap: 5px;
            }

            .language-switcher a {
                padding: 5px 10px;
                font-size: 0.8rem;
            }
        }

        /* Tablette */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 10px;
                height: 60px;
            }

            .logo img {
                height: 40px;
            }

            .menu {
                top: 60px;
                max-height: calc(100vh - 60px);
            }
        }

        /* Petit mobile */
        @media (max-width: 480px) {
            .logo img {
                height: 35px;
            }

            .hamburger {
                font-size: 20px;
            }

            .language-switcher a {
                padding: 4px 8px;
                font-size: 0.75rem;
            }
        }

        /* Footer responsive */
        .footer-section {
            width: 100%;
            overflow: hidden;
        }

        .footer-widgets-wrapper {
            padding: 60px 0 40px;
        }

        .footer-widgets-wrapper .container {
            max-width: 1200px;
            padding: 0 15px;
        }

        .single-footer-widget {
            margin-bottom: 30px;
        }

        .widget-head h3 {
            font-size: 1.25rem;
            margin-bottom: 20px;
        }

        .footer-content p {
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .social-icon {
            gap: 10px;
            flex-wrap: wrap;
        }

        .social-icon a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f0f0f0;
            transition: all 0.3s ease;
        }

        .social-icon a:hover {
            background: #007bff;
            color: #fff;
        }

        .list-area {
            list-style: none;
            padding: 0;
        }

        .list-area li {
            margin-bottom: 10px;
        }

        .list-area a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .list-area a:hover {
            color: #007bff;
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
            border-radius: 4px 0 0 4px;
            font-size: 0.9rem;
            min-width: 0;
        }

        .newsletter-btn {
            padding: 12px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .newsletter-btn:hover {
            background: #0056b3;
        }

        .footer-bottom {
            padding: 25px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-wrapper {
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center !important;
            text-align: center;
        }

        .footer-logo div {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .footer-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .footer-wrapper p {
            margin: 0;
            font-size: 0.9rem;
        }

        #scrollUp {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #007bff;
            color: #fff;
            border-radius: 50%;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
            z-index: 999;
        }

        #scrollUp:hover {
            background: #0056b3;
            transform: translateY(-5px);
        }

        /* Responsive tablette */
        @media (max-width: 991px) {
            .footer-widgets-wrapper {
                padding: 40px 0 30px;
            }

            .single-footer-widget {
                margin-bottom: 40px;
            }
        }

        /* Responsive mobile */
        @media (max-width: 767px) {
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

            .footer-input input {
                border-radius: 4px 0 0 4px;
                font-size: 0.85rem;
            }

            .newsletter-btn {
                border-radius: 0 4px 4px 0;
            }

            .footer-wrapper {
                flex-direction: column;
                align-items: center;
            }

            .footer-logo {
                margin-bottom: 15px;
            }

            #scrollUp {
                width: 40px;
                height: 40px;
                bottom: 20px;
                right: 20px;
            }
        }

        /* Petit mobile */
        @media (max-width: 480px) {
            .footer-widgets-wrapper {
                padding: 30px 0 20px;
            }

            .widget-head h3 {
                font-size: 1rem;
            }

            .social-icon a {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }

            .footer-logo div {
                width: 50px;
                height: 50px;
            }

            .footer-wrapper p {
                font-size: 0.8rem;
            }
        }

        /* Images responsive */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Container global */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        /* Empêcher le débordement horizontal */
        body,
        html {
            max-width: 100vw;
            overflow-x: hidden;
        }

        /* Touch friendly */
        a,
        button {
            min-height: 44px;
            min-width: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .menu a {
            min-height: 44px;
        }
    </style>

    @include('laravelpwa::meta')

</head>

<body>
<header>
    <div class="nav-container">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="{{ __('maisonduvillage.logo_alt') }}" />
            </a>
        </div>

        <div class="nav-right">
            <!-- Menu -->
            <nav id="nav-menu" class="menu" role="navigation">
                <a href="{{ route('accueil.index') }}">{{ __('maisonduvillage.nav.home') }}</a>
                <a href="{{ route('propos.index') }}">{{ __('maisonduvillage.nav.about') }}</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('cultures.index') }}">{{ __('maisonduvillage.nav.culture') }}</a>
                <a href="{{ route('women.index') }}">{{ __('maisonduvillage.nav.women') }}</a>
                <a href="{{ route('site.informatique.index') }}">{{ __('maisonduvillage.nav.it') }}</a>
                <a href="#">{{ __('maisonduvillage.nav.youth_festival') }}</a>
                <a href="{{ route('blog.index') }}">{{ __('maisonduvillage.nav.news') }}</a>
                <a href="{{ route('projects.index') }}">{{ __('maisonduvillage.nav.projects') }}</a>
                <a href="{{ route('equipe.index') }}">{{ __('maisonduvillage.nav.team') }}</a>
                <a href="{{ route('contacter.index') }}">{{ __('maisonduvillage.nav.contact') }}</a>
            </nav>

            <!-- Sélecteur de langue -->
            <div class="language-switcher">
                <a href="{{ route('lang.switch', 'fr') }}"
                    class="{{ app()->getLocale() == 'fr' ? 'active' : '' }}"
                    title="{{ __('maisonduvillage.switch_to_french') }}">
                    🇫🇷 FR
                </a>
                <a href="{{ route('lang.switch', 'en') }}"
                    class="{{ app()->getLocale() == 'en' ? 'active' : '' }}"
                    title="{{ __('maisonduvillage.switch_to_english') }}">
                    🇬🇧 EN
                </a>
            </div>

            <!-- Bouton mobile -->
            <button class="hamburger" onclick="toggleMenu()"
                aria-label="{{ __('maisonduvillage.navigation_menu') }}">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<style>
/* Style de base pour le header */
header {
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    max-width: 1400px;
    margin: 0 auto;
}

.logo img {
    height: 60px;
    width: auto;
}

.nav-right {
    display: flex;
    align-items: center;
    gap: 2rem;
}

/* Menu navigation */
.menu {
    display: flex;
    gap: 1.5rem;
    align-items: center;
}

.menu a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    padding: 0.5rem 0;
    transition: color 0.3s;
    white-space: nowrap;
}

.menu a:hover {
    color: #007bff;
}

/* Sélecteur de langue */
.language-switcher {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.language-switcher a {
    text-decoration: none;
    color: #666;
    padding: 0.4rem 0.8rem;
    border-radius: 4px;
    transition: all 0.3s;
    font-size: 0.9rem;
}

.language-switcher a:hover {
    background: #f0f0f0;
}

.language-switcher a.active {
    background: #007bff;
    color: #fff;
}

/* Bouton hamburger */
.hamburger {
    display: none;
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #333;
}

/* Responsive */
@media (max-width: 1200px) {
    .menu {
        gap: 1rem;
    }

    .menu a {
        font-size: 0.9rem;
    }
}

@media (max-width: 992px) {
    .hamburger {
        display: block;
    }

    .nav-right {
        position: relative;
    }

    .menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background: #fff;
        flex-direction: column;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        padding: 1rem;
        border-radius: 8px;
        min-width: 200px;
        gap: 0;
    }

    .menu.active {
        display: flex;
    }

    .menu a {
        padding: 0.75rem 1rem;
        width: 100%;
        border-bottom: 1px solid #eee;
    }

    .menu a:last-child {
        border-bottom: none;
    }

    .language-switcher {
        order: -1;
    }
}

@media (max-width: 576px) {
    .nav-container {
        padding: 1rem;
    }

    .logo img {
        height: 45px;
    }

    .nav-right {
        gap: 1rem;
    }
}
</style>

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
                                <h3>{{ __('maisonduvillage.footer.about_title') }}</h3>
                            </div>
                            <div class="footer-content">
                                <p>{{ __('maisonduvillage.footer.about_description') }}</p>
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
                                <h3>{{ __('maisonduvillage.footer.navigation_title') }}</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="{{ route('accueil.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.home') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('propos.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.about') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cultures.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.culture') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('women.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.women') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blog.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.news') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-footer-widget style-margin">
                            <div class="widget-head">
                                <h3>{{ __('maisonduvillage.footer.services_title') }}</h3>
                            </div>
                            <ul class="list-area">
                                <li>
                                    <a href="{{ route('site.informatique.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.it') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('projects.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.projects') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('equipe.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.team') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.youth_festival') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contacter.index') }}">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        {{ __('maisonduvillage.nav.contact') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="single-footer-widget style-margin">
                            <div class="widget-head">
                                <h3>{{ __('maisonduvillage.footer.newsletter_title') }}</h3>
                            </div>
                            <div class="footer-content">
                                <p>{{ __('maisonduvillage.footer.newsletter_description') }}</p>
                                <div class="footer-input">
                                    <input type="email" id="email2"
                                        placeholder="{{ __('maisonduvillage.footer.email_placeholder') }}">
                                    <button class="newsletter-btn" type="submit"
                                        aria-label="{{ __('maisonduvillage.footer.subscribe_button') }}">
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
                    <!-- Logo dans un avatar -->
                    <div class="footer-logo wow fadeInLeft" data-wow-delay=".3s">
                        <a href="{{ route('accueil.index') }}" class="d-flex align-items-center">
                            <div>
                                <img src="{{ asset('assets/img/logo/logo.jpg') }}"
                                    alt="{{ __('maisonduvillage.logo_alt') }}">
                            </div>
                        </a>
                    </div>

                    <!-- Texte du footer -->
                    <p class="wow fadeInRight color-2" data-wow-delay=".5s">
                        {{ __('maisonduvillage.footer.copyright', ['year' => date('Y')]) }} <a
                            href="{{ route('accueil.index') }}">{{ __('maisonduvillage.site_name') }}</a>
                    </p>
                </div>
            </div>

            <!-- Bouton pour remonter -->
            <a href="#" id="scrollUp" class="scroll-icon"
                aria-label="{{ __('maisonduvillage.scroll_to_top') }}">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>

    </footer>

    <script>
        // Toggle menu mobile
        function toggleMenu() {
            const menu = document.getElementById('nav-menu');
            menu.classList.toggle('show');
        }

        // Fermer le menu lors du clic sur un lien
        document.querySelectorAll('.menu a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    document.getElementById('nav-menu').classList.remove('show');
                }
            });
        });

        // Fermer le menu si on clique en dehors
        document.addEventListener('click', (e) => {
            const menu = document.getElementById('nav-menu');
            const hamburger = document.querySelector('.hamburger');

            if (window.innerWidth <= 991 &&
                !menu.contains(e.target) &&
                !hamburger.contains(e.target) &&
                menu.classList.contains('show')) {
                menu.classList.remove('show');
            }
        });

        // Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('✅ Service Worker enregistré:', registration.scope);
                    })
                    .catch(error => {
                        console.log('❌ Erreur Service Worker:', error);
                    });
            });
        }

        // Smooth scroll pour le bouton remonter
        document.getElementById('scrollUp').addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
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
