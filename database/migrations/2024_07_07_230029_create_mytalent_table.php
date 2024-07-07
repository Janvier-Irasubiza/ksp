<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mytalent', function (Blueprint $table) {
            $table->id();
            $table->uuid('app_id')->unique();
            $table->string('names');
            $table->string('email');
            $table->string('phone');
            $table->date('birthdate');
            $table->string('district');
            $table->string('talent_class');
            $table->string('talent_category');
            $table->string('other')->nullable();
            $table->string('location');
            $table->string('group_app_sheet')->nullable();
            $table->text('category_desc')->nullable();
            $table->string('receipt')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('agent_part')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('mytalent');
    }
}
