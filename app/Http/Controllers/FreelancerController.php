<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Bid;
use App\Models\Freelancer;

class FreelancerController extends Controller
{
    function searchJobs_index() {
        $jobs = Job::where('show', true)->get();
        return view('freelancer.search-jobs.index',compact('jobs'));
    }
    
    function searchJobs_search(request $request) {
        $query = $request->input('q'); // Get the search query from the request
    
        // Retrieve jobs with optional keyword search and show is true
        $jobs = Job::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('skills', 'like', '%' . $query . '%');
        })
        ->where('show', true) // Exclude jobs with show set to false
        ->get();
    
        return view('freelancer.search-jobs.index',compact('jobs'));
    }

    function searchJobs_view(request $request, Job $job){

        $employer = User::find($job->user_id);
        // dd($job);
        return view('freelancer.search-jobs.show', compact('job','employer'));
    }

    function searchJobs_bid(request $request, Job $job){
                // Validate bid information
                $request->validate([
                    'proposal' => 'required|string',
                    'portfolio' => 'nullable|string',
                    // Add more validation rules as needed
                ]);

    // Get the authenticated user's ID
    $userId = auth()->id();

    // Retrieve the corresponding freelancer ID based on the user ID
    $freelancerId = Freelancer::where('user_id', $userId)->value('id');
        
                // Create a bid associated with the job
                $bid = $job->bids()->create([
                    'freelancer_id' => $freelancerId,
                    'proposal' => $request->input('proposal'),
                    'portfolio' => $request->input('portfolio'),
                    'status' => 'active',
                    // Add more bid fields as needed
                ]);

                $job->increment('total_bids');
        
        return redirect()->route('freelancer.manage-bids')->with('success', 'Bid placed successfully');
    }

    function manageBids_index() {
        // Get the authenticated user
        $user = auth()->user();
    
        // Retrieve bids associated with the freelancer
        $bids = $user->freelancer->bids()->with('job')->get();
    
        return view('freelancer.manage-bids.index', compact('bids'));
    }

    function manageBids_show(request $request, $id){
        $bid = Bid::findOrFail($id);
        return view('freelancer.manage-bids.show', compact('bid'));
    }

    function manageBids_destroy(request $request, Bid $bid){
        $bid->delete();

        return redirect()->route('freelancer.manage-bids')->with('success', 'Bid deleted successfully');
    }

    
    
}
