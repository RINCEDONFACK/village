@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des formations IT')
@section('pageSubTitle', 'Formations / Liste')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des formations IT</h2>
            <a href="{{ route('admin.itcommunities.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus mr-2"></i>
                Nouvelle formation
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table id="itcommunitiesTable" class="min-w-full w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
            <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                <tr>
                    <th class="p-2 text-left">Image</th>
                    <th class="p-2 text-left">Titre</th>
                    <th class="p-2 text-left">Lieu</th>
                    <th class="p-2 text-left">Formateur</th>
                    <th class="p-2 text-left">Statut</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @forelse ($items as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-2">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->titre }}" class="w-12 h-12 object-cover rounded">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fa fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="p-2 font-medium">{{ $item->titre }}</td>
                        <td class="p-2">
                            @if($item->lieu)
                                {{ $item->lieu }}
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="p-2">
                            @if($item->formateur)
                                {{ $item->formateur }}
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="p-2">
                            @if ($item->actif)
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">Actif</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded-full">Inactif</span>
                            @endif
                        </td>
                        <td class="p-2">
                            <div class="flex gap-2 flex-wrap">
                                <a href="{{ route('admin.itcommunities.show', $item->id) }}" class="text-gray-500 hover:text-gray-900 p-1 rounded" title="Voir détails">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.itcommunities.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 p-1 rounded" title="Modifier">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button onclick="openStatusModal({{ $item->id }}, '{{ $item->titre }}', {{ $item->actif ? 'false' : 'true' }})"
                                        class="{{ $item->actif ? 'text-yellow-500 hover:text-yellow-700' : 'text-green-500 hover:text-green-700' }} p-1 rounded"
                                        title="{{ $item->actif ? 'Désactiver' : 'Activer' }}">
                                    <i class="fa {{ $item->actif ? 'fa-lock' : 'fa-unlock' }}"></i>
                                </button>
                                <button onclick="openDeleteModal({{ $item->id }}, '{{ $item->titre }}')" class="text-red-500 hover:text-red-700 p-1 rounded" title="Supprimer">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fa fa-inbox text-4xl mb-4 text-gray-300"></i>
                                <p class="text-lg mb-2">Aucune formation trouvée</p>
                                <p class="text-sm">Commencez par ajouter votre première formation IT.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de confirmation pour changer le statut -->
<div id="statusModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-yellow-100 rounded-full">
                <i class="fa fa-exclamation-triangle text-yellow-600 text-xl"></i>
            </div>
            <div class="mt-5 text-center">
                <h3 class="text-lg font-medium text-gray-900" id="statusModalTitle">Changer le statut</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500" id="statusModalMessage">
                        Voulez-vous vraiment changer le statut de cette formation ?
                    </p>
                </div>
                <div class="flex justify-center gap-4 px-4 py-3">
                    <button onclick="closeStatusModal()"
                            class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Annuler
                    </button>
                    <button onclick="confirmStatusChange()"
                            class="px-4 py-2 bg-yellow-500 text-white text-base font-medium rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                            id="statusConfirmBtn">
                        Confirmer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation pour supprimer -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full">
                <i class="fa fa-trash text-red-600 text-xl"></i>
            </div>
            <div class="mt-5 text-center">
                <h3 class="text-lg font-medium text-gray-900">Supprimer la formation</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500" id="deleteModalMessage">
                        Voulez-vous vraiment supprimer cette formation ? Cette action est irréversible.
                    </p>
                </div>
                <div class="flex justify-center gap-4 px-4 py-3">
                    <button onclick="closeDeleteModal()"
                            class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Annuler
                    </button>
                    <button onclick="confirmDelete()"
                            class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forms cachés pour les actions -->
<form id="toggleStatusForm" method="POST" style="display: none;">
    @csrf
    @method('PATCH')
</form>

<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<!-- DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />

<script>
    $(document).ready(function() {
        $('#itcommunitiesTable').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            pagingType: "full_numbers",
            order: [[1, 'asc']], // Tri par titre par défaut
            columnDefs: [
                { orderable: false, targets: [0, -1] }, // Désactiver le tri sur image et actions
            ],
            dom: "<'flex flex-col sm:flex-row justify-between items-center mb-4 gap-2'<'text-gray-700'l><'text-gray-700'f>>" +
                 "t" +
                 "<'flex flex-col sm:flex-row justify-between items-center mt-4 gap-2'<'text-gray-700'i><'text-gray-700'p>>",
        });
    });

    // Variables globales pour stocker les informations de l'élément en cours
    let currentItemId = null;
    let currentItemTitle = '';
    let currentNewStatus = null;

    // Modal de changement de statut
    function openStatusModal(id, title, newStatus) {
        currentItemId = id;
        currentItemTitle = title;
        currentNewStatus = newStatus;

        const action = newStatus === 'true' ? 'activer' : 'désactiver';
        const statusModalTitle = document.getElementById('statusModalTitle');
        const statusModalMessage = document.getElementById('statusModalMessage');
        const statusConfirmBtn = document.getElementById('statusConfirmBtn');

        statusModalTitle.textContent = `${action.charAt(0).toUpperCase() + action.slice(1)} la formation`;
        statusModalMessage.innerHTML = `Voulez-vous vraiment <strong>${action}</strong> la formation "<strong>${title}</strong>" ?`;
        statusConfirmBtn.textContent = action.charAt(0).toUpperCase() + action.slice(1);
        statusConfirmBtn.className = newStatus === 'true'
            ? 'px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300'
            : 'px-4 py-2 bg-yellow-500 text-white text-base font-medium rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300';

        document.getElementById('statusModal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.add('hidden');
        currentItemId = null;
        currentItemTitle = '';
        currentNewStatus = null;
    }

    function confirmStatusChange() {
        if (currentItemId && currentNewStatus !== null) {
            const form = document.getElementById('toggleStatusForm');
            form.action = `/admin/itcommunities/${currentItemId}/toggle-status`;

            // Supprimer les anciens champs cachés
            const existingInputs = form.querySelectorAll('input[name="actif"]');
            existingInputs.forEach(input => input.remove());

            // Ajouter un champ caché pour le nouveau statut
            const statusInput = document.createElement('input');
            statusInput.type = 'hidden';
            statusInput.name = 'actif';
            statusInput.value = currentNewStatus;
            form.appendChild(statusInput);

            form.submit();
        }
        closeStatusModal();
    }

    // Modal de suppression
    function openDeleteModal(id, title) {
        currentItemId = id;
        currentItemTitle = title;

        const deleteModalMessage = document.getElementById('deleteModalMessage');
        deleteModalMessage.innerHTML = `Voulez-vous vraiment supprimer la formation "<strong>${title}</strong>" ?<br><span class="text-red-600 font-medium">Cette action est irréversible.</span>`;

        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        currentItemId = null;
        currentItemTitle = '';
    }

    function confirmDelete() {
        if (currentItemId) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/itcommunities/${currentItemId}`;
            form.submit();
        }
        closeDeleteModal();
    }

    // Fermer les modales en cliquant en dehors
    window.onclick = function(event) {
        const statusModal = document.getElementById('statusModal');
        const deleteModal = document.getElementById('deleteModal');

        if (event.target === statusModal) {
            closeStatusModal();
        }
        if (event.target === deleteModal) {
            closeDeleteModal();
        }
    }

    // Fermer les modales avec la touche Échap
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeStatusModal();
            closeDeleteModal();
        }
    });
</script>

<style>
    /* Styles personnalisés pour DataTables avec Tailwind */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        @apply border border-gray-300 rounded px-3 py-1 text-sm;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        @apply px-3 py-1 mx-1 border border-gray-300 rounded text-sm hover:bg-gray-100;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        @apply bg-blue-500 text-white border-blue-500;
    }

    .dataTables_wrapper .dataTables_info {
        @apply text-sm text-gray-600;
    }

    /* Animation pour les modales */
    #statusModal, #deleteModal {
        transition: opacity 0.3s ease-in-out;
    }

    #statusModal.hidden, #deleteModal.hidden {
        opacity: 0;
        pointer-events: none;
    }

    #statusModal:not(.hidden), #deleteModal:not(.hidden) {
        opacity: 1;
        pointer-events: auto;
    }
</style>
@endsection
