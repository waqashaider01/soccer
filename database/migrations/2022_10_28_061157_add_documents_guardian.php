<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentsGuardian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guardian_approvals', function (Blueprint $table) {
            //
            $table->string('photofront')->nullable();
            $table->string('photoback')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guardian_approvals', function (Blueprint $table) {
            $table->dropColumn(['photofront',  'photoback']);
            //
        });
    }
}
