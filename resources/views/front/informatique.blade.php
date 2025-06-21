@extends('front.layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp

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
            <h1 class="wow fadeInUp" data-wow-delay=".3s">Formations Informatiques</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><i class="fas fa-chevron-right"></i></li>
                <li>Formations IT</li>
            </ul>
        </div>
    </div>
</div>

<!-- IT Trainings Section Start -->
<section class="project-section section-padding fix">
    <div class="container">
        <div class="row gy-5">
            @forelse ($formations as $formation)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-white shadow-sm rounded-lg overflow-hidden h-100 d-flex flex-column p-3">

                        <h4 class="text-center text-dark fw-bold mb-3">
                            {{ $formation->titre }}
                        </h4>

                        <!-- Référence de la formation -->
                        @if ($formation->reference)
                            <div class="mb-2">
                                <span class="badge bg-primary">{{ $formation->reference }}</span>
                            </div>
                        @endif

                        <!-- Image de la formation -->
                        @if ($formation->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $formation->image) }}" alt="Formation {{ $formation->titre }}"
                                     class="w-100 rounded" style="height: 200px; object-fit: cover;">
                            </div>
                        @endif

                        <!-- Informations sur la formation -->
                        <div class="formation-info mb-3">
                            @if ($formation->duree)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-clock text-primary me-2"></i>
                                    <span class="text-sm">{{ $formation->duree }} heures</span>
                                </div>
                            @endif

                            @if ($formation->date_debut && $formation->date_fin)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-calendar text-primary me-2"></i>
                                    <span class="text-sm">
                                        Du {{ \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}
                                        au {{ \Carbon\Carbon::parse($formation->date_fin)->format('d/m/Y') }}
                                    </span>
                                </div>
                            @elseif ($formation->date_debut)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-calendar text-primary me-2"></i>
                                    <span class="text-sm">
                                        Début le {{ \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}
                                    </span>
                                </div>
                            @endif

                            @if ($formation->lieu)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span class="text-sm">{{ $formation->lieu }}</span>
                                </div>
                            @endif

                            @if ($formation->formateur)
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-user-tie text-primary me-2"></i>
                                    <span class="text-sm">{{ $formation->formateur }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Description -->
                        <p class="mt-3 text-sm text-gray-700">
                            {{ Str::words(strip_tags($formation->description), 30, '...') }}
                        </p>

                        <div class="mt-auto text-center">
                            <a href="{{route('site.informatique.show', $formation->id)}}"
                               class="btn btn-outline-primary d-inline-flex align-items-center gap-2">
                                Voir détails <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Aucune formation informatique disponible pour le moment.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
