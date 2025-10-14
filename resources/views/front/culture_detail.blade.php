@extends('front.layouts.app')
@section('content')
<section class="culture-detail-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- En-tête de la culture -->
                <div class="culture-header mb-4">
                    <h1 class="culture-title">{{ $culture->titre }}</h1>

                    <!-- Stats -->
                    <div class="culture-stats d-flex align-items-center gap-4 mt-3">
                        <div class="stat-item">
                            <i class="fa-solid fa-heart text-danger"></i>
                            <span class="likes-count">{{ $culture->likes_count }}</span> likes
                        </div>
                        <div class="stat-item">
                            <i class="fa-solid fa-comments text-primary"></i>
                            <span class="comments-total">{{ $culture->culturecommentaires->count() }}</span> commentaires
                        </div>
                        <div class="stat-item">
                            <i class="fa-solid fa-calendar"></i>
                            {{ $culture->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="culture-images mb-4">
                    @if ($culture->image1)
                        <img src="{{ asset('storage/' . $culture->image1) }}"
                             alt="{{ $culture->titre }}"
                             class="img-fluid rounded mb-3">
                    @endif
                    @if ($culture->image2)
                        <img src="{{ asset('storage/' . $culture->image2) }}"
                             alt="{{ $culture->titre }}"
                             class="img-fluid rounded">
                    @endif
                </div>

                <!-- Description -->
                <div class="culture-description mb-4">
                    <p>{{ $culture->description }}</p>
                </div>

                <!-- Vidéos YouTube -->
                @if ($culture->lien_youtube1 || $culture->lien_youtube2)
                    <div class="culture-videos mb-4">
                        <h3>Videos</h3>
                        <div class="row">
                            @if ($culture->lien_youtube1)
                                <div class="col-md-6 mb-3">
                                    @php
                                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $culture->lien_youtube1, $match1);
                                        $videoId1 = $match1[1] ?? null;
                                    @endphp
                                    @if ($videoId1)
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/{{ $videoId1 }}"
                                                title="{{ $culture->titre }}" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if ($culture->lien_youtube2)
                                <div class="col-md-6 mb-3">
                                    @php
                                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $culture->lien_youtube2, $match2);
                                        $videoId2 = $match2[1] ?? null;
                                    @endphp
                                    @if ($videoId2)
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/{{ $videoId2 }}"
                                                title="{{ $culture->titre }}" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Bouton Like -->
                <div class="culture-like-section mb-5">
                    <button
                        class="btn-like-large {{ $culture->isLiked ? 'liked' : '' }}"
                        onclick="toggleLike(this, {{ $culture->id }})">
                        <i class="fa-solid fa-heart"></i>
                        <span class="like-text">{{ $culture->isLiked ? 'Vous aimez' : 'J\'aime' }}</span>
                        <span class="like-count">({{ $culture->likes_count }})</span>
                    </button>
                </div>

                <!-- Section des commentaires -->
                <div class="comments-section mb-5">
                    <h3 class="mb-4">
                        <i class="fa-solid fa-comments"></i>
                        Commentaires (<span class="comments-total">{{ $culture->culturecommentaires->count() }}</span>)
                    </h3>

                    <!-- Alert messages -->
                    <div id="alert-container"></div>

                    <!-- Liste des commentaires -->
                    <div class="comments-list mb-5" id="comments-list">
                        @forelse ($culture->culturecommentaires as $commentaire)
                            <div class="comment-item mb-4" id="comment-{{ $commentaire->id }}" data-comment-id="{{ $commentaire->id }}">
                                <div class="d-flex">
                                    <div class="comment-avatar">
                                        @if ($commentaire->photo)
                                            <img src="{{ asset('storage/' . $commentaire->photo) }}"
                                                 alt="{{ $commentaire->auteur }}">
                                        @else
                                            <div class="avatar-placeholder">
                                                {{ substr($commentaire->auteur, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="comment-content flex-grow-1">
                                        <div class="comment-header">
                                            <strong>{{ $commentaire->auteur }}</strong>
                                            <span class="comment-date">
                                                {{ $commentaire->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <p class="comment-text">{{ $commentaire->contenu }}</p>

                                        <!-- Actions du commentaire -->
                                        <div class="comment-actions">
                                            <button class="btn-reply" onclick="showReplyForm({{ $commentaire->id }})">
                                                <i class="fa-solid fa-reply"></i> Répondre
                                            </button>

                                            @if($commentaire->can_delete)
                                                <button class="btn-delete" onclick="deleteComment({{ $culture->id }}, {{ $commentaire->id }})">
                                                    <i class="fa-solid fa-trash"></i> Supprimer
                                                </button>
                                            @endif

                                            @if($commentaire->replies->count() > 0)
                                                <span class="replies-count">
                                                    <i class="fa-solid fa-comments"></i> {{ $commentaire->replies->count() }} réponse(s)
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Formulaire de réponse (caché par défaut) -->
                                        <div class="reply-form-container" id="reply-form-{{ $commentaire->id }}" style="display: none;">
                                            <form class="reply-form mt-3" data-parent-id="{{ $commentaire->id }}">
                                                @csrf
                                                <div class="mb-2">
                                                    <input type="text" class="form-control form-control-sm" name="auteur" placeholder="Votre nom *" required>
                                                </div>
                                                <div class="mb-2">
                                                    <textarea class="form-control form-control-sm" name="contenu" rows="3" placeholder="Votre réponse *" required></textarea>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-paper-plane"></i> Envoyer
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-secondary" onclick="hideReplyForm({{ $commentaire->id }})">
                                                        Annuler
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Liste des réponses -->
                                        @if($commentaire->replies->count() > 0)
                                            <div class="replies-list mt-3" id="replies-{{ $commentaire->id }}">
                                                @foreach($commentaire->replies as $reply)
                                                    <div class="reply-item" id="comment-{{ $reply->id }}" data-comment-id="{{ $reply->id }}">
                                                        <div class="d-flex">
                                                            <div class="reply-avatar">
                                                                @if ($reply->photo)
                                                                    <img src="{{ asset('storage/' . $reply->photo) }}"
                                                                         alt="{{ $reply->auteur }}">
                                                                @else
                                                                    <div class="avatar-placeholder-small">
                                                                        {{ substr($reply->auteur, 0, 1) }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="reply-content flex-grow-1">
                                                                <div class="reply-header">
                                                                    <strong>{{ $reply->auteur }}</strong>
                                                                    <span class="reply-date">{{ $reply->created_at->diffForHumans() }}</span>
                                                                </div>
                                                                <p class="reply-text">{{ $reply->contenu }}</p>

                                                                @if($reply->can_delete)
                                                                    <button class="btn-delete-small" onclick="deleteComment({{ $culture->id }}, {{ $reply->id }})">
                                                                        <i class="fa-solid fa-trash"></i> Supprimer
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" id="no-comments-alert">
                                <i class="fa-solid fa-info-circle"></i>
                                Aucun commentaire pour le moment. Soyez le premier à commenter !
                            </div>
                        @endforelse
                    </div>

                    <!-- Formulaire de commentaire principal -->
                    <div class="comment-form-wrapper">
                        <h4 class="mb-3">Laisser un commentaire</h4>

                        <form id="comment-form" enctype="multipart/form-data" class="comment-form">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="auteur" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           id="auteur"
                                           name="auteur"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email (optionnel)</label>
                                    <input type="email"
                                           class="form-control"
                                           id="email"
                                           name="email">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo de profil (optionnel)</label>
                                <input type="file"
                                       class="form-control"
                                       id="photo"
                                       name="photo"
                                       accept="image/jpeg,image/png,image/jpg">
                                <small class="text-muted">Formats acceptés : JPEG, PNG, JPG (Max: 2MB)</small>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label for="contenu" class="form-label">Commentaire <span class="text-danger">*</span></label>
                                <textarea class="form-control"
                                          id="contenu"
                                          name="contenu"
                                          rows="5"
                                          required></textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            <button type="submit" class="theme-btn" id="submit-btn">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Envoyer le commentaire</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Autres cultures -->
                    <div class="widget mb-4">
                        <h4 class="widget-title">Autres cultures</h4>
                        <div class="related-cultures">
                            @foreach (App\Models\Culture::where('id', '!=', $culture->id)->latest()->take(5)->get() as $relatedCulture)
                                <div class="related-culture-item mb-3">
                                    <a href="{{ route('cultures.show', $relatedCulture->id) }}" class="d-flex">
                                        <div class="related-culture-img">
                                            @if ($relatedCulture->image1)
                                                <img src="{{ asset('storage/' . $relatedCulture->image1) }}"
                                                     alt="{{ $relatedCulture->titre }}">
                                            @else
                                                <img src="{{ asset('assets/img/service/02.jpg') }}"
                                                     alt="{{ $relatedCulture->titre }}">
                                            @endif
                                        </div>
                                        <div class="related-culture-info">
                                            <h6>{{ Str::limit($relatedCulture->titre, 40) }}</h6>
                                            <small>
                                                <i class="fa-solid fa-heart text-danger"></i>
                                                {{ $relatedCulture->likes_count }} likes
                                            </small>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Retour à la liste -->
                    <div class="widget">
                        <a href="{{ route('cultures.index') }}" class="theme-btn w-100 text-center">
                            <i class="fa-solid fa-arrow-left"></i>
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .culture-detail-section {
        padding: 80px 0;
    }

    .culture-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .culture-stats {
        border-bottom: 2px solid #eee;
        padding-bottom: 15px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #666;
    }

    .stat-item i {
        font-size: 18px;
    }

    .culture-images img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .culture-description {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
    }

    .btn-like-large {
        background: transparent;
        border: 2px solid #e74c3c;
        padding: 12px 30px;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 600;
        color: #e74c3c;
    }

    .btn-like-large i {
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .btn-like-large:hover {
        background: #e74c3c;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
    }

    .btn-like-large.liked {
        background: #e74c3c;
        color: white;
    }

    .btn-like-large.liked i {
        animation: heartBeat 0.5s ease;
    }

    @keyframes heartBeat {
        0%, 100% { transform: scale(1); }
        25% { transform: scale(1.3); }
        50% { transform: scale(1.1); }
    }

    .comments-section h3 {
        color: #2c3e50;
        font-weight: 700;
    }

    .comment-item {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid #3498db;
        animation: slideIn 0.3s ease;
        position: relative;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .comment-avatar {
        margin-right: 15px;
    }

    .comment-avatar img,
    .avatar-placeholder {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .avatar-placeholder {
        background: #3498db;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .comment-header strong {
        color: #2c3e50;
        font-size: 16px;
    }

    .comment-date {
        color: #999;
        font-size: 13px;
    }

    .comment-text {
        color: #555;
        line-height: 1.6;
        margin: 0 0 10px 0;
    }

    /* Actions des commentaires */
    .comment-actions {
        display: flex;
        gap: 15px;
        align-items: center;
        margin-top: 10px;
    }

    .btn-reply, .btn-delete {
        background: transparent;
        border: none;
        color: #3498db;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .btn-reply:hover {
        background: #e3f2fd;
        color: #2980b9;
    }

    .btn-delete {
        color: #e74c3c;
    }

    .btn-delete:hover {
        background: #ffebee;
        color: #c0392b;
    }

    .replies-count {
        font-size: 13px;
        color: #666;
    }

    /* Réponses */
    .replies-list {
        margin-left: 50px;
        padding-left: 20px;
        border-left: 2px solid #ddd;
    }

    .reply-item {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .reply-avatar {
        margin-right: 12px;
    }

    .reply-avatar img,
    .avatar-placeholder-small {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
    }

    .avatar-placeholder-small {
        background: #9b59b6;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .reply-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .reply-header strong {
        color: #2c3e50;
        font-size: 14px;
    }

    .reply-date {
        color: #999;
        font-size: 12px;
    }

    .reply-text {
        color: #555;
        line-height: 1.5;
        margin: 0;
        font-size: 14px;
    }

    .btn-delete-small {
        background: transparent;
        border: none;
        color: #e74c3c;
        font-size: 12px;
        cursor: pointer;
        margin-top: 5px;
        padding: 3px 8px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .btn-delete-small:hover {
        background: #ffebee;
        color: #c0392b;
    }

    /* Formulaire de réponse */
    .reply-form-container {
        margin-top: 15px;
        padding: 15px;
        background: #f0f8ff;
        border-radius: 8px;
        border-left: 3px solid #3498db;
    }

    .reply-form .form-control-sm {
        font-size: 14px;
    }

    .comment-form-wrapper {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .comment-form .form-label {
        font-weight: 600;
        color: #2c3e50;
    }

    .comment-form .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px 15px;
    }

    .comment-form .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .comment-form .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: none;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .form-control.is-invalid ~ .invalid-feedback {
        display: block;
    }

    .sidebar .widget {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .widget-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #3498db;
    }

    .related-culture-item {
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .related-culture-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .related-culture-img {
        width: 80px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .related-culture-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .related-culture-item:hover .related-culture-img img {
        transform: scale(1.1);
    }

    .related-culture-info h6 {
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
        transition: color 0.3s ease;
    }

    .related-culture-item:hover .related-culture-info h6 {
        color: #3498db;
    }

    .related-culture-info small {
        font-size: 12px;
        color: #999;
    }

    .btn-like-large:disabled,
    #submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    #submit-btn.loading span {
        display: inline-block;
        animation: pulse 1s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    /* Animation de suppression */
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(-20px);
        }
    }

    .deleting {
        animation: fadeOut 0.3s ease;
    }
</style>
@endpush

@push('scripts')
<script>
    const CULTURE_ID = {{ $culture->id }};

    // Fonction pour afficher les alertes
    function showAlert(message, type = 'success') {
        const alertContainer = document.getElementById('alert-container');
        const alertId = 'alert-' + Date.now();
        const alert = document.createElement('div');
        alert.id = alertId;
        alert.className = `alert alert-${type} alert-dismissible fade show`;
        alert.innerHTML = `
            <i class="fa-solid fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            ${message}
            <button type="button" class="btn-close" onclick="document.getElementById('${alertId}').remove()"></button>
        `;
        alertContainer.appendChild(alert);

        // Auto-supprimer après 5 secondes
        setTimeout(() => {
            const el = document.getElementById(alertId);
            if (el) el.remove();
        }, 5000);
    }

    // Fonction pour échapper le HTML
    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, m => map[m]);
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
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                button.classList.toggle('liked');

                const likeText = button.querySelector('.like-text');
                const likeCount = button.querySelector('.like-count');
                const statsLikes = document.querySelector('.culture-stats .likes-count');

                likeText.textContent = isLiked ? 'J\'aime' : 'Vous aimez';
                likeCount.textContent = `(${data.likes_count})`;
                if (statsLikes) {
                    statsLikes.textContent = data.likes_count;
                }

                if (!isLiked) {
                    const icon = button.querySelector('i');
                    icon.style.animation = 'heartBeat 0.5s ease';
                    setTimeout(() => icon.style.animation = '', 500);
                }

                showAlert(data.message, 'success');
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Une erreur est survenue. Veuillez réessayer.', 'danger');
        })
        .finally(() => {
            button.disabled = false;
        });
    }

    // Afficher le formulaire de réponse
    function showReplyForm(commentId) {
        // Cacher tous les autres formulaires
        document.querySelectorAll('.reply-form-container').forEach(form => {
            form.style.display = 'none';
        });

        // Afficher le formulaire demandé
        const form = document.getElementById(`reply-form-${commentId}`);
        if (form) {
            form.style.display = 'block';
            form.querySelector('input[name="auteur"]').focus();
        }
    }

    // Cacher le formulaire de réponse
    function hideReplyForm(commentId) {
        const form = document.getElementById(`reply-form-${commentId}`);
        if (form) {
            form.style.display = 'none';
            form.querySelector('form').reset();
        }
    }

    // Supprimer un commentaire
    function deleteComment(cultureId, commentId) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')) {
            return;
        }

        const commentElement = document.getElementById(`comment-${commentId}`);
        if (commentElement) {
            commentElement.classList.add('deleting');
        }

        fetch(`/cultures/${cultureId}/commentaire/${commentId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Supprimer l'élément du DOM
                setTimeout(() => {
                    if (commentElement) {
                        commentElement.remove();
                    }

                    // Mettre à jour le compteur
                    document.querySelectorAll('.comments-total').forEach(el => {
                        el.textContent = data.comments_count;
                    });

                    // Afficher l'alerte si aucun commentaire
                    const commentsList = document.getElementById('comments-list');
                    if (commentsList && commentsList.children.length === 0) {
                        commentsList.innerHTML = `
                            <div class="alert alert-info" id="no-comments-alert">
                                <i class="fa-solid fa-info-circle"></i>
                                Aucun commentaire pour le moment. Soyez le premier à commenter !
                            </div>
                        `;
                    }

                    showAlert(data.message, 'success');
                }, 300);
            } else {
                if (commentElement) {
                    commentElement.classList.remove('deleting');
                }
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (commentElement) {
                commentElement.classList.remove('deleting');
            }
            showAlert('Une erreur est survenue. Veuillez réessayer.', 'danger');
        });
    }

    // Gestion du formulaire de commentaire principal
    document.getElementById('comment-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const submitBtn = document.getElementById('submit-btn');
        const formData = new FormData(form);

        submitBtn.disabled = true;
        submitBtn.classList.add('loading');
        submitBtn.querySelector('span').textContent = 'Envoi en cours...';

        form.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-invalid');
            const feedback = input.parentElement.querySelector('.invalid-feedback');
            if (feedback) feedback.textContent = '';
        });

        fetch('{{ route("cultures.commentaire.store", $culture->id) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const commentsList = document.getElementById('comments-list');
                const noCommentsAlert = document.getElementById('no-comments-alert');

                if (noCommentsAlert) {
                    noCommentsAlert.remove();
                }

                const newComment = document.createElement('div');
                newComment.className = 'comment-item mb-4';
                newComment.id = `comment-${data.commentaire.id}`;
                newComment.setAttribute('data-comment-id', data.commentaire.id);

                const avatarHtml = data.commentaire.photo
                    ? `<img src="${data.commentaire.photo}" alt="${escapeHtml(data.commentaire.auteur)}">`
                    : `<div class="avatar-placeholder">${escapeHtml(data.commentaire.auteur.charAt(0).toUpperCase())}</div>`;

                newComment.innerHTML = `
                    <div class="d-flex">
                        <div class="comment-avatar">
                            ${avatarHtml}
                        </div>
                        <div class="comment-content flex-grow-1">
                            <div class="comment-header">
                                <strong>${escapeHtml(data.commentaire.auteur)}</strong>
                                <span class="comment-date">${data.commentaire.created_at}</span>
                            </div>
                            <p class="comment-text">${escapeHtml(data.commentaire.contenu)}</p>

                            <div class="comment-actions">
                                <button class="btn-reply" onclick="showReplyForm(${data.commentaire.id})">
                                    <i class="fa-solid fa-reply"></i> Répondre
                                </button>
                                ${data.commentaire.can_delete ? `
                                    <button class="btn-delete" onclick="deleteComment(${CULTURE_ID}, ${data.commentaire.id})">
                                        <i class="fa-solid fa-trash"></i> Supprimer
                                    </button>
                                ` : ''}
                            </div>

                            <div class="reply-form-container" id="reply-form-${data.commentaire.id}" style="display: none;">
                                <form class="reply-form mt-3" data-parent-id="${data.commentaire.id}">
                                    <div class="mb-2">
                                        <input type="text" class="form-control form-control-sm" name="auteur" placeholder="Votre nom *" required>
                                    </div>
                                    <div class="mb-2">
                                        <textarea class="form-control form-control-sm" name="contenu" rows="3" placeholder="Votre réponse *" required></textarea>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-paper-plane"></i> Envoyer
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="hideReplyForm(${data.commentaire.id})">
                                            Annuler
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="replies-list mt-3" id="replies-${data.commentaire.id}"></div>
                        </div>
                    </div>
                `;

                commentsList.insertBefore(newComment, commentsList.firstChild);

                // Attacher l'événement au nouveau formulaire de réponse
                attachReplyFormHandler(newComment.querySelector('.reply-form'));

                document.querySelectorAll('.comments-total').forEach(el => {
                    el.textContent = data.comments_count;
                });

                form.reset();
                showAlert(data.message, 'success');
                newComment.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);

            if (error.errors) {
                Object.keys(error.errors).forEach(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    if (input) {
                        input.classList.add('is-invalid');
                        const feedback = input.parentElement.querySelector('.invalid-feedback');
                        if (feedback) {
                            feedback.textContent = error.errors[field][0];
                            feedback.style.display = 'block';
                        }
                    }
                });
                showAlert('Veuillez corriger les erreurs du formulaire.', 'danger');
            } else {
                showAlert(error.message || 'Une erreur est survenue. Veuillez réessayer.', 'danger');
            }
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.classList.remove('loading');
            submitBtn.querySelector('span').textContent = 'Envoyer le commentaire';
        });
    });

    // Fonction pour attacher le gestionnaire aux formulaires de réponse
    function attachReplyFormHandler(form) {
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const parentId = this.getAttribute('data-parent-id');
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Envoi...';

            fetch(`/cultures/${CULTURE_ID}/commentaire/${parentId}/reply`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => Promise.reject(err));
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const repliesList = document.getElementById(`replies-${parentId}`);

                    const avatarHtml = data.commentaire.photo
                        ? `<img src="${data.commentaire.photo}" alt="${escapeHtml(data.commentaire.auteur)}">`
                        : `<div class="avatar-placeholder-small">${escapeHtml(data.commentaire.auteur.charAt(0).toUpperCase())}</div>`;

                    const newReply = document.createElement('div');
                    newReply.className = 'reply-item';
                    newReply.id = `comment-${data.commentaire.id}`;
                    newReply.setAttribute('data-comment-id', data.commentaire.id);
                    newReply.innerHTML = `
                        <div class="d-flex">
                            <div class="reply-avatar">
                                ${avatarHtml}
                            </div>
                            <div class="reply-content flex-grow-1">
                                <div class="reply-header">
                                    <strong>${escapeHtml(data.commentaire.auteur)}</strong>
                                    <span class="reply-date">${data.commentaire.created_at}</span>
                                </div>
                                <p class="reply-text">${escapeHtml(data.commentaire.contenu)}</p>
                                ${data.commentaire.can_delete ? `
                                    <button class="btn-delete-small" onclick="deleteComment(${CULTURE_ID}, ${data.commentaire.id})">
                                        <i class="fa-solid fa-trash"></i> Supprimer
                                    </button>
                                ` : ''}
                            </div>
                        </div>
                    `;

                    repliesList.appendChild(newReply);

                    // Mettre à jour le compteur de réponses
                    const commentActions = document.querySelector(`#comment-${parentId} .comment-actions`);
                    let repliesCount = commentActions.querySelector('.replies-count');
                    const currentCount = repliesList.children.length;

                    if (repliesCount) {
                        repliesCount.innerHTML = `<i class="fa-solid fa-comments"></i> ${currentCount} réponse(s)`;
                    } else {
                        repliesCount = document.createElement('span');
                        repliesCount.className = 'replies-count';
                        repliesCount.innerHTML = `<i class="fa-solid fa-comments"></i> ${currentCount} réponse(s)`;
                        commentActions.appendChild(repliesCount);
                    }

                    document.querySelectorAll('.comments-total').forEach(el => {
                        el.textContent = data.comments_count;
                    });

                    form.reset();
                    hideReplyForm(parentId);
                    showAlert(data.message, 'success');
                    newReply.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    showAlert(data.message, 'danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert(error.message || 'Une erreur est survenue. Veuillez réessayer.', 'danger');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Envoyer';
            });
        });
    }

    // Attacher les gestionnaires aux formulaires de réponse existants
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.reply-form').forEach(form => {
            attachReplyFormHandler(form);
        });
    });
</script>
@endpush

@endsection
