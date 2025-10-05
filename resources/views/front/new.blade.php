{{-- @extends('front.layouts.app')
@section('content')
 <!-- Search Area Start -->
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

<!--<< Breadcrumb Section Start >>-->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/vilatof.jpeg');">
    <div class="border-shape">
        <img src="assets/img/element.png" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="assets/img/line-element.png" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">NOS ACTUALITES</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
                <li>
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li>
                    Blog Grid
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- News Section Start -->
<section class="news-section section-padding">
    <div class="container">
        <div class="row">
            @foreach ($post as $poster)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="news-card-items style-2 mt-0 pb-0">
                    <div class="news-image">
                        <img src="{{ asset('storage/' . $poster->cover_image) }}" alt="news-img">
                        <div class="post-date">
                            <h3>
                                {{ $poster->published_at ? $poster->published_at->format('d') : '' }} <br>
                                <span>{{ $poster->published_at ? $poster->published_at->format('M') : '' }}</span>
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
                            <a href="{{ route('blog.show', $poster->slug) }}">{{ $poster->title }}</a>
                        </h3>
                        <a href="{{ route('blog.show', $poster->slug) }}" class="theme-btn-2 mt-3">
                            Read More
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection --}}


@extends('front.layouts.app')
@section('content')
 <!-- Search Area Start -->
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

