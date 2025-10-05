@extends('front.layouts.app')

@section('content')
<!-- Search Bar -->
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

<!-- Breadcrumb Section -->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/vilatof.jpeg') }}');">
    <div class="border-shape">
        <img src="{{ asset('assets/img/element.png') }}" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="{{ asset('assets/img/line-element.png') }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $post->title ?? 'Blog Details' }}</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>Blog Details</li>
            </ul>
        </div>
    </div>
</div>

<!-- Blog Details Section -->
<section class="news-standard fix section-padding">
    <div class="container">
        <div class="news-details-area">
            <div class="row g-5">
                <!-- Main Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-post-details">
                        <div class="single-blog-post">
                            <!-- Post Image & Content - Horizontal Layout on Large Screens -->
                            <div class="row g-4 align-items-start">
                                <!-- Post Image -->
                                <div class="col-12 col-md-5">
                                    <div class="post-featured-thumb bg-cover"
                                         style="background-image: url('{{ asset('storage/' . $post->cover_image) }}');
                                                height: 100%;
                                                min-height: 350px;
                                                border-radius: 15px;
                                                box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                                    </div>
                                </div>

                                <!-- Post Content -->
                                <div class="col-12 col-md-7">
                                    <div class="post-content">
                                        <ul class="post-list d-flex align-items-center flex-wrap" style="gap: 15px; margin-bottom: 20px;">
                                            <li style="display: flex; align-items: center; gap: 8px; color: #666; font-size: 14px;">
                                                <i class="fa-regular fa-user" style="color: #ff6b2c;"></i>
                                                Par {{ $post->author->name ?? 'Admin' }}
                                            </li>
                                            <li style="display: flex; align-items: center; gap: 8px; color: #666; font-size: 14px;">
                                                <i class="fa-solid fa-calendar-days" style="color: #ff6b2c;"></i>
                                                {{ \Carbon\Carbon::parse($post->published_at)->format('d M, Y') }}
                                            </li>
                                            <li style="display: flex; align-items: center; gap: 8px; color: #666; font-size: 14px;">
                                                <i class="fa-solid fa-tag" style="color: #ff6b2c;"></i>
                                                {{ $post->category->name ?? 'Actualité' }}
                                            </li>
                                        </ul>

                                        <h3 style="font-size: 28px; font-weight: 700; color: #1a1a1a; margin-bottom: 20px; line-height: 1.4;">
                                            {{ $post->title }}
                                        </h3>

                                        <div class="post-excerpt" style="color: #666; font-size: 16px; line-height: 1.8;">
                                            {!! Str::limit($post->contenu, 400) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Full Content Section -->
                            <div class="full-content mt-5" style="color: #555; font-size: 16px; line-height: 1.9;">
                                <div class="content-body">
                                    {!! $post->contenu !!}
                                </div>
                            </div>
                        </div>

                        <!-- Tags and Share Section -->
                        <div class="row tag-share-wrap mt-5 mb-5" style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                            <div class="col-lg-8 col-12">
                                <div class="tagcloud">
                                    <span style="font-weight: 600; color: #1a1a1a; margin-right: 15px;">Tags:</span>
                                    @if(isset($post->tags) && count($post->tags) > 0)
                                        @foreach($post->tags as $tag)
                                            <a href="#" style="display: inline-block; background: #fff; padding: 8px 20px; margin: 5px; border-radius: 25px; color: #666; text-decoration: none; border: 1px solid #e0e0e0; transition: all 0.3s ease; font-size: 14px;">
                                                {{ $tag->name }}
                                            </a>
                                        @endforeach
                                    @else
                                        <a href="#" style="display: inline-block; background: #fff; padding: 8px 20px; margin: 5px; border-radius: 25px; color: #666; text-decoration: none; border: 1px solid #e0e0e0;">Actualité</a>
                                        <a href="#" style="display: inline-block; background: #fff; padding: 8px 20px; margin: 5px; border-radius: 25px; color: #666; text-decoration: none; border: 1px solid #e0e0e0;">Événement</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                <div class="social-share" style="display: flex; align-items: center; justify-content: flex-end; gap: 15px;">
                                    <span style="font-weight: 600; color: #1a1a1a;">Partager:</span>
                                    <a href="#" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #fff; border-radius: 50%; color: #3b5998; transition: all 0.3s ease; text-decoration: none; border: 1px solid #e0e0e0;">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #fff; border-radius: 50%; color: #1da1f2; transition: all 0.3s ease; text-decoration: none; border: 1px solid #e0e0e0;">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #fff; border-radius: 50%; color: #0077b5; transition: all 0.3s ease; text-decoration: none; border: 1px solid #e0e0e0;">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #fff; border-radius: 50%; color: #25d366; transition: all 0.3s ease; text-decoration: none; border: 1px solid #e0e0e0;">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="comments-area" style="background: #fff; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-top: 40px;">
                            <div class="comments-heading" style="border-bottom: 2px solid #ff6b2c; padding-bottom: 15px; margin-bottom: 30px;">
                                <h3 style="font-size: 28px; font-weight: 700; color: #1a1a1a;">
                                    <i class="fa-regular fa-comments" style="color: #ff6b2c; margin-right: 10px;"></i>
                                    {{ count($post->comments ?? []) }} Commentaire(s)
                                </h3>
                            </div>
                            @forelse($post->comments ?? [] as $comment)
                                <div class="blog-single-comment d-flex gap-4 pt-4 pb-4" style="border-bottom: 1px solid #e0e0e0;">
                                   
                                    <div class="content" style="flex: 1;">
                                        <div class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                            <div class="con">
                                                <h5 style="font-size: 18px; font-weight: 600; color: #1a1a1a; margin-bottom: 5px;">{{ $comment->nom }}</h5>
                                                <span style="color: #999; font-size: 14px;">
                                                    <i class="fa-regular fa-clock" style="margin-right: 5px;"></i>
                                                    {{ $comment->created_at->format('d M, Y à H:i') }}
                                                </span>
                                            </div>
                                            <div class="star" style="color: #ffc107;">
                                                @for($i = 0; $i < 5; $i++)
                                                    <i class="fa-solid fa-star" style="font-size: 14px;"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p style="margin-top: 15px; margin-bottom: 15px; color: #666; line-height: 1.7;">{{ $comment->message }}</p>
                                        <a href="#" class="reply" style="color: #ff6b2c; font-weight: 600; text-decoration: none; font-size: 14px;">
                                            <i class="fa-solid fa-reply" style="margin-right: 5px;"></i>
                                            Répondre
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <i class="fa-regular fa-comment-dots" style="font-size: 60px; color: #ddd; margin-bottom: 20px;"></i>
                                    <p style="color: #999; font-size: 16px;">Aucun commentaire pour le moment. Soyez le premier à commenter!</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Comment Form Section -->
                        <div class="comment-form-wrap pt-5" style="background: #fff; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-top: 30px;">
                            <h3 style="font-size: 28px; font-weight: 700; color: #1a1a1a; margin-bottom: 10px;">
                                <i class="fa-regular fa-pen-to-square" style="color: #ff6b2c; margin-right: 10px;"></i>
                                Laissez un Commentaire
                            </h3>
                            <p style="color: #666; margin-bottom: 30px;">Votre adresse email ne sera pas publiée. Les champs obligatoires sont marqués *</p>
                            <form action="{{ route('blog.comment', $post->slug) }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <label style="display: block; margin-bottom: 10px; color: #1a1a1a; font-weight: 600;">Nom complet *</label>
                                            <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Votre nom" required style="width: 100%; padding: 15px 20px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 15px; transition: all 0.3s ease;">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <label style="display: block; margin-bottom: 10px; color: #1a1a1a; font-weight: 600;">Adresse Email *</label>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Votre email" required style="width: 100%; padding: 15px 20px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 15px; transition: all 0.3s ease;">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <label style="display: block; margin-bottom: 10px; color: #1a1a1a; font-weight: 600;">Message *</label>
                                            <textarea name="message" placeholder="Écrivez votre commentaire ici..." required style="width: 100%; padding: 15px 20px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 15px; min-height: 150px; resize: vertical; transition: all 0.3s ease;">{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="theme-btn" style="background: linear-gradient(135deg, #ff6b2c, #ff8c42); color: #fff; padding: 15px 40px; border: none; border-radius: 50px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 10px;">
                                            <i class="fa-regular fa-paper-plane"></i>
                                            Publier le Commentaire
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar">
                        <!-- Search Widget -->
                        <div class="single-sidebar-widget" style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px;">
                            <div class="wid-title">
                                <h3 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 20px;">Rechercher</h3>
                            </div>
                            <div class="search-widget">
                                <form action="#">
                                    <input type="text" placeholder="Rechercher un article..." style="width: 100%; padding: 15px 20px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 15px;">
                                    <button type="submit" style="position: absolute; right: 40px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #ff6b2c; font-size: 18px; cursor: pointer;">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="single-sidebar-widget" style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                            <div class="wid-title">
                                <h3 style="font-size: 22px; font-weight: 700; color: #1a1a1a; margin-bottom: 20px;">Articles Récents</h3>
                            </div>
                            <div class="recent-post-area">
                                <!-- Add recent posts here -->
                                <p style="color: #666;">Chargement des articles récents...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Hover Effects */
.tagcloud a:hover {
    background: #ff6b2c !important;
    color: #fff !important;
    border-color: #ff6b2c !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255,107,44,0.3);
}

.social-share a:hover {
    background: #ff6b2c !important;
    color: #fff !important;
    border-color: #ff6b2c !important;
    transform: translateY(-3px);
}

.form-clt input:focus,
.form-clt textarea:focus {
    border-color: #ff6b2c !important;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255,107,44,0.1);
}

.theme-btn:hover {
    background: linear-gradient(135deg, #ff8c42, #ff6b2c) !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255,107,44,0.3);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .post-featured-thumb {
        min-height: 250px !important;
    }

    .post-content h3 {
        font-size: 22px !important;
    }

    .social-share {
        justify-content: flex-start !important;
    }
}

/* Content Styling */
.content-body img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 20px 0;
}

.content-body p {
    margin-bottom: 20px;
}

.content-body h1, .content-body h2, .content-body h3 {
    margin-top: 30px;
    margin-bottom: 15px;
    color: #1a1a1a;
}
</style>

@endsection
