<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("sender_id");
            $table->string("receiver_id");
            $table->string("message")->nullable()->change();
            $table->string("message_subject");
            $table->string("upload_file");
            $table->string("delete_at_sender");
            $table->string("delete_at_receiver");
            $table->string("message_sent_time");
            $table->string("starred_message");
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
        Schema::dropIfExists('messages');
    }
}
