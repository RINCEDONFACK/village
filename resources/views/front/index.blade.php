@extends('front.layouts.app')
@section('content')
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input"
                            placeholder="{{ __('maisonduvillage.search_placeholder') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="hero-section fix hero-3">
        <div class="bottom-shape">
            <img src="assets/img/hero/bottom-shape.png" alt="shape-img">
        </div>
        <div class="array-button">
            <button class="array-prev"><i class="fal fa-arrow-right"></i></button>
            <button class="array-next"><i class="fal fa-arrow-left"></i></button>
        </div>
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
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
                                        {{ __('maisonduvillage.hero.slide1.subtitle') }}
                                    </h5>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        {!! __('maisonduvillage.hero.slide1.title') !!}
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                        {!! __('maisonduvillage.hero.slide1.description') !!}
                                    </p>
                                    <div class="hero-button">
                                        <a href="{{ route('propos.index') }}" data-animation="slideInRight"
                                            data-duration="2s" data-delay=".9s" class="theme-btn hover-white">
                                            About
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>

                                        <a href="{{ route('contacter.index') }}" data-animation="slideInRight"
                                            data-duration="2s" data-delay=".9s" class="theme-btn border-white">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                            Contactez-nous
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
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
                                        {{ __('maisonduvillage.hero.slide2.subtitle') }}
                                    </h5>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        {!! __('maisonduvillage.hero.slide2.title') !!}
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                        {!! __('maisonduvillage.hero.slide2.description') !!}
                                    </p>
                                    <div class="hero-button">
                                        <a href="about.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s" class="theme-btn hover-white">
                                            {{ __('maisonduvillage.buttons.discover') }}
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                        <a href="contact.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s" class="theme-btn border-white">
                                            {{ __('maisonduvillage.buttons.book_appointment') }}
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
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
                                        {{ __('maisonduvillage.hero.slide3.subtitle') }}
                                    </h5>
                                    <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                        {!! __('maisonduvillage.hero.slide3.title') !!}
                                    </h1>
                                    <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                        {!! __('maisonduvillage.hero.slide3.description') !!}
                                    </p>
                                    <div class="hero-button">
                                        <a href="about.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s" class="theme-btn hover-white">
                                            {{ __('maisonduvillage.buttons.join_us') }}
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                        <a href="contact.html" data-animation="slideInRight" data-duration="2s"
                                            data-delay=".9s" class="theme-btn border-white">
                                            {{ __('maisonduvillage.buttons.donate') }}
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        if (!function_exists('getYoutubeId')) {
            function getYoutubeId($url)
            {
                preg_match(
                    '/(?:youtube\.com\/(?:[^\/]+\/.+|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/',
                    $url,
                    $matches,
                );
                return $matches[1] ?? null;
            }
        }
    @endphp

    @foreach ($abouts as $about)
        <section class="about-section section-padding fix bg-cover"
            style="background-image: url('{{ asset('storage/' . ($about->background_image ?? 'assets/img/service/service-bg-2.jpg')) }}');">
            <div class="container">
                <div class="about-wrapper style-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow rounded-4 overflow-hidden">
                                <div class="card-body p-3">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('assets/img/about/circle.png') }}" alt="shape-img"
                                            class="img-fluid" style="max-width: 80px;">
                                    </div>
                                    <div class="mb-3 wow fadeInLeft" data-wow-delay=".3s">
                                        <img src="{{ asset('storage/' . $about->image) }}" alt="about-img-1"
                                            class="img-fluid rounded w-100">
                                    </div>
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
                        <div class="col-lg-6 mt-4 mt-lg-0">
                            <div class="about-content">
                                <div class="section-title">
                                    <span class="wow fadeInUp">{{ $about->slug }}</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $about->slug }}</h2>
                                </div>
                                <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                    {!! $about->contenu !!}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <div class="brand-section fix section-padding pt-0">
        <div class="container mx-auto">
            <div class="brand-wrapper">
                <h6 class="text-center wow fadeInUp" data-wow-delay=".3s">
                    {{ __('maisonduvillage.partners.title') }}
                </h6>
                <div class="swiper brand-slider">
                    <div class="swiper-wrapper">
                        @foreach ($partenaire as $item)
                            @if ($item->is_active)
                                <div class="swiper-slide logo-slide">
                                    <div class="brand-image text-center">
                                        @if ($item->url)
                                            <a href="{{ $item->url }}" target="_blank">
                                                <img src="{{ asset('storage/' . $item->logo) }}"
                                                    alt="{{ $item->name }}" class="partner-logo">
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

    <style>
        .partner-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
            border: 1px solid #d1d5db;
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




    <section class="service-section-3 pb-0 fix section-padding bg-cover"
        style="background-image: url('assets/img/service/service-bg-3.jpg');">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span>{{ __('maisonduvillage.culture.section_title') }}</span>
                    <h2>{!! __('maisonduvillage.culture.section_subtitle') !!}</h2>
                </div>
                <a href="{{ route('cultures.index') }}" class="theme-btn">
                    {{ __('maisonduvillage.culture.view_all') }}
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="cultures-container">
                <div class="row">
                    @forelse ($cultures as $culture)
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                            <div class="service-card-items h-100">
                                <!-- Image principale -->
                                <div class="service-image">
                                    @if ($culture->image1)
                                        <img src="{{ asset('storage/' . $culture->image1) }}"
                                            alt="{{ $culture->titre }}" class="img-fluid">
                                    @elseif ($culture->image2)
                                        <img src="{{ asset('storage/' . $culture->image2) }}"
                                            alt="{{ $culture->titre }}" class="img-fluid">
                                    @else
                                        <img src="{{ asset('assets/img/service/02.jpg') }}"
                                            alt="{{ __('maisonduvillage.culture.default_image') }}" class="img-fluid">
                                    @endif
                                </div>

                                <div class="icon-2">
                                    <img src="{{ asset('assets/img/service/icon/s-icon-1.svg') }}" alt="icon">
                                </div>

                                <div class="service-content">
                                    <div class="icon">
                                        <img src="{{ asset('assets/img/service/icon/s-icon-1.svg') }}" alt="icon">
                                    </div>

                                    <!-- Titre -->
                                    <h4>
                                        <a href="">
                                            {{ $culture->titre }}
                                        </a>
                                    </h4>

                                    <!-- Description courte -->
                                    <p>{{ Str::limit($culture->description, 120) }}</p>

                                    <!-- Vidéo YouTube -->
                                    @if ($culture->lien_youtube1 || $culture->lien_youtube2)
                                        <div class="culture-video mb-3">
                                            @php
                                                $videoLink = $culture->lien_youtube1 ?? $culture->lien_youtube2;
                                                // Extraire l'ID de la vidéo YouTube
