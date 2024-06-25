<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('email');
            $table->string('phone');
            $table->string('course');
            $table->string('edu_level');
            $table->string('app_letter')->nullable();
            $table->string('certificate')->nullable();
            $table->boolean('first_time');
            $table->string('place');
            $table->string('receipt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
