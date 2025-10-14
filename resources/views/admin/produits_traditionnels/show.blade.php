{{-- resources/views/admin/produits_traditionnels/show.blade.php --}}

@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- En-tête -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ $produitTraditionnel->nom }}</h1>
            <nav class="flex mt-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.produits_traditionnels.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
                            <i class="fas fa-box mr-2"></i>
                            Produits
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">Détails</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.produits_traditionnels.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>
    </div>

    <!-- Messages de succès -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                <span class="text-green-800">{{ session('success') }}</span>
                <button type="button" class="ml-auto text-green-500 hover:text-green-700" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Colonne gauche - Images et infos principales (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Galerie d'images -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <div class="grid grid-cols-1 {{ $produitTraditionnel->image && $produitTraditionnel->image1 ? 'md:grid-cols-2' : '' }} gap-4">
                        @if($produitTraditionnel->image)
                            <div class="relative group">
                                <img src="{{ Storage::url($produitTraditionnel->image) }}" alt="{{ $produitTraditionnel->nom }}" class="w-full h-96 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow duration-300">
                                <span class="absolute top-3 left-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-600 text-white shadow-lg">
                                    <i class="fas fa-star mr-1"></i>
                                    Image principale
                                </span>
                            </div>
                        @endif
                        @if($produitTraditionnel->image1)
                            <div class="relative group">
                                <img src="{{ Storage::url($produitTraditionnel->image1) }}" alt="{{ $produitTraditionnel->nom }}" class="w-full h-96 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow duration-300">
                                <span class="absolute top-3 left-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-600 text-white shadow-lg">
                                    <i class="fas fa-image mr-1"></i>
                                    Image secondaire
                                </span>
                            </div>
                        @endif
                        @if(!$produitTraditionnel->image && !$produitTraditionnel->image1)
                            <div class="col-span-full text-center py-16 bg-gray-50 rounded-lg">
                                <i class="fas fa-image text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 font-medium">Aucune image disponible</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                    <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-align-left mr-3 text-blue-600"></i>
                        Description
                    </h5>
                </div>
                <div class="p-6">
                    @if($produitTraditionnel->description)
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $produitTraditionnel->description }}</p>
                    @else
                        <p class="text-gray-400 italic">Aucune description disponible</p>
                    @endif
                </div>
            </div>

            <!-- Informations culturelles -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-200">
                    <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-globe mr-3 text-green-600"></i>
                        Informations culturelles
                    </h5>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                                <i class="fas fa-user text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Créateur / Artisan</p>
                                <p class="font-semibold text-gray-900">{{ $produitTraditionnel->createur ?? 'Non renseigné' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                                <i class="fas fa-map-marker-alt text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Origine</p>
                                <p class="font-semibold text-gray-900">{{ $produitTraditionnel->origine ?? 'Non renseigné' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 bg-cyan-100 rounded-lg p-3">
                                <i class="fas fa-users text-cyan-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Culture associée</p>
                                <p class="font-semibold text-gray-900">{{ $produitTraditionnel->culture_associee ?? 'Non renseigné' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                                <i class="fas fa-hammer text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Matériaux</p>
                                <p class="font-semibold text-gray-900">{{ $produitTraditionnel->materiaux ?? 'Non renseigné' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations de contact -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-200">
                    <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-phone mr-3 text-purple-600"></i>
                        Informations de contact
                    </h5>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 bg-green-100 rounded-lg p-4">
                                <i class="fab fa-whatsapp text-green-600 text-3xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-2">WhatsApp</p>
                                @if($produitTraditionnel->contact_whatsapp)
                                    <p class="font-semibold text-gray-900 mb-3">{{ $produitTraditionnel->contact_whatsapp }}</p>
                                    <a href="https://wa.me/{{ str_replace([' ', '+', '-'], '', $produitTraditionnel->contact_whatsapp) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        <i class="fab fa-whatsapp mr-2"></i>Contacter
                                    </a>
                                @else
                                    <p class="text-gray-400 italic">Non renseigné</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 bg-red-100 rounded-lg p-4">
                                <i class="fas fa-envelope text-red-600 text-3xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-2">Email</p>
                                @if($produitTraditionnel->contact_gmail)
                                    <p class="font-semibold text-gray-900 mb-3 break-all">{{ $produitTraditionnel->contact_gmail }}</p>
                                    <a href="mailto:{{ $produitTraditionnel->contact_gmail }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        <i class="fas fa-envelope mr-2"></i>Envoyer un email
                                    </a>
                                @else
                                    <p class="text-gray-400 italic">Non renseigné</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne droite - Informations et actions (1/3) -->
        <div class="space-y-6">
            <!-- Prix et disponibilité -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <div class="text-center mb-6">
                        <p class="text-sm text-gray-500 mb-2 uppercase tracking-wide">Prix</p>
                        <h2 class="text-5xl font-bold text-blue-600">
                            {{ number_format($produitTraditionnel->prix, 0, ',', ' ') }}
                            <span class="text-xl text-gray-500">FCFA</span>
                        </h2>
                    </div>

                    <div class="border-t border-gray-200 pt-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Catégorie</span>
                            @if($produitTraditionnel->categorie)
                                <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full bg-gray-100 text-gray-800">
                                    {{ $produitTraditionnel->categorie }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Quantité en stock</span>
                            @if($produitTraditionnel->quantite > 10)
                                <span class="inline-flex px-3 py-1 text-lg font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $produitTraditionnel->quantite }}
                                </span>
                            @elseif($produitTraditionnel->quantite > 0)
                                <span class="inline-flex px-3 py-1 text-lg font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    {{ $produitTraditionnel->quantite }}
                                </span>
                            @else
                                <span class="inline-flex px-3 py-1 text-lg font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ $produitTraditionnel->quantite }}
                                </span>
                            @endif
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Disponibilité</span>
                            <form method="POST" action="{{ route('admin.produits_traditionnels.toggle-disponibilite', $produitTraditionnel) }}">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ $produitTraditionnel->disponible ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                    <i class="fas {{ $produitTraditionnel->disponible ? 'fa-check' : 'fa-times' }} mr-2"></i>
                                    {{ $produitTraditionnel->disponible ? 'Disponible' : 'Indisponible' }}
                                </button>
                            </form>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Exposition</span>
                            <form method="POST" action="{{ route('admin.produits_traditionnels.toggle-exposition', $produitTraditionnel) }}">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ $produitTraditionnel->est_expose ? 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                    <i class="fas {{ $produitTraditionnel->est_expose ? 'fa-eye' : 'fa-eye-slash' }} mr-2"></i>
                                    {{ $produitTraditionnel->est_expose ? 'Exposé' : 'Non exposé' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mise à jour rapide de la quantité -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-orange-50 to-red-50 px-6 py-4 border-b border-gray-200">
                    <h6 class="text-base font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-box mr-3 text-orange-600"></i>
                        Mise à jour du stock
                    </h6>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.produits_traditionnels.update-quantite', $produitTraditionnel) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">Nouvelle quantité</label>
                            <input type="number" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" id="quantite" name="quantite" value="{{ $produitTraditionnel->quantite }}" min="0" required>
                        </div>
                        <button type="submit" class="w-full flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-sync mr-2"></i>Mettre à jour
                        </button>
                    </form>
                </div>
            </div>

            <!-- Informations système -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-slate-50 px-6 py-4 border-b border-gray-200">
                    <h6 class="text-base font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-info-circle mr-3 text-gray-600"></i>
                        Informations système
                    </h6>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">ID du produit</p>
                        <p class="font-bold text-gray-900">#{{ $produitTraditionnel->id }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Date de création</p>
                        <p class="text-gray-900">
                            <i class="fas fa-calendar mr-2 text-gray-400"></i>
                            {{ $produitTraditionnel->created_at->format('d/m/Y') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">{{ $produitTraditionnel->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Dernière modification</p>
                        <p class="text-gray-900">
                            <i class="fas fa-clock mr-2 text-gray-400"></i>
                            {{ $produitTraditionnel->updated_at->format('d/m/Y à H:i') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">{{ $produitTraditionnel->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-gray-200">
                    <h6 class="text-base font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-bolt mr-3 text-indigo-600"></i>
                        Actions rapides
                    </h6>
                </div>
                <div class="p-6 space-y-3">
                    <form method="POST" action="{{ route('admin.produits_traditionnels.duplicate', $produitTraditionnel) }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                            <i class="fas fa-copy mr-2"></i>Dupliquer le produit
                        </button>
                    </form>
                    <a href="{{ route('admin.produits_traditionnels.index') }}" class="w-full flex items-center justify-center px-4 py-2.5 bg-gray-800 hover:bg-gray-900 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-list mr-2"></i>Tous les produits
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
