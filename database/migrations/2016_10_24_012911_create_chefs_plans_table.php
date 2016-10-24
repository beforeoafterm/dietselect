<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefsplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chefs_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('plans_id')->references('id')->on('plans');
            $table->integer('calories');
            $table->integer('carbohydrates');
            $table->integer('protein');
            $table->integer('fat');
            $table->double('price');
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
        Schema::dropIfExists('chefs_plans');
    }
}