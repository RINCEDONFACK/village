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
                Our Services
            </h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="{{ route('accueil.index') }}">
                        Home
                    </a>
                </li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</div>

<!-- Services Section Start -->
<section class="project-section section-padding fix">
    <div class="container">
        <div class="row gy-5">
            @forelse ($services as $service)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-white shadow-sm rounded-lg overflow-hidden h-100 d-flex flex-column p-3">
                        <h4 class="text-center text-dark fw-bold mb-3">
                            {{ $service->slug }}
                        </h4>

                        <!-- Image -->
                        @if ($service->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $service->image) }}"
                                     alt="{{ $service->slug }}"
                                     class="w-100 rounded"
                                     style="height: 200px; object-fit: cover;">
                            </div>
                        @endif

                        <!-- Description -->
                        @if ($service->description)
                            <div class="mt-3 text-sm text-gray-700">
                                {!! $service->description !!}
                            </div>
                        @endif

                        <!-- Status Badge -->
                        <div class="mt-auto text-center pt-3">
                            @if ($service->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No services available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
