<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTransferHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_transfer_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("player_id");
            $table->foreign("player_id")->references("id")->on("users")->onDelete("cascade");
            $table->date('transfer_date')->nullable();
            $table->string('transfer_from_team')->nullable();
            $table->string('transfer_to_team')->nullable();
            $table->string('transfer_type')->nullable();
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
        Schema::dropIfExists('player_transfer_histories');
    }
}
