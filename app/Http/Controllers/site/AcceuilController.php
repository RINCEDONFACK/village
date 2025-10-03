<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Culture;
use App\Models\Itcommunity;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Project;
use App\Models\Team;
use App\Models\Temoignage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $cultures = Culture::all();
        $temoignages = Testimonial::where('is_active', true)->get();
        $informatique = Itcommunity::all();
        $posts = Post::where('is_active', true)->get();


        $abouts = AboutSection::all();
        $projects = Project::all();
        $partenaire = Partner::where('is_active', true)->get();

        return view('front.index', compact(
            'abouts',
            'projects',
            'partenaire',
            'teams',
            'informatique',
            'temoignages',
            'posts',
            'cultures'
        ));
    }
}
