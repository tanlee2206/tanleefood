<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->integer('groupuser_id')->nullable();
            $table->increments('id');
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            // $table->integer('groupuser_id')->nullable();
            $table->string('login_name')->unique();
            $table->string('phone')->nullable();
            $table->string('img')->nullable();
            $table->string('email')->unique(); 
            $table->string('password');
            $table->integer('permission_id')->default(1);          
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
        Schema::dropIfExists('users');
    }
}