<!--<< Breadcrumb Section Start >>-->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/vilatof.jpeg');">
    <div class="border-shape">
        <img src="assets/img/element.png" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="assets/img/line-element.png" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">NOS ACTUALITÉS</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="index.html">
                        Accueil
                    </a>
                </li>
                <li>
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li>
                    Actualités
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- News Section Start -->
<section class="news-section section-padding" style="padding: 80px 0;">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="section-title wow fadeInUp" data-wow-delay=".2s">
                    <span class="sub-title" style="color: #ff6b2c; font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">
                        <i class="fas fa-newspaper"></i> Restez Informés
                    </span>
                    <h2 class="mt-3" style="font-size: 42px; font-weight: 700; color: #1a1a1a;">
                        Dernières Actualités & Événements
                    </h2>
                    <p class="mt-3" style="font-size: 18px; color: #666; max-width: 700px; margin: 0 auto;">
                        Découvrez les dernières nouvelles, événements et mises à jour de notre communauté.
                        Restez connectés avec nous pour ne rien manquer.
                    </p>
                </div>
            </div>
        </div>

        <!-- Blog Posts Grid -->
        <div class="row g-4">
            @foreach ($post as $index => $poster)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.3 + ($index * 0.2) }}s">
                <div class="news-card-items style-2 mt-0 pb-0" style="border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; background: #fff;">
                    <div class="news-image" style="position: relative; overflow: hidden;">
                        <img src="{{ asset('storage/' . $poster->cover_image) }}" alt="news-img" style="width: 100%; height: 280px; object-fit: cover; transition: transform 0.5s ease;">
                        <div class="post-date" style="position: absolute; top: 20px; left: 20px; background: linear-gradient(135deg, #ff6b2c, #ff8c42); padding: 15px 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 15px rgba(255,107,44,0.4);">
                            <h3 style="color: #fff; margin: 0; font-size: 28px; font-weight: 700; line-height: 1.2;">
                                {{ $poster->published_at ? $poster->published_at->format('d') : '00' }} <br>
                                <span style="font-size: 14px; font-weight: 500; text-transform: uppercase; letter-spacing: 1px;">
                                    {{ $poster->published_at ? $poster->published_at->format('M') : 'Jan' }}
                                </span>
                            </h3>
                        </div>
                        <!-- Overlay on hover -->
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,107,44,0.85); opacity: 0; transition: opacity 0.4s ease; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-arrow-right" style="color: #fff; font-size: 40px;"></i>
                        </div>
                    </div>
                    <div class="news-content" style="padding: 30px 25px;">
                        <ul style="display: flex; gap: 20px; margin-bottom: 15px; padding: 0; list-style: none;">
                            <li style="color: #999; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-regular fa-user" style="color: #ff6b2c;"></i>
                                Par Admin
                            </li>
                            <li style="color: #999; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-tag" style="color: #ff6b2c;"></i>
                                {{ $poster->category ?? 'Actualité' }}
                            </li>
                        </ul>
                        <h3 style="font-size: 22px; font-weight: 700; line-height: 1.4; margin-bottom: 15px;">
                            <a href="{{ route('blog.show', $poster->slug) }}" style="color: #1a1a1a; text-decoration: none; transition: color 0.3s ease;">
                                {{ Str::limit($poster->title, 60) }}
                            </a>
                        </h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.7; margin-bottom: 20px;">
                            {{ Str::limit(strip_tags($poster->excerpt ?? $poster->content), 100) }}
                        </p>
                        <a href="{{ route('blog.show', $poster->slug) }}" class="theme-btn-2 mt-3" style="display: inline-flex; align-items: center; gap: 10px; color: #ff6b2c; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">
                            Lire la suite
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination or Load More -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="pagination-wrap wow fadeInUp" data-wow-delay=".5s">
                </div>
            </div>
        </div>

        <!-- Newsletter Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="newsletter-box wow fadeInUp" data-wow-delay=".3s" style="background: linear-gradient(135deg, #ff6b2c, #ff8c42); padding: 50px 40px; border-radius: 20px; text-align: center; box-shadow: 0 10px 30px rgba(255,107,44,0.3);">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-lg-start text-center mb-4 mb-lg-0">
                            <h3 style="color: #fff; font-size: 32px; font-weight: 700; margin-bottom: 10px;">
                                <i class="fas fa-envelope-open-text me-2"></i>
                                Abonnez-vous à notre Newsletter
                            </h3>
                            <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin: 0;">
                                Recevez les dernières actualités directement dans votre boîte mail
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <form class="newsletter-form" style="display: flex; gap: 10px;">
                                <input type="email" placeholder="Votre adresse email" style="flex: 1; padding: 15px 20px; border: none; border-radius: 50px; font-size: 15px;">
                                <button type="submit" style="padding: 15px 35px; background: #1a1a1a; color: #fff; border: none; border-radius: 50px; font-weight: 600; cursor: pointer; white-space: nowrap; transition: all 0.3s ease;">
                                    S'abonner
                                    <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Stats Section -->
        <div class="row mt-5 g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="stats-card" style="background: #fff; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: transform 0.3s ease;">
                    <i class="fas fa-newspaper" style="font-size: 40px; color: #ff6b2c; margin-bottom: 15px;"></i>
                    <h3 style="font-size: 36px; font-weight: 700; color: #1a1a1a; margin-bottom: 5px;"></h3>
                    <p style="color: #666; margin: 0;">Articles Publiés</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="stats-card" style="background: #fff; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: transform 0.3s ease;">
                    <i class="fas fa-users" style="font-size: 40px; color: #ff6b2c; margin-bottom: 15px;"></i>
                    <h3 style="font-size: 36px; font-weight: 700; color: #1a1a1a; margin-bottom: 5px;">5K+</h3>
                    <p style="color: #666; margin: 0;">Lecteurs Actifs</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="stats-card" style="background: #fff; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: transform 0.3s ease;">
                    <i class="fas fa-calendar-check" style="font-size: 40px; color: #ff6b2c; margin-bottom: 15px;"></i>
                    <h3 style="font-size: 36px; font-weight: 700; color: #1a1a1a; margin-bottom: 5px;">50+</h3>
                    <p style="color: #666; margin: 0;">Événements Organisés</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="stats-card" style="background: #fff; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: transform 0.3s ease;">
                    <i class="fas fa-heart" style="font-size: 40px; color: #ff6b2c; margin-bottom: 15px;"></i>
                    <h3 style="font-size: 36px; font-weight: 700; color: #1a1a1a; margin-bottom: 5px;">10K+</h3>
                    <p style="color: #666; margin: 0;">Membres Satisfaits</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.news-card-items:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important;
}

.news-card-items:hover .news-image img {
    transform: scale(1.1);
}

.news-card-items:hover .overlay {
    opacity: 1;
}

.news-content h3 a:hover {
    color: #ff6b2c !important;
}

.theme-btn-2:hover {
    gap: 15px !important;
    color: #ff8c42 !important;
}

.stats-card:hover {
    transform: translateY(-5px);
}

.newsletter-form button:hover {
    background: #000 !important;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .newsletter-form {
        flex-direction: column;
    }

    .newsletter-form button {
        width: 100%;
    }
}
</style>

@endsection
