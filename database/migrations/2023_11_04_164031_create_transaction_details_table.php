<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->integer('qty_detail');
            $table->integer('subtotal_detail');
            $table->text('remarks_detail')->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transaction')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
};
