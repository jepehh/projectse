<?php

// database/migrations/xxxx_xx_xx_create_temp_workout_plan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempWorkoutPlanTable extends Migration
{
    public function up()
    {
        Schema::create('temp_workout_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('workout_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('workout_id')->references('id')->on('upper_body_workout')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_workout_plan');
    }
}
