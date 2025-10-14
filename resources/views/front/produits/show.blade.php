@extends('front.layouts.app')
@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/vilatof.jpeg') }}');">
    <div class="border-shape">
        <img src="{{ asset('assets/img/element.png') }}" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="{{ asset('assets/img/line-element.png') }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading text-center">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">
                {{ $produitTraditionnel->nom }}
            </h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="{{ route('accueil.index') }}">
                        Accueil
                    </a>
                </li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>
                    <a href="{{ route('produits.index') }}">
                        Produits
                    </a>
                </li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>{{ Str::limit($produitTraditionnel->nom, 30) }}</li>
            </ul>
        </div>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-7">
                <div class="product-gallery mb-4">
                    @if($produitTraditionnel->image || $produitTraditionnel->image1)
                        <div class="main-image mb-3">
                            <div class="position-relative overflow-hidden rounded shadow-lg" style="height: 500px;">
                                <img id="mainImage"
                                     src="{{ $produitTraditionnel->image ? asset('storage/' . $produitTraditionnel->image) : asset('storage/' . $produitTraditionnel->image1) }}"
                                     alt="{{ $produitTraditionnel->nom }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover;">

                                <div class="position-absolute top-0 start-0 p-3">
                                    @if($produitTraditionnel->est_expose)
                                        <span class="badge bg-warning text-dark mb-2 d-block">
                                            <i class="fas fa-eye me-1"></i>Exposé à la Maison du Village
                                        </span>
                                    @endif
                                    @if($produitTraditionnel->categorie)
                                        <span class="badge bg-primary">
                                            <i class="fas fa-tag me-1"></i>{{ $produitTraditionnel->categorie }}
                                        </span>
                                    @endif
                                </div>

                                <div class="position-absolute top-0 end-0 p-3">
                                    @if($produitTraditionnel->quantite > 10)
                                        <span class="badge bg-success fs-6">
                                            <i class="fas fa-check-circle me-1"></i>En stock ({{ $produitTraditionnel->quantite }})
                                        </span>
                                    @elseif($produitTraditionnel->quantite > 0)
                                        <span class="badge bg-warning text-dark fs-6">
                                            <i class="fas fa-exclamation-triangle me-1"></i>Stock limité ({{ $produitTraditionnel->quantite }})
                                        </span>
                                    @else
                                        <span class="badge bg-danger fs-6">
                                            <i class="fas fa-times-circle me-1"></i>Rupture de stock
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if($produitTraditionnel->image && $produitTraditionnel->image1)
                            <div class="thumbnails d-flex gap-3">
                                <div class="thumb-item" onclick="changeImage('{{ asset('storage/' . $produitTraditionnel->image) }}', this)">
                                    <img src="{{ asset('storage/' . $produitTraditionnel->image) }}"
                                         alt="Image 1"
                                         class="rounded shadow-sm cursor-pointer active-thumb"
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                <div class="thumb-item" onclick="changeImage('{{ asset('storage/' . $produitTraditionnel->image1) }}', this)">
                                    <img src="{{ asset('storage/' . $produitTraditionnel->image1) }}"
                                         alt="Image 2"
                                         class="rounded shadow-sm cursor-pointer"
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 500px;">
                            <div class="text-center">
                                <i class="fas fa-image text-muted mb-3" style="font-size: 5rem;"></i>
                                <p class="text-muted">Aucune image disponible</p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded shadow-sm p-4 mb-4">
                    <h3 class="fw-bold mb-3">
                        <i class="fas fa-align-left text-primary me-2"></i>Description
                    </h3>
                    @if($produitTraditionnel->description)
                        <div class="text-muted" style="line-height: 1.8; white-space: pre-wrap;">
                            {{ $produitTraditionnel->description }}
                        </div>
                    @else
                        <p class="text-muted fst-italic">Aucune description disponible pour ce produit.</p>
                    @endif
                </div>

                <div class="bg-white rounded shadow-sm p-4">
                    <h3 class="fw-bold mb-4">
                        <i class="fas fa-globe text-success me-2"></i>Informations Culturelles
                    </h3>
                    <div class="row g-3">
                        @if($produitTraditionnel->createur)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded">
                                    <div class="bg-primary bg-opacity-10 rounded p-2">
                                        <i class="fas fa-user text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-1 small">Créateur / Artisan</p>
                                        <p class="mb-0 fw-bold">{{ $produitTraditionnel->createur }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($produitTraditionnel->origine)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded">
                                    <div class="bg-success bg-opacity-10 rounded p-2">
                                        <i class="fas fa-map-marker-alt text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-1 small">Origine / Région</p>
                                        <p class="mb-0 fw-bold">{{ $produitTraditionnel->origine }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($produitTraditionnel->culture_associee)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded">
                                    <div class="bg-info bg-opacity-10 rounded p-2">
                                        <i class="fas fa-users text-info fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-1 small">Culture / Ethnie</p>
                                        <p class="mb-0 fw-bold">{{ $produitTraditionnel->culture_associee }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($produitTraditionnel->materiaux)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3 p-3 bg-light rounded">
                                    <div class="bg-warning bg-opacity-10 rounded p-2">
                                        <i class="fas fa-hammer text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-1 small">Matériaux utilisés</p>
                                        <p class="mb-0 fw-bold">{{ $produitTraditionnel->materiaux }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="bg-white rounded shadow-sm p-4 mb-4 sticky-top" style="top: 20px;">
                    <h2 class="fw-bold mb-2">{{ $produitTraditionnel->nom }}</h2>

                    <div class="bg-primary bg-opacity-10 rounded p-4 mb-4 text-center">
                        <p class="text-muted mb-2 text-uppercase small">Prix</p>
                        <h1 class="display-4 fw-bold text-primary mb-0">
                            {{ number_format($produitTraditionnel->prix, 0, ',', ' ') }}
                            <small class="fs-5 text-muted">FCFA</small>
                        </h1>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span class="text-muted">Disponibilité:</span>
                            @if($produitTraditionnel->disponible)
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle me-1"></i>Disponible
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="fas fa-times-circle me-1"></i>Indisponible
                                </span>
                            @endif
                        </div>

                        @if($produitTraditionnel->categorie)
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <span class="text-muted">Catégorie:</span>
                                <span class="badge bg-secondary">{{ $produitTraditionnel->categorie }}</span>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center py-2">
                            <span class="text-muted">Quantité disponible:</span>
                            <strong class="text-dark">{{ $produitTraditionnel->quantite }} unité(s)</strong>
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        @if($produitTraditionnel->contact_whatsapp)
                            <a href="https://wa.me/{{ str_replace([' ', '+', '-'], '', $produitTraditionnel->contact_whatsapp) }}?text=Bonjour, je suis intéressé par le produit: {{ $produitTraditionnel->nom }} ({{ number_format($produitTraditionnel->prix, 0, ',', ' ') }} FCFA)"
                               target="_blank"
                               class="btn btn-success btn-lg">
                                <i class="fab fa-whatsapp me-2 fs-5"></i>Commander sur WhatsApp
                            </a>
                        @endif

                        @if($produitTraditionnel->contact_gmail)
                            <a href="mailto:{{ $produitTraditionnel->contact_gmail }}?subject=Demande d'information - {{ $produitTraditionnel->nom }}&body=Bonjour,%0D%0A%0D%0AJe suis intéressé par le produit {{ $produitTraditionnel->nom }}.%0D%0A%0D%0AMerci de me recontacter."
                               class="btn btn-outline-danger btn-lg">
                                <i class="fas fa-envelope me-2"></i>Envoyer un email
                            </a>
                        @endif

                        <a href="{{ route('produits.index') }}" class="btn btn-outline-dark">
                            <i class="fas fa-arrow-left me-2"></i>Retour aux produits
                        </a>
                    </div>

                    @if($produitTraditionnel->contact_whatsapp || $produitTraditionnel->contact_gmail)
                        <div class="mt-4 p-3 bg-light rounded">
                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-info-circle text-primary me-2"></i>Informations de contact
                            </h6>
                            @if($produitTraditionnel->contact_whatsapp)
                                <p class="mb-2 small">
                                    <i class="fab fa-whatsapp text-success me-2"></i>
                                    <strong>WhatsApp:</strong> {{ $produitTraditionnel->contact_whatsapp }}
                                </p>
                            @endif
                            @if($produitTraditionnel->contact_gmail)
                                <p class="mb-0 small">
                                    <i class="fas fa-envelope text-danger me-2"></i>
                                    <strong>Email:</strong> {{ $produitTraditionnel->contact_gmail }}
                                </p>
                            @endif
                        </div>
                    @endif

                    <div class="mt-4 text-center">
                        <p class="text-muted small mb-2">Partager ce produit</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                               target="_blank"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($produitTraditionnel->nom) }}"
                               target="_blank"
                               class="btn btn-sm btn-outline-info">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($produitTraditionnel->nom . ' - ' . request()->url()) }}"
                               target="_blank"
                               class="btn btn-sm btn-outline-success">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($produitsSimilaires->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2">Produits Similaires</h2>
            <p class="text-muted">Découvrez d'autres produits de la même catégorie</p>
        </div>

        <div class="row gy-4">
            @foreach($produitsSimilaires as $similaire)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-white shadow-sm rounded overflow-hidden h-100 hover-shadow transition-all">
                        @if($similaire->image)
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                <img src="{{ asset('storage/' . $similaire->image) }}"
                                     alt="{{ $similaire->nom }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover;">
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image text-muted fs-1"></i>
                            </div>
                        @endif

                        <div class="p-3">
                            <h6 class="fw-bold mb-2">
                                <a href="{{ route('produits.show', $similaire->id) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($similaire->nom, 40) }}
                                </a>
                            </h6>
                            <p class="text-primary fw-bold mb-3">
                                {{ number_format($similaire->prix, 0, ',', ' ') }} FCFA
                            </p>
                            <a href="{{ route('produits.show', $similaire->id) }}" class="btn btn-sm btn-outline-primary w-100">
                                <i class="fas fa-eye me-1"></i>Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<script>
    function changeImage(imageSrc, element) {
        document.getElementById('mainImage').src = imageSrc;

        document.querySelectorAll('.thumb-item img').forEach(img => {
            img.classList.remove('active-thumb');
        });

        element.querySelector('img').classList.add('active-thumb');
    }
</script>

<style>
    .cursor-pointer {
        cursor: pointer;
    }

    .active-thumb {
        border: 3px solid var(--bs-primary);
        opacity: 1 !important;
    }

    .thumb-item img {
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .thumb-item img:hover {
        opacity: 1;
        transform: scale(1.05);
    }

    .hover-shadow {
        transition: all 0.3s ease;
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .sticky-top {
        position: sticky;
    }

    @media (max-width: 991px) {
        .sticky-top {
            position: relative !important;
        }
    }
</style>

@endsection
