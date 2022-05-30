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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->float('study_hours')->nullable();
            $table->float('max_degree')->nullable();
            $table->float('min_degree')->nullable();
            $table->integer('total_students_can_register')->nullable();
            $table->float('GPA_Greater_Than')->nullable();
            $table->integer('finished_subject_id_1')->nullable();
            $table->integer('finished_subject_id_2')->nullable();
            $table->integer('required_hours')->nullable(); // if hours requierd to register it
            $table->foreignId('category_id')->nullable()->constrained('subject_categories');
            $table->boolean('subject_status')->default(1);  // 1:Must (M) 2:Optional (E)
            $table->boolean('status')->default(1);  // 1:Active 0:Inactive
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
        Schema::dropIfExists('subjects');
    }
};
