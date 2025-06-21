@extends('admin.layouts.app')
@section('pageTitle', 'Ajouter une formation IT')
@section('pageSubTitle', 'Formations / Ajout')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.itcommunities.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des formations
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Créer une formation IT</h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Messages d'erreur -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('admin.itcommunities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Titre -->
                <div class="md:col-span-1">
                    <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">
                        Titre <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="titre" id="titre" required
                           value="{{ old('titre') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 @error('titre') border-red-500 @enderror"
                           placeholder="Ex: Formation Laravel Avancée" />
                    @error('titre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Référence -->
                <div class="md:col-span-1">
                    <label for="reference" class="block text-sm font-medium text-gray-700 mb-1">Référence</label>
                    <input type="text" name="reference" id="reference"
                           value="{{ old('reference') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 @error('reference') border-red-500 @enderror"
                           placeholder="Ex: FORM-001" />
                    @error('reference')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Description <span class="text-red-500">*</span>
                </label>
                <textarea name="description" id="description" rows="6" required
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 @error('description') border-red-500 @enderror"
                          placeholder="Décrivez le contenu et les objectifs de la formation...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Durée -->
                <div>
                    <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée (heures)</label>
                    <input type="number" name="duree" id="duree" min="1"
                           value="{{ old('duree') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 @error('duree') border-red-500 @enderror"
                           placeholder="40" />
                    @error('duree')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date début -->
                <div>
                    <label for="date_debut" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                    <input type="date" name="date_debut" id="date_debut"
                           value="{{ old('date_debut') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 @error('date_debut') border-red-500 @enderror" />
                    @error('date_debut')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date fin -->
                <div>
                    <label for="date_fin" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                    <input type="date" name="date_fin" id="date_fin"
                           value="{{ old('date_fin') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 @error('date_fin') border-red-500 @enderror" />
                    @error('date_fin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Lieu -->
                <div>
                    <label for="lieu" class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                    <input type="text" name="lieu" id="lieu"
                           value="{{ old('lieu') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 @error('lieu') border-red-500 @enderror"
                           placeholder="Ex: Salle de formation A, En ligne..." />
                    @error('lieu')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Formateur -->
                <div>
                    <label for="formateur" class="block text-sm font-medium text-gray-700 mb-1">Formateur</label>
                    <input type="text" name="formateur" id="formateur"
                           value="{{ old('formateur') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300 @error('formateur') border-red-500 @enderror"
                           placeholder="Nom du formateur" />
                    @error('formateur')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image de la formation</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                <span>Télécharger une image</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                            </label>
                            <p class="pl-1">ou glisser-déposer</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, WEBP jusqu'à 2MB</p>
                    </div>
                </div>
                <div id="imagePreview" class="mt-4 hidden">
                    <img id="preview" src="" alt="Aperçu" class="max-w-xs h-32 object-cover rounded-lg border">
                </div>
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Statut actif -->
            <div class="flex items-center">
                <input type="hidden" name="actif" value="0">
                <input type="checkbox" name="actif" id="actif" value="1" {{ old('actif', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="actif" class="ml-2 block text-sm text-gray-700">
                    Formation active (visible pour les utilisateurs)
                </label>
            </div>

            <!-- Boutons -->
            <div class="pt-5 flex justify-between">
                <a href="{{ route('admin.itcommunities.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-6 rounded-lg transition-colors">
                    Annuler
                </a>
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
                    <i class="fa fa-save mr-2"></i>
                    Enregistrer la formation
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Aperçu de l'image
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Validation des dates
    document.getElementById('date_debut').addEventListener('change', function() {
        const dateDebut = this.value;
        const dateFin = document.getElementById('date_fin');

        if (dateDebut) {
            dateFin.min = dateDebut;
            if (dateFin.value && dateFin.value < dateDebut) {
                dateFin.value = '';
            }
        }
    });
</script>
@endsection
