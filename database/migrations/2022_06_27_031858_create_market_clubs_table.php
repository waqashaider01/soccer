<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_clubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->string('slug')->nullable();

            // Club Information
            $table->string('expiry_date')->nullable();
            $table->string('for_whom')->nullable();

            // Description
            $table->string('upload_logo')->nullable();
            $table->string('description')->nullable();

            // Details
            $table->string('club_name')->nullable();
            $table->string('league_division')->nullable();
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
            $table->string('eu_passport_required')->nullable();

            // Transfer Fees
            $table->string('transfer_fee')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('training_compensation_fee')->nullable();
            $table->string('trial_conditions')->nullable();

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
        Schema::dropIfExists('market_clubs');
    }
}
