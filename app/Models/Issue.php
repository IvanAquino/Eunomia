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
    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}
