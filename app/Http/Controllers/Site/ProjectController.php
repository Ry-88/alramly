<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('image')->paginate(12);    
        return view('site.project.index', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        return view('site.project.show', compact('project'));
    }
 
  
}
