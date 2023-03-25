<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerNextMatchSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_next_match_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("player_id");
            $table->foreign("player_id")->references("id")->on("users")->onDelete("cascade");
            $table->string('my_team')->nullable();
            $table->string('opposing_team')->nullable();
            $table->boolean("home_match")->nullable();
            $table->string('match_type')->nullable();
            $table->string('venue')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('live_stream_link')->nullable();
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
        Schema::dropIfExists('player_next_match_schedules');
    }
}
