@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- En-tête -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Créer un nouvel album</h1>
            <nav class="flex mt-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm text-gray-600 dark:text-gray-400">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <span class="mx-2">/</span>
                        <a href="{{ route('admin.albums.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                            Albums
                        </a>
                    </li>
                    <li>
                        <span class="mx-2">/</span>
                        <span class="text-gray-900 dark:text-white">Créer</span>
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.albums.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
            <i class="fas fa-arrow-left mr-2"></i>
            Retour
        </a>
    </div>

    <!-- Formulaire -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                <i class="fas fa-images mr-2 text-blue-600"></i>
                Informations de l'album
            </h3>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.albums.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Titre et Description -->
                <div class="space-y-4 mb-6">
                    <!-- Titre -->
                    <div>
                        <label for="titre" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Titre de l'album <span class="text-red-600">*</span>
                        </label>
                        <input type="text"
                               class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('titre') border-red-500 @enderror"
                               id="titre"
                               name="titre"
                               value="{{ old('titre') }}"
                               required
                               placeholder="Ex: Voyage à Paris 2024">
                        @error('titre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Description
                        </label>
                        <textarea class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('description') border-red-500 @enderror"
                                  id="description"
                                  name="description"
                                  rows="4"
                                  placeholder="Décrivez votre album...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <hr class="my-6 border-gray-200 dark:border-gray-700">

                <!-- Section Photos -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-camera mr-2 text-blue-600"></i>
                            Photos de l'album (Maximum 10)
                        </h5>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                        Formats acceptés: JPG, JPEG, PNG, GIF | Taille maximale: 2 MB par photo
                    </p>

                    <!-- Zone de sélection multiple -->
                    <div class="mb-6 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-800 border-2 border-dashed border-blue-300 dark:border-blue-600 rounded-xl p-8 text-center">
                        <input type="file"
                               id="multiplePhotos"
                               multiple
                               accept="image/*"
                               class="hidden"
                               onchange="handleMultipleFiles(this)">
                        <label for="multiplePhotos" class="cursor-pointer">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-cloud-upload-alt text-5xl text-blue-600 dark:text-blue-400 mb-4"></i>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    Sélectionner plusieurs photos à la fois
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                    Cliquez ici ou glissez-déposez vos photos (max 10)
                                </p>
                                <span class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                                    <i class="fas fa-folder-open mr-2"></i>
                                    Parcourir mes fichiers
                                </span>
                            </div>
                        </label>
                        <div id="selectedCount" class="mt-4 text-sm font-medium text-gray-700 dark:text-gray-300"></div>
                    </div>

                    <!-- Grille de prévisualisation -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @for ($i = 1; $i <= 10; $i++)
                        <div class="bg-white dark:bg-gray-700 rounded-xl border-2 border-gray-200 dark:border-gray-600 overflow-hidden hover:border-blue-500 dark:hover:border-blue-400 transition-colors duration-200">
                            <!-- En-tête -->
                            <div class="bg-gray-50 dark:bg-gray-800 px-4 py-2 border-b border-gray-200 dark:border-gray-600 flex justify-between items-center">
                                <h6 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Photo {{ $i }}</h6>
                                <button type="button"
                                        onclick="clearPhoto({{ $i }})"
                                        id="clearBtn{{ $i }}"
                                        class="hidden text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                        title="Supprimer">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <!-- Corps -->
                            <div class="p-4">
                                <!-- Prévisualisation -->
                                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 mb-4 flex items-center justify-center overflow-hidden" style="min-height: 200px;">
                                    <img id="preview{{ $i }}"
                                         src="https://via.placeholder.com/300x200?text=Photo+{{ $i }}"
                                         alt="Preview {{ $i }}"
                                         class="max-h-48 w-full object-cover rounded-lg border-2 border-gray-300 dark:border-gray-600 transition-transform duration-300 hover:scale-105">
                                </div>

                                <!-- Input File caché (utilisé pour stocker la photo) -->
                                <input type="file"
                                       class="hidden"
                                       id="photo{{ $i }}"
                                       name="photo{{ $i }}"
                                       accept="image/*"
                                       onchange="previewImage({{ $i }}, this)">

                                <!-- Bouton de sélection individuelle -->
                                <label for="photo{{ $i }}"
                                       class="flex items-center justify-center w-full px-4 py-2.5 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-lg cursor-pointer transition-colors duration-200">
                                    <i class="fas fa-upload mr-2"></i>
                                    <span id="label{{ $i }}">Choisir individuellement</span>
                                </label>
                                @error('photo'.$i)
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Boutons -->
                <div class="flex flex-col sm:flex-row justify-between gap-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('admin.albums.index') }}"
                       class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                        <i class="fas fa-times mr-2"></i>
                        Annuler
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                        <i class="fas fa-save mr-2"></i>
                        Créer l'album
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Gérer la sélection multiple de fichiers
function handleMultipleFiles(input) {
    const files = Array.from(input.files);
    const maxFiles = 10;

    // Limiter à 10 fichiers
    const filesToProcess = files.slice(0, maxFiles);

    // Afficher le nombre de fichiers sélectionnés
    const countDiv = document.getElementById('selectedCount');
    countDiv.innerHTML = `<i class="fas fa-check-circle text-green-600 mr-2"></i>${filesToProcess.length} photo(s) sélectionnée(s)`;

    // Distribuer les fichiers dans les inputs individuels
    filesToProcess.forEach((file, index) => {
        const photoNumber = index + 1;
        const fileInput = document.getElementById('photo' + photoNumber);

        // Créer un nouveau DataTransfer pour ajouter le fichier
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;

        // Déclencher la prévisualisation
        previewImage(photoNumber, fileInput);
    });
}

// Prévisualisation d'une image individuelle
function previewImage(number, input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('preview' + number).src = e.target.result;
            document.getElementById('clearBtn' + number).classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);

        // Mettre à jour le label avec le nom du fichier
        const fileName = input.files[0].name;
        const label = document.getElementById('label' + number);

        if (fileName.length > 20) {
            label.textContent = fileName.substring(0, 17) + '...';
        } else {
            label.textContent = fileName;
        }
    }
}

// Supprimer une photo
function clearPhoto(number) {
    const fileInput = document.getElementById('photo' + number);
    const preview = document.getElementById('preview' + number);
    const label = document.getElementById('label' + number);
    const clearBtn = document.getElementById('clearBtn' + number);

    // Réinitialiser l'input
    fileInput.value = '';

    // Réinitialiser la prévisualisation
    preview.src = `https://via.placeholder.com/300x200?text=Photo+${number}`;

    // Réinitialiser le label
    label.textContent = 'Choisir individuellement';

    // Cacher le bouton de suppression
    clearBtn.classList.add('hidden');
}

// Support du Drag and Drop
const dropZone = document.querySelector('label[for="multiplePhotos"]').parentElement;

dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('border-blue-500', 'bg-blue-100', 'dark:bg-blue-900');
});

dropZone.addEventListener('dragleave', (e) => {
    e.preventDefault();
    dropZone.classList.remove('border-blue-500', 'bg-blue-100', 'dark:bg-blue-900');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('border-blue-500', 'bg-blue-100', 'dark:bg-blue-900');

    const files = e.dataTransfer.files;
    const input = document.getElementById('multiplePhotos');
    input.files = files;
    handleMultipleFiles(input);
});
</script>
@endsection
