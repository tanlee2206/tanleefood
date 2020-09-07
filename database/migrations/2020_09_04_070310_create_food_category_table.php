<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('food_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->timestamps();

            // $table->primary(['category_id', 'food_id']);
            $table->foreign('category_id')->references('id')->on('category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('food')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_category');
    }
}
