<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Itcommunity;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $informatique = Itcommunity::all();

        $abouts = AboutSection::all();
        $projects = Project::all();
        $partenaire = Partner::where('is_active', true)->get();

        return view('front.index', compact('abouts', 'projects', 'partenaire','teams','informatique'));
    }
}
