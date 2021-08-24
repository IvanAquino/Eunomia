<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'assigned_to',
        'sprint_id',
        'reported_by',
        'estimated_hours',
        'story_point',
    ];

    protected $casts = [
        'estimated_hours' => 'float',
        'story_point' => 'float',
    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function project()
    {
        return $this->hasOneThrough(
            Project::class, 
            Sprint::class,
            'id',
            'id',
            'sprint_id',
            'project_id'
        );
    }

    public function reportedBy()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}
