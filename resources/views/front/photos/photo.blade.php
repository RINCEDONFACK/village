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
            <h1 class="wow fadeInUp" data-wow-delay=".3s">Galerie Photos</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><i class="fas fa-chevron-right"></i></li>
                <li>Albums Photos</li>
            </ul>
        </div>
    </div>
</div>

<!-- Albums Section Start -->
<section class="project-section section-padding fix">
    <div class="container">
        <div class="row gy-5">
            @forelse ($albums as $album)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-white shadow-sm rounded-lg overflow-hidden h-100 d-flex flex-column p-3">

                        <h4 class="text-center text-dark fw-bold mb-3">
                            {{ $album->titre }}
                        </h4>

                        <!-- Image principale de l'album (première photo) -->
                        @if ($album->photo1)
                            <div class="mb-3 position-relative">
                                <img src="{{ asset('storage/' . $album->photo1) }}"
                                     alt="Album {{ $album->titre }}"
                                     class="w-100 rounded"
                                     style="height: 250px; object-fit: cover;">

                                <!-- Badge nombre de photos -->
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-primary">
                                        <i class="fas fa-images me-1"></i>
                                        {{ collect(range(1, 10))->filter(function($i) use ($album) {
                                            return !empty($album->{'photo' . $i});
                                        })->count() }} photos
                                    </span>
                                </div>
                            </div>
                        @endif

                        <!-- Description -->
                        @if ($album->description)
                            <p class="mt-3 text-sm text-gray-700">
                                {{ Str::words(strip_tags($album->description), 20, '...') }}
                            </p>
                        @endif

                        <!-- Aperçu miniatures (3 premières photos) -->
                        <div class="d-flex gap-2 mb-3">
                            @for ($i = 2; $i <= 4; $i++)
                                @if (!empty($album->{'photo' . $i}))
                                    <div class="flex-fill">
                                        <img src="{{ asset('storage/' . $album->{'photo' . $i}) }}"
                                             alt="Photo {{ $i }}"
                                             class="w-100 rounded"
                                             style="height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <div class="mt-auto text-center">
                            <a href="{{ route('site.photos.show', $album->id) }}"
                               class="btn btn-outline-primary d-inline-flex align-items-center gap-2">
                                Voir l'album <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Aucun album photo disponible pour le moment.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
