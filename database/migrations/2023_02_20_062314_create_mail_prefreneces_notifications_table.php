<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailPrefrenecesNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_prefreneces_notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("mention");
            $table->bigInteger("comment");
            $table->bigInteger("message");
            $table->bigInteger("article");
            $table->bigInteger("sign_up_via_profile");
            $table->bigInteger("revelent_post");
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('mail_prefreneces_notifications');
    }
}
