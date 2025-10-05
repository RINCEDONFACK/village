<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class NosServiceController extends Controller
{

    public function nosservice()
    {
        $services = Service::all();
        return view('front.nosservice.nosservice', compact('services'));
    }
}
