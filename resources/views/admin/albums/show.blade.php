@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden">

        <!-- Bouton retour -->
        <div class="px-6 pt-6">
            <a href="{{ route('admin.albums.index') }}"
               class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-sm font-medium transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour à la liste des albums
            </a>
        </div>

        <!-- En-tête avec titre -->
        <div class="px-6 py-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white flex items-center gap-2 flex-wrap">
                Détail de l'album :
                <span class="text-blue-600 dark:text-blue-400">{{ $album->titre }}</span>
            </h2>
            <hr class="border-t-2 border-blue-500 mt-4">
        </div>

        <!-- Informations principales -->
        <div class="px-6 pb-6">
            <div class="space-y-4 text-gray-700 dark:text-gray-300">
                <!-- Titre -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <strong class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Titre :</strong>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $album->titre }}</p>
                </div>

                <!-- Description -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <strong class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Description :</strong>
                    <div class="text-gray-800 dark:text-gray-200 leading-relaxed">
                        {{ $album->description ?: 'Aucune description fournie' }}
                    </div>
                </div>

                <!-- Date de création -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <strong class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Date de création :</strong>
                    <p class="text-gray-800 dark:text-gray-200 flex items-center">
                        <i class="far fa-calendar-alt mr-2 text-blue-600"></i>
                        {{ $album->created_at->format('d/m/Y à H:i') }}
                    </p>
                </div>

                <!-- Nombre de photos -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <strong class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Nombre de photos :</strong>
                    <p class="text-gray-800 dark:text-gray-200">
                        <span class="inline-flex items-center px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full font-semibold">
                            <i class="fas fa-images mr-2"></i>
                            {{ collect(range(1, 10))->filter(function($i) use ($album) {
                                return $album->{'photo'.$i};
                            })->count() }} photo(s)
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Galerie de photos -->
        @php
            $photos = [];
            for($i = 1; $i <= 10; $i++) {
                if($album->{'photo'.$i}) {
                    $photos[] = ['number' => $i, 'path' => $album->{'photo'.$i}];
                }
            }
        @endphp

        @if(count($photos) > 0)
            <div class="px-6 pb-6">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-800 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-images mr-2 text-blue-600"></i>
                        Galerie Photos
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($photos as $photo)
                            <div class="group relative bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                <!-- Badge numéro -->
                                <div class="absolute top-2 left-2 z-10">
                                    <span class="inline-flex items-center px-2 py-1 bg-blue-600 text-white text-xs font-bold rounded-full shadow-md">
                                        Photo {{ $photo['number'] }}
                                    </span>
                                </div>

                                <!-- Bouton zoom -->
                                <button onclick="openLightbox('{{ asset('storage/' . $photo['path']) }}', {{ $photo['number'] }})"
                                        class="absolute top-2 right-2 z-10 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <i class="fas fa-search-plus"></i>
                                </button>

                                <!-- Image -->
                                <div class="aspect-w-16 aspect-h-12 bg-gray-200 dark:bg-gray-600">
                                    <img src="{{ asset('storage/' . $photo['path']) }}"
                                         alt="Photo {{ $photo['number'] }}"
                                         class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="px-6 pb-6">
                <div class="bg-yellow-50 dark:bg-yellow-900 border-l-4 border-yellow-400 p-4 rounded">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-yellow-600 dark:text-yellow-400 mr-3"></i>
                        <p class="text-yellow-800 dark:text-yellow-200">
                            Cet album ne contient aucune photo pour le moment.
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Actions -->
        <div class="px-6 pb-6">
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.albums.edit', $album->id) }}"
                   class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    Modifier
                </a>
                <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cet album et toutes ses photos ?');"
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-trash mr-2"></i>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="hidden fixed inset-0 z-50 bg-black bg-opacity-90 flex items-center justify-center p-4">
    <button onclick="closeLightbox()"
            class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl font-bold transition-colors">
        <i class="fas fa-times"></i>
    </button>

    <div class="relative max-w-7xl max-h-full">
        <img id="lightboxImage" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
        <div id="lightboxCaption" class="text-white text-center mt-4 text-lg font-medium"></div>
    </div>

    <!-- Navigation -->
    <button onclick="navigateLightbox(-1)"
            class="absolute left-4 text-white hover:text-gray-300 text-4xl font-bold transition-colors">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button onclick="navigateLightbox(1)"
            class="absolute right-4 text-white hover:text-gray-300 text-4xl font-bold transition-colors">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>

<script>
// Données des photos pour la lightbox
const photos = @json($photos);
let currentPhotoIndex = 0;

function openLightbox(imagePath, photoNumber) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');

    // Trouver l'index de la photo
    currentPhotoIndex = photos.findIndex(p => p.number === photoNumber);

    lightboxImage.src = imagePath;
    lightboxCaption.textContent = `Photo ${photoNumber}`;
    lightbox.classList.remove('hidden');

    // Bloquer le scroll
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.add('hidden');

    // Rétablir le scroll
    document.body.style.overflow = 'auto';
}

function navigateLightbox(direction) {
    currentPhotoIndex += direction;

    // Boucler
    if (currentPhotoIndex < 0) {
        currentPhotoIndex = photos.length - 1;
    } else if (currentPhotoIndex >= photos.length) {
        currentPhotoIndex = 0;
    }

    const photo = photos[currentPhotoIndex];
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');

    lightboxImage.src = "{{ asset('storage') }}/" + photo.path;
    lightboxCaption.textContent = `Photo ${photo.number}`;
}

// Fermer avec Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    } else if (e.key === 'ArrowLeft') {
        navigateLightbox(-1);
    } else if (e.key === 'ArrowRight') {
        navigateLightbox(1);
    }
});

// Fermer en cliquant en dehors de l'image
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});
</script>
@endsection
