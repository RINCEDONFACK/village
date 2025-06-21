@extends('front.layouts.app')

@section('content')
    @php use Illuminate\Support\Str; @endphp

    @push('styles')
        <style>
            .formation-detail-wrapper {
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .content-text {
                line-height: 1.8;
                font-size: 16px;
                text-align: justify;
            }

            .info-item {
                border-bottom: 1px solid #f0f0f0;
                padding-bottom: 15px;
            }

            .info-item:last-child {
                border-bottom: none;
                padding-bottom: 0;
            }

            .icon-wrapper {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .formation-actions .btn {
                min-width: 200px;
            }

            @media (max-width: 768px) {
                .formation-detail-wrapper {
                    padding: 20px;
                }

                .formation-actions .btn {
                    min-width: auto;
                    width: 100%;
                }
            }
        </style>
    @endpush

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.jpg') }}');">
        <div class="border-shape">
            <img src="{{ asset('assets/img/element.png') }}" alt="shape-img">
        </div>
        <div class="line-shape">
            <img src="{{ asset('assets/img/line-element.png') }}" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading text-center">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $itcommunity->titre }}</h1>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li>{{ Str::limit($itcommunity->titre, 30) }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Formation Detail Section Start -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Contenu principal -->
                <div class="col-lg-8">
                    <div class="formation-detail-wrapper">

                        <!-- Image principale -->
                        @if ($itcommunity->image)
                            <div class="formation-image mb-4">
                                <img src="{{ asset('storage/' . $itcommunity->image) }}"
                                    alt="itcommunity {{ $itcommunity->titre }}" class="w-100 rounded shadow-sm"
                                    style="height: 400px; object-fit: cover;">
                            </div>
                        @endif

                        <!-- Titre et référence -->
                        <div class="formation-header mb-4">
                            <div class="d-flex justify-content-between align-items-start flex-wrap">
                                <div>
                                    <h2 class="mb-2">{{ $itcommunity->titre }}</h2>
                                    @if ($itcommunity->reference)
                                        <span class="badge bg-primary fs-6 mb-3">
                                            <i class="fas fa-tag me-1"></i>
                                            {{ $itcommunity->reference }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Status badge -->
                                <div>
                                    @if ($itcommunity->actif)
                                        <span class="badge bg-success fs-6">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Formation Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary fs-6">
                                            <i class="fas fa-pause-circle me-1"></i>
                                            Formation Suspendue
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Description détaillée -->
                        <div class="formation-description mb-5">
                            <h4 class="mb-3">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Description de la formation
                            </h4>
                            <div class="content-text">
                                {!! nl2br(e($itcommunity->description)) !!}
                            </div>
                        </div>

                        <!-- Objectifs (optionnel - si vous souhaitez ajouter ce champ) -->
                        <div class="formation-objectives mb-5">
                            <h4 class="mb-3">
                                <i class="fas fa-bullseye text-primary me-2"></i>
                                Objectifs de la formation
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Maîtriser les concepts fondamentaux
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Acquérir des compétences pratiques
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Obtenir une certification reconnue
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Développer son expertise technique
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Améliorer son employabilité
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check text-success me-2"></i>
                                            Réseauter avec des professionnels
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="formation-actions text-center">
                            <a href="#" class="btn btn-primary btn-lg me-3 mb-3">
                                <i class="fas fa-user-plus me-2"></i>
                                S'inscrire à la formation
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-lg mb-3">
                                <i class="fas fa-download me-2"></i>
                                Télécharger le programme
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="formation-sidebar">

                        <!-- Informations clés -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Informations clés
                                </h5>
                            </div>
                            <div class="card-body">
                                <!-- Durée -->
                                @if ($itcommunity->duree)
                                    <div class="info-item d-flex align-items-center mb-3">
                                        <div class="icon-wrapper bg-light rounded-circle p-2 me-3">
                                            <i class="fas fa-clock text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Durée</small>
                                            <div class="fw-bold">{{ $itcommunity->duree }} heures</div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Dates -->
                                @if ($itcommunity->date_debut)
                                    <div class="info-item d-flex align-items-center mb-3">
                                        <div class="icon-wrapper bg-light rounded-circle p-2 me-3">
                                            <i class="fas fa-calendar-plus text-success"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Date de début</small>
                                            <div class="fw-bold">
                                                {{ \Carbon\Carbon::parse($itcommunity->date_debut)->format('d/m/Y') }}</div>
                                        </div>
                                    </div>
                                @endif

                                @if ($itcommunity->date_fin)
                                    <div class="info-item d-flex align-items-center mb-3">
                                        <div class="icon-wrapper bg-light rounded-circle p-2 me-3">
                                            <i class="fas fa-calendar-check text-danger"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Date de fin</small>
                                            <div class="fw-bold">
                                                {{ \Carbon\Carbon::parse($itcommunity->date_fin)->format('d/m/Y') }}</div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Lieu -->
                                @if ($itcommunity->lieu)
                                    <div class="info-item d-flex align-items-center mb-3">
                                        <div class="icon-wrapper bg-light rounded-circle p-2 me-3">
                                            <i class="fas fa-map-marker-alt text-warning"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Lieu</small>
                                            <div class="fw-bold">{{ $itcommunity->lieu }}</div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Formateur -->
                                @if ($itcommunity->formateur)
                                    <div class="info-item d-flex align-items-center">
                                        <div class="icon-wrapper bg-light rounded-circle p-2 me-3">
                                            <i class="fas fa-user-tie text-info"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Formateur</small>
                                            <div class="fw-bold">{{ $itcommunity->formateur }}</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-phone me-2"></i>
                                    Nous contacter
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-3">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <a href="mailto:formation@example.com">formation@example.com</a>
                                </p>
                                <p class="mb-3">
                                    <i class="fas fa-phone text-success me-2"></i>
                                    <a href="tel:+237000000000">+237 000 000 000</a>
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-whatsapp text-success me-2"></i>
                                    <a href="https://wa.me/237000000000" target="_blank">WhatsApp</a>
                                </p>
                            </div>
                        </div>

                        <!-- Partage -->
                        <div class="card shadow-sm">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-share-alt me-2"></i>
                                    Partager
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                        target="_blank" class="btn btn-primary btn-sm flex-fill">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($itcommunity->titre) }}"
                                        target="_blank" class="btn btn-info btn-sm flex-fill">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                        target="_blank" class="btn btn-primary btn-sm flex-fill"
                                        style="background-color: #0077b5;">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($itcommunity->titre . ' - ' . request()->fullUrl()) }}"
                                        target="_blank" class="btn btn-success btn-sm flex-fill">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formations similaires -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h3>Autres formations disponibles</h3>
                <p>Découvrez nos autres formations informatiques</p>
            </div>

            <div class="row">
                <!-- Ici vous pourrez ajouter une boucle pour afficher d'autres formations -->
                <!-- Exemple avec des données statiques pour la démonstration -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Formation Web Development</h5>
                            <p class="card-text">Apprenez les bases du développement web moderne.</p>
                            <a href="#" class="btn btn-outline-primary">Voir détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Formation Data Science</h5>
                            <p class="card-text">Maîtrisez l'analyse de données et l'intelligence artificielle.</p>
                            <a href="#" class="btn btn-outline-primary">Voir détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Formation Cybersécurité</h5>
                            <p class="card-text">Protégez les systèmes informatiques contre les menaces.</p>
                            <a href="#" class="btn btn-outline-primary">Voir détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
