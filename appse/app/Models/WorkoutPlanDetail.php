<?php
// app/Models/WorkoutPlanDetail.php

// app/Models/WorkoutPlanDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlanDetail extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id', 'workout_id'];

    public function workout()
    {
        return $this->belongsTo(UpperBodyWorkout::class, 'workout_id');
    }

    public function plan()
    {
        return $this->belongsTo(WorkoutPlan::class, 'plan_id');
    }
}
