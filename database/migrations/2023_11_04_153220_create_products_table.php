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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_product');
            $table->string('name_product');
            $table->string('capacity_product')->nullable();
            $table->string('specification_product')->nullable();
            $table->integer('type_product_id')->unsigned();
            $table->string('quantity_product')->nullable();
            $table->string('unit_goods_product')->nullable();
            $table->string('size_product')->nullable();
            $table->string('gross_product')->nullable();
            $table->string('net_product')->nullable();
            $table->string('unit_size_product')->nullable();
            $table->string('gross_uom_product')->nullable();
            $table->string('net_uom_product')->nullable();
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
};
