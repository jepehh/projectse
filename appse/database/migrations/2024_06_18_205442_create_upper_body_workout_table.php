<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('upper_body_workout', function (Blueprint $table) {
            $table->id();
            $table->string('workout_name');
            $table->string('workout_target');
            $table->string('workout_difficulty');
            $table->string('workout_recommended_sets');
            $table->integer('workout_recommended_weights');
            $table->string('workout_duration');
            $table->timestamps();
            $table->string('image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upper_body_workout');
    }
};
