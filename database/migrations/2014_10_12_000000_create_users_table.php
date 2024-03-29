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
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('specialization_id')->nullable();
            $table->year('year_enrolled')->nullable();
            $table->integer('total_registered_hours')->nullable();
            $table->integer('total_finished_hours')->nullable();

            $table->float('GPA')->nullable();
            $table->float('CGPA')->nullable();
            $table->foreignId('supervisor_id')->nullable()->constrained('supervisors')->unsigned();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable()->unsigned();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    // we need to add status supervisor id

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
