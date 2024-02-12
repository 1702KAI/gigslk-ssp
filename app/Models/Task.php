<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'description',
        'assigned_to',
        'assigned_by',
        'due_date',
        'status',
    ];

    // Additional model logic or relationships can be added here
}
