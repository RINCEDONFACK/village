<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\ProduitTraditionnel;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Afficher la liste des produits disponibles
     */
    public function index(Request $request)
    {
        $query = ProduitTraditionnel::where('disponible', true);

        // Recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('origine', 'like', "%{$search}%");
            });
        }

        // Filtrer par catégorie
        if ($request->filled('categorie')) {
            $query->where('categorie', $request->categorie);
        }

        // Filtrer par origine
        if ($request->filled('origine')) {
            $query->where('origine', $request->origine);
        }

        // Tri
        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');
        $query->orderBy($sort, $order);

        $produits = $query->paginate(12);

        // Récupérer les catégories et origines pour les filtres
        $categories = ProduitTraditionnel::where('disponible', true)
            ->distinct()
            ->pluck('categorie')
            ->filter();

        $origines = ProduitTraditionnel::where('disponible', true)
            ->distinct()
            ->pluck('origine')
            ->filter();

        return view('front.produits.index', compact('produits', 'categories', 'origines'));
    }

    /**
     * Afficher les détails d'un produit
     */
    public function show(ProduitTraditionnel $produitTraditionnel)
    {
        // Vérifier que le produit est disponible
        if (!$produitTraditionnel->disponible) {
            abort(404);
        }

        // Produits similaires (même catégorie)
        $produitsSimilaires = ProduitTraditionnel::where('disponible', true)
            ->where('categorie', $produitTraditionnel->categorie)
            ->where('id', '!=', $produitTraditionnel->id)
            ->take(4)
            ->get();

        return view('front.produits.show', compact('produitTraditionnel', 'produitsSimilaires'));
    }


}
