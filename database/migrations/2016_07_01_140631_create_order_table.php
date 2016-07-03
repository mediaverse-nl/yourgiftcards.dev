<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderdetail_id')->unsigned();
            $table->foreign('orderdetail_id')->references('id')->on('orderdetail');
            $table->string('orderid');
            $table->string('email', 80);
            $table->string('fullname', 60);
            $table->string('method');
            $table->decimal('total', 5, 2);
            $table->enum('status', ['open', 'cancelled', 'expired', 'failed', 'pending', 'paid', 'paidout', 'refunded', 'charged_back']);
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
        Schema::drop('order');
    }
}
