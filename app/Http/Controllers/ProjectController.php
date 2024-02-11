<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Bid;
use App\Models\Job;
use Auth;

class ProjectController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();

         // Fetch the project details based on the $id parameter
         $project = Project::findOrFail($id);

         // You can pass the $project variable to the view or perform additional logic
 
         return view('projects.index', compact('project'));
    }
}
