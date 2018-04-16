<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id')->nullable();
            $table->string('property_name');
            $table->text('street_address_1');
            $table->text('street_address_2');
            $table->string('city');
            $table->string('county');
            $table->string('post_code');
            $table->string('country');
            $table->text('description');
            $table->text('lat');
            $table->text('lng');
            $table->decimal('rent_price','8','2');
            $table->decimal('property_deposit','8','2');
            $table->string('property_type');
            $table->integer('bedrooms');
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
        Schema::dropIfExists('property');
    }
}
