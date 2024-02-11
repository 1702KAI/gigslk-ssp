<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ProjectController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Freelancer routes
    Route::prefix('freelancer')->group(function () {
        Route::get('search-jobs', [FreelancerController::class, 'searchJobs_index'])->name('freelancer.search-job-all');
        Route::get('search-jobs/query', [FreelancerController::class, 'searchJobs_search'])->name('freelancer.search-job');
        Route::get('search-jobs/{job}', [FreelancerController::class, 'searchJobs_view'])->name('freelancer.view-job');
        Route::post('search-jobs/{job}', [FreelancerController::class, 'searchJobs_bid'])->name('freelancer.bid-job');
        Route::get('manage-bids', [FreelancerController::class, 'manageBids_index'])->name('freelancer.manage-bids');
        Route::get('manage-bids/{id}', [FreelancerController::class, 'manageBids_show'])->name('freelancer.show-bid');
        Route::post('manage-bids/{id}', [FreelancerController::class, 'manageBids_post'])->name('freelancer.edit-bid');
        Route::delete('manage-bids/{id}', [FreelancerController::class, 'manageBids_destroy'])->name('freelancer.delete-bid');
        Route::put('manage-bids/{id}', [FreelancerController::class, 'manageBids_update'])->name('freelancer.update-bid');
    });

    // Employer routes
    Route::prefix('employer')->group(function () {
        Route::get('manage-jobs', [EmployerController::class, 'manageJobs_index'])->name('employer.manage-jobs');
        Route::post('manage-jobs', [EmployerController::class, 'manageJobs_postJob'])->name('employer.post-job');
        Route::get('manage-jobs/{id}', [EmployerController::class, 'manageJobs_show'])->name('employer.show-job');
        Route::delete('manage-jobs/{id}', [EmployerController::class, 'manageJobs_destroy'])->name('employer.delete-job');
        Route::put('manage-jobs/{id}', [EmployerController::class, 'manageJobs_update'])->name('employer.update-job');
        Route::get('manage-bids', [EmployerController::class, 'manageBids_index'])->name('employer.manage-bids');
        Route::get('manage-bids/{id}', [EmployerController::class, 'manageBids_show'])->name('employer.show-bid');
        Route::post('accept-bid/{bid}', [EmployerController::class, 'manageBids_acceptBid'])->name('employer.accept-bid');
        Route::post('reject-bid/{bid}', [EmployerController::class, 'manageBids_rejectBid'])->name('employer.reject-bid');
        Route::post('manage-bids/{id}', [EmployerController::class, 'manageBids_post'])->name('employer.edit-bid');
        Route::delete('manage-bids/{id}', [EmployerController::class, 'manageBids_destroy'])->name('employer.delete-bid');
        Route::put('manage-bids/{id}', [EmployerController::class, 'manageBids_update'])->name('employer.update-bid');
    });

    // Admin routes
    Route::prefix('admin')->middleware(['admin'])->group(function () {
        // Add admin routes here
    });

    // Common routes
    Route::prefix('project')->group(function () {
        Route::get('view/{id}', [ProjectController::class, 'index'])->name('project.view-project');
    });
});


