@extends('front.layouts.app')
@section('content')
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <style>
        /* Variables CSS pour la cohérence */
        :root {
            --primary-color: #2563eb;
            --secondary-color: #f59e0b;
            --accent-color: #10b981;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-tertiary: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --shadow-soft: 0 10px 40px rgba(0, 0, 0, 0.1);
            --shadow-intense: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .hero-section {
            position: relative;
            height: 100vh;
            min-height: 700px;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Forme décorative en bas */
        .bottom-shape {
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            z-index: 3;
            transform: scaleY(-1);
        }

        .bottom-shape::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(45deg,
                    rgba(255, 255, 255, 0.1) 0%,
                    rgba(255, 255, 255, 0.05) 50%,
                    transparent 100%);
            clip-path: polygon(0 100%, 100% 0%, 100% 100%);
        }

        /* Boutons de navigation améliorés */
        .array-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            display: flex;
            gap: 20px;
            right: 50px;
            flex-direction: column;
        }

        .array-button button {
            width: 60px;
            height: 60px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .array-button button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .array-button button:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.1) rotate(360deg);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .array-button button:hover::before {
            left: 100%;
        }

        /* Slider amélioré */
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .slider-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 8s ease-in-out;
        }

        .slider-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg,
                    rgba(102, 126, 234, 0.8) 0%,
                    rgba(118, 75, 162, 0.6) 50%,
                    rgba(245, 158, 11, 0.4) 100%);
            z-index: 1;
        }

        .swiper-slide-active .slider-image {
            transform: scale(1.05);
        }

        /* Formes décoratives améliorées */
        .mask-shape,
        .border-shape,
        .circle-shape,
        .frame {
            position: absolute;
            z-index: 2;
            opacity: 0.8;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.1));
        }

        .mask-shape {
            top: 10%;
            right: 5%;
            animation: float 6s ease-in-out infinite;
        }

        .border-shape {
            top: 20%;
            right: 15%;
            animation: rotate 20s linear infinite;
        }

        .circle-shape {
            bottom: 20%;
            right: 10%;
            animation: pulse 4s ease-in-out infinite;
        }

        .frame {
            top: 30%;
            left: 5%;
            animation: float 8s ease-in-out infinite reverse;
        }

        /* Animations personnalisées */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.8;
            }

            50% {
                transform: scale(1.1);
                opacity: 1;
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Container responsive */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 5;
        }

        .row {
            display: flex;
            align-items: center;
            min-height: 100vh;
        }

        .col-lg-8 {
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
        }

        /* Contenu héro redesigné */
        .hero-content {
            color: white;
            padding: 40px 0;
        }

        .hero-content h5 {
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            color: var(--secondary-color);
            position: relative;
            display: inline-block;
            padding: 8px 20px;
            background: rgba(245, 158, 11, 0.1);
            border-radius: 25px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .hero-content h1 {
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .hero-content h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 4px;
            background: var(--gradient-secondary);
            border-radius: 2px;
        }

        .hero-content p {
            font-size: 18px;
            line-height: 1.7;
            margin-bottom: 40px;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            font-weight: 300;
        }

        /* Boutons redesignés */
        .hero-button {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .theme-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 32px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            border: 2px solid transparent;
        }

        .theme-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .theme-btn:hover::before {
            left: 100%;
        }

        .theme-btn.hover-white {
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow-soft);
        }

        .theme-btn.hover-white:hover {
            background: var(--gradient-secondary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-intense);
        }

        .theme-btn.border-white {
            background: transparent;
            color: white;
            border-color: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .theme-btn.border-white:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.1);
        }

        .theme-btn i {
            transition: transform 0.3s ease;
        }

        .theme-btn:hover i {
            transform: translateX(5px);
        }

        /* Indicateurs de slide personnalisés */
        .swiper-pagination {
            bottom: 30px !important;
        }

        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: white;
            transform: scale(1.2);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .array-button {
                right: 30px;
            }

            .col-lg-8 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: clamp(2.5rem, 8vw, 4rem);
            }

            .hero-content p {
                font-size: 16px;
            }

            .hero-button {
                flex-direction: column;
                align-items: flex-start;
            }

            .theme-btn {
                width: 100%;
                justify-content: center;
            }

            .array-button {
                display: none;
            }

            .mask-shape,
            .border-shape,
            .circle-shape,
            .frame {
                display: none;
            }
        }

        /* Effets de particules flottantes */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px, 80px 80px, 60px 60px;
            animation: sparkle 20s linear infinite;
            z-index: 1;
        }

        @keyframes sparkle {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }
    </style>

    <section class="hero-section fix hero-3">
        <div class="bottom-shape">
            <img src="assets/img/hero/bottom-shape.png" alt="shape-img">
        </div>

        <div class="array-button">
            <button class="array-prev"><i class="fal fa-arrow-up"></i></button>
            <button class="array-next"><i class="fal fa-arrow-down"></i></button>
        </div>

        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <!-- Slide 1 - Centre communautaire -->
                <div class="swiper-slide">
                    <div class="slider-image bg-cover" style="background-image: url('assets/img/hero/hero-2.jpg');">
                        <div class="mask-shape" data-animation="slideInDown" data-duration="3s" data-delay="2s">
                            <img src="assets/img/hero/mask-shape-2.png" alt="shape-img">
                        </div>
                        <div class="border-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.2s">
                            <img src="assets/img/hero/border-shape.png" alt="shape-img">
                        </div>
                        <div class="circle-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.1s">
                            <img src="assets/img/choose/circle.png" alt="shape-img">
                        </div>
                        <div class="frame" data-animation="slideInLeft" data-duration="3s" data-delay="2.2s">
                            <img src="assets/img/frame.png" alt="shape-img">
                        </div>
                    </div>

                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <h5 data-animation="slideInRight" data-duration="2s" data-delay=".3s">
                                        Centre communautaire
                                    </h5>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Bienvenue à <br> La Maison du Village
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                        Un espace de partage, de formation et d'innovation pour toute la communauté.
                                        Découvrez un lieu où les générations se rencontrent et grandissent ensemble.
                                    </p>
                                    <div class="hero-button">
                                        <a href="about.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s" class="theme-btn hover-white">
                                            En savoir plus
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                        <a href="contact.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay="1.1s" class="theme-btn border-white">
                                            Nous contacter
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 - Formations & Ateliers -->
                <div class="swiper-slide">
                    <div class="slider-image bg-cover" style="background-image: url('assets/img/hero/hero-1.jpg');">
                        <div class="mask-shape" data-animation="slideInDown" data-duration="3s" data-delay="2s">
                            <img src="assets/img/hero/mask-shape-2.png" alt="shape-img">
                        </div>
                        <div class="border-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.2s">
                            <img src="assets/img/hero/border-shape.png" alt="shape-img">
                        </div>
                        <div class="circle-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.1s">
                            <img src="assets/img/choose/circle.png" alt="shape-img">
                        </div>
                        <div class="frame" data-animation="slideInLeft" data-duration="3s" data-delay="2.2s">
                            <img src="assets/img/frame.png" alt="shape-img">
                        </div>
                    </div>

                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <h5 data-animation="slideInRight" data-duration="2s" data-delay=".3s">
                                        Formations & Ateliers
                                    </h5>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Développez vos compétences <br> avec nos programmes
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                        Informatique, agriculture, artisanat, entrepreneuriat : des modules adaptés à tous
                                        les âges.
                                        Transformez votre potentiel en opportunités concrètes.
                                    </p>
                                    <div class="hero-button">
                                        <a href="about.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s" class="theme-btn hover-white">
                                            Découvrir
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                        <a href="contact.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay="1.1s" class="theme-btn border-white">
                                            Prendre rendez-vous
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 - Engagement social -->
                <div class="swiper-slide">
                    <div class="slider-image bg-cover" style="background-image: url('assets/img/hero/hero-3.jpg');">
                        <div class="mask-shape" data-animation="slideInDown" data-duration="3s" data-delay="2s">
                            <img src="assets/img/hero/mask-shape-2.png" alt="shape-img">
                        </div>
                        <div class="border-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.2s">
                            <img src="assets/img/hero/border-shape.png" alt="shape-img">
                        </div>
                        <div class="circle-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.1s">
                            <img src="assets/img/choose/circle.png" alt="shape-img">
                        </div>
                        <div class="frame" data-animation="slideInLeft" data-duration="3s" data-delay="2.2s">
                            <img src="assets/img/frame.png" alt="shape-img">
                        </div>
                    </div>

                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-8">
                                <div class="hero-content">
                                    <h5 data-animation="slideInRight" data-duration="2s" data-delay=".3s">
                                        Engagement social
                                    </h5>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        Construisons ensemble <br> un avenir meilleur
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                        Participez à nos actions solidaires : soutien scolaire, éducation numérique,
                                        agriculture durable et bien plus. Chaque geste compte pour notre communauté.
                                    </p>
                                    <div class="hero-button">
                                        <a href="about.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s" class="theme-btn hover-white">
                                            Rejoignez-nous
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                        <a href="contact.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay="1.1s" class="theme-btn border-white">
                                            Faire un don
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination des slides -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/swiper/8.4.7/swiper-bundle.min.js"></script>
    <script>
        // Initialisation du slider Swiper avec options avancées
        const heroSwiper = new Swiper('.hero-slider', {
            loop: true,
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            },
            speed: 1000,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.array-next',
                prevEl: '.array-prev',
            },
            on: {
                slideChange: function() {
                    // Animation des éléments lors du changement de slide
                    const activeSlide = this.slides[this.activeIndex];
                    const elements = activeSlide.querySelectorAll('[data-animation]');

                    elements.forEach((el, index) => {
                        el.style.animationDelay = (index * 0.2) + 's';
                        el.classList.add('animate__animated', 'animate__' + el.dataset.animation);
                    });
                }
            }
        });

        // Pause automatique au survol
        document.querySelector('.hero-slider').addEventListener('mouseenter', () => {
            heroSwiper.autoplay.stop();
        });

        document.querySelector('.hero-slider').addEventListener('mouseleave', () => {
            heroSwiper.autoplay.start();
        });

        // Animation des éléments au chargement
        window.addEventListener('load', () => {
            const firstSlideElements = document.querySelectorAll('.swiper-slide-active [data-animation]');
            firstSlideElements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateX(0)';
                }, index * 200);
            });
        });
    </script>




    @foreach ($abouts as $about)
        <section class="about-section section-padding fix bg-cover"
            style="background-image: url('{{ asset('storage/' . ($about->background_image ?? 'assets/img/service/service-bg-2.jpg')) }}');">
            <div class="container">
                <div class="about-wrapper style-2">
                    <div class="row">
                        <!-- Image Section -->
                        <div class="col-lg-6">
                            <div class="card shadow rounded-4 overflow-hidden">
                                <div class="card-body p-3">
                                    <!-- Cercle décoratif (optionnel) -->
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('assets/img/about/circle.png') }}" alt="shape-img"
                                            class="img-fluid" style="max-width: 80px;">
                                    </div>

                                    <!-- Première image -->
                                    <div class="mb-3 wow fadeInLeft" data-wow-delay=".3s">
                                        <img src="{{ asset('storage/' . $about->image) }}" alt="about-img-1"
                                            class="img-fluid rounded w-100">
                                    </div>

                                    <!-- Intégration lien YouTube -->
                                    @php
                                        $youtubeId = getYoutubeId($about->lient_youtube);
                                    @endphp

                                    @if ($youtubeId)
                                        <div class="video-section wow fadeInUp" data-wow-delay=".5s"
                                            style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                                            <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen
                                                style="position:absolute;top:0;left:0;width:100%;height:100%;border-radius: .5rem;"></iframe>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="col-lg-6 mt-4 mt-lg-0">
                            <div class="about-content">
                                <div class="section-title">
                                    <span class="wow fadeInUp">{{ $about->slug }}</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                        {{ $about->slug }}
                                    </h2>
                                </div>
                                <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                    {!! $about->contenu !!}
                                </p>

                                <div class="about-author">
                                    <div class="about-button wow fadeInUp" data-wow-delay=".5s">
                                        <a href="about.html" class="theme-btn">
                                            Explore More
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endforeach



    <!-- Brand Section Start -->
    <div class="brand-section fix section-padding pt-0">
        <div class="container mx-auto">
            <div class="brand-wrapper">
                <h6 class="text-center wow fadeInUp" data-wow-delay=".3s">NOS PARTENAIRES</h6>

                <div class="swiper brand-slider">
                    <div class="swiper-wrapper">
                        @foreach ($partenaire as $item)
                            @if ($item->is_active)
                                <div class="swiper-slide logo-slide">
                                    <div class="brand-image text-center">
                                        @if ($item->url)
                                            <a href="{{ $item->url }}" target="_blank">
                                                <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->name }}"
                                                    class="partner-logo">
                                            </a>
                                        @else
                                            <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->name }}"
                                                class="partner-logo">
                                        @endif
                                        <p class="partner-name">{{ $item->name }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Style personnalisé -->
    <style>
        .partner-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
            border: 1px solid #d1d5db;
            /* gris clair */
            background-color: #fff;
            padding: 4px;
            display: block;
            margin: 0 auto;
        }

        .partner-name {
            font-size: 14px;
            color: #333;
            margin-top: 8px;
            font-weight: 500;
        }

        .logo-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            flex-direction: column;
        }
    </style>



    <!-- Service Section Start -->
    <section class="service-section-3 pb-0 fix section-padding bg-cover"
        style="background-image: url('assets/img/service/service-bg-3.jpg');">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span>Nos Domaines de Formation</span>
                    <h2>
                        Former et Accompagner les Populations <br> en Zone Rurale avec des Compétences IT
                    </h2>
                </div>
                <a href="formations.html" class="theme-btn">
                    Voir toutes les formations
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items">
                        <div class="service-image">
                            <img src="assets/img/service/02.jpg" alt="image formation">
                        </div>
                        <div class="icon-2">
                            <img src="assets/img/service/icon/s-icon-1.svg" alt="icone">
                        </div>
                        <div class="service-content">
                            <div class="icon">
                                <img src="assets/img/service/icon/s-icon-1.svg" alt="icone">
                            </div>
                            <h4>
                                <a href="formation-details.html">Sécurité des Bases de Données</a>
                            </h4>
                            <p>
                                Apprenez à protéger et gérer efficacement les données dans les systèmes d'information.
                            </p>
                            <a href="formation-details.html" class="theme-btn-2 mt-3">
                                En savoir plus
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items">
                        <div class="service-image">
                            <img src="assets/img/service/03.jpg" alt="image formation">
                        </div>
                        <div class="icon-2">
                            <img src="assets/img/service/icon/s-icon-2.svg" alt="icone">
                        </div>
                        <div class="service-content">
                            <div class="icon">
                                <img src="assets/img/service/icon/s-icon-2.svg" alt="icone">
                            </div>
                            <h4>
                                <a href="formation-details.html">Conseil en Technologies de l'Information</a>
                            </h4>
                            <p>
                                Développez vos compétences en analyse et accompagnement IT pour les PME rurales.
                            </p>
                            <a href="formation-details.html" class="theme-btn-2 mt-3">
                                En savoir plus
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items">
                        <div class="service-image">
                            <img src="assets/img/service/04.jpg" alt="image formation">
                        </div>
                        <div class="icon-2">
                            <img src="assets/img/service/icon/s-icon-4.svg" alt="icone">
                        </div>
                        <div class="service-content">
                            <div class="icon">
                                <img src="assets/img/service/icon/s-icon-5.svg" alt="icone">
                            </div>
                            <h4>
                                <a href="formation-details.html">Développement d’Applications</a>
                            </h4>
                            <p>
                                Apprenez à concevoir des applications adaptées aux besoins locaux et communautaires.
                            </p>
                            <a href="formation-details.html" class="theme-btn-2 mt-3">
                                En savoir plus
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items">
                        <div class="service-image">
                            <img src="assets/img/service/05.jpg" alt="image formation">
                        </div>
                        <div class="icon-2">
                            <img src="assets/img/service/icon/s-icon-3.svg" alt="icone">
                        </div>
                        <div class="service-content">
                            <div class="icon">
                                <img src="assets/img/service/icon/s-icon-3.svg" alt="icone">
                            </div>
                            <h4>
                                <a href="formation-details.html">Sensibilisation à la Cybersécurité</a>
                            </h4>
                            <p>
                                Initiez-vous aux bonnes pratiques pour protéger vos systèmes et informations personnelles.
                            </p>
                            <a href="formation-details.html" class="theme-btn-2 mt-3">
                                En savoir plus
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Work Process Section Start -->
    <section class="work-process-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <span>How IT work</span>
                <h2>Standard Work Process</h2>
            </div>
            <div class="process-work-wrapper">
                <div class="line-shape">
                    <img src="assets/img/process/linepng.png" alt="">
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="work-process-items text-center">
                            <div class="icon">
                                <img src="assets/img/process/01.svg" alt="img">
                                <h6 class="number">
                                    1
                                </h6>
                            </div>
                            <div class="content">
                                <h4>Choose A Service</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="work-process-items text-center">
                            <div class="content style-2">
                                <h4>Define Requirements</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                            <div class="icon">
                                <img src="assets/img/process/02.svg" alt="img">
                                <h6 class="number">
                                    2
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="work-process-items text-center">
                            <div class="icon">
                                <img src="assets/img/process/03.svg" alt="img">
                                <h6 class="number">
                                    3
                                </h6>
                            </div>
                            <div class="content">
                                <h4>Request A Meeting</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="work-process-items text-center">
                            <div class="content style-2">
                                <h4>Finial Solutio3</h4>
                                <p>
                                    In a free hour, when our power of choice is untrammeled and
                                </p>
                            </div>
                            <div class="icon">
                                <img src="assets/img/process/04.svg" alt="img">
                                <h6 class="number">
                                    4
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievement Section Start -->
    <section class="achievement-section-3 fix section-bg-2">
        <div class="shape-image">
            <img src="assets/img/achiv-shape.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="achievement-wrapper style-2">
                <div class="section-title mb-0">
                    <span class="text-white wow fadeInUp">achievement</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                        We Are Increasing <br> Business Success
                    </h2>
                </div>
                <div class="counter-area">
                    <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/01.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">6,561</span>+</h2>
                            <p>Satisfied Clients</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".5s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/02.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">600</span>+</h2>
                            <p>Finished Projects</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".7s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/03.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">250</span>+</h2>
                            <p>Skilled Experts</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".9s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/04.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">5,90</span>+</h2>
                            <p>Media Posts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project-section-3 section-padding pb-0 fix bg-cover"
        style="background-image: url('assets/img/testimonial/bg.jpg');">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="text-white">PROJECTS</span>
                    <h2 class="text-white">
                        Nos Derniers Projets Incroyables
                    </h2>
                </div>
                <div class="video-box">
                    <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn ripple video-popup">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
            </div>
            <div class="project-wrapper style-2">
                <div class="swiper project-slider-3">
                    <div class="swiper-wrapper">
                        @foreach ($projects as $project)
                            <div class="swiper-slide">
                                <div class="project-items style-2">
                                    <div class="project-image">
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="project-img">
                                        <div class="project-content">
                                            <p>{{ $project->slug }}</p>

                                            <a href="" class="arrow-icon-2">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="swiper-dot-2 mr-left">
                <div class="dot-2"></div>
            </div>
        </div>
    </section>


    <!--<< Marque Section Start >>-->
    <div class="marque-section section-padding">
        <div class="container-fluid">
            <div class="marquee-wrapper style-2 text-slider">
                <div class="marquee-inner to-left">
                    <ul class="marqee-list d-flex">
                        <li class="marquee-item style-2">
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Cyber Security</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">IT Solution</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Technology</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Data Security</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Cyber Security</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">IT Solution</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Technology</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Data Security</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Cyber Security</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">IT Solution</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Technology</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">Data Security</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--<< Team Section Start >>-->
    <section class="team-section-3 fix section-padding section-bg">
        <div class="line-shape">
            <img src="assets/img/team/line-shape.png" alt="shape-img">
        </div>
        <div class="mask-shape">
            <img src="assets/img/team/mask-shape-2.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="wow fadeInUp">Team Members</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Our Dedicated Team <br> Members
                    </h2>
                </div>
                <a href="team.html" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
                    All Member
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
            @foreach ($teams as $team)
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="single-team-items">
                            <div class="team-image">
                                <img src="{{ asset('storage/' . $team->image) }}" alt="team-img">
                                <div class="social-profile">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                                    </ul>
                                    <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h3>
                                    <a href="team-details.html">{{ $team->name }}</a>
                                </h3>
                                <p>{{ $team->fonction }}</p>
                                <p>{{ $team->presentation }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </section>

    <!--<< Testimonial Section Start >>-->
    <section class="tesimonial-section-3 section-padding section-bg-2 bg-cover">
        <div class="line-shape">
            <img src="assets/img/team/line-shape.png" alt="shape-img">
        </div>
        <div class="mask-shape">
            <img src="assets/img/team/mask-shape.png" alt="shape-img">
        </div>
        <div class="array-button">
            <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
            <button class="array-next"><i class="fal fa-arrow-right"></i></button>
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="text-white">Testimonials</span>
                <h2 class="text-white">
                    People Who Already Love Us
                </h2>
            </div>
            <div class="swiper testimonial-slider-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-box-items">
                            <div class="icon">
                                <img src="assets/img/testimonial/icon.png" alt="icon-img">
                            </div>
                            <div class="client-items">
                                <div class="client-image style-2 bg-cover"
                                    style="background-image: url('assets/img/testimonial/02.jpg');"></div>
                                <div class="client-content">
                                    <h4>Kathryn Murphy</h4>
                                    <p>Web Designer</p>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus
                                aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-box-items">
                            <div class="icon">
                                <img src="assets/img/testimonial/icon.png" alt="icon-img">
                            </div>
                            <div class="client-items">
                                <div class="client-image style-2 bg-cover"
                                    style="background-image: url('assets/img/testimonial/03.jpg');"></div>
                                <div class="client-content">
                                    <h4>Albert Flores</h4>
                                    <p>Medical Assistant</p>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star color-text"></i>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus
                                aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section Start -->
    <section class="news-section-3 fix section-padding">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="wow fadeInUp">Latest Blog</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Checkout Our Latest <br> News & Articles
                    </h2>
                </div>
                <div class="array-button">
                    <button class="array-prev"><i class="fal fa-arrow-right"></i></button>
                    <button class="array-next"><i class="fal fa-arrow-left"></i></button>
                </div>
            </div>
            <div class="swiper news-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="news-card-items style-2">
                            <div class="news-image">
                                <img src="assets/img/news/04.jpg" alt="news-img">
                                <div class="post-date">
                                    <h3>
                                        17 <br>
                                        <span>Feb</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By Admin
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        IT Services
                                    </li>
                                </ul>
                                <h3>
                                    <a href="news-details.html">Simplify Streamline Succeed IT Solutions</a>
                                </h3>
                                <a href="news-details.html" class="theme-btn-2 mt-3">
                                    read More
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-card-items style-2">
                            <div class="news-image">
                                <img src="assets/img/news/07.jpg" alt="news-img">
                                <div class="post-date">
                                    <h3>
                                        20 <br>
                                        <span>May</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By Admin
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        UI/UX Design
                                    </li>
                                </ul>
                                <h3>
                                    <a href="news-details.html">Unlocking Potential Through Technology</a>
                                </h3>
                                <a href="news-details.html" class="theme-btn-2 mt-3">
                                    read More
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-card-items style-2">
                            <div class="news-image">
                                <img src="assets/img/news/08.jpg" alt="news-img">
                                <div class="post-date">
                                    <h3>
                                        10 <br>
                                        <span>Feb</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By Admin
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        Cyber Security
                                    </li>
                                </ul>
                                <h3>
                                    <a href="news-details.html">Supervisor Disapproved of Latest Work.</a>
                                </h3>
                                <a href="news-details.html" class="theme-btn-2 mt-3">
                                    read More
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
