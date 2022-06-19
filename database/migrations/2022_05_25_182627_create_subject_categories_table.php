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
        Schema::create('subject_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->float('total_hours')->nullable();   // total hours of this category
            $table->float('M_hours')->nullable();   // Must hours
            $table->float('E_hours')->nullable();   // optional hours
            $table->boolean('specialization')->default(1); // 0 basic  1 other specialization Ai , SC, CS, Is
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('subject_categories');
    }
};
