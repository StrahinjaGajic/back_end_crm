<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('property')->index()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street_address_1');
            $table->string('street_address_2')->nullable();
            $table->string('city');
            $table->string('county');
            $table->string('post_code');
            $table->string('countries');
            $table->integer('adult_number');
            $table->integer('children_number');
            $table->string('occupant_names');
            $table->decimal('deposit','11','2');
            $table->integer('paid');
            $table->integer('contract_length');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('moved_in_date');
            $table->string('payment_date');
            $table->string('next_of_kin_full_name');
            $table->string('next_of_kin_email')->unique();
            $table->string('next_of_kin_phone');
            $table->timestamps();

            $table->foreign('property')->references('id')->on('property')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant');
    }
}
