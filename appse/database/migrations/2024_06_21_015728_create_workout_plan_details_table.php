<?php
// database/migrations/xxxx_xx_xx_create_workout_plan_details_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutPlanDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('workout_plan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('workout_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('plan_id')->references('id')->on('workout_plans')->onDelete('cascade');
            $table->foreign('workout_id')->references('id')->on('upper_body_workout')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('workout_plan_details');
    }
}
