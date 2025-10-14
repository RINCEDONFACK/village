@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Nouveau Produit Traditionnel</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.produits_traditionnels.index') }}">Produits</a></li>
                    <li class="breadcrumb-item active">Nouveau</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('admin.produits_traditionnels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.produits_traditionnels._form')
    </form>
</div>
@endsection
