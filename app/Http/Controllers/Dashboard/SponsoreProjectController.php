<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class SponsoreProjectController extends Controller
{
    public function getSponsoreProjectRequests(Project $project)
    {
        
        $project = $project->load('sponsores');
       

        return view('dashboard.project.sponsorProjectRequests', compact('project'));
    }
}
