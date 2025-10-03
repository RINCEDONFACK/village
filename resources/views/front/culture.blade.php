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
                {{ __('maisonduvillage.culture.page_title') }}
            </h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="{{ route('accueil.index') }}">
                        {{ __('maisonduvillage.nav.home') }}
                    </a>
                </li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>{{ __('maisonduvillage.nav.culture') }}</li>
            </ul>
        </div>
    </div>
</div>

<!-- Culture Section Start -->
<section class="project-section section-padding fix">
    <div class="container">
        <div class="row gy-5">
            @forelse ($cultures as $culture)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-white shadow-sm rounded-lg overflow-hidden h-100 d-flex flex-column p-3">
                        <h4 class="text-center text-dark fw-bold mb-3">
                            {{ $culture->titre }}
                        </h4>

                        <!-- Vidéo YouTube -->
                        @php $videoId = getYoutubeVideoId($culture->lien_youtube1); @endphp
                        @if ($videoId)
                            <div class="mb-3">
                                <iframe class="w-100 rounded"
                                        style="height: 200px;"
                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                        title="{{ $culture->titre }}"
                                        frameborder="0"
                                        allowfullscreen></iframe>
                            </div>
                        @endif

                        <!-- Image -->
                        @if ($culture->image1)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $culture->image1) }}"
                                     alt="{{ $culture->titre }}"
                                     class="w-100 rounded"
                                     style="height: 200px; object-fit: cover;">
                            </div>
                        @endif

                        <p class="mt-3 text-sm text-gray-700">
                            {{ Str::words(strip_tags($culture->description), 50, '...') }}
                        </p>

                        <div class="mt-auto text-center">
                            <a href="{{ route('cultures.show', $culture->id) }}"
                               class="btn btn-outline-primary d-inline-flex align-items-center gap-2">
                                {{ __('maisonduvillage.buttons.view_more') }}
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>{{ __('maisonduvillage.culture.no_events') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
