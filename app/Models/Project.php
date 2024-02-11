<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'freelancer_id',
        'bid_proposal',
        'freelancer_portfolio',
        'project_owner',
        'budget',
        'timeline',
        'status',
    ];

    // Define relationships
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
