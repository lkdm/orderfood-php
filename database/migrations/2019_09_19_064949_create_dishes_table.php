<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            /*
             *  Create Dishes table
             * - restaurant_id refers to the ID of the user with role "restaurant"
             */
            $table->bigIncrements('id');
            $table->integer('restaurant_id');
            $table->string('name');
            $table->float('price');
            $table->string('photo');
            $table->boolean('approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
