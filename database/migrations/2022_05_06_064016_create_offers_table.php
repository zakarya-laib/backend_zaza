<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_agency_name');
            $table->foreign('offer_agency_name')->references('agency_name')->on('agency')->onUpdate('cascade')->cascadeOnDelete();
            $table->string('offer_type');
            $table->string('offer_price');
            $table->string('property_type');
            $table->string('x');
            $table->string('y');
            $table->string('address');
            $table->string('offer_description');
            $table->string('number_of_rooms');
            $table->string('surface');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
