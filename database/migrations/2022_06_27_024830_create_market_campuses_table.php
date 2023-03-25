<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_campuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->string('slug')->nullable();

            // Campus Information
            $table->string('expiry_date')->nullable();
            $table->string('for_whom')->nullable();

            // Description
            $table->string('upload_logo')->nullable();
            $table->string('description')->nullable();

            // Details
            $table->string('city_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_date')->nullable();
            $table->string('end_time')->nullable();

            // Player's Details
            $table->string('player_gender')->nullable();
            $table->string('player_position')->nullable();
            $table->string('player_min_age')->nullable();
            $table->string('player_max_age')->nullable();

            // Contact Information
            $table->string('profile_type')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('social_media_link')->nullable();

            // Additional Information
            $table->string('additional_information')->nullable();
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
        Schema::dropIfExists('market_campuses');
    }
}
