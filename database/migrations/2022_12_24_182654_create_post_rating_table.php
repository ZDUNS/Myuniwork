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
        Schema::create('post_rating', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('post_id')->references('id')->on('posts');
            //$table->integer('discussion_id')->unsigned();
            //$table->foreign('discussion_id')->references('id')->on('discussions');
            $table->unsignedInteger('user_id')->references('user_id')->on('users');
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->integer('like_dislike');
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
        Schema::dropIfExists('post_rating');
    }
};
