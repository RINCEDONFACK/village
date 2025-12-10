@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- En-tête -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Gestion des Albums</h1>
            <nav class="flex mt-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm text-gray-600 dark:text-gray-400">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <span class="mx-2">/</span>
                        <span class="text-gray-900 dark:text-white">Albums</span>
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.albums.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
            <i class="fas fa-plus mr-2"></i>
            Nouvel Album
        </a>
    </div>

    <!-- Messages de succès -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 flex items-center justify-between">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-3 text-green-500"></i>
            <span>{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.parentElement.remove()" class="text-green-700 hover:text-green-900">
            <i class="fas fa-times"></i>
        </button>
    </div>
    @endif

    <!-- Statistiques -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Albums -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">
                        Total Albums
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">
                        {{ $albums->count() }}
                    </p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-full">
                    <i class="fas fa-folder text-2xl text-blue-600 dark:text-blue-300"></i>
                </div>
            </div>
        </div>

        <!-- Total Photos -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">
                        Total Photos
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">
                        {{ $albums->sum(function($album) {
                            $count = 0;
                            for($i = 1; $i <= 10; $i++) {
                                if($album->{'photo'.$i}) $count++;
                            }
                            return $count;
                        }) }}
                    </p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900 rounded-full">
                    <i class="fas fa-images text-2xl text-green-600 dark:text-green-300"></i>
                </div>
            </div>
        </div>

        <!-- Album le plus récent -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">
                        Plus Récent
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">
                        {{ $albums->first() ? $albums->first()->created_at->diffForHumans() : 'N/A' }}
                    </p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-full">
                    <i class="fas fa-clock text-2xl text-purple-600 dark:text-purple-300"></i>
                </div>
            </div>
        </div>

        <!-- Moyenne Photos -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wide">
                        Moyenne/Album
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">
                        {{ $albums->count() > 0 ? number_format($albums->sum(function($album) {
                            $count = 0;
                            for($i = 1; $i <= 10; $i++) {
                                if($album->{'photo'.$i}) $count++;
                            }
                            return $count;
                        }) / $albums->count(), 1) : '0' }}
                    </p>
                </div>
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900 rounded-full">
                    <i class="fas fa-chart-bar text-2xl text-yellow-600 dark:text-yellow-300"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des albums -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                <i class="fas fa-list mr-2 text-blue-600"></i>
                Liste des Albums ({{ $albums->count() }})
            </h3>
            <div class="flex gap-2">
                <button id="viewGrid"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                    <i class="fas fa-th mr-1"></i>
                    Grille
                </button>
                <button id="viewTable"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200 text-sm font-medium">
                    <i class="fas fa-table mr-1"></i>
                    Tableau
                </button>
            </div>
        </div>

        <div class="p-6">
            @if($albums->isEmpty())
                <!-- État vide -->
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-full mb-4">
                        <i class="fas fa-folder-open text-4xl text-gray-400"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Aucun album pour le moment</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-6">Créez votre premier album pour commencer</p>
                    <a href="{{ route('admin.albums.create') }}"
                       class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                        <i class="fas fa-plus mr-2"></i>
                        Créer un album
                    </a>
                </div>
            @else
                <!-- Vue Grille -->
                <div id="gridView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($albums as $album)
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group hover:-translate-y-1">
                        <!-- Image de couverture -->
                        <div class="relative h-48 overflow-hidden">
                            @php
                                $coverPhoto = null;
                                for($i = 1; $i <= 10; $i++) {
                                    if($album->{'photo'.$i}) {
                                        $coverPhoto = $album->{'photo'.$i};
                                        break;
                                    }
                                }
                            @endphp

                            @if($coverPhoto)
                                <img src="{{ asset('storage/' . $coverPhoto) }}"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300"
                                     alt="{{ $album->titre }}">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-600 dark:to-gray-700 flex items-center justify-center">
                                    <i class="fas fa-images text-5xl text-gray-400 dark:text-gray-500"></i>
                                </div>
                            @endif

                            <!-- Badge nombre de photos -->
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center px-3 py-1 bg-black bg-opacity-70 text-white text-xs font-semibold rounded-full backdrop-blur-sm">
                                    <i class="fas fa-camera mr-1"></i>
                                    {{ collect(range(1, 10))->filter(function($i) use ($album) {
                                        return $album->{'photo'.$i};
                                    })->count() }} photos
                                </span>
                            </div>
                        </div>

                        <div class="p-5">
                            <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-1">
                                {{ $album->titre }}
                            </h5>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                {{ $album->description ?: 'Aucune description' }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 flex items-center">
                                <i class="far fa-calendar mr-1"></i>
                                {{ $album->created_at->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="px-5 py-4 bg-gray-50 dark:bg-gray-800 border-t border-gray-100 dark:border-gray-600 flex gap-2">
                            <a href="{{ route('admin.albums.show', $album->id) }}"
                               class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200"
                               title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.albums.edit', $album->id) }}"
                               class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-lg transition-colors duration-200"
                               title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button"
                                    onclick="confirmDelete({{ $album->id }})"
                                    class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200"
                                    title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Vue Tableau -->
                <div id="tableView" class="hidden overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase bg-white text-gray-900 border-b-2 border-gray-200">
                            <tr>
                                <th class="px-4 py-3 font-semibold">Image</th>
                                <th class="px-4 py-3 font-semibold">Titre</th>
                                <th class="px-4 py-3 font-semibold">Description</th>
                                <th class="px-4 py-3 text-center font-semibold">Photos</th>
                                <th class="px-4 py-3 font-semibold">Date</th>
                                <th class="px-4 py-3 text-center font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($albums as $album)
                            <tr class="bg-white hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-4 py-3">
                                    @php
                                        $coverPhoto = null;
                                        for($i = 1; $i <= 10; $i++) {
                                            if($album->{'photo'.$i}) {
                                                $coverPhoto = $album->{'photo'.$i};
                                                break;
                                            }
                                        }
                                    @endphp

                                    @if($coverPhoto)
                                        <img src="{{ asset('storage/' . $coverPhoto) }}"
                                             class="w-16 h-16 rounded-lg object-cover"
                                             alt="{{ $album->titre }}">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-images text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-semibold text-gray-900">
                                    {{ $album->titre }}
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    {{ Str::limit($album->description, 80) ?: '-' }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        {{ collect(range(1, 10))->filter(function($i) use ($album) {
                                            return $album->{'photo'.$i};
                                        })->count() }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    {{ $album->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.albums.show', $album->id) }}"
                                           class="p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200"
                                           title="Voir">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        <a href="{{ route('admin.albums.edit', $album->id) }}"
                                           class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200"
                                           title="Modifier">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        <button type="button"
                                                onclick="confirmDelete({{ $album->id }})"
                                                class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200"
                                                title="Supprimer">
                                            <i class="fas fa-trash text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-md w-full overflow-hidden transform transition-all">
        <div class="bg-red-600 px-6 py-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white flex items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Confirmer la suppression
            </h3>
            <button onclick="closeDeleteModal()" class="text-white hover:text-gray-200 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6">
            <p class="text-gray-700 dark:text-gray-300 mb-3">
                Êtes-vous sûr de vouloir supprimer cet album ?
            </p>
            <p class="text-red-600 dark:text-red-400 font-semibold">
                Cette action est irréversible et supprimera toutes les photos associées.
            </p>
        </div>
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 flex gap-3 justify-end">
            <button onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-times mr-1"></i>
                Annuler
            </button>
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <i class="fas fa-trash mr-1"></i>
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Confirmation de suppression
function confirmDelete(albumId) {
    const form = document.getElementById('deleteForm');
    form.action = `/admin/albums/${albumId}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Basculer entre vue grille et tableau
document.getElementById('viewGrid').addEventListener('click', function() {
    document.getElementById('gridView').classList.remove('hidden');
    document.getElementById('tableView').classList.add('hidden');
    this.classList.remove('bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
    this.classList.add('bg-blue-600', 'text-white');
    document.getElementById('viewTable').classList.remove('bg-blue-600', 'text-white');
    document.getElementById('viewTable').classList.add('bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
});

document.getElementById('viewTable').addEventListener('click', function() {
    document.getElementById('gridView').classList.add('hidden');
    document.getElementById('tableView').classList.remove('hidden');
    this.classList.remove('bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
    this.classList.add('bg-blue-600', 'text-white');
    document.getElementById('viewGrid').classList.remove('bg-blue-600', 'text-white');
    document.getElementById('viewGrid').classList.add('bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-300');
});

// Fermer modal avec Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDeleteModal();
    }
});

// Auto-hide success alert
setTimeout(function() {
    const alert = document.querySelector('.bg-green-100');
    if (alert) {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
    }
}, 5000);
</script>
@endsection
