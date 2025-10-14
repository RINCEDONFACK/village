@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- En-tête -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Statistiques des Produits</h1>
            <p class="text-gray-600 mt-1">Vue d'ensemble de votre inventaire traditionnel</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.produits_traditionnels.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
            <a href="{{ route('admin.produits_traditionnels.export') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                <i class="fas fa-file-export mr-2"></i>Exporter
            </a>
        </div>
    </div>

    <!-- Statistiques principales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <!-- Total Produits -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-white bg-opacity-20 rounded-lg p-3">
                    <i class="fas fa-box text-2xl"></i>
                </div>
                <span class="text-sm font-medium bg-white bg-opacity-20 px-3 py-1 rounded-full">Total</span>
            </div>
            <p class="text-4xl font-bold mb-1">{{ number_format($stats['total']) }}</p>
            <p class="text-blue-100 text-sm">Produits au total</p>
        </div>

        <!-- Disponibles -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-white bg-opacity-20 rounded-lg p-3">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
                <span class="text-sm font-medium bg-white bg-opacity-20 px-3 py-1 rounded-full">
                    {{ $stats['total'] > 0 ? round(($stats['disponibles'] / $stats['total']) * 100) : 0 }}%
                </span>
            </div>
            <p class="text-4xl font-bold mb-1">{{ number_format($stats['disponibles']) }}</p>
            <p class="text-green-100 text-sm">Produits disponibles</p>
        </div>

        <!-- Exposés -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-white bg-opacity-20 rounded-lg p-3">
                    <i class="fas fa-eye text-2xl"></i>
                </div>
                <span class="text-sm font-medium bg-white bg-opacity-20 px-3 py-1 rounded-full">
                    {{ $stats['total'] > 0 ? round(($stats['exposes'] / $stats['total']) * 100) : 0 }}%
                </span>
            </div>
            <p class="text-4xl font-bold mb-1">{{ number_format($stats['exposes']) }}</p>
            <p class="text-yellow-100 text-sm">Produits exposés</p>
        </div>

        <!-- Rupture de stock -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-white bg-opacity-20 rounded-lg p-3">
                    <i class="fas fa-exclamation-triangle text-2xl"></i>
                </div>
                <span class="text-sm font-medium bg-white bg-opacity-20 px-3 py-1 rounded-full">
                    {{ $stats['total'] > 0 ? round(($stats['rupture_stock'] / $stats['total']) * 100) : 0 }}%
                </span>
            </div>
            <p class="text-4xl font-bold mb-1">{{ number_format($stats['rupture_stock']) }}</p>
            <p class="text-red-100 text-sm">En rupture de stock</p>
        </div>

        <!-- Valeur totale -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between mb-2">
                <div class="bg-white bg-opacity-20 rounded-lg p-3">
                    <i class="fas fa-coins text-2xl"></i>
                </div>
                <span class="text-sm font-medium bg-white bg-opacity-20 px-3 py-1 rounded-full">FCFA</span>
            </div>
            <p class="text-4xl font-bold mb-1">{{ number_format($stats['valeur_totale'] ?? 0, 0, ',', ' ') }}</p>
            <p class="text-purple-100 text-sm">Valeur inventaire</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Répartition par catégorie -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-chart-pie mr-3 text-indigo-600"></i>
                    Répartition par Catégorie
                </h5>
            </div>
            <div class="p-6">
                @if($stats['par_categorie']->count() > 0)
                    <div class="space-y-4">
                        @php
                            $colors = [
                                'bg-blue-500',
                                'bg-green-500',
                                'bg-yellow-500',
                                'bg-red-500',
                                'bg-purple-500',
                                'bg-pink-500',
                                'bg-indigo-500',
                                'bg-cyan-500',
                                'bg-orange-500'
                            ];
                        @endphp
                        @foreach($stats['par_categorie'] as $index => $categorie)
                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-700">
                                        {{ $categorie->categorie ?: 'Non catégorisé' }}
                                    </span>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-semibold text-gray-900">{{ $categorie->count }}</span>
                                        <span class="text-xs text-gray-500">
                                            ({{ $stats['total'] > 0 ? round(($categorie->count / $stats['total']) * 100) : 0 }}%)
                                        </span>
                                    </div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                    <div class="{{ $colors[$index % count($colors)] }} h-3 rounded-full transition-all duration-500"
                                         style="width: {{ $stats['total'] > 0 ? ($categorie->count / $stats['total']) * 100 : 0 }}%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-500">Aucune catégorie trouvée</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Produits à faible stock -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-red-50 to-orange-50 px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-red-600"></i>
                    Produits à Faible Stock
                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Stock &lt; 5
                    </span>
                </h5>
            </div>
            <div class="p-6">
                @if($stats['produits_populaires']->count() > 0)
                    <div class="space-y-3">
                        @foreach($stats['produits_populaires'] as $produit)
                            <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                @if($produit->image)
                                    <img src="{{ Storage::url($produit->image) }}" alt="{{ $produit->nom }}" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                                @else
                                    <div class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-900 truncate">{{ $produit->nom }}</p>
                                    <p class="text-sm text-gray-600">
                                        {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                        @if($produit->categorie)
                                            <span class="text-gray-400">•</span>
                                            <span class="text-gray-500">{{ $produit->categorie }}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    @if($produit->quantite == 0)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i>
                                            Épuisé
                                        </span>
                                    @elseif($produit->quantite < 3)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            {{ $produit->quantite }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-exclamation mr-1"></i>
                                            {{ $produit->quantite }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('admin.produits_traditionnels.index', ['sort' => 'quantite', 'order' => 'asc']) }}" class="flex items-center justify-center w-full px-4 py-2 bg-red-50 hover:bg-red-100 text-red-700 font-medium rounded-lg transition-colors">
                            <i class="fas fa-arrow-right mr-2"></i>
                            Voir tous les produits à faible stock
                        </a>
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-check-circle text-4xl text-green-300 mb-3"></i>
                        <p class="text-gray-500">Tous les stocks sont suffisants !</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Informations supplémentaires -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Stock moyen -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center gap-4">
                <div class="bg-cyan-100 rounded-lg p-3">
                    <i class="fas fa-layer-group text-cyan-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Stock Moyen</p>
                    <p class="text-2xl font-bold text-gray-900">
                        @if($stats['total'] > 0)
                            {{ number_format(\App\Models\ProduitTraditionnel::avg('quantite'), 1) }}
                        @else
                            0
                        @endif
                        <span class="text-sm font-normal text-gray-500">unités</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Prix moyen -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center gap-4">
                <div class="bg-emerald-100 rounded-lg p-3">
                    <i class="fas fa-tag text-emerald-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Prix Moyen</p>
                    <p class="text-2xl font-bold text-gray-900">
                        @if($stats['total'] > 0)
                            {{ number_format(\App\Models\ProduitTraditionnel::avg('prix'), 0, ',', ' ') }}
                        @else
                            0
                        @endif
                        <span class="text-sm font-normal text-gray-500">FCFA</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Taux de disponibilité -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center gap-4">
                <div class="bg-violet-100 rounded-lg p-3">
                    <i class="fas fa-percentage text-violet-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Taux de Disponibilité</p>
                    <p class="text-2xl font-bold text-gray-900">
                        {{ $stats['total'] > 0 ? round(($stats['disponibles'] / $stats['total']) * 100) : 0 }}%
                        <span class="text-sm font-normal text-gray-500">des produits</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl shadow-sm p-6 border border-blue-100">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="bg-blue-100 rounded-lg p-3">
                    <i class="fas fa-bolt text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Actions Rapides</h3>
                    <p class="text-sm text-gray-600">Gérez rapidement votre inventaire</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <form method="POST" action="{{ route('admin.produits_traditionnels.check-stock') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg border border-gray-200 transition-colors shadow-sm">
                        <i class="fas fa-sync mr-2"></i>
                        Vérifier les stocks
                    </button>
                </form>
                <a href="{{ route('admin.produits_traditionnels.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm">
                    <i class="fas fa-plus mr-2"></i>
                    Nouveau produit
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .space-y-4 > * {
        animation: slideIn 0.3s ease-out forwards;
    }

    .space-y-4 > *:nth-child(1) { animation-delay: 0.05s; }
    .space-y-4 > *:nth-child(2) { animation-delay: 0.1s; }
    .space-y-4 > *:nth-child(3) { animation-delay: 0.15s; }
    .space-y-4 > *:nth-child(4) { animation-delay: 0.2s; }
    .space-y-4 > *:nth-child(5) { animation-delay: 0.25s; }
</style>
@endsection
