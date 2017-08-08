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
            $table->integer('designer_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('style_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->text('other');
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
