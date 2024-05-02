<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        $projects = Project::all();

        return view('index', compact('experiences', 'projects'));
    }
}
