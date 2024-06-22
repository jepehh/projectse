<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkoutPlanController extends Controller
{
    public function addToWorkoutPlan(Request $request)
    {
        try {
            $userId = auth()->id();
            $workoutId = $request->input('workout_id');

            DB::table('temp_workout_plan')->insert([
                'user_id' => $userId,
                'workout_id' => $workoutId,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json(['message' => 'Workout added to plan successfully']);
        } catch (\Exception $e) {
            Log::error('Error adding workout to plan: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to add workout to plan', 'error' => $e->getMessage()], 500);
        }
    }

    public function finalizeWorkoutPlan()
    {
        try {
            $userId = auth()->id();

            $tempWorkouts = DB::table('temp_workout_plan')
                ->where('user_id', $userId)
                ->get();

            if ($tempWorkouts->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'No workouts to finalize']);
            }

            foreach ($tempWorkouts as $tempWorkout) {
                DB::table('finalized_workout_plan')->insert([
                    'user_id' => $tempWorkout->user_id,
                    'workout_id' => $tempWorkout->workout_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::table('temp_workout_plan')->where('user_id', $userId)->delete();

            return response()->json(['success' => true, 'message' => 'Workout plan finalized successfully']);
        } catch (\Exception $e) {
            Log::error('Error finalizing workout plan: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to finalize workout plan', 'error' => $e->getMessage()], 500);
        }
    }

    public function showCurrentWorkoutPlan()
    {
        try {
            $userId = auth()->id();

            $workouts = DB::table('temp_workout_plan')
                ->join('upper_body_workout', 'temp_workout_plan.workout_id', '=', 'upper_body_workout.id')
                ->where('temp_workout_plan.user_id', $userId)
                ->select('upper_body_workout.*')
                ->get();

            $totalDuration = $workouts->sum(function($workout) {
                return $this->convertDurationToSeconds($workout->workout_duration);
            });

            return response()->json([
                'workouts' => $workouts,
                'totalDuration' => gmdate('H:i:s', $totalDuration)
            ]);
        } catch (\Exception $e) {
            Log::error('Error showing current workout plan: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to show current workout plan', 'error' => $e->getMessage()], 500);
        }
    }

    public function removeFromWorkoutPlan(Request $request)
    {
        try {
            $userId = auth()->id();
            $workoutId = $request->input('workout_id');

            DB::table('temp_workout_plan')
                ->where('user_id', $userId)
                ->where('workout_id', $workoutId)
                ->delete();

            return response()->json(['message' => 'Workout removed from plan successfully', 'success' => true]);
        } catch (\Exception $e) {
            Log::error('Error removing workout from plan: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to remove workout from plan', 'error' => $e->getMessage()], 500);
        }
    }

    public function removeFromFinalizedWorkoutPlan(Request $request)
    {
        try {
            $userId = auth()->id();
            $workoutId = $request->input('workout_id');
            $planId = $request->input('plan_id'); // Assuming you also pass the plan ID

            DB::table('workout_plan_details')
                ->where('plan_id', $planId)
                ->where('workout_id', $workoutId)
                ->delete();

            return response()->json(['message' => 'Workout removed from finalized plan successfully', 'success' => true]);
        } catch (\Exception $e) {
            Log::error('Error removing workout from finalized plan: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to remove workout from finalized plan', 'error' => $e->getMessage()], 500);
        }
    }

    public function publishWorkoutPlan(Request $request)
    {
        try {
            $userId = auth()->id();
            $planName = $request->input('plan_name');

            $workouts = DB::table('temp_workout_plan')
                ->where('user_id', $userId)
                ->get();

            if ($workouts->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'No workouts to publish']);
            }

            $planId = DB::table('workout_plans')->insertGetId([
                'user_id' => $userId,
                'plan_name' => $planName,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            foreach ($workouts as $workout) {
                DB::table('workout_plan_details')->insert([
                    'plan_id' => $planId,
                    'workout_id' => $workout->workout_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::table('temp_workout_plan')->where('user_id', $userId)->delete();

            return response()->json(['success' => true, 'message' => 'Workout plan published successfully']);
        } catch (\Exception $e) {
            Log::error('Error publishing workout plan: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to publish workout plan', 'error' => $e->getMessage()], 500);
        }
    }

    public function listWorkoutPlans()
    {
        try {
            $userId = auth()->id();

            $workoutPlans = DB::table('workout_plans')
                ->where('user_id', $userId)
                ->get();

            foreach ($workoutPlans as $plan) {
                $workouts = DB::table('workout_plan_details')
                    ->join('upper_body_workout', 'workout_plan_details.workout_id', '=', 'upper_body_workout.id')
                    ->where('workout_plan_details.plan_id', $plan->id)
                    ->get();

                $totalDuration = $workouts->sum(function($workout) {
                    return $this->convertDurationToSeconds($workout->workout_duration);
                });

                $plan->total_duration = $totalDuration;
            }

            return view('workout-plans', compact('workoutPlans'));
        } catch (\Exception $e) {
            Log::error('Error listing workout plans: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to list workout plans', 'error' => $e->getMessage()], 500);
        }
    }

    public function viewWorkoutPlan($id)
    {
        try {
            $userId = auth()->id();

            $workouts = DB::table('workout_plan_details')
                ->join('upper_body_workout', 'workout_plan_details.workout_id', '=', 'upper_body_workout.id')
                ->where('workout_plan_details.plan_id', $id)
                ->select('upper_body_workout.*')
                ->get();

            $totalDuration = $workouts->sum(function($workout) {
                return $this->convertDurationToSeconds($workout->workout_duration);
            });

            return view('view-workout-plan', compact('workouts', 'totalDuration', 'id')); // Pass $id to the view
        } catch (\Exception $e) {
            Log::error('Error viewing workout plan: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to view workout plan', 'error' => $e->getMessage()], 500);
        }
    }


    private function convertDurationToSeconds($duration)
    {
        $totalSeconds = 0;

        if (preg_match('/(\d+)\s*Hours?/', $duration, $matches)) {
            $totalSeconds += $matches[1] * 3600;
        }

        if (preg_match('/(\d+)\s*Minutes?/', $duration, $matches)) {
            $totalSeconds += $matches[1] * 60;
        }

        return $totalSeconds;
    }
}
