<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class UpperBodyWorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workouts = [
            [
                'workout_name' => 'Incline Bench Press',
                'workout_target' => 'Chest',
                'workout_difficulty' => 'Experienced',
                'workout_recommended_sets' => '3 sets of 5 reps',
                'workout_recommended_weights' => 5,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/incline-bench-press.jpg',
                'created_at' => Carbon::parse('2024-06-21 01:59:56'),
                'updated_at' => Carbon::parse('2024-06-21 01:59:56'),
            ],
            [
                'workout_name' => 'Horizontal Row (Chest Supported Row)',
                'workout_target' => 'Back',
                'workout_difficulty' => 'Experienced',
                'workout_recommended_sets' => '3 sets of 10 reps',
                'workout_recommended_weights' => 10,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/horizontal-row.jpeg',
                'created_at' => Carbon::parse('2024-06-21 02:02:53'),
                'updated_at' => Carbon::parse('2024-06-21 02:02:53'),
            ],
            [
                'workout_name' => 'Standing Overhead Press (Vertical Push)',
                'workout_target' => 'Shoulder',
                'workout_difficulty' => 'Advanced',
                'workout_recommended_sets' => '3 sets of 10 reps',
                'workout_recommended_weights' => 10,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/standing-overhead-press.jpeg',
                'created_at' => Carbon::parse('2024-06-21 02:06:16'),
                'updated_at' => Carbon::parse('2024-06-21 02:06:16'),
            ],
            [
                'workout_name' => 'Pull-Ups',
                'workout_target' => 'Back',
                'workout_difficulty' => 'Expert',
                'workout_recommended_sets' => '3 sets of 0 reps',
                'workout_recommended_weights' => 0,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/pull-ups.jpeg',
                'created_at' => Carbon::parse('2024-06-21 02:07:39'),
                'updated_at' => Carbon::parse('2024-06-21 02:07:39'),
            ],
            [
                'workout_name' => 'Lat Pulldowns',
                'workout_target' => 'Back',
                'workout_difficulty' => 'Beginner',
                'workout_recommended_sets' => '3 sets of 5 reps',
                'workout_recommended_weights' => 5,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/lat-pulldown.jpeg',
                'created_at' => Carbon::parse('2024-06-21 02:09:40'),
                'updated_at' => Carbon::parse('2024-06-21 02:09:40'),
            ],
            [
                'workout_name' => 'Incline Dumbbell Curls',
                'workout_target' => 'Biceps',
                'workout_difficulty' => 'Experienced',
                'workout_recommended_sets' => '3 sets of 5 reps',
                'workout_recommended_weights' => 5,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/incline-dumbell-curl.jpeg',
                'created_at' => Carbon::parse('2024-06-21 02:11:38'),
                'updated_at' => Carbon::parse('2024-06-21 02:11:38'),
            ],
            [
                'workout_name' => 'Incline Overhead Dumbbell Extensions',
                'workout_target' => 'Triceps',
                'workout_difficulty' => 'Advanced',
                'workout_recommended_sets' => '3 sets of 5 reps',
                'workout_recommended_weights' => 5,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/incline-overhead-dumbell-extensions.jpeg',
                'created_at' => Carbon::parse('2024-06-21 02:12:56'),
                'updated_at' => Carbon::parse('2024-06-21 02:12:56'),
            ],
            [
                'workout_name' => 'V-ups',
                'workout_target' => 'Abs',
                'workout_difficulty' => 'Advanced',
                'workout_recommended_sets' => '3 sets of 0 reps',
                'workout_recommended_weights' => 0,
                'workout_duration' => '5 Minutes',
                'image_path' => 'workouts/v-ups.jpeg',
                'created_at' => Carbon::parse('2024-06-14 14:50:16'),
                'updated_at' => Carbon::parse('2024-06-21 14:50:16'),
            ],
        ];

        DB::table('upper_body_workout')->insert($workouts);
    }
}
