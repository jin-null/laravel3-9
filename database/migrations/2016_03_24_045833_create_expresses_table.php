<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('name');
            $table->string('desc');
            $table->string('sort_order');
            $table->string('shipping_money');
            $table->string('shipping_free');
            $table->string('confirm_time');
            $table->string('enable');
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
