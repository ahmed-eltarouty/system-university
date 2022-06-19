<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('semester_register');  // 1:open 0:close
            $table->boolean('semester_type');  // 1:summer 0:normal
            $table->float('graduate_hours')->nullable();
            $table->float('min_hours')->nullable(); // min hours to register
            $table->float('max_hours_CGPA_greater_2')->nullable(); // max hours to register for CGPA > 2
            $table->float('max_hours_CGPA_less_2_greater_1')->nullable(); // max hours to register for CGPA < 2 and > 1
            $table->float('max_hours_CGPA_less_1')->nullable(); // max hours to register for CGPA < 1
            $table->float('emergency_graduate_hours')->nullable(); // emergency graduate hours 3 hours
            $table->float('max_hours_summer')->nullable(); // max hours summer semester
            $table->float('min_hours_summer')->nullable(); // min hours summer semester
            $table->integer('period_of_editing_registered_semester')->nullable(); // period of editing registered semester for students
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
