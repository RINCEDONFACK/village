<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Itcommunity;
use Illuminate\Http\Request;

class InformatiqueController extends Controller
{
    public function index()
    {
        $formations = Itcommunity::where('actif', true)->latest()->get();
        return view('front.informatique', compact('formations'));
    }

    public function show(Itcommunity $itcommunity)
    {
        return view('front.informatique_detail', compact('itcommunity'));
    }
}
