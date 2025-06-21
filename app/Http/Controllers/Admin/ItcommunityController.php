<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Itcommunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItcommunityController extends Controller
{
    public function index()
    {
        $items = Itcommunity::latest()->get();
        return view('admin.itcommunities.index', compact('items'));
    }

    public function create()
    {
        return view('admin.itcommunities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
            'description' => 'required|string',
            'duree' => 'nullable|integer',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'lieu' => 'nullable|string|max:255',
            'formateur' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'actif' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('itcommunities', 'public');
        }

        Itcommunity::create($validated);

        return redirect()->route('admin.itcommunities.index')->with('success', 'Formation ajoutée avec succès.');
    }

    public function show(Itcommunity $itcommunity)
    {
        return view('admin.itcommunities.show', compact('itcommunity'));
    }

    public function edit(Itcommunity $itcommunity)
    {
        return view('admin.itcommunities.edit', compact('itcommunity'));
    }

    public function update(Request $request, Itcommunity $itcommunity)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
            'description' => 'required|string',
            'duree' => 'nullable|integer',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'lieu' => 'nullable|string|max:255',
            'formateur' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'actif' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($itcommunity->image && Storage::disk('public')->exists($itcommunity->image)) {
                Storage::disk('public')->delete($itcommunity->image);
            }
            $validated['image'] = $request->file('image')->store('itcommunities', 'public');
        }

        $itcommunity->update($validated);

        return redirect()->route('admin.itcommunities.index')->with('success', 'Formation mise à jour avec succès.');
    }

    public function destroy(Itcommunity $itcommunity)
    {
        if ($itcommunity->image && Storage::disk('public')->exists($itcommunity->image)) {
            Storage::disk('public')->delete($itcommunity->image);
        }

        $itcommunity->delete();

        return redirect()->route('admin.itcommunities.index')->with('success', 'Formation supprimée avec succès.');
    }


public function toggleStatus(Request $request, Itcommunity $itcommunity)
{
    $itcommunity->update([
        'actif' => !$itcommunity->actif
    ]);

    $status = $itcommunity->actif ? 'activée' : 'désactivée';

    return redirect()->route('admin.itcommunities.index')
                   ->with('success', "Formation {$status} avec succès.");
}


}
