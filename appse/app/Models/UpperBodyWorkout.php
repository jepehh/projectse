<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpperBodyWorkout extends Model
{
    use HasFactory;

    protected $table = 'upper_body_workout';

    protected $fillable = [
        'workout_name', 'workout_target', 'workout_difficulty', 
        'workout_recommended_sets', 'workout_recommended_weights', 
        'workout_duration', 'image_path'
    ];

    public function details()
    {
        return $this->hasMany(WorkoutPlanDetail::class, 'workout_id');
    }
}
