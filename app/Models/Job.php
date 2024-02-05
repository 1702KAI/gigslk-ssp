<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'skills',
        'budget',
        'duration',
        'employer_id',
        'total_bids',
        'status',
        'show',
        // Add more attributes as needed
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Add any casting rules if needed
    ];

    /**
     * Get the user who created the job.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function employer()
    {
    return $this->belongsTo(Employer::class, 'employer_id');
    }


    // public function getTotalBidsAttribute()
    // {
    //     return $this->bids()->distinct('freelancer_id')->count('freelancer_id');
    // }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($job) {
    //         // Set the initial value of total_bids when creating a new job
    //         $job->total_bids = 0;
    //     });

    //     static::created(function ($job) {
    //         // Update total_bids when a new bid is created
    //         $job->updateTotalBids();
    //     });

    //     static::deleted(function ($job) {
    //         // Update total_bids when a bid is deleted
    //         $job->updateTotalBids();
    //     });
    // }

    // public function updateTotalBids()
    // {
    //     $this->total_bids = $this->bids()->distinct('freelancer_id')->count('freelancer_id');
    //     $this->save();
    // }


    // Add more relationships or methods as needed
}
