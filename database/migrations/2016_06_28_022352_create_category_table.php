<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('thumbnail', 25);
            $table->string('layout', 25);
            $table->string('icon', 25);
            $table->string('description', 250);
            $table->string('levering', 250);
            $table->string('instructions', 250);
            $table->enum('status', ['on', 'off']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
}
