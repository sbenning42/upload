<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('designer_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('style_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('condition_id')->unsigned();
            $table->string('ref')->unique();
            $table->string('name');
            $table->string('brand_suggestion')->nullable();
            $table->string('designer_suggestion')->nullable();
            $table->integer('quantity');
            $table->string('parcel')->nullable();
            $table->boolean('display_model')->nullable();
            $table->integer('number_of_packs')->nullable();
            $table->boolean('fragile')->nullable();
            $table->float('price');
            $table->float('original_price')->nullable();
            $table->text('description');
            $table->integer('size_height')->nullable();
            $table->integer('size_width')->nullable();
            $table->integer('size_depth')->nullable();
            $table->integer('weight')->nullable();
            $table->boolean('pickup_from_seller')->nullable();
            $table->float('delivery_france_price')->nullable();
            $table->float('delivery_europe_price')->nullable();
            $table->text('delivery_france_terms')->nullable();
            $table->text('delivery_europe_terms')->nullable();
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
        Schema::dropIfExists('products');
    }
}
