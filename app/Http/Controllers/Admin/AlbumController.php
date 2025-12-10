<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::latest()->get();
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo6' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo7' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo8' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo9' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo10' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $album = new Album();
        $album->titre = $validated['titre'];
        $album->description = $validated['description'];

        // Traitement des 10 photos
        for ($i = 1; $i <= 10; $i++) {
            $photoField = 'photo' . $i;
            if ($request->hasFile($photoField)) {
                $path = $request->file($photoField)->store('albums', 'public');
                $album->$photoField = $path;
            }
        }

        $album->save();

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('admin.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo6' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo7' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo8' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo9' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo10' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $album->titre = $validated['titre'];
        $album->description = $validated['description'];

        // Traitement des 10 photos
        for ($i = 1; $i <= 10; $i++) {
            $photoField = 'photo' . $i;

            // Si on veut supprimer la photo
            if ($request->has('delete_' . $photoField)) {
                if ($album->$photoField) {
                    Storage::disk('public')->delete($album->$photoField);
                    $album->$photoField = null;
                }
            }

            // Si on upload une nouvelle photo
            if ($request->hasFile($photoField)) {
                // Supprimer l'ancienne photo si elle existe
                if ($album->$photoField) {
                    Storage::disk('public')->delete($album->$photoField);
                }
                // Sauvegarder la nouvelle photo
                $path = $request->file($photoField)->store('albums', 'public');
                $album->$photoField = $path;
            }
        }

        $album->save();

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        // Supprimer toutes les photos associées
        for ($i = 1; $i <= 10; $i++) {
            $photoField = 'photo' . $i;
            if ($album->$photoField) {
                Storage::disk('public')->delete($album->$photoField);
            }
        }

        $album->delete();

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album supprimé avec succès!');
    }
}
