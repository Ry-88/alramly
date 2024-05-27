<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AdvertisementProjectController extends Controller
{
    public function getAdvertisementsProject(Project $project)
    {
        
        $project = $project->load('advertisements');
       

        return view('dashboard.project.advertisementProject', compact('project'));
    }
}
