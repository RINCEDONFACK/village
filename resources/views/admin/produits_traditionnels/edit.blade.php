@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- En-tête -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                Modifier : {{ $produitTraditionnel->nom ?? 'Produit' }}
            </h1>
            <nav class="flex mt-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.produits_traditionnels.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <i class="fas fa-home mr-2"></i>
                            Produits
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">Modifier</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex gap-2">
            @if(isset($produitTraditionnel) && $produitTraditionnel->id)
                <a href="{{ route('admin.produits_traditionnels.show', $produitTraditionnel->id) }}" class="inline-flex items-center px-4 py-2 bg-cyan-100 hover:bg-cyan-200 text-cyan-700 font-medium rounded-lg transition-colors">
                    <i class="fas fa-eye mr-2"></i>Voir le produit
                </a>
            @endif
            <a href="{{ route('admin.produits_traditionnels.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    @if(isset($produitTraditionnel) && $produitTraditionnel->id)
        <form action="{{ route('admin.produits_traditionnels.update', $produitTraditionnel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @php
                $produit = $produitTraditionnel;
            @endphp
            @include('admin.produits_traditionnels._form')
        </form>
    @else
        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-red-800">Produit introuvable</h3>
                    <p class="text-red-700 mt-1">Le produit que vous essayez de modifier n'existe pas ou a été supprimé.</p>
                    <div class="mt-4">
                        <a href="{{ route('admin.produits_traditionnels.index') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
