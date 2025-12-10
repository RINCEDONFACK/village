<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class PhotoEvenementController extends Controller
{
    public function index()
    {
        // Correction: orderBy doit être appelé avant get()
        $albums = Album::orderBy('created_at', 'desc')->get();

        return view('front.photos.photo', compact('albums'));
    }

    public function show($id)
    {
        $album = Album::findOrFail($id);

        return view('front.photos.photo_detail', compact('album'));
    }
}
