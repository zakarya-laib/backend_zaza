<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency', function (Blueprint $table) {
            $table->string('agency_email',50);
            $table->foreign('agency_email')->references('email')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('agency_name');
            $table->primary('agency_name');
            $table->string('agency_logo')->nullable();
            $table->string('commercial_register')->nullable();
            $table->string('agency_phone_number');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency');
    }
}
