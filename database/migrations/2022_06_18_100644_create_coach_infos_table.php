<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coach_id');
            // Personal Information
            $table->string('nationality')->nullable();
            $table->string('licensed')->nullable();
            $table->string('current_team')->nullable();
            $table->string('about_me')->nullable();
            // Basic Information
            $table->string('organization_name')->nullable();
            $table->string('position_at_organization')->nullable();
            $table->string('coach_nationality')->nullable();
            $table->string('countries_of_operation')->nullable();
            $table->string('countries_of_operation_worldwide')->nullable();
            $table->string('profile_link')->nullable();
            // Contact Information
            $table->string('profile_type')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('social_media_link_1')->nullable();
            $table->string('social_media_link_2')->nullable();
            $table->string('social_media_link_3')->nullable();
            $table->string('website')->nullable();
            $table->integer('birth_city')->nullable();
            $table->string('state')->nullable();
            $table->integer('birth_country')->nullable();
            // Profile Picture
            $table->string('cover_img')->nullable();
            $table->string('profile_img')->nullable();
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
        Schema::dropIfExists('coach_infos');
    }
}
