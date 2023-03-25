<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('share');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('blogs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voidost
     */
    public function down()
    {
        Schema::dropIfExists('share_posts');
    }
}
