<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketPartnershipRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_partnership_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->string('slug')->nullable();

            // Academy Information
            $table->string('expiry_date')->nullable();
            $table->string('for_whom')->nullable();

            // Description
            $table->string('upload_logo')->nullable();
            $table->string('description')->nullable();

            // Details
            $table->string('originating_partner_country')->nullable();
            $table->string('prospective_partner')->nullable();
            $table->string('prospective_partner_country')->nullable();
            $table->string('prospective_partner_country_wordwide')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_date')->nullable();
            $table->string('end_time')->nullable();

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
        Schema::dropIfExists('market_partnership_requests');
    }
}
