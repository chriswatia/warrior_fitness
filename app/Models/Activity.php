<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'activity_date',
        'starttime',
        'endtime',
        'energy',
        'distance',
        'steps',
        'points',
        'created_by'
    ];
}
