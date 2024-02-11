<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Bid;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use App\Models\Project;


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

    public function manageBids_index()
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

    public function manageBids_show($jobId)
    {
        // Retrieve only active bids with associated job and freelancer information for the specified job
        $activeBids = Bid::with(['freelancer'])
            ->where('job_id', $jobId)
            ->where('status', 'active')
            ->get();
    
        // Retrieve job information from the jobs table
        $job = Job::find($jobId);
    
        return view('employer.manage-bids.show', compact('activeBids', 'job'));
    }

    public function manageBids_acceptBid(Bid $bid)
    {
        // Notify the freelancer that their bid has been accepted
        // $bid->freelancer->notify(new BidAcceptedNotification($bid->job));
    
        // Update the status of the accepted bid to 'in-progress'
        $bid->update(['status' => 'in-progress']);
    
        // Update the statuses of other bids for the same job to 'declined'
        $jobBids = Bid::where('job_id', $bid->job_id)->where('id', '!=', $bid->id)->get();
    
        foreach ($jobBids as $otherBid) {
            $otherBid->update(['status' => 'declined']);
        }
    
        // Check if a project already exists for this job
        $existingProject = Project::where('job_id', $bid->job_id)->first();
    
        // If a project doesn't exist, create a new project record
        if (!$existingProject) {
            $project = Project::create([
                'job_id' => $bid->job_id,
                'freelancer_id' => $bid->freelancer_id,
                'bid_proposal' => $bid->proposal,
                'freelancer_portfolio' => $bid->portfolio,
                'project_owner' => Auth::user()->name, // Assuming the employer's name is the project owner
                'budget' => $bid->job->budget,
                'timeline' => $bid->job->duration,
                'status' => 'in-progress', // or any default status
            ]);
        }
    
        $bid->job->update(['show' => false]);
    
        return redirect()->route('employer.show-bid', $bid->job->id)->with('success', 'Bid accepted successfully');
    }
    
    public function manageBids_rejectBid($id)
    {
        $bid = Bid::find($id);
    
        if ($bid) {
            // Use the declineBid method for consistency and additional logic
            $this->declineBid($bid);
    
            return redirect()->route('employer.manage-bids')->with('success', 'Bid rejected successfully');
        } else {
            // Handle the case where the bid with the given $id is not found
            return redirect()->route('employer.manage-bids')->with('error', 'Bid not found');
        }
    }
    
}
