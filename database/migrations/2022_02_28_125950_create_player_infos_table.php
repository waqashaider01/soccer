<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("player_id");
            $table->foreign("player_id")->references("id")->on("users")->onDelete("cascade");
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->integer('birth_country')->nullable();
            $table->integer('birth_city')->nullable();
            $table->integer('citizenship_country')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('profile_link')->nullable();
            $table->boolean('eu_passport')->nullable();
            $table->json("languages")->nullable();
            $table->string('main_position')->nullable();
            $table->string('alternative_position')->nullable();
            $table->string('preferred_foot')->nullable();
            $table->string('speed')->nullable();
            $table->boolean('have_agent')->nullable();
            $table->string('status')->nullable();
            $table->string('career_level')->nullable();
            $table->string('current_club')->nullable();
            $table->integer('league_division')->nullable();
            $table->integer('career_country')->nullable();
            $table->integer('career_city')->nullable();
            $table->date('contract_start_date')->nullable();
            $table->date('contract_expiry_date')->nullable();
            $table->boolean('national_team_player')->nullable();
            $table->integer('international_caps')->nullable();
            $table->boolean('training_compensation_to_previous_club')->nullable();
            $table->boolean('transfer_fee_to_previous_club')->nullable();
            $table->integer('monthly_salary_target')->nullable();
            $table->integer('current_market_value')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('media_video1')->nullable();
            $table->string('media_video2')->nullable();
            $table->string('media_video3')->nullable();
            $table->string('media_video4')->nullable();
            $table->string('media_video5')->nullable();
            $table->string('media_img1')->nullable();
            $table->string('media_img2')->nullable();
            $table->string('media_img3')->nullable();
            $table->string('media_img4')->nullable();
            $table->string('media_img5')->nullable();
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
        Schema::dropIfExists('player_infos');
    }
}
