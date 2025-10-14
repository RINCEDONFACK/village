<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProduitTraditionnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProduitTraditionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProduitTraditionnel::query();

        // Filtrage par catégorie
        if ($request->has('categorie') && $request->categorie != '') {
            $query->where('categorie', $request->categorie);
        }

        // Filtrage par disponibilité
        if ($request->has('disponible')) {
            $query->where('disponible', $request->disponible);
        }

        // Recherche par nom
        if ($request->has('search') && $request->search != '') {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        // Tri
        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');
        $query->orderBy($sort, $order);

        $produits = $query->paginate(15);
        $categories = ProduitTraditionnel::distinct()->pluck('categorie');

        return view('admin.produits_traditionnels.index', compact('produits', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produits_traditionnels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'image1' => 'nullable|image|max:2048',
            'prix' => 'required|numeric|min:0',
            'quantite' => 'required|integer|min:0',
            'disponible' => 'required|boolean',
            'est_expose' => 'required|boolean',
            'origine' => 'nullable|string|max:255',
            'createur' => 'nullable|string|max:255',
            'materiaux' => 'nullable|string',
            'culture_associee' => 'nullable|string|max:255',
            'contact_whatsapp' => 'nullable|string|max:20',
            'contact_gmail' => 'nullable|email|max:255',
        ]);

        // Handle image uploads
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('produits_traditionnels', 'public');
        }
        if ($request->hasFile('image1')) {
            $validated['image1'] = $request->file('image1')->store('produits_traditionnels', 'public');
        }

        ProduitTraditionnel::create($validated);

        return redirect()->route('admin.produits_traditionnels.index')->with('success', 'Produit traditionnel créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProduitTraditionnel $produitTraditionnel)
    {
        return view('admin.produits_traditionnels.show', compact('produitTraditionnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProduitTraditionnel $produitTraditionnel)
    {
        return view('admin.produits_traditionnels.edit', compact('produitTraditionnel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProduitTraditionnel $produitTraditionnel)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'image1' => 'nullable|image|max:2048',
            'prix' => 'required|numeric|min:0',
            'quantite' => 'required|integer|min:0',
            'disponible' => 'required|boolean',
            'est_expose' => 'required|boolean',
            'origine' => 'nullable|string|max:255',
            'createur' => 'nullable|string|max:255',
            'materiaux' => 'nullable|string',
            'culture_associee' => 'nullable|string|max:255',
            'contact_whatsapp' => 'nullable|string|max:20',
            'contact_gmail' => 'nullable|email|max:255',
        ]);

        // Handle image uploads and delete old images
        if ($request->hasFile('image')) {
            if ($produitTraditionnel->image) {
                Storage::disk('public')->delete($produitTraditionnel->image);
            }
            $validated['image'] = $request->file('image')->store('produits_traditionnels', 'public');
        }
        if ($request->hasFile('image1')) {
            if ($produitTraditionnel->image1) {
                Storage::disk('public')->delete($produitTraditionnel->image1);
            }
            $validated['image1'] = $request->file('image1')->store('produits_traditionnels', 'public');
        }

        $produitTraditionnel->update($validated);

        return redirect()->route('admin.produits_traditionnels.index')->with('success', 'Produit traditionnel mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProduitTraditionnel $produitTraditionnel)
    {
        // Supprimer les images associées
        if ($produitTraditionnel->image) {
            Storage::disk('public')->delete($produitTraditionnel->image);
        }
        if ($produitTraditionnel->image1) {
            Storage::disk('public')->delete($produitTraditionnel->image1);
        }

        $produitTraditionnel->delete();
        return redirect()->route('admin.produits_traditionnels.index')->with('success', 'Produit traditionnel supprimé avec succès.');
    }

    /**
     * Basculer la disponibilité d'un produit
     */
    public function toggleDisponibilite(ProduitTraditionnel $produitTraditionnel)
    {
        $produitTraditionnel->update([
            'disponible' => !$produitTraditionnel->disponible
        ]);

        $status = $produitTraditionnel->disponible ? 'disponible' : 'indisponible';
        return redirect()->back()->with('success', "Produit marqué comme {$status}.");
    }

    /**
     * Basculer le statut d'exposition d'un produit
     */
    public function toggleExposition(ProduitTraditionnel $produitTraditionnel)
    {
        $produitTraditionnel->update([
            'est_expose' => !$produitTraditionnel->est_expose
        ]);

        $status = $produitTraditionnel->est_expose ? 'exposé' : 'non exposé';
        return redirect()->back()->with('success', "Produit marqué comme {$status}.");
    }

    /**
     * Mettre à jour la quantité d'un produit
     */
    public function updateQuantite(Request $request, ProduitTraditionnel $produitTraditionnel)
    {
        $request->validate([
            'quantite' => 'required|integer|min:0',
        ]);

        $produitTraditionnel->update([
            'quantite' => $request->quantite
        ]);

        // Marquer comme indisponible si quantité = 0
        if ($request->quantite == 0) {
            $produitTraditionnel->update(['disponible' => false]);
        }

        return redirect()->back()->with('success', 'Quantité mise à jour avec succès.');
    }




    /**
     * Afficher les statistiques des produits
     */
    public function statistiques()
    {
        $stats = [
            'total' => ProduitTraditionnel::count(),
            'disponibles' => ProduitTraditionnel::where('disponible', true)->count(),
            'exposes' => ProduitTraditionnel::where('est_expose', true)->count(),
            'rupture_stock' => ProduitTraditionnel::where('quantite', 0)->count(),
            'valeur_totale' => ProduitTraditionnel::sum(DB::raw('prix * quantite')),
            'par_categorie' => ProduitTraditionnel::selectRaw('categorie, COUNT(*) as count')
                ->groupBy('categorie')
                ->get(),
            'produits_populaires' => ProduitTraditionnel::where('quantite', '<', 5)
                ->where('disponible', true)
                ->orderBy('quantite', 'asc')
                ->take(10)
                ->get(),
        ];

        return view('admin.produits_traditionnels.statistiques', compact('stats'));
    }

    /**
     * Marquer automatiquement comme indisponible si quantité = 0
     */
    public function checkStock()
    {
        $updated = ProduitTraditionnel::where('quantite', 0)
            ->where('disponible', true)
            ->update(['disponible' => false]);

        return redirect()->back()->with('success', "{$updated} produit(s) marqué(s) comme indisponible(s).");
    }
}
