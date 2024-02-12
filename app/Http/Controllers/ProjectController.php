<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Bid;
use App\Models\Job;
use App\Models\Task;
use Auth;

class ProjectController extends Controller
{
    public function viewProject_index($id)
    {
        $user = Auth::user();

         // Fetch the project details based on the $id parameter
        $project = Project::findOrFail($id);

        // Retrieve tasks related to the project
        $tasks = Task::where('project_id', $project->id)->get();

         return view('projects.index', compact('project', 'tasks'));
    }

    public function viewProject_createTask()
    {
        return view('projects.create');
    }

    public function viewProject_storeTask(Request $request, $projectId)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'assigned_to' => 'nullable|numeric',
            'assigned_by' => 'nullable|numeric',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,completed,in_progress',
            // Add more validation rules as needed
        ]);

        // Create and store the task
        Task::create([
            'project_id' => $projectId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'assigned_to' => $request->input('assigned_to'),
            'assigned_by' => $request->input('assigned_by'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
        ]);

        // Redirect back to the project view with a success message
        return redirect()->route('project.view-project', ['id' => $projectId])->with('success', 'Task created successfully');
    }
}
