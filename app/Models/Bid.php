<?php

// app/Models/Bid.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'freelancer_id',
        'proposal',
        'portfolio',
        'status',
        
        // Add more bid fields as needed
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    public static function getTotalBidsForJob($jobId)
    {
        return self::where('job_id', $jobId)->distinct('freelancer_id')->count('freelancer_id');
    }
}
