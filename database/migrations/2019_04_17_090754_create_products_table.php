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
            $table->bigIncrements('id');
            $table->string('name_of_product');
            $table->double('price');
            $table->double('size');
            $table->smallInteger('status_draft');
            $table->smallInteger('status_approved');
            $table->smallInteger('status_waiting');
            $table->smallInteger('status_in_process');
            $table->smallInteger('status_done');
            $table->smallInteger('status_unknown');
            $table->string('manufacture');
            $table->integer('serial_number');
            $table->text('description');
            $table->integer('views');
            $table->string('color');

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
