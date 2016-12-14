<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->integer('productkey_id')->unsigned();
            $table->foreign('productkey_id')->references('id')->on('productkey');
            $table->string('name')->unique();
            $table->decimal('price', 5, 2);
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('servicecosts', 5, 2);
            $table->string('value');
            $table->enum('status', ['on', 'off']);
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
        Schema::drop('product');
    }
}