preg_match(
    '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i',
                                                    $videoLink,
                                                    $match,
                                                );
                                                $videoId = $match[1] ?? null;
                                            @endphp

                                            @if ($videoId)
                                                <div class="ratio ratio-16x9">
                                                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                                                        title="{{ $culture->titre }}" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                            @else
                                                <a href="{{ $videoLink }}" target="_blank"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <i class="fab fa-youtube"></i>
                                                    {{ __('maisonduvillage.culture.watch_video') }}
                                                </a>
                                            @endif
                                        </div>
                                    @endif


                                    <!-- Bouton En savoir plus -->
                                    <a href="{{ route('cultures.index', $culture->id) }}" class="theme-btn-2 mt-3">
                                        {{ __('maisonduvillage.buttons.learn_more') }}
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                <i class="fa-solid fa-info-circle"></i>
                                {{ __('maisonduvillage.culture.no_cultures') }}
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <style>
        .culture-video {
            margin: 15px 0;
        }

        .culture-video iframe {
            border-radius: 8px;
        }

        .culture-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .service-card-items {
            transition: transform 0.3s ease;
        }

        .service-card-items:hover {
            transform: translateY(-5px);
        }
    </style>












    <section class="service-section-3 pb-0 fix section-padding bg-cover"
        style="background-image: url('assets/img/service/service-bg-3.jpg');">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span>{{ __('maisonduvillage.training.section_title') }}</span>
                    <h2>{!! __('maisonduvillage.training.section_subtitle') !!}</h2>
                </div>
                <a href="formations.html" class="theme-btn">
                    {{ __('maisonduvillage.training.view_all') }}
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="formations-container">
                <div class="row">
                    @foreach ($informatique as $info)
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-2">
                            <div class="service-card-items h-100">
                                <div class="service-image">
                                    @if ($info->image)
                                        <img src="{{ asset('storage/' . $info->image) }}" alt="{{ $info->titre }}">
                                    @else
                                        <img src="{{ asset('assets/img/service/02.jpg') }}"
                                            alt="{{ __('maisonduvillage.training.default_image') }}">
                                    @endif
                                </div>
                                <div class="icon-2">
                                    <img src="{{ asset('assets/img/service/icon/s-icon-1.svg') }}" alt="icon">
                                </div>
                                <div class="service-content">
                                    <div class="icon">
                                        <img src="{{ asset('assets/img/service/icon/s-icon-1.svg') }}" alt="icon">
                                    </div>
                                    <h4><a href="">{{ $info->titre }}</a></h4>
                                    <p>{{ Str::limit($info->description, 100) }}</p>
                                    <div class="formation-meta">
                                        @if ($info->duree)
                                            <span class="badge bg-primary">{{ $info->duree }}
                                                {{ __('maisonduvillage.training.hours') }}</span>
                                        @endif
                                        @if ($info->date_debut)
                                            <span
                                                class="badge bg-success">{{ \Carbon\Carbon::parse($info->date_debut)->format('d/m/Y') }}</span>
                                        @endif
                                        @if ($info->lieu)
                                            <small class="text-muted d-block mt-1">📍 {{ $info->lieu }}</small>
                                        @endif
                                        @if ($info->formateur)
                                            <small class="text-muted d-block">👨‍🏫 {{ $info->formateur }}</small>
                                        @endif
                                    </div>
                                    <a href="{{ route('site.informatique.show', $info->id) }}" class="theme-btn-2 mt-3">
                                        {{ __('maisonduvillage.buttons.learn_more') }}
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
        @media (min-width: 1200px) {
            .formations-container .row {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                justify-content: space-between;
                margin: 0 -5px;
            }

            .formations-container .col-xl-4 {
                flex: 1;
                min-width: 280px;
                max-width: calc(33.33% - 7px);
                padding: 0 5px;
            }

            .service-card-items {
                height: 100%;
                display: flex;
                flex-direction: column;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                margin-bottom: 10px;
            }

            .service-card-items:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            .service-content {
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }

            .formation-meta {
                margin-top: auto;
                padding-top: 15px;
            }

            .theme-btn-2 {
                margin-top: auto;
            }
        }

        @media (min-width: 1400px) {
            .formations-container .row {
                gap: 15px;
                margin: 0 -7px;
            }

            .formations-container .col-xl-4 {
                max-width: calc(33.33% - 10px);
                padding: 0 7px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .formations-container .col-lg-6 {
                flex: 0 0 49%;
                max-width: 49%;
                padding: 0 5px;
            }

            .formations-container .row {
                gap: 10px;
                margin: 0 -5px;
            }
        }

        .service-card-items {
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .service-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .formation-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .formation-meta .badge {
            font-size: 0.75rem;
            padding: 4px 8px;
        }

        .formation-meta small {
            font-size: 0.8rem;
            width: 100%;
            margin-top: 5px;
        }
    </style>

    <section class="work-process-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <span>{{ __('maisonduvillage.process.subtitle') }}</span>
                <h2>{{ __('maisonduvillage.process.title') }}</h2>
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
                                <h6 class="number">1</h6>
                            </div>
                            <div class="content">
                                <h4>{{ __('maisonduvillage.process.step1.title') }}</h4>
                                <p>{{ __('maisonduvillage.process.step1.description') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="work-process-items text-center">
                            <div class="content style-2">
                                <h4>{{ __('maisonduvillage.process.step2.title') }}</h4>
                                <p>{{ __('maisonduvillage.process.step2.description') }}</p>
                            </div>
                            <div class="icon">
                                <img src="assets/img/process/02.svg" alt="img">
                                <h6 class="number">2</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="work-process-items text-center">
                            <div class="icon">
                                <img src="assets/img/process/03.svg" alt="img">
                                <h6 class="number">3</h6>
                            </div>
                            <div class="content">
                                <h4>{{ __('maisonduvillage.process.step3.title') }}</h4>
                                <p>{{ __('maisonduvillage.process.step3.description') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="work-process-items text-center">
                            <div class="content style-2">
                                <h4>{{ __('maisonduvillage.process.step4.title') }}</h4>
                                <p>{{ __('maisonduvillage.process.step4.description') }}</p>
                            </div>
                            <div class="icon">
                                <img src="assets/img/process/04.svg" alt="img">
                                <h6 class="number">4</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="achievement-section-3 fix section-bg-2">
        <div class="shape-image">
            <img src="assets/img/achiv-shape.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="achievement-wrapper style-2">
                <div class="section-title mb-0">
                    <span class="text-white wow fadeInUp">{{ __('maisonduvillage.achievement.subtitle') }}</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                        {!! __('maisonduvillage.achievement.title') !!}
                    </h2>
                </div>
                <div class="counter-area">
                    <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/01.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">6,561</span>+</h2>
                            <p>{{ __('maisonduvillage.achievement.satisfied_clients') }}</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".5s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/02.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">600</span>+</h2>
                            <p>{{ __('maisonduvillage.achievement.finished_projects') }}</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".7s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/03.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">250</span>+</h2>
                            <p>{{ __('maisonduvillage.achievement.skilled_experts') }}</p>
                        </div>
                    </div>
                    <div class="counter-items wow fadeInUp" data-wow-delay=".9s">
                        <div class="icon">
                            <img src="assets/img/achievement-icon/04.svg" alt="icon-img">
                        </div>
                        <div class="content">
                            <h2><span class="count">5,90</span>+</h2>
                            <p>{{ __('maisonduvillage.achievement.media_posts') }}</p>
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
                    <span class="text-white">{{ __('maisonduvillage.projects.subtitle') }}</span>
                    <h2 class="text-white">{{ __('maisonduvillage.projects.title') }}</h2>
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

    <div class="marque-section section-padding">
        <div class="container-fluid">
            <div class="marquee-wrapper style-2 text-slider">
                <div class="marquee-inner to-left">
                    <ul class="marqee-list d-flex">
                        <li class="marquee-item style-2">
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.cyber_security') }}</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.it_solution') }}</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.technology') }}</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.data_security') }}</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.cyber_security') }}</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.it_solution') }}</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.technology') }}</span>
                            <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span
                                class="text-slider text-style">{{ __('maisonduvillage.marquee.data_security') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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
                    <span class="wow fadeInUp">{{ __('maisonduvillage.team.subtitle') }}</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        {!! __('maisonduvillage.team.title') !!}
                    </h2>
                </div>
                <a href="team.html" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
                    {{ __('maisonduvillage.team.view_all') }}
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="team-container">
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-2 wow fadeInUp" data-wow-delay=".3s">
                            <div class="single-team-items modern-card">
                                <div class="team-image-wrapper">
                                    <div class="team-image">
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="team-img">
                                        <div class="image-overlay">
                                            <div class="social-profile">
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-badge">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="team-header">
                                        <h3><a href="team-details.html">{{ $team->name }}</a></h3>
                                        <span class="team-role">{{ $team->fonction }}</span>
                                    </div>
                                    <div class="team-description">
                                        <p>{{ Str::limit($team->presentation, 80) }}</p>
                                    </div>
                                    <div class="team-footer">
                                        <a href="{{ route('equipe.show', $team->id) }}" class="view-profile-btn">
                                            <span>{{ __('maisonduvillage.team.view_profile') }}</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
        .team-container {
            margin-top: 50px;
        }

        @media (min-width: 1200px) {
            .team-container .row {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                justify-content: space-between;
                margin: 0 -7px;
            }

            .team-container .col-xl-3 {
                flex: 1;
                min-width: 280px;
                max-width: calc(25% - 12px);
                padding: 0 7px;
            }
        }

        @media (min-width: 1400px) {
            .team-container .row {
                gap: 20px;
                margin: 0 -10px;
            }

            .team-container .col-xl-3 {
                max-width: calc(25% - 15px);
                padding: 0 10px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .team-container .col-lg-4 {
                flex: 0 0 32%;
                max-width: 32%;
                padding: 0 5px;
            }

            .team-container .row {
                gap: 10px;
                margin: 0 -5px;
            }
        }

        .single-team-items.modern-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            height: 100%;
        }

        .single-team-items.modern-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .single-team-items.modern-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px 20px 0 0;
        }

        .team-image-wrapper {
            position: relative;
            padding: 25px 25px 15px;
        }

        .team-image {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            aspect-ratio: 1;
        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .single-team-items.modern-card:hover .team-image img {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .single-team-items.modern-card:hover .image-overlay {
            opacity: 1;
        }

        .social-profile ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
        }

        .social-profile ul li a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .social-profile ul li a:hover {
            background: rgba(255, 255, 255, 0.9);
            color: #667eea;
            transform: scale(1.1);
        }

        .team-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .team-content {
            padding: 20px 25px 25px;
            text-align: left;
        }

        .team-header {
            margin-bottom: 15px;
        }

        .team-header h3 {
            margin: 0 0 8px 0;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .team-header h3 a {
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .team-header h3 a:hover {
            color: #667eea;
        }

        .team-role {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .team-description {
            margin: 15px 0;
        }

        .team-description p {
            color: #6c757d;
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0;
        }

        .team-footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .view-profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .view-profile-btn:hover {
            color: #764ba2;
            gap: 12px;
        }

        .view-profile-btn i {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .view-profile-btn:hover i {
            transform: translateX(3px);
        }

        @media (max-width: 768px) {
            .team-container .row {
                gap: 15px;
            }

            .single-team-items.modern-card {
                margin-bottom: 20px;
            }

            .team-image-wrapper {
                padding: 20px 20px 10px;
            }

            .team-content {
                padding: 15px 20px 20px;
            }
        }

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

        .single-team-items.modern-card {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>

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
                <span class="text-white">{{ __('maisonduvillage.testimonials.subtitle') }}</span>
                <h2 class="text-white">{{ __('maisonduvillage.testimonials.title') }}</h2>
            </div>
            <div class="swiper testimonial-slider-2">
                <div class="swiper-wrapper">
                    @foreach ($temoignages as $temoignage)
                        <div class="swiper-slide">
                            <div class="testimonial-box-items">
                                <div class="icon">
                                    <img src="assets/img/testimonial/icon.png" alt="icon-img">
                                </div>
                                <div class="client-items">
                                    <div class="client-image style-2 bg-cover"
                                        style="background-image: url('{{ $temoignage->photo ? asset('storage/' . $temoignage->photo) : asset('assets/img/testimonial/default.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                    </div>
                                    <div class="client-content">
                                        <h4>{{ $temoignage->name }}</h4>
                                        <p>{{ $temoignage->fonction }}</p>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p>{{ $temoignage->contenu }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
        .client-image.style-2 {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }
    </style>

    <section class="news-section-3 fix section-padding">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="wow fadeInUp">{{ __('maisonduvillage.blog.subtitle') }}</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        {!! __('maisonduvillage.blog.title') !!}
                    </h2>
                </div>
                <div class="array-button">
                    <button class="array-prev"><i class="fal fa-arrow-right"></i></button>
                    <button class="array-next"><i class="fal fa-arrow-left"></i></button>
                </div>
            </div>
            <div class="swiper news-slider">
                <div class="swiper-wrapper">
                    @forelse($posts as $post)
                        <div class="swiper-slide">
                            <div class="news-card-items style-2">
                                <div class="news-image">
                                    <img src="{{ $post->cover_image ? asset('storage/' . $post->cover_image) : asset('assets/img/news/default.jpg') }}"
                                        alt="{{ $post->slug }}">
                                    <div class="post-date">
                                        <h3>
                                            {{ $post->published_at ? $post->published_at->format('d') : $post->created_at->format('d') }}
                                            <br>
                                            <span>{{ $post->published_at ? __('maisonduvillage.months.' . strtolower($post->published_at->format('M'))) : __('maisonduvillage.months.' . strtolower($post->created_at->format('M'))) }}</span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <ul>
                                        <li>
                                            <i class="fa-regular fa-user"></i>
                                            {{ $post->author->name ?? 'Admin' }}
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-tag"></i>
                                            {{ $post->category ?? __('maisonduvillage.blog.it_services') }}
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="">
                                            {{ Str::limit(strip_tags($post->contenu), 80) }}
                                        </a>
                                    </h3>
                                    <p class="mt-2">
                                        {{ Str::limit(strip_tags($post->contenu), 150) }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="news-card-items style-2">
                                <div class="news-content">
                                    <p>{{ __('maisonduvillage.blog.no_posts') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
