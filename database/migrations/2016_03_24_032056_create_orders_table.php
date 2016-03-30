<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('orders', function (Blueprint $table) {
        $table->increments('id');
        $table->string('user_id');
        $table->string('address_id');
        $table->string('express_code');
        $table->string('shopping_time');
        $table->string('pay_time');
        $table->string('total_price');
        $table->string('confirm_time');
        $table->tinyInteger('status')->default('99');
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
