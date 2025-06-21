@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des formations IT')
@section('pageSubTitle', 'Formation / Détails')

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.itcommunities.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des formations
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail de la formation : <span class="text-blue-600">{{ $itcommunity->titre }}</span>
        </h2>
        <hr class="border-t-2 border-blue-500 mb-6">

        <!-- Image si présente -->
        @if($itcommunity->image)
        <div class="mb-6">
            <strong class="block text-sm text-gray-500 mb-2">Image :</strong>
            <img src="{{ asset('storage/' . $itcommunity->image) }}"
                 alt="{{ $itcommunity->titre }}"
                 class="w-full max-w-md h-48 object-cover rounded-lg shadow-sm">
        </div>
        @endif

        <!-- Détails -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Titre :</strong>
                <p class="text-lg font-medium">{{ $itcommunity->titre }}</p>
            </div>

            @if($itcommunity->reference)
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Référence :</strong>
                <p class="text-lg">{{ $itcommunity->reference }}</p>
            </div>
            @endif

            @if($itcommunity->duree)
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Durée :</strong>
                <p class="text-lg">{{ $itcommunity->duree }} heures</p>
            </div>
            @endif

            @if($itcommunity->date_debut)
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Date de début :</strong>
                <p class="text-lg">{{ \Carbon\Carbon::parse($itcommunity->date_debut)->format('d/m/Y') }}</p>
            </div>
            @endif

            @if($itcommunity->date_fin)
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Date de fin :</strong>
                <p class="text-lg">{{ \Carbon\Carbon::parse($itcommunity->date_fin)->format('d/m/Y') }}</p>
            </div>
            @endif

            @if($itcommunity->lieu)
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Lieu :</strong>
                <p class="text-lg">{{ $itcommunity->lieu }}</p>
            </div>
            @endif

            @if($itcommunity->formateur)
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Formateur :</strong>
                <p class="text-lg">{{ $itcommunity->formateur }}</p>
            </div>
            @endif

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Statut :</strong>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $itcommunity->actif ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $itcommunity->actif ? 'Actif' : 'Inactif' }}
                </span>
            </div>

        </div>

        <!-- Description -->
        <div class="mt-6">
            <strong class="block text-sm text-gray-500 mb-2">Description :</strong>
            <div class="prose max-w-none bg-gray-50 p-4 rounded-lg">
                {!! nl2br(e($itcommunity->description)) !!}
            </div>
        </div>

        <!-- Métadonnées -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 pt-6 border-t border-gray-200 text-sm text-gray-500">
            <div>
                <strong>Créé le :</strong> {{ $itcommunity->created_at->format('d/m/Y à H:i') }}
            </div>
            <div>
                <strong>Modifié le :</strong> {{ $itcommunity->updated_at->format('d/m/Y à H:i') }}
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.itcommunities.edit', $itcommunity->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                <i class="fas fa-edit mr-1"></i> Modifier
            </a>

            <form action="{{ route('admin.itcommunities.destroy', $itcommunity->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette formation ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    <i class="fas fa-trash-alt mr-1"></i> Supprimer
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
