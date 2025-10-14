@extends('front.layouts.app')
@section('content')
@php use Illuminate\Support\Str; @endphp

<!-- Breadcrumb Section Start -->
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
                Produits Traditionnels
            </h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="{{ route('accueil.index') }}">
                        Accueil
                    </a>
                </li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>Produits</li>
            </ul>
        </div>
    </div>
</div>

<!-- Filtres Section Start -->
<section class="py-4 bg-light">
    <div class="container">
        <form method="GET" action="{{ route('produits.index') }}">
            <div class="row g-3 align-items-end">
                <!-- Recherche -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-search me-2"></i>Rechercher
                    </label>
                    <input type="text" name="search" class="form-control" placeholder="Nom, origine, description..." value="{{ request('search') }}">
                </div>

                <!-- Catégorie -->
                <div class="col-lg-3 col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-tag me-2"></i>Catégorie
                    </label>
                    <select name="categorie" class="form-select">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>
                                {{ $categorie }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Origine -->
                <div class="col-lg-3 col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-2"></i>Origine
                    </label>
                    <select name="origine" class="form-select">
                        <option value="">Toutes les origines</option>
                        @foreach($origines as $origine)
                            <option value="{{ $origine }}" {{ request('origine') == $origine ? 'selected' : '' }}>
                                {{ $origine }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Boutons -->
                <div class="col-lg-2 col-md-6">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-filter me-2"></i>Filtrer
                    </button>
                    <a href="{{ route('produits.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="fas fa-redo me-2"></i>Réinitialiser
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Compteur de résultats -->
<section class="py-3 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <p class="mb-0 text-muted">
                    <strong>{{ $produits->total() }}</strong> produit(s) trouvé(s)
                </p>
            </div>
            <div>
                <form method="GET" action="{{ route('produits.index') }}" class="d-flex gap-2 align-items-center">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('categorie'))
                        <input type="hidden" name="categorie" value="{{ request('categorie') }}">
                    @endif
                    @if(request('origine'))
                        <input type="hidden" name="origine" value="{{ request('origine') }}">
                    @endif

                    <label class="mb-0 text-muted small">Trier par:</label>
                    <select name="sort" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Plus récents</option>
                        <option value="nom" {{ request('sort') == 'nom' ? 'selected' : '' }}>Nom (A-Z)</option>
                        <option value="prix" {{ request('sort') == 'prix' ? 'selected' : '' }}>Prix croissant</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Products Section Start -->
<section class="project-section section-padding fix">
    <div class="container">
        <div class="row gy-4">
            @forelse ($produits as $produit)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-white shadow-sm rounded-lg overflow-hidden h-100 d-flex flex-column hover-shadow transition-all">
                        <!-- Image principale -->
                        @if ($produit->image)
                            <div class="position-relative overflow-hidden" style="height: 280px;">
                                <img src="{{ asset('storage/' . $produit->image) }}"
                                     alt="{{ $produit->nom }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover; transition: transform 0.3s ease;"
                                     onmouseover="this.style.transform='scale(1.05)'"
                                     onmouseout="this.style.transform='scale(1)'">

                                <!-- Badges -->
                                <div class="position-absolute top-0 start-0 p-2">
                                    @if($produit->est_expose)
                                        <span class="badge bg-warning text-dark mb-1 d-block">
                                            <i class="fas fa-eye me-1"></i>Exposé
                                        </span>
                                    @endif
                                    @if($produit->categorie)
                                        <span class="badge bg-primary">
                                            {{ $produit->categorie }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Stock badge -->
                                <div class="position-absolute top-0 end-0 p-2">
                                    @if($produit->quantite > 10)
                                        <span class="badge bg-success">En stock</span>
                                    @elseif($produit->quantite > 0)
                                        <span class="badge bg-warning text-dark">Stock limité</span>
                                    @else
                                        <span class="badge bg-danger">Rupture</span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 280px;">
                                <i class="fas fa-image text-muted" style="font-size: 4rem;"></i>
                            </div>
                        @endif

                        <!-- Contenu -->
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <!-- Titre -->
                            <h5 class="fw-bold text-dark mb-2">
                                <a href="{{ route('produits.show', $produit->id) }}" class="text-decoration-none text-dark hover-primary">
                                    {{ Str::limit($produit->nom, 50) }}
                                </a>
                            </h5>

                            <!-- Créateur et Origine -->
                            <div class="mb-2">
                                @if($produit->createur)
                                    <small class="text-muted d-block">
                                        <i class="fas fa-user me-1"></i>{{ $produit->createur }}
                                    </small>
                                @endif
                                @if($produit->origine)
                                    <small class="text-muted d-block">
                                        <i class="fas fa-map-marker-alt me-1"></i>{{ $produit->origine }}
                                    </small>
                                @endif
                            </div>

                            <!-- Description courte -->
                            @if($produit->description)
                                <p class="text-muted small mb-3" style="line-height: 1.5;">
                                    {{ Str::limit(strip_tags($produit->description), 80) }}
                                </p>
                            @endif

                            <!-- Prix et CTA -->
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-0 text-muted small">Prix</p>
                                        <h4 class="mb-0 fw-bold text-primary">
                                            {{ number_format($produit->prix, 0, ',', ' ') }} <small class="fs-6">FCFA</small>
                                        </h4>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-primary flex-grow-1">
                                        <i class="fas fa-eye me-2"></i>Voir détails
                                    </a>
                                    @if($produit->contact_whatsapp)
                                        <a href="https://wa.me/{{ str_replace([' ', '+', '-'], '', $produit->contact_whatsapp) }}?text=Bonjour, je suis intéressé par {{ $produit->nom }}"
                                           target="_blank"
                                           class="btn btn-success"
                                           title="Contacter sur WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-box-open text-muted mb-3" style="font-size: 4rem;"></i>
                        <h4 class="text-muted">Aucun produit trouvé</h4>
                        <p class="text-muted mb-4">Essayez de modifier vos critères de recherche</p>
                        <a href="{{ route('produits.index') }}" class="btn btn-primary">
                            <i class="fas fa-redo me-2"></i>Réinitialiser les filtres
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($produits->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        {{ $produits->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-2 text-white">Vous êtes artisan ?</h3>
                <p class="mb-0">Exposez vos créations traditionnelles à la Maison du Village</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="#" class="btn btn-light btn-lg">
                    <i class="fas fa-plus me-2"></i>Proposer un produit
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .hover-primary:hover {
        color: var(--bs-primary) !important;
    }

    .badge {
        font-weight: 500;
        padding: 0.4em 0.8em;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .form-select:focus,
    .form-control:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.25);
    }
</style>

@endsection
