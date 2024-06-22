<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToUpperBodyWorkoutTable extends Migration
{
    public function up()
    {
        Schema::table('upper_body_workout', function (Blueprint $table) {
            $table->string('image_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('upper_body_workout', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}

