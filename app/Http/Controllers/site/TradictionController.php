<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\CultureCommentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TradictionController extends Controller
{
    // Affiche la liste des événements culturels
    public function index()
    {
        $cultures = Culture::withCount(['cultureLikes', 'culturecommentaires'])
            ->latest()
            ->get();

        // Vérifier quelles cultures sont likées par l'utilisateur actuel
        $userIp = request()->ip();
        foreach ($cultures as $culture) {
            $culture->isLiked = $culture->isLikedByUser($userIp);
        }

        return view('front.culture', compact('cultures'));
    }

    // Affiche le détail d'un événement
    public function show($id)
    {
        $culture = Culture::with([
            'culturecommentaires' => function ($query) {
                $query->where('is_approved', true)->latest();
            }
        ])
            ->withCount('cultureLikes')
            ->findOrFail($id);

        $culture->isLiked = $culture->isLikedByUser(request()->ip());

        return view('front.culture_detail', compact('culture'));
    }

    // Ajouter un commentaire avec AJAX
    public function storeCommentaire(Request $request, $id)
    {
        try {
            $request->validate([
                'contenu' => 'required|string|min:3',
                'auteur' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $culture = Culture::findOrFail($id);

            $data = [
                'contenu' => $request->contenu,
                'auteur' => $request->auteur,
                'email' => $request->email,
                'is_approved' => true, // Auto-approuver pour le test
            ];

            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file('photo')->store('commentaires', 'public');
            }

            $commentaire = $culture->culturecommentaires()->create($data);

            // Si c'est une requête AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Commentaire ajouté avec succès!',
                    'commentaire' => [
                        'id' => $commentaire->id,
                        'auteur' => $commentaire->auteur,
                        'contenu' => $commentaire->contenu,
                        'photo' => $commentaire->photo ? asset('storage/' . $commentaire->photo) : null,
                        'created_at' => $commentaire->created_at->diffForHumans(),
                    ],
                    'comments_count' => $culture->culturecommentaires()->count()
                ]);
            }

            return redirect()->route('cultures.show', $id)
                ->with('success', 'Votre commentaire a été ajouté avec succès!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors de l\'ajout du commentaire: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Erreur lors de l\'ajout du commentaire.');
        }
    }

    // Liker une culture
    public function like($id)
    {
        try {
            $culture = Culture::findOrFail($id);
            $ipAddress = request()->ip();
            $userAgent = request()->userAgent();

            // Vérifier si l'utilisateur a déjà liké
            if ($culture->isLikedByUser($ipAddress)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous avez déjà liké cette culture.'
                ], 400);
            }

            // Ajouter le like
            $culture->cultureLikes()->create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
            ]);

            // Incrémenter le compteur
            $culture->increment('likes_count');

            return response()->json([
                'success' => true,
                'likes_count' => $culture->fresh()->likes_count,
                'message' => 'Culture likée avec succès!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }

    // Unliker une culture
    public function unlike($id)
    {
        try {
            $culture = Culture::findOrFail($id);
            $ipAddress = request()->ip();

            // Supprimer le like
            $deleted = $culture->cultureLikes()
                ->where('ip_address', $ipAddress)
                ->delete();

            if ($deleted) {
                // Décrémenter le compteur
                $culture->decrement('likes_count');

                return response()->json([
                    'success' => true,
                    'likes_count' => $culture->fresh()->likes_count,
                    'message' => 'Like retiré avec succès!'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Vous n\'avez pas liké cette culture.'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }



    public function deleteCommentaire(Request $request, $id, $commentaireId)
    {
        try {
            $culture = Culture::findOrFail($id);
            $commentaire = $culture->culturecommentaires()->findOrFail($commentaireId);

            // Vérifier que c'est bien l'auteur (via IP)
            $userIp = $request->ip();
            if ($commentaire->ip_address !== $userIp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous ne pouvez supprimer que vos propres commentaires.'
                ], 403);
            }

            // Supprimer la photo si elle existe
            if ($commentaire->photo) {
                Storage::disk('public')->delete($commentaire->photo);
            }

            $commentaire->delete();

            return response()->json([
                'success' => true,
                'message' => 'Commentaire supprimé avec succès!',
                'comments_count' => $culture->culturecommentaires()->where('is_approved', true)->count()
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du commentaire: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la suppression.'
            ], 500);
        }
    }





    public function replyCommentaire(Request $request, $id, $commentaireId)
    {
        try {
            $validated = $request->validate([
                'contenu' => 'required|string|min:3|max:1000',
                'auteur' => 'required|string|min:2|max:255',
                'email' => 'nullable|email|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                'contenu.required' => 'La réponse est obligatoire.',
                'contenu.min' => 'La réponse doit contenir au moins 3 caractères.',
                'auteur.required' => 'Le nom est obligatoire.',
            ]);

            $culture = Culture::findOrFail($id);
            $parentComment = $culture->culturecommentaires()->findOrFail($commentaireId);

            $data = [
                'contenu' => $validated['contenu'],
                'auteur' => $validated['auteur'],
                'email' => $validated['email'] ?? null,
                'parent_id' => $parentComment->id,
                'is_approved' => true,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ];

            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('commentaires', 'public');
                $data['photo'] = $path;
            }

            $commentaire = $culture->culturecommentaires()->create($data);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Réponse ajoutée avec succès!',
                    'commentaire' => [
                        'id' => $commentaire->id,
                        'auteur' => $commentaire->auteur,
                        'contenu' => $commentaire->contenu,
                        'photo' => $commentaire->photo ? asset('storage/' . $commentaire->photo) : null,
                        'created_at' => $commentaire->created_at->diffForHumans(),
                        'parent_id' => $commentaire->parent_id,
                        'can_delete' => true,
                    ],
                    'comments_count' => $culture->culturecommentaires()->where('is_approved', true)->count()
                ]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'ajout de la réponse: ' . $e->getMessage());

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Une erreur est survenue: ' . $e->getMessage()
                ], 500);
            }
        }
        return view('front.culture', compact('cultures'));
    }

    
}
