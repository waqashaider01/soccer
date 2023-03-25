<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlayerAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("player_id");
            $table->foreign("player_id")->references("id")->on("users")->oncascade()->onDelete("cascade");
            $table->integer("ball_control")->default('0');
            $table->integer("corners")->default('0');
            $table->integer("crossing")->default('0');
            $table->integer("dribbling")->default('0');
            $table->integer("finishing")->default('0');
            $table->integer("first_touch")->default('0');
            $table->integer("free_kick_taking")->default('0');
            $table->integer("heading")->default('0');
            $table->integer("long_shots")->default('0');
            $table->integer("long_throws")->default('0');
            $table->integer("marking")->default('0');
            $table->integer("passing")->default('0');
            $table->integer("penalty_taking")->default('0');
            $table->integer("tackling")->default('0');
            $table->integer("technique")->default('0');
            $table->integer("aggression")->default('0');
            $table->integer("anticipation")->default('0');
            $table->integer("bravery")->default('0');
            $table->integer("composure")->default('0');
            $table->integer("concentration")->default('0');
            $table->integer("creativity")->default('0');
            $table->integer("decisions")->default('0');
            $table->integer("determination")->default('0');
            $table->integer("flair")->default('0');
            $table->integer("influence")->default('0');
            $table->integer("off_the_ball")->default('0');
            $table->integer("positioning")->default('0');
            $table->integer("team_work")->default('0');
            $table->integer("work_rate")->default('0');
            $table->integer("acceleration")->default('0');
            $table->integer("agility")->default('0');
            $table->integer("balance")->default('0');
            $table->integer("jumping")->default('0');
            $table->integer("natural_fitness")->default('0');
            $table->integer("reflexes")->default('0');
            $table->integer("speed")->default('0');
            $table->integer("stamina")->default('0');
            $table->integer("strength")->default('0');
            $table->integer("goalkeeping")->default('0');
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
        Schema::dropIfExists('player_attributes');
    }
}
