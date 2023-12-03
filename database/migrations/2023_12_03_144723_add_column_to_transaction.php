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
            $table->text('purposedivisi_transaction')->nullable();
            $table->boolean('isppn_transaction')->default(false);
            $table->string('attachment_transaction')->nullable();
            $table->double('valueppn_transaction')->nullable();
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
            $table->dropColumn('purposedivisi_transaction');
            $table->dropColumn('isppn_transaction');
            $table->dropColumn('attachment_transaction');
            $table->dropColumn('valueppn_transaction');
        });
    }
};
