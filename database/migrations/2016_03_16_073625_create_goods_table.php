<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->default('0');
            $table->integer('category_id')->default('0');
            $table->string('name');
            $table->string('thumb');
            $table->string('inventory');
            $table->string('price');
            $table->tinyInteger('sort_order')->default('99');
            $table->boolean('onsale')->default(true);
            $table->boolean('hot')->default(true);
            $table->boolean('new')->default(true);
            $table->boolean('recommend')->default(true);
            $table->string('desc');
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
        //
    }
}
