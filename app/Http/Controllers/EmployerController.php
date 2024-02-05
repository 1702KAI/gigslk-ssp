<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;


class EmployerController extends Controller
{
    public function manageJobs_index()
    {
         // Get the authenticated user
        $user = Auth::user();

        // Check if the user is an employer
        $employer = Employer::where('user_id', $user->id)->first();
        
         // Retrieve all jobs associated with the authenticated user
         $jobs = $employer->jobs;
     
         return view('employer.manage-jobs.index', compact('jobs'));
    }

    public function manageJobs_show($id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is an employer
        $employer = Employer::where('user_id', $user->id)->first();

        // Retrieve the job associated with the authenticated user
        $job = $employer->jobs()->findOrFail($id);

        return view('employer.manage-jobs.show', compact('job'));
    }

    public function manageJobs_destroy($id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is an employer
        $employer = Employer::where('user_id', $user->id)->first();

        // Retrieve the job associated with the authenticated user
        $job = $employer->jobs()->findOrFail($id);

        // Delete the job
        $job->delete();

        return redirect()->route('employer.manage-jobs')->with('success', 'Job listing deleted successfully');
    }

    public function manageJobs_postJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|string',
            'budget' => 'required|numeric',
            'duration' => 'required|integer',
            // Add more validation rules as needed
        ]);

        // Get the authenticated user
        $user = Auth::user();

        $employer = Employer::where('user_id', $user->id)->first();

        // Create a new job and associate it with the authenticated user
        $job = $employer->jobs()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'skills' => $request->input('skills'),
            'budget' => $request->input('budget'),
            'duration' => $request->input('duration'),
            'employer_id' => $employer->id,
            'status' => 'active',
            'show' => 1, // Set 'show' based on status
            // Add more fields as needed
        ]);

        return redirect()->route('employer.manage-jobs')->with('success', 'Job listing created successfully');
    }

    public function manageJobs_update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        $job->update($request->all());

        return redirect()->route('employer.manage-jobs')->with('success', 'Job listing created successfully');
    
    }

    public function manageBids()
        {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is an employer
        $employer = Employer::where('user_id', $user->id)->first();
    
        // Retrieve jobs associated with the employer that have active bids
        $jobsWithActiveBids = Job::where('employer_id', $employer->id)
            ->whereHas('bids', function ($query) {
                $query->where('status', 'active');
            })
            ->with(['bids', 'bids.freelancer'])
            ->get();
        
    
        // Flatten the active bids to get all bids associated with the employer's jobs
        $activeBids = $jobsWithActiveBids->pluck('bids')->flatten();
    
        // Filter out bids with a status other than 'active'
        $activeBids = $activeBids->filter(function ($bid) {
            return $bid->status === 'active';
        });
    
        // Retrieve unique freelancers who have active bids on jobs associated with the employer
        $activeFreelancerCount = $activeBids->unique('freelancer_id')->count('freelancer_id');
    
        // Group active bids by job ID and get the total number of active bids for each job
        $totalActiveBidsByJob = $activeBids->groupBy('job_id')->map(function ($activeBidsForJob) {
            return $activeBidsForJob->count();
        });
    
        return view('employer.manage-bids.index', compact('activeBids', 'activeFreelancerCount', 'totalActiveBidsByJob'));
    }

    public function viewProject($id)
    {
        return view('employer.view_project', ['id' => $id]);
    }
}
