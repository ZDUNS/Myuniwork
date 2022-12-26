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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            //$table->integer('user_id');
           // $table->unsignedInteger('place_id')->references('id')->on('places');
           $table->unsignedInteger('vehicle_id')->references('id')->on('vehicle');
           // $table->unsignedInteger('user_id')->references('user_id')->on('users');
            $table->string('title');
            $table->text('description');
           // $table->integer('rating');
           // $table->integer('closed')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
