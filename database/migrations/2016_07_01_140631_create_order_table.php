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
            $table->string('email', 80);
            $table->string('fullname', 60);
            $table->string('method');
            $table->decimal('total', 19, 2);
            $table->enum('status', ['open', 'cancelled', 'expired', 'failed', 'pending', 'paid', 'paidout', 'refunded', 'charged_back']);
            $table->string('payment_id', 60);
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
