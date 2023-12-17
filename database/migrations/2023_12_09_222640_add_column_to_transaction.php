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
        Schema::table('transaction', function (Blueprint $table) {
            $table->string('accept_transaction')->nullable();
            $table->string('bank_transaction')->nullable();
            $table->string('nomorvirtual_transaction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction', function (Blueprint $table) {
            //
            $table->dropColumn('accept_transaction');
            $table->dropColumn('bank_transaction');
            $table->dropColumn('nomorvirtual_transaction');
        });
    }
};
