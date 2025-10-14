@extends('front.layouts.app')
@section('content')
<section class="service-section-3 pb-0 fix section-padding bg-cover"
    style="background-image: url('assets/img/service/service-bg-3.jpg');">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span>Our Culture</span>
                <h2>Discover Our Rich Cultural Heritage</h2>
            </div>
            <a href="{{ route('cultures.index') }}" class="theme-btn">
                View All
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>

        <div class="cultures-container">
            <div class="row">
                @forelse ($cultures as $culture)
                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                        <div class="service-card-items h-100" data-culture-id="{{ $culture->id }}">
                            <!-- Image principale -->
                            <div class="service-image">
                                @if ($culture->image1)
                                    <img src="{{ asset('storage/' . $culture->image1) }}"
                                        alt="{{ $culture->titre }}" class="img-fluid">
                                @elseif ($culture->image2)
                                    <img src="{{ asset('storage/' . $culture->image2) }}"
                                        alt="{{ $culture->titre }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('assets/img/service/02.jpg') }}" alt="Default culture image"
                                        class="img-fluid">
                                @endif

                                <!-- Compteur de likes sur l'image -->
                                <div class="likes-badge">
                                    <i class="fa-solid fa-heart"></i>
                                    <span class="likes-count">{{ $culture->likes_count ?? 0 }}</span>
                                </div>
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
                                    <a href="{{ route('cultures.show', $culture->id) }}">
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
                                                Watch Video
                                            </a>
                                        @endif
                                    </div>
                                @endif

                                <!-- Actions : Like et Commentaires -->
                                <div class="culture-actions d-flex justify-content-between align-items-center mb-3">
                                    <!-- Bouton Like -->
                                    <button
                                        class="btn-like {{ ($culture->isLiked ?? false) ? 'liked' : '' }}"
                                        data-culture-id="{{ $culture->id }}"
                                        onclick="toggleLike(this, {{ $culture->id }})">
                                        <i class="fa-solid fa-heart"></i>
                                        <span class="like-text">{{ ($culture->isLiked ?? false) ? 'Liked' : 'Like' }}</span>
                                        <span class="like-count">({{ $culture->likes_count ?? 0 }})</span>
                                    </button>

                                    <!-- Nombre de commentaires -->
                                    <div class="comments-count">
                                        <i class="fa-solid fa-comments"></i>
                                        <span class="comments-number">{{ $culture->culturecommentaires_count ?? 0 }}</span> comments
                                    </div>
                                </div>

                                <!-- Bouton En savoir plus -->
                                <a href="{{ route('cultures.show', $culture->id) }}" class="theme-btn-2 mt-3">
                                    Learn more
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="fa-solid fa-info-circle"></i>
                            No cultures available at the moment
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

    .service-card-items {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .service-card-items:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .service-image {
        position: relative;
        overflow: hidden;
        border-radius: 8px 8px 0 0;
        height: 250px;
    }

    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .service-card-items:hover .service-image img {
        transform: scale(1.05);
    }

    .likes-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.95);
        padding: 8px 15px;
        border-radius: 25px;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(5px);
        transition: all 0.3s ease;
    }

    .service-card-items:hover .likes-badge {
        transform: scale(1.05);
    }

    .likes-badge i {
        color: #e74c3c;
        font-size: 16px;
    }

    .service-content {
        padding: 25px;
    }

    .service-content h4 {
        margin: 15px 0;
        font-size: 1.3rem;
        font-weight: 700;
    }

    .service-content h4 a {
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .service-content h4 a:hover {
        color: #3498db;
    }

    .service-content p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .culture-actions {
        border-top: 1px solid #eee;
        padding-top: 15px;
        margin-top: 15px;
    }

    .btn-like {
        background: transparent;
        border: 2px solid #e0e0e0;
        padding: 8px 16px;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        font-weight: 500;
        color: #666;
    }

    .btn-like i {
        font-size: 16px;
        transition: all 0.3s ease;
        color: #999;
    }

    .btn-like:hover {
        border-color: #e74c3c;
        background: #fff5f5;
        color: #e74c3c;
    }

    .btn-like:hover i {
        color: #e74c3c;
    }

    .btn-like.liked {
        border-color: #e74c3c;
        background: #e74c3c;
        color: white;
    }

    .btn-like.liked i {
        color: white;
        animation: heartBeat 0.5s ease;
    }

    @keyframes heartBeat {
        0%, 100% { transform: scale(1); }
        25% { transform: scale(1.3); }
        50% { transform: scale(1.1); }
    }

    .comments-count {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #666;
        font-size: 14px;
    }

    .comments-count i {
        color: #3498db;
        font-size: 16px;
    }

    .btn-like:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .theme-btn-2 {
        display: inline-block;
        padding: 10px 20px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .theme-btn-2:hover {
        background: #2980b9;
        transform: translateX(5px);
        color: white;
    }

    /* Notification toast */
    .toast-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: slideInRight 0.3s ease;
        min-width: 300px;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .toast-notification.success {
        border-left: 4px solid #27ae60;
    }

    .toast-notification.error {
        border-left: 4px solid #e74c3c;
    }

    .toast-notification i {
        font-size: 20px;
    }

    .toast-notification.success i {
        color: #27ae60;
    }

    .toast-notification.error i {
        color: #e74c3c;
    }

    .toast-close {
        margin-left: auto;
        cursor: pointer;
        color: #999;
    }
</style>

<script>
    // Fonction pour afficher une notification toast
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast-notification ${type}`;
        toast.innerHTML = `
            <i class="fa-solid fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
            <span class="toast-close" onclick="this.parentElement.remove()">
                <i class="fa-solid fa-times"></i>
            </span>
        `;
        document.body.appendChild(toast);

        // Auto-supprimer après 3 secondes
        setTimeout(() => toast.remove(), 3000);
    }

    // Fonction pour toggle le like
    function toggleLike(button, cultureId) {
        button.disabled = true;

        const isLiked = button.classList.contains('liked');
        const url = `/cultures/${cultureId}/${isLiked ? 'unlike' : 'like'}`;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Trouver la carte de culture
                const card = button.closest('.service-card-items');

                // Mettre à jour le bouton
                button.classList.toggle('liked');
                const likeText = button.querySelector('.like-text');
                const likeCount = button.querySelector('.like-count');

                likeText.textContent = isLiked ? 'Like' : 'Liked';
                likeCount.textContent = `(${data.likes_count})`;

                // Mettre à jour le badge
                const badgeCount = card.querySelector('.likes-badge .likes-count');
                if (badgeCount) {
                    badgeCount.textContent = data.likes_count;
                }

                // Animation du coeur
                if (!isLiked) {
                    const icon = button.querySelector('i');
                    icon.style.animation = 'heartBeat 0.5s ease';
                    setTimeout(() => icon.style.animation = '', 500);
                }

                // Afficher notification
                showToast(data.message, 'success');
            } else {
                showToast(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Une erreur est survenue. Veuillez réessayer.', 'error');
        })
        .finally(() => {
            button.disabled = false;
        });
    }
</script>

@endsection
