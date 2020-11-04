<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('address_id')->nullable();
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('img')->nullable();
            $table->string('cost')->nullable();
            $table->string('cost')->nullable();
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->float('rating')->nullable();
            $table->integer('number_rating')->nullable();
            $table->integer('status')->default(1);
            $table->string('slug')->unique();
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
        Schema::dropIfExists('shop');
    }
}
