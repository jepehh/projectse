<?php

namespace App\Http\Controllers;

use App\Models\UpperBodyWorkout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function showUpperBodyWorkouts()
    {
        $workouts = UpperBodyWorkout::all();
        $workoutTargets = UpperBodyWorkout::select('workout_target')->distinct()->pluck('workout_target');
        return view('training_prog.upper-body', compact('workouts', 'workoutTargets'));
    }
}
