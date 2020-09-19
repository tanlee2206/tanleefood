<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->integer('shop_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->double('price');
            $table->integer('sale')->default(0);
            $table->string('img')->nullable();
            $table->integer('status')->default(1);
            $table->integer('number')->nullable();
            $table->integer('view')->nullable();
            $table->string('slug')->nullable();
            // $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');

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
        Schema::dropIfExists('food');
    }
}
