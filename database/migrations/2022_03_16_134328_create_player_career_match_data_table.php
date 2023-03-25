<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerCareerMatchDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_career_match_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("player_id");
            $table->foreign("player_id")->references("id")->on("users")->onDelete("cascade");
            $table->string('season')->nullable();
            $table->string('team')->nullable();
            $table->string('country')->nullable();
            $table->string('competition')->nullable();
            $table->integer('matches_played')->nullable();
            $table->integer('goals')->nullable();
            $table->integer('assists')->nullable();
            $table->integer('substitute_in')->nullable();
            $table->integer('substitute_out')->nullable();
            $table->integer('yellow_cards')->nullable();
            $table->integer('second_yellow_cards')->nullable();
            $table->integer('red_cards')->nullable();
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
        Schema::dropIfExists('player_career_match_data');
    }
}
