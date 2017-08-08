<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('state_id')->unsigned();;
            $table->integer('country_id')->unsigned();
            $table->boolean('valid');
            $table->string('name');
            $table->string('type');
            $table->string('street_1');
            $table->string('street_2');
            $table->string('city');
            $table->string('postcode');
            $table->string('phone_1');
            $table->string('phone_2');
            $table->text('complement');
            $table->text('longitude');
            $table->text('latitude');
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
        Schema::dropIfExists('user_addresses');
    }
}
