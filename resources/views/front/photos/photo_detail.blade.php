{{--
    Fichier: resources/views/front/photos/photo_detail.blade.php
    Description: Vue détail d'un album photo avec galerie complète
--}}

@extends('front.layouts.app')

@section('content')

<!-- Breadcrumb Section Start -->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/dd.jpeg') }}');">
    <div class="border-shape">
        <img src="{{ asset('assets/img/element.png') }}" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="{{ asset('assets/img/line-element.png') }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading text-center">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $album->titre }}</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('site.photos.index') }}">Albums Photos</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>{{ $album->titre }}</li>
            </ul>
        </div>
    </div>
</div>

<!-- Album Detail Section Start -->
<section class="project-section section-padding fix">
    <div class="container">

        <!-- Description de l'album -->
        @if ($album->description)
            <div class="row mb-5">
                <div class="col-12">
                    <div class="bg-white shadow-sm rounded-lg p-4">
                        <h4 class="text-dark fw-bold mb-3">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            Description
                        </h4>
                        <p class="text-gray-700">{{ $album->description }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Galerie de photos -->
        <div class="row gy-4">
            @for ($i = 1; $i <= 10; $i++)
                @if (!empty($album->{'photo' . $i}))
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="{{ 0.1 * $i }}s">
                        <div class="photo-item bg-white shadow-sm rounded-lg overflow-hidden">
                            <a href="{{ asset('storage/' . $album->{'photo' . $i}) }}"
                               data-lightbox="album-{{ $album->id }}"
                               data-title="Photo {{ $i }} - {{ $album->titre }}">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $album->{'photo' . $i}) }}"
                                         alt="Photo {{ $i }}"
                                         class="w-100"
                                         style="height: 300px; object-fit: cover;">

                                    <!-- Overlay hover -->
                                    <div class="photo-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                         style="background: rgba(0, 0, 0, 0.5); opacity: 0; transition: opacity 0.3s ease;">
                                        <i class="fas fa-search-plus text-white" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endfor
        </div>

        <!-- Bouton retour -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('site.photos.index') }}"
                   class="btn btn-primary d-inline-flex align-items-center gap-2">
                    <i class="fas fa-arrow-left"></i> Retour aux albums
                </a>
            </div>
        </div>

    </div>
</section>

<!-- CSS personnalisé pour l'effet hover -->
<style>
    .photo-item:hover .photo-overlay {
        opacity: 1 !important;
    }

    .photo-item {
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .photo-item:hover {
        transform: translateY(-5px);
    }
</style>

<!-- Lightbox JS (Ajoutez dans votre layout si pas déjà présent) -->
@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush

@endsection
