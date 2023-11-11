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
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_transaction');
            $table->date('tanggal_transaction');
            $table->string('paidto_transaction');
            $table->integer('metode_pembayaran_id')->unsigned();
            $table->integer('paymentterms_transaction');
            $table->date('expired_transaction');
            $table->text('purpose_transaction');
            $table->integer('totalproduct_transaction')->nullable();
            $table->integer('totalprice_transaction')->nullable();
            $table->string('status_transaction')->nullable();
            $table->integer('users_id_review')->nullable();
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
        Schema::dropIfExists('transaction');
    }
};
