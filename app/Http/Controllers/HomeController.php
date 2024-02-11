<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Freelancer;

class HomeController extends Controller
{
    public function redirectBasedOnRole()
    {
    $user = Auth::user();
    $projects = Project::all();
    $role = $user->role ?? null;

    switch ($role) {
        case 'admin':
            return view('admin.dashboard');
        case 'freelancer':
            //Fetch freelancer ID from the 'freelancers' table
                $freelancerId = Freelancer::where('user_id', $user->id)->get('id')->first();
            // Fetch projects related to the freelancer
                $projects = Project::where('freelancer_id', $freelancerId)->get();
            return view('freelancer.dashboard',compact('projects'));
        case 'employer':
            $projects = Project::where('project_owner', $user->name)->get();
            return view('employer.dashboard',compact('projects'));
        default:
                return view('unauthorized'); // Create an unauthorized view or redirect as needed
    }
    }

}
