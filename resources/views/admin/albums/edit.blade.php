@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Modifier l'album</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.albums.index') }}">Albums</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.albums.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    <!-- Formulaire -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-edit"></i> Modifier les informations
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Titre et Description -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="titre" class="form-label">Titre de l'album <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('titre') is-invalid @enderror"
                               id="titre"
                               name="titre"
                               value="{{ old('titre', $album->titre) }}"
                               required
                               placeholder="Ex: Voyage à Paris 2024">
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="4"
                                  placeholder="Décrivez votre album...">{{ old('description', $album->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <!-- Section Photos -->
                <div class="mb-4">
                    <h5 class="text-primary mb-3">
                        <i class="fas fa-camera"></i> Photos de l'album (Maximum 10)
                    </h5>
                    <p class="text-muted small mb-4">
                        Formats acceptés: JPG, JPEG, PNG, GIF | Taille maximale: 2 MB par photo
                    </p>

                    <div class="row">
                        @for ($i = 1; $i <= 10; $i++)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 border-secondary">
                                <div class="card-header bg-light py-2 d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 text-secondary">Photo {{ $i }}</h6>
                                    @if($album->{'photo'.$i})
                                    <span class="badge badge-success">
                                        <i class="fas fa-check"></i> Existante
                                    </span>
                                    @else
                                    <span class="badge badge-secondary">Vide</span>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="upload-preview text-center mb-3">
                                        @if($album->{'photo'.$i})
                                            <img id="preview{{ $i }}"
                                                 src="{{ asset('storage/' . $album->{'photo'.$i}) }}"
                                                 alt="Photo {{ $i }}"
                                                 class="img-fluid rounded"
                                                 style="max-height: 200px; object-fit: cover;">
                                        @else
                                            <img id="preview{{ $i }}"
                                                 src="https://via.placeholder.com/300x200?text=Photo+{{ $i }}"
                                                 alt="Preview {{ $i }}"
                                                 class="img-fluid rounded"
                                                 style="max-height: 200px; object-fit: cover;">
                                        @endif
                                    </div>

                                    <!-- Options pour photo existante -->
                                    @if($album->{'photo'.$i})
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="delete_photo{{ $i }}"
                                                   name="delete_photo{{ $i }}"
                                                   onchange="toggleDeletePhoto({{ $i }})">
                                            <label class="custom-control-label text-danger" for="delete_photo{{ $i }}">
                                                <i class="fas fa-trash"></i> Supprimer cette photo
                                            </label>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Upload nouvelle photo -->
                                    <div class="custom-file" id="upload_zone{{ $i }}">
                                        <input type="file"
                                               class="custom-file-input @error('photo'.$i) is-invalid @enderror"
                                               id="photo{{ $i }}"
                                               name="photo{{ $i }}"
                                               accept="image/*"
                                               onchange="previewImage({{ $i }}, this)">
                                        <label class="custom-file-label" for="photo{{ $i }}">
                                            @if($album->{'photo'.$i})
                                                Remplacer la photo...
                                            @else
                                                Choisir une photo...
                                            @endif
                                        </label>
                                        @error('photo'.$i)
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if($album->{'photo'.$i})
                                    <small class="text-muted d-block mt-2">
                                        <i class="fas fa-info-circle"></i> Laissez vide pour conserver l'image actuelle
                                    </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Boutons -->
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('admin.albums.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Annuler
                        </a>
                        <button type="button" class="btn btn-outline-danger ml-2" onclick="confirmDelete()">
                            <i class="fas fa-trash"></i> Supprimer l'album
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i> Confirmer la suppression
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cet album ?</p>
                <p class="text-danger"><strong>Cette action est irréversible et supprimera toutes les photos associées.</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Annuler
                </button>
                <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Supprimer définitivement
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Prévisualisation des images
function previewImage(number, input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('preview' + number).src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);

        // Mettre à jour le label avec le nom du fichier
        const fileName = input.files[0].name;
        const label = input.nextElementSibling;
        label.textContent = fileName;

        // Décocher la case "Supprimer" si une nouvelle image est choisie
        const deleteCheckbox = document.getElementById('delete_photo' + number);
        if (deleteCheckbox) {
            deleteCheckbox.checked = false;
        }
    }
}

// Gérer la suppression de photo
function toggleDeletePhoto(number) {
    const checkbox = document.getElementById('delete_photo' + number);
    const uploadZone = document.getElementById('upload_zone' + number);
    const fileInput = document.getElementById('photo' + number);

    if (checkbox.checked) {
        // Désactiver l'upload si on veut supprimer
        uploadZone.style.opacity = '0.5';
        fileInput.disabled = true;
    } else {
        // Réactiver l'upload
        uploadZone.style.opacity = '1';
        fileInput.disabled = false;
    }
}

// Amélioration du custom-file-input
document.querySelectorAll('.custom-file-input').forEach(input => {
    input.addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'Choisir une photo...';
        const label = e.target.nextElementSibling;
        label.textContent = fileName;
    });
});

// Confirmation de suppression de l'album
function confirmDelete() {
    $('#deleteModal').modal('show');
}

// Avertissement avant de quitter si modifications
let formModified = false;
document.querySelector('form').addEventListener('change', function() {
    formModified = true;
});

window.addEventListener('beforeunload', function(e) {
    if (formModified) {
        e.preventDefault();
        e.returnValue = '';
    }
});

document.querySelector('form').addEventListener('submit', function() {
    formModified = false;
});
</script>
@endpush

@push('styles')
<style>
.upload-preview {
    background: #f8f9fc;
    padding: 15px;
    border-radius: 8px;
    min-height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.upload-preview img {
    border: 2px solid #e3e6f0;
    transition: transform 0.3s ease;
}

.upload-preview img:hover {
    transform: scale(1.05);
}

.card-header {
    border-bottom: 2px solid #e3e6f0;
}

.custom-file-label::after {
    content: "Parcourir";
}

.custom-control-label {
    cursor: pointer;
}

.badge {
    font-size: 0.75rem;
}

/* Animation pour les cartes */
.card {
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>
@endpush
@endsection
