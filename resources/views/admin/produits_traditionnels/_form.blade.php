<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Colonne gauche - 2/3 -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Informations de base -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-600"></i>
                    Informations de base
                </h5>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom du produit <span class="text-red-500">*</span>
                    </label>
                    <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nom') border-red-500 @enderror" id="nom" name="nom" value="{{ old('nom', $produit->nom ?? '') }}" required>
                    @error('nom')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="categorie" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('categorie') border-red-500 @enderror" id="categorie" name="categorie">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="Artisanat" {{ old('categorie', $produit->categorie ?? '') == 'Artisanat' ? 'selected' : '' }}>Artisanat</option>
                            <option value="Textile" {{ old('categorie', $produit->categorie ?? '') == 'Textile' ? 'selected' : '' }}>Textile</option>
                            <option value="Bijoux" {{ old('categorie', $produit->categorie ?? '') == 'Bijoux' ? 'selected' : '' }}>Bijoux</option>
                            <option value="Poterie" {{ old('categorie', $produit->categorie ?? '') == 'Poterie' ? 'selected' : '' }}>Poterie</option>
                            <option value="Sculpture" {{ old('categorie', $produit->categorie ?? '') == 'Sculpture' ? 'selected' : '' }}>Sculpture</option>
                            <option value="Vannerie" {{ old('categorie', $produit->categorie ?? '') == 'Vannerie' ? 'selected' : '' }}>Vannerie</option>
                            <option value="Instruments" {{ old('categorie', $produit->categorie ?? '') == 'Instruments' ? 'selected' : '' }}>Instruments</option>
                            <option value="Décoration" {{ old('categorie', $produit->categorie ?? '') == 'Décoration' ? 'selected' : '' }}>Décoration</option>
                            <option value="Autre" {{ old('categorie', $produit->categorie ?? '') == 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('categorie')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="origine" class="block text-sm font-medium text-gray-700 mb-2">Origine / Région</label>
                        <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('origine') border-red-500 @enderror" id="origine" name="origine" value="{{ old('origine', $produit->origine ?? '') }}" placeholder="Ex: Douala, Yaoundé...">
                        @error('origine')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('description') border-red-500 @enderror" id="description" name="description" rows="5" placeholder="Décrivez le produit en détail...">{{ old('description', $produit->description ?? '') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
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
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="createur" class="block text-sm font-medium text-gray-700 mb-2">Créateur / Artisan</label>
                        <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('createur') border-red-500 @enderror" id="createur" name="createur" value="{{ old('createur', $produit->createur ?? '') }}" placeholder="Nom de l'artisan">
                        @error('createur')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="culture_associee" class="block text-sm font-medium text-gray-700 mb-2">Culture / Ethnie associée</label>
                        <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('culture_associee') border-red-500 @enderror" id="culture_associee" name="culture_associee" value="{{ old('culture_associee', $produit->culture_associee ?? '') }}" placeholder="Ex: Bamiléké, Bassa...">
                        @error('culture_associee')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="materiaux" class="block text-sm font-medium text-gray-700 mb-2">Matériaux utilisés</label>
                    <textarea class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('materiaux') border-red-500 @enderror" id="materiaux" name="materiaux" rows="3" placeholder="Ex: Bois, cuir, perles, bronze...">{{ old('materiaux', $produit->materiaux ?? '') }}</textarea>
                    @error('materiaux')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="contact_whatsapp" class="block text-sm font-medium text-gray-700 mb-2">WhatsApp</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fab fa-whatsapp text-green-500"></i>
                            </div>
                            <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('contact_whatsapp') border-red-500 @enderror" id="contact_whatsapp" name="contact_whatsapp" value="{{ old('contact_whatsapp', $produit->contact_whatsapp ?? '') }}" placeholder="+237 6XX XX XX XX">
                        </div>
                        @error('contact_whatsapp')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_gmail" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('contact_gmail') border-red-500 @enderror" id="contact_gmail" name="contact_gmail" value="{{ old('contact_gmail', $produit->contact_gmail ?? '') }}" placeholder="contact@example.com">
                        </div>
                        @error('contact_gmail')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Colonne droite - 1/3 -->
    <div class="space-y-6">
        <!-- Prix et stock -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-dollar-sign mr-3 text-yellow-600"></i>
                    Prix et Stock
                </h5>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">
                        Prix (FCFA) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('prix') border-red-500 @enderror" id="prix" name="prix" value="{{ old('prix', $produit->prix ?? 0) }}" min="0" step="1" required>
                    @error('prix')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">
                        Quantité en stock <span class="text-red-500">*</span>
                    </label>
                    <input type="number" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('quantite') border-red-500 @enderror" id="quantite" name="quantite" value="{{ old('quantite', $produit->quantite ?? 0) }}" min="0" required>
                    @error('quantite')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Disponibilité <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center">
                        <input type="checkbox" id="disponible" name="disponible" value="1" {{ old('disponible', $produit->disponible ?? true) ? 'checked' : '' }} class="w-11 h-6 bg-gray-200 rounded-full peer appearance-none cursor-pointer checked:bg-green-500 relative transition-colors @error('disponible') border-red-500 @enderror">
                        <label for="disponible" class="ml-3 text-sm text-gray-700 cursor-pointer select-none">
                            Produit disponible à la vente
                        </label>
                    </div>
                    @error('disponible')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Exposition <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center">
                        <input type="checkbox" id="est_expose" name="est_expose" value="1" {{ old('est_expose', $produit->est_expose ?? false) ? 'checked' : '' }} class="w-11 h-6 bg-gray-200 rounded-full peer appearance-none cursor-pointer checked:bg-yellow-500 relative transition-colors @error('est_expose') border-red-500 @enderror">
                        <label for="est_expose" class="ml-3 text-sm text-gray-700 cursor-pointer select-none">
                            Exposé à la Maison du Village
                        </label>
                    </div>
                    @error('est_expose')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Images -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-cyan-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-images mr-3 text-cyan-600"></i>
                    Images
                </h5>
            </div>
            <div class="p-6 space-y-4">
                <!-- Image principale -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image principale</label>
                    @if(isset($produit) && $produit->image)
                        <div class="mb-3">
                            <img src="{{ Storage::url($produit->image) }}" alt="{{ $produit->nom }}" class="w-full h-48 object-cover rounded-lg">
                            <p class="text-xs text-gray-500 mt-2">Image actuelle</p>
                        </div>
                    @endif
                    <input type="file" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image') border-red-500 @enderror" id="image" name="image" accept="image/*" onchange="previewImage(this, 'preview1')">
                    <p class="text-xs text-gray-500 mt-2">Max: 2MB - Format: JPG, PNG, WEBP</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="mt-3">
                        <img id="preview1" src="#" alt="Aperçu" class="w-full h-48 object-cover rounded-lg hidden">
                    </div>
                </div>

                <!-- Image secondaire -->
                <div class="border-t border-gray-200 pt-4">
                    <label for="image1" class="block text-sm font-medium text-gray-700 mb-2">Image secondaire</label>
                    @if(isset($produit) && $produit->image1)
                        <div class="mb-3">
                            <img src="{{ Storage::url($produit->image1) }}" alt="{{ $produit->nom }}" class="w-full h-48 object-cover rounded-lg">
                            <p class="text-xs text-gray-500 mt-2">Image actuelle</p>
                        </div>
                    @endif
                    <input type="file" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image1') border-red-500 @enderror" id="image1" name="image1" accept="image/*" onchange="previewImage(this, 'preview2')">
                    <p class="text-xs text-gray-500 mt-2">Max: 2MB - Format: JPG, PNG, WEBP</p>
                    @error('image1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="mt-3">
                        <img id="preview2" src="#" alt="Aperçu" class="w-full h-48 object-cover rounded-lg hidden">
                    </div>
                </div>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="space-y-3">
                <button type="submit" class="w-full flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors shadow-sm">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($produit) ? 'Mettre à jour' : 'Enregistrer' }}
                </button>
                <a href="{{ route('admin.produits_traditionnels.index') }}" class="w-full flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-colors">
                    <i class="fas fa-times mr-2"></i>
                    Annuler
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Validation du formulaire
    document.addEventListener('DOMContentLoaded', function() {
        // Mettre disponible à 0 si on décoche
        const disponibleCheckbox = document.getElementById('disponible');
        if (disponibleCheckbox) {
            const form = disponibleCheckbox.closest('form');
            form.addEventListener('submit', function() {
                if (!disponibleCheckbox.checked) {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'disponible';
                    hiddenInput.value = '0';
                    form.appendChild(hiddenInput);
                }
            });
        }

        // Même chose pour est_expose
        const exposeCheckbox = document.getElementById('est_expose');
        if (exposeCheckbox) {
            const form = exposeCheckbox.closest('form');
            form.addEventListener('submit', function() {
                if (!exposeCheckbox.checked) {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'est_expose';
                    hiddenInput.value = '0';
                    form.appendChild(hiddenInput);
                }
            });
        }
    });
</script>

<style>
    /* Custom toggle switch styling */
    input[type="checkbox"]:checked::before {
        content: '';
        position: absolute;
        width: 1.25rem;
        height: 1.25rem;
        background: white;
        border-radius: 9999px;
        top: 0.125rem;
        right: 0.125rem;
        transition: all 0.3s;
    }

    input[type="checkbox"]::before {
        content: '';
        position: absolute;
        width: 1.25rem;
        height: 1.25rem;
        background: white;
        border-radius: 9999px;
        top: 0.125rem;
        left: 0.125rem;
        transition: all 0.3s;
    }
</style>
