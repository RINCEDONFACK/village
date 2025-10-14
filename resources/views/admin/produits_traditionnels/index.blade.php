@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- En-tête -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Produits Traditionnels</h1>
            <p class="text-gray-600 mt-1">Gérez vos produits artisanaux et culturels</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.produits_traditionnels.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i>Nouveau Produit
            </a>
            <a href="{{ route('admin.produits_traditionnels.export') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                <i class="fas fa-file-export mr-2"></i>Exporter CSV
            </a>
            <a href="{{ route('admin.produits_traditionnels.statistiques') }}" class="inline-flex items-center px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white font-medium rounded-lg transition-colors">
                <i class="fas fa-chart-bar mr-2"></i>Statistiques
            </a>
        </div>
    </div>

    <!-- Messages de succès -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                <span class="text-green-800">{{ session('success') }}</span>
                <button type="button" class="ml-auto text-green-500 hover:text-green-700" data-bs-dismiss="alert">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Statistiques rapides -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                    <i class="fas fa-box text-blue-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600 font-medium">Total Produits</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produits->total() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                    <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600 font-medium">Disponibles</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produits->where('disponible', true)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                    <i class="fas fa-eye text-yellow-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600 font-medium">Exposés</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produits->where('est_expose', true)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-100 rounded-lg p-3">
                    <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600 font-medium">Rupture Stock</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $produits->where('quantite', 0)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres et recherche -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <form method="GET" action="{{ route('admin.produits_traditionnels.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                <div class="lg:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rechercher</label>
                    <input type="text" name="search" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Nom du produit..." value="{{ request('search') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                    <select name="categorie" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>
                                {{ $categorie }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Disponibilité</label>
                    <select name="disponible" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="">Tous</option>
                        <option value="1" {{ request('disponible') === '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ request('disponible') === '0' ? 'selected' : '' }}>Indisponible</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Trier par</label>
                    <div class="flex gap-2">
                        <select name="sort" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Date création</option>
                            <option value="nom" {{ request('sort') == 'nom' ? 'selected' : '' }}>Nom</option>
                            <option value="prix" {{ request('sort') == 'prix' ? 'selected' : '' }}>Prix</option>
                            <option value="quantite" {{ request('sort') == 'quantite' ? 'selected' : '' }}>Quantité</option>
                        </select>
                        <select name="order" class="w-20 px-2 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>↓</option>
                            <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>↑</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i>Filtrer
                </button>
                <a href="{{ route('admin.produits_traditionnels.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors">
                    <i class="fas fa-redo mr-2"></i>Réinitialiser
                </a>
                <button type="button" class="inline-flex items-center px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors hidden" onclick="deleteSelected()" id="deleteSelectedBtn">
                    <i class="fas fa-trash mr-2"></i>Supprimer sélectionnés
                </button>
            </div>
        </form>
    </div>

    <!-- Actions rapides -->
    <div class="mb-6">
        <form method="POST" action="{{ route('admin.produits_traditionnels.check-stock') }}" class="inline-block">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 font-medium rounded-lg transition-colors">
                <i class="fas fa-sync mr-2"></i>Vérifier les stocks
            </button>
        </form>
    </div>

    <!-- Tableau des produits -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        @if($produits->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left">
                                <input type="checkbox" id="selectAll" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Catégorie</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Prix</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Origine</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($produits as $produit)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="product-checkbox w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" value="{{ $produit->id }}">
                                </td>
                                <td class="px-6 py-4">
                                    @if($produit->image)
                                        <img src="{{ Storage::url($produit->image) }}" alt="{{ $produit->nom }}" class="w-16 h-16 rounded-lg object-cover">
                                    @else
                                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900">{{ $produit->nom }}</div>
                                    @if($produit->createur)
                                        <div class="text-sm text-gray-500">par {{ $produit->createur }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($produit->categorie)
                                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">{{ $produit->categorie }}</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                                <td class="px-6 py-4">
                                    @if($produit->quantite > 10)
                                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">{{ $produit->quantite }}</span>
                                    @elseif($produit->quantite > 0)
                                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $produit->quantite }}</span>
                                    @else
                                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">{{ $produit->quantite }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $produit->origine ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <form method="POST" action="{{ route('admin.produits_traditionnels.toggle-disponibilite', $produit) }}">
                                            @csrf
                                            <button type="submit" class="w-full inline-flex items-center justify-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors {{ $produit->disponible ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                                <i class="fas {{ $produit->disponible ? 'fa-check' : 'fa-times' }} mr-1.5"></i>
                                                {{ $produit->disponible ? 'Disponible' : 'Indisponible' }}
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.produits_traditionnels.toggle-exposition', $produit) }}">
                                            @csrf
                                            <button type="submit" class="w-full inline-flex items-center justify-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors {{ $produit->est_expose ? 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                                <i class="fas {{ $produit->est_expose ? 'fa-eye' : 'fa-eye-slash' }} mr-1.5"></i>
                                                {{ $produit->est_expose ? 'Exposé' : 'Non exposé' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.produits_traditionnels.show', $produit) }}" class="inline-flex items-center justify-center w-9 h-9 bg-cyan-100 hover:bg-cyan-200 text-cyan-700 rounded-lg transition-colors" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.produits_traditionnels.edit', $produit) }}" class="inline-flex items-center justify-center w-9 h-9 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.produits_traditionnels.duplicate', $produit) }}">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center justify-center w-9 h-9 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors" title="Dupliquer">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.produits_traditionnels.destroy', $produit) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-9 h-9 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white border-t border-gray-200 px-6 py-4">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-sm text-gray-600">
                        Affichage de {{ $produits->firstItem() }} à {{ $produits->lastItem() }} sur {{ $produits->total() }} produits
                    </div>
                    <div>
                        {{ $produits->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                <h5 class="text-xl font-semibold text-gray-700 mb-2">Aucun produit trouvé</h5>
                <p class="text-gray-500 mb-6">Commencez par ajouter votre premier produit traditionnel</p>
                <a href="{{ route('admin.produits_traditionnels.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>Ajouter un produit
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Script pour la suppression multiple -->
<script>
    // Sélectionner/Désélectionner tous
    document.getElementById('selectAll')?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        toggleDeleteButton();
    });

    // Gérer le clic sur chaque checkbox
    document.querySelectorAll('.product-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', toggleDeleteButton);
    });

    // Afficher/Masquer le bouton de suppression multiple
    function toggleDeleteButton() {
        const checkedBoxes = document.querySelectorAll('.product-checkbox:checked');
        const deleteBtn = document.getElementById('deleteSelectedBtn');
        if (checkedBoxes.length > 0) {
            deleteBtn.classList.remove('hidden');
        } else {
            deleteBtn.classList.add('hidden');
        }
    }

    // Supprimer les produits sélectionnés
    function deleteSelected() {
        const checkedBoxes = document.querySelectorAll('.product-checkbox:checked');
        const ids = Array.from(checkedBoxes).map(cb => cb.value);

        if (ids.length === 0) {
            alert('Veuillez sélectionner au moins un produit');
            return;
        }

        if (confirm(`Êtes-vous sûr de vouloir supprimer ${ids.length} produit(s) ?`)) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("admin.produits_traditionnels.destroy-multiple") }}';

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            ids.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'ids[]';
                input.value = id;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection
